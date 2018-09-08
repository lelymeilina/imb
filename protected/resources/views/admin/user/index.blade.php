@extends('admin.layout')
@section('content')

<section class="content-header">
          <h1>
            IMB
            <small>Karangasem</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
            <li><a href="#">Master User</a></li>
            <li class="active">Data User</li>
          </ol>
</section>

<!-- digunakan untuk menampilkan pesan -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<br/>

<section class="content">
      <div class="box box-danger" >
        <div class="box-header">
          <div class="col-sm-8">
          <h3 class="box-title">Data User</h3>
          </div>
          <div class="col-sm-4">
          <div align="right">
          <a href="#modaltambahuser" class="btn btn-success" data-toggle="modal" ><strong>Add</strong></a>
          </div>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
              <table  id="tbuser" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th width="25%">Nama</th>
                        <th width="20%">Email</th>
                        <th width="15%">Username</th>
                        <th width="10%">Telp</th>
                        <th width="15%">Level User</th>
                        <th width="10%">Action</th>
                        
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
            </table>

      </div><!-- /.box-body -->
   </div><!-- /.box-body out -->
</section><!-- /.content -->



<div class="modal fade bs-modal-lg" id="modaltambahuser" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Add User</h4>
        </div>
        
      
        <div class="modal-body">
            {!! Form::open(['id' => 'tambahuser','class' => 'form-horizontal','role' => 'form']) !!}
            <div class="box-body">

                          <div class="form-group">
                            {!! Form::label('username', 'Nama',['class' => 'col-md-3 control-label username']) !!}
                            <div class="col-md-8">
                              {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama']) !!}
                            </div>
                          </div>
                          
                          <div class="form-group">
                            {!! Form::label('email', 'Email',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            </div>
                          </div>


                          <div class="form-group">
                            {!! Form::label('username', 'Username',['class' => 'col-md-3 control-label username']) !!}
                            <div class="col-md-8">
                              {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
                            </div>
                          </div>


                          <div class="form-group">
                            {!! Form::label('nama', 'Password',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::password('password', ['class' => 'form-control pass', 'placeholder' => 'Password','required'=>'required']) !!}
                            </div>
                          </div>

                           <div class="form-group">
                            {!! Form::label('nama', 'Konfirmasi Password',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::password('konfirm_password', ['class' => 'form-control pass', 'placeholder' => 'Password','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('telp', 'Telp',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::text('telp', null, ['class' => 'form-control', 'placeholder' => 'Telp']) !!}
                            </div>
                          </div>

                <div class="modal-footer">
                                  <button class="btn btn-default reset" data-dismiss="modal" aria-hidden="true" id="clear" type="reset" onclick="this.form.reset();">Batal</button>
                                  {!! Form::submit('Simpan', ['class' => 'btn btn-info']) !!}
                                  

                </div>
            </div><!-- penutup box -->
           <!-- </form> -->
           
        </div><!-- penutup body -->
      {!! Form::close() !!}
        
      </div>
    </div>
  </div>
<!-- Button trigger modal -->
<!-- Modal -->

<div class="modal fade bs-modal-lg" id="modalUbahuser" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Update User</h4>
        </div>
        
      
        <div class="modal-body" id="isiuser">


        </div><!-- penutup body -->
      
        
      </div>
    </div>
  </div>




<div class="modal fade bs-modal-lg" id="modalHapusUser" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header ">
					<button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Delete User</h4>
				</div>
			  
		  
				<div class="modal-body" id="isiHapusUser">


				</div> <!--penutup body -->
			
				
			</div>
		</div>
	</div>

<!-- Button trigger modal -->
<!-- Modal -->
@endsection