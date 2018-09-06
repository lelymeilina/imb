@extends('admin.layout')

@section('content')
<section class="content-header">
          <h1>
            IMB
            <small>Karangasem</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> IMB</a></li>
            <li><a href="#">Home</a></li>
            <li class="active">Welcome</li>
          </ol>
</section>

<br/>

<div class="error" style="margin:0px 20px 0px 20px;">
  <!-- digunakan untuk menampilkan pesan -->
  @if (Session::has('message'))
      <div class="alert alert-danger">{{ Session::get('message') }}</div>
  @endif
</div>



            


<section class="content">

      <div class="box box-danger" >
        <div class="box-header">
          <div class="col-sm-4">
          <div align="right">
          <!-- <a href="#modaltambah" class="btn btn-info" data-toggle="modal" ><strong>Tambah</strong></a> -->
          </div>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
			  <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-globe"></i> Selamat datang di Sistem Manajemen Ijin Mendirikan Bangunan Kabupaten Karangasem!</h4>
                Anda telah berhasil login pada sistem ini, selanjutnya anda wajib mengisi biodata berikut untuk melengkapi data yang kurang lengkap.
              </div>
              
              <div class="bs-callout bs-callout-danger">
  				<h4>Biodata User</h4>
  					<div class="row">
  						<div class="col-md-3">Foto Profil </div><div class="col-md-7"> &nbsp; &nbsp; 
  						@if(empty(Auth::user()->foto))
  							<img src="{{URL('assets/dist/img/user.png')}}" width="120" height="140" /><br/>
  							
                {!! Form::open(['class' => 'form-horizontal','role' => 'form','files' => true]) !!}
  								<div class="form-group">
				              <label class="control-label" class="col-md-12"> &nbsp; &nbsp; &nbsp; &nbsp; Ubah Foto <small>*Maksimal Ukuran Foto 250Kb</small></label><br/>
                      <div class="col-md-12" style="margin-left:10px;">{!! Form::file('image', ['required' => 'required']) !!}</div>
                  </div>
                  <button class="btn btn-success" type="submit" id="uploadFoto"><i class="fa fa-camera"></i> Proses Upload</button>
  							{!! Form::close() !!}
  						@else
  							<img src="{{ URL(Auth::user()->foto) }}" width="120" height="140" /><br/>
                {!! Form::open(['class' => 'form-horizontal','role' => 'form','files' => true]) !!}
                  <div class="form-group">
                       <label class="control-label" class="col-md-12"> &nbsp; &nbsp; &nbsp; &nbsp; Ubah Foto <small>*Maksimal Ukuran Foto 250Kb</small></label><br/>
                      <div class="col-md-12" style="margin-left:10px;">{!! Form::file('image', ['required' => 'required']) !!}</div>
                  </div>
                  <button class="btn btn-success" type="submit" id="uploadFoto"><i class="fa fa-camera"></i> Proses Upload</button>
                {!! Form::close() !!}
  						@endif
  						</div>
  						<div class="col-md-12">&nbsp;</div>
		              	<div class="col-md-3">Nama </div><div class="col-md-7"> &nbsp; &nbsp; <strong>{{ Auth::user()->name }}</strong></div>
		              	<div class="col-md-3">Username </div><div class="col-md-7"> &nbsp; &nbsp; <strong>{{ Auth::user()->username }}</strong></div>
		              	<div class="col-md-3">email </div><div class="col-md-7"> &nbsp; &nbsp; <strong>{{ Auth::user()->email }}</strong></div>
	              	</div> <!-- end row -->
              </div> <!-- end callout -->
              
      </div><!-- /.box-body -->
   </div><!-- /.box-body out -->
</section><!-- /.content -->
@endsection