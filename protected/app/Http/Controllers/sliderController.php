<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;
use App\Content;
use Validator;
use Image;
use Auth;
use Session;

class sliderController extends Controller
{
    //
        //
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $total = Content::count();
        $id = $total + 1;
        $content = new content();
        $content->jenis = 0;
        $content->judul = $request->judul;
        $content->katakunci = $request->katakunci;
        if(!empty($request->image)){
            if($request->file('image')->getClientOriginalExtension() == "jpg" || $request->file('image')->getClientOriginalExtension() == "jpeg" || $request->file('image')->getClientOriginalExtension() == "JPG" || $request->file('image')->getClientOriginalExtension() == "JPEG" ){
                    $this->upload($request->image,'slider',$content,$id);
            }else{
                $content->content = "assets/img/no-image-available.jpg";
            }
        }else{
            $content->content = "assets/img/no-image-available.jpg";
        }
        $content->save();    		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $slider = Content::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function updateslider(Request $request, $id)
    {
        //
        
        // dd($request->all()); exit;
        $content = Content::find($id);
        $content->jenis = 0;
        $content->judul = $request->judul;
        $content->katakunci = $request->katakunci;
        if(!empty($request->image)){
            if($request->file('image')->getClientOriginalExtension() == "jpg" || $request->file('image')->getClientOriginalExtension() == "jpeg" || $request->file('image')->getClientOriginalExtension() == "JPG" || $request->file('image')->getClientOriginalExtension() == "JPEG" ){
                    $this->upload($request->image,'slider',$content,$id);
            }else{
                $content->content = "assets/img/no-image-available.jpg";
            }
        }
        $content->save(); 
        //return redirect('pegawai')->with('message', 'Data berhasil dirubah!');
    }

    public function hapus($id)
    {
        
        $slider = Content::find($id);
        return view('admin.slider.hapus', compact('slider'));
    }

    public function destroy($id)
    {
        $slider = Content::find($id);
        $slider->flag_delete = "1";
        $slider->save();
    }

    public function upload($image,$field,$content,$id){
        $file = array('image' => $image);
        
        // setting up rules
        $rules = array('image' => 'required'); //mimes:jpeg,bmp,png and for max size max:10000
        
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
            // echo "string"; exit;

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            // return "Gagal Valid";
            $content->content = "assets/img/no-image-available.jpg";
        }else{
            // checking file is valid.
            if ($image->isValid()) {
              $nameAlias = md5($field.$id);
              $dom = 'slider';
              $folder = 'quickcount';

              if (!file_exists('protected/storage/'.$folder.'/'.$dom)) {
                  mkdir('protected/storage/'.$folder.'/'.$dom, 0777, true);
              }
              
              if(!file_exists('protected/storage/'.$folder.'/'.$dom.'/content/'.md5($field))) {
                  mkdir('protected/storage/'.$folder.'/'.$dom.'/content/'.md5($field), 0777, true);
              }

              $destinationPath = 'protected/storage/'.$folder.'/'.$dom.'/content/'.md5($field);  

              $extension = $image->getClientOriginalExtension(); // getting image extension
              $fileName = $nameAlias.'.'.$extension;
              if (file_exists($destinationPath.'/'.$fileName)) {
                unlink($destinationPath.'/'.$fileName);
              }
              
              if ($image->move($destinationPath, $fileName)) {
                $filePath = $destinationPath.'/'.$fileName;
                // open an image file
                $img = Image::make($filePath);
                // resize image instance
                $img->resize(900, 380);
                // save image in desired format
                $img->save($filePath);

                $content->content = $filePath;
                
              }
              
            }else{
              // sending back with error message.
              // Session::flash('error', 'uploaded file is not valid');
              // return "Gagal";
              $content->content = "assets/img/no-image-available.jpg";
              //return Redirect::to('daftar/uploadfoto?gagal=1');
            }
        }
    }
    
    
    public function getData(Request $request){

        DB::statement(DB::raw('set @rownum = 0'));
        $data = DB::table('content As r')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'r.id','r.judul','r.jenis','katakunci','content'])
        ->where('r.jenis','=','0')
        ->where('r.flag_delete','=','0');
        //debug($data);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);

        }

        return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalUbahSlider" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> &nbsp; <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalHapusSlider" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a>')
        ->editcolumn('content','<image src="{{URL($content)}}?p={{rand(0,1000)}}" width="100" height="100" />')
        ->make(true);
	}
}
