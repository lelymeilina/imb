@extends('admin.layout')

@section('content')
<section class="content-header">
          <h1>
            IMB
            <small>Karangasem</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
            <li><a href="#">Data Klasifikasi Parameter Detail</a></li>
            <li class="active">Daftar Klasifikasi Parameter Detail</li>
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
          <h3 class="box-title">Data Klasifikasi Parameter Detail</h3>
          </div>
          <div class="col-sm-4">
          <div align="right">
          <a href="#modaltambahklasifikasiparameterdetail" class="btn btn-info" data-toggle="modal" ><strong>Tambah</strong></a>
          </div>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
<table  id="tbklasifikasiparameterdetail" class="table table-bordered table-striped table-hover">
    <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th width="30%">Nama</th>
                        <th width="30%">Klasifikasi Parameter</th>
                        <th width="20%">Indeks</th>
                        <th width="5%">Action</th>
                        
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
</table>

      </div><!-- /.box-body -->
   </div><!-- /.box-body out -->
</section><!-- /.content -->

<div class="modal fade bs-modal-lg" id="modaltambahklasifikasiparameterdetail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Tambah Klasifikasi Parameter Detail</h4>
        </div>
        
      
        <div class="modal-body">
            {!! Form::open(['id' => 'tambahklasifikasiparameterdetail','class' => 'form-horizontal','role' => 'form']) !!}
            <div class="box-body">
                          

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama']) !!}
                            </div>
                          </div>

                             <div class="form-group">
                            {!! Form::label('nama', 'Klasifikasi Parameter',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::select('id_klasifikasi_parameter',['' => 'Pilih Klasifikasi Parameter'] + $kp, null, ['class' => 'form-control select2', 'id' => 'kbangunan','style' => 'width:100%']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Indeks',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('indeks', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Indeks']) !!}
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

<div class="modal fade bs-modal-lg" id="modalubahklasifikasiparameterdetail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Ubah Data Klasifikasi Parameter Detail</h4>
        </div>
        
      
        <div class="modal-body" id="isi">


        </div><!-- penutup body -->
      
        
      </div>
    </div>
  </div>




<div class="modal fade bs-modal-lg" id="modalhapusklasifikasiparameterdetail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header ">
					<button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Formulir Hapus Data Klasifikasi Parameter Detail</h4>
				</div>
			  
		  
				<div class="modal-body" id="isihapus">


				</div> <!--penutup body -->
			
				
			</div>
		</div>
	</div>

<!-- Button trigger modal -->
<!-- Modal -->
@endsection
@section('scripts')
      <script type="text/javascript">
      $(document).ready(function(){
            var tbklasifikasiparameterdetail = $('#tbklasifikasiparameterdetail').dataTable( {
                          processing: true,
                          serverSide: true,
                          ajax: 'tbklasifikasiparameterdetail',
                          columns: [
                              {data: 'no', name: 'no'},
                              {data: 'nama',name:'a.nama'},
                              {data: 'id_klasifikasi_parameter',name:'b.nama'},
                              {data: 'indeks', name:'a.indeks'},
                              {data: 'action', name: 'id',orderable: false, searchable: false}
                          ],
                          rowCallback: function( row, data, iDisplayIndex ) {
                          var api = this.api();
                          var info = api.page.info();
                          var page = info.page;
                          var length = info.length;
                          var index = (page * length + (iDisplayIndex +1));
                          $('td:eq(0)', row).html(index);
                      }

                  } );
                              
                  $('#tbklasifikasiparameterdetail_filter input').unbind();
                  $('#tbklasifikasiparameterdetail_filter input').bind('keyup', function(e) {
                 if(e.keyCode == 13) {
                          tbklasifikasiparameterdetail.fnFilter(this.value);
                   }
              }); 


              $(document).on('submit', '#tambahklasifikasiparameterdetail', function() {
                      // post the data from the form
                      $('#modaltambahklasifikasiparameterdetail').modal('hide');
                      $('.overlay').css('display','block');
                      $.post("klasifikasiparameterdetail", $(this).serialize())
                          .done(function(data) {
                              // 'data' is the text returned, you can do any conditions based on that
                                  tbklasifikasiparameterdetail.api().ajax.reload();
                                  setTimeout(function() {
                                          //alert($("#reloadJs").html());
                                          $('.overlay').css('display','none');
                                          $("#infotambah").fadeIn(300);
                                  }, 1000);
                                  setTimeout(function() {
                                          $("#infotambah").fadeOut(2500);
                                  }, 2500);
                          });
                              
                      return false;
                  });


                  $(document).on('submit', '#ubahklasifikasiparameterdetail', function() {
                      $('#modalubahklasifikasiparameterdetail').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.put("klasifikasiparameterdetail/"+ id, $(this).serialize())
                          .done(function(data) {
                                  tbklasifikasiparameterdetail.api().ajax.reload();
                                  setTimeout(function() {
                                          $('.overlay').css('display','none');
                                          $("#infotambah").fadeIn(300);
                                  }, 1000);
                                  setTimeout(function() {
                                          $("#infotambah").fadeOut(2500);
                                  }, 2500);
                          });
                      return false;
              });

                  
              $('#modalubahklasifikasiparameterdetail').on('shown.bs.modal', function (e) {
                  //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
                  $('.overlay').css('display','block');
                  var id = $(e.relatedTarget).data('id');
                  $('#isi').load('klasifikasiparameterdetail/'+id+'/edit');
                  setTimeout(function() {
                          $('.overlay').css('display','none');
                  }, 1000);
              }); 

               $(document).on('submit', '#hapusklasifikasiparameterdetail', function() {
                      $('#modalhapusklasifikasiparameterdetail').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.delete("klasifikasiparameterdetail/"+id, $(this).serialize())
                          .done(function(data) {
                                  tbklasifikasiparameterdetail.api().ajax.reload();
                                  setTimeout(function() {
                                          $('.overlay').css('display','none');
                                          $("#infotambah").fadeIn(300);
                                  }, 1000);
                                  setTimeout(function() {
                                          $("#infotambah").fadeOut(2500);
                                  }, 2500);
                          });
                      return false;
                  });


                  $('#modalhapusklasifikasiparameterdetail').on('shown.bs.modal', function (e) {
                      //$('#id_menu').val($(e.relatedTarget).data('id'));
                      $('.overlay').css('display','block');
                      var id = $(e.relatedTarget).data('id');
                      $('#isihapus').load('klasifikasiparameterdetail/'+ id +'/hapus');
                      setTimeout(function() {
                              $('.overlay').css('display','none');
                      }, 1000);
                  });
      });

      </script>
@endsection


