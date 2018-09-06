<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Redirect;
use Auth;
use Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

        return view('admin.home');

    }

    public function uploadFoto(Request $request)
    {
        $username = Auth::user()->username;
        $file = array('image' => $request->file('image'));
        // setting up rules
        $rules = array('image' => 'required|max:300',); //mimes:jpeg,bmp,png and for max size max:10000
          // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            session()->flash('message', 'Foto Gagal di Upload, Perhatikan Ukuran dan tipe file foto anda.');
            return Redirect::to('admin?gagal=1')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
                if ($request->file('image')->isValid()) {
                    if($request->file('image')->getClientOriginalExtension() == 'jpeg' || $request->file('image')->getClientOriginalExtension() == 'jpg' || $request->file('image')->getClientOriginalExtension() == 'png' || $request->file('image')->getClientOriginalExtension() == 'bmp'){
                            $no_registrasi = $username;
                            $destinationPath = 'protected/storage/foto'; // upload path
                            $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                            $fileName = $no_registrasi.'.'.$extension;
                            if (file_exists($destinationPath.'/'.$fileName)) {
                              unlink($destinationPath.'/'.$fileName);
                            }
                            // renameing image
                            //$request->file('image')->move($destinationPath, $fileName); // uploading file to given path
                            
                            if ($request->file('image')->move($destinationPath, $fileName)) {
                              $filePath = $destinationPath.'/'.$fileName;
                              $no_registrasi = $username;

                              //menyimpan nama file di database
                              $save = $user = User::where('username','=',$no_registrasi)
                                  ->update(
                                      array(
                                              'foto' => $filePath,
                                          )
                                  );
                              // sending back with message
                              // Session::flash('success', 'Upload successfully');
                              session()->flash('message', 'Foto Berhasil di Upload.');
                              return Redirect::to('admin?sukses=1');
                            }//end move
                      }else{
                        session()->flash('message', 'Foto Gagal di Upload, Perhatikan Ukuran dan tipe file foto anda.');
                        return Redirect::to('admin?gagal=1');
                      }

                }else {
                  // sending back with error message.
                  // Session::flash('error', 'uploaded file is not valid');
                  session()->flash('message', 'Foto Gagal di Upload, Perhatikan Ukuran dan tipe file foto anda.');
                  return Redirect::to('admin?gagal=1');
                }
        }
        
    }

}
