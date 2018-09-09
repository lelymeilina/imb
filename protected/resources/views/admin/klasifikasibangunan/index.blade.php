@extends('admin.layout')

@section('content')
<section class="content-header">
          <h1>
            IMB
            <small>Karangasem</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
            <li><a href="#">Data Jenis Imb</a></li>
            <li class="active">Daftar Jenis Imb</li>
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
          <h3 class="box-title">Data Klasifikasi Bangunan</h3>
          </div>
          <div class="col-sm-4">
          <div align="right">
          <a href="#modaltambahklasifikasibangunan" class="btn btn-info" data-toggle="modal" ><strong>Tambah</strong></a>
          </div>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
<table  id="tbklasifikasibangunan" class="table table-bordered table-striped table-hover">
    <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th width="40%">Nama</th>
                        <th width="20%">Klasifikasi Bangunan</th>
                        <th width="5%">Action</th>
                        
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
</table>

      </div><!-- /.box-body -->
   </div><!-- /.box-body out -->
</section><!-- /.content -->

<div class="modal fade bs-modal-lg" id="modaltambahklasifikasibangunan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Tambah Klasifikasi Bangunan</h4>
        </div>
        
      
        <div class="modal-body">
            {!! Form::open(['id' => 'tambahklasifikasibangunan','class' => 'form-horizontal','role' => 'form']) !!}
            <div class="box-body">
                          

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Klasifikasi Bangunan']) !!}
                            </div>
                          </div>

                           <div class="form-group">
                            {!! Form::label('nama', 'Retribusi Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::select('is_bangunan_tambahan',['' => 'Pilih Retribusi Bangunan', '0' => 'Bangunan Utama', '1' => 'Bangunan Prasarana'], null, ['class' => 'form-control select2', 'id' => 'kbangunan','style' => 'width:100%']) !!}
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

<div class="modal fade bs-modal-lg" id="modalubahklasifikasibangunan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Ubah Data Klasifikasi Bangunan</h4>
        </div>
        
      
        <div class="modal-body" id="isi">


        </div><!-- penutup body -->
      
        
      </div>
    </div>
  </div>




<div class="modal fade bs-modal-lg" id="modalhapusklasifikasibangunan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header ">
					<button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Formulir Hapus Data Klasifikasi Bangunan</h4>
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
            var tbklasifikasibangunan = $('#tbklasifikasibangunan').dataTable( {
                          processing: true,
                          serverSide: true,
                          ajax: 'tbklasifikasibangunan',
                          columns: [
                              {data: 'no', name: 'no'},
                              {data: 'nama',name:'a.nama'},
                              {data: 'bangunan', name:'a.is_bangunan_tambahan'},
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
                              
                  $('#tbklasifikasibangunan_filter input').unbind();
                  $('#tbklasifikasibangunan_filter input').bind('keyup', function(e) {
                 if(e.keyCode == 13) {
                          tbklasifikasibangunan.fnFilter(this.value);
                   }
              }); 


              $(document).on('submit', '#tambahklasifikasibangunan', function() {
                      // post the data from the form
                      $('#modaltambahklasifikasibangunan').modal('hide');
                      $('.overlay').css('display','block');
                      $.post("klasifikasibangunan", $(this).serialize())
                          .done(function(data) {
                              // 'data' is the text returned, you can do any conditions based on that
                                  tbklasifikasibangunan.api().ajax.reload();
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


                  $(document).on('submit', '#ubahklasifikasibangunan', function() {
                      $('#modalubahklasifikasibangunan').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.put("klasifikasibangunan/"+ id, $(this).serialize())
                          .done(function(data) {
                                  tbklasifikasibangunan.api().ajax.reload();
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

                  
              $('#modalubahklasifikasibangunan').on('shown.bs.modal', function (e) {
                  //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
                  $('.overlay').css('display','block');
                  var id = $(e.relatedTarget).data('id');
                  $('#isi').load('klasifikasibangunan/'+id+'/edit');
                  setTimeout(function() {
                          $('.overlay').css('display','none');
                  }, 1000);
              }); 

               $(document).on('submit', '#hapusklasifikasibangunan', function() {
                      $('#modalhapusklasifikasibangunan').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.delete("klasifikasibangunan/"+id, $(this).serialize())
                          .done(function(data) {
                                  tbklasifikasibangunan.api().ajax.reload();
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


                  $('#modalhapusklasifikasibangunan').on('shown.bs.modal', function (e) {
                      //$('#id_menu').val($(e.relatedTarget).data('id'));
                      $('.overlay').css('display','block');
                      var id = $(e.relatedTarget).data('id');
                      $('#isihapus').load('klasifikasibangunan/'+ id +'/hapus');
                      setTimeout(function() {
                              $('.overlay').css('display','none');
                      }, 1000);
                  });
      });

      </script>
@endsection


