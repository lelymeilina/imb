@extends('admin.layout')

@section('content')
<section class="content-header">
          <h1>
            IMB
            <small>Karangasem</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
            <li><a href="#">Data Harga Bangunan</a></li>
            <li class="active">Daftar Harga Bangunan</li>
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
          <h3 class="box-title">Data Harga Bangunan</h3>
          </div>
          <div class="col-sm-4">
          <div align="right">
          <a href="#modaltambahhargabangunan" class="btn btn-info" data-toggle="modal" ><strong>Tambah</strong></a>
          </div>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
<table  id="tbhargabangunan" class="table table-bordered table-striped table-hover">
    <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th width="25%">Nama</th>
                        <th width="10%">Fungsi</th>
                        <th width="15%">Nama Klasifikasi</th>
                        <th width="20%">Klasifikasi Bangunan</th>
                        <th width="15%">Jenis Bangunan</th>
                        <th width="10%">Harga</th>
                        <th width="5%">Action</th>
                        
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
</table>

      </div><!-- /.box-body -->
   </div><!-- /.box-body out -->
</section><!-- /.content -->

<div class="modal fade bs-modal-lg" id="modaltambahhargabangunan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Tambah Harga Bangunan</h4>
        </div>
        
      
        <div class="modal-body">
            {!! Form::open(['id' => 'tambahhargabangunan','class' => 'form-horizontal','role' => 'form']) !!}
            <div class="box-body">

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama']) !!}
                            </div>
                          </div>

                           <div class="form-group">
                            {!! Form::label('nama', 'Nama Klasifikasi',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::select('id_klasifikasi_bangunan',['' => 'Pilih Klasifikasi'] + $kb, null, ['class' => 'form-control select2', 'id' => 'klasifikasi','style' => 'width:100%']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Retribusi Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::select('is_bangunan_tambahan',['' => 'Pilih Retribusi Bangunan', '0' => 'Bangunan Utama', '1' => 'Bangunan Prasarana'], null, ['class' => 'form-control select2', 'id' => 'kbangunan','style' => 'width:100%']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Jenis Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::select('is_bertingkat',['' => 'Pilih Jenis Bangunan', '0' => 'Tidak Bertingkat', '1' => 'Bertingkat'], null, ['class' => 'form-control select2', 'id' => 'jenisbangunan','style' => 'width:100%']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Harga',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('harga', null, ['class' => 'form-control currency', 'id' => 'rupiah','placeholder' => 'Masukkan Harga']) !!}
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

<div class="modal fade bs-modal-lg" id="modalubahhargabangunan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Ubah Data Harga Bangunan</h4>
        </div>
        
      
        <div class="modal-body" id="isi">


        </div><!-- penutup body -->
      
        
      </div>
    </div>
  </div>




<div class="modal fade bs-modal-lg" id="modalhapushargabangunan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header ">
					<button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Formulir Hapus Data Harga Bangunan</h4>
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
            $('.currency').inputmask({
                alias:"decimal",
                digits:0,
                groupSeparator: '.',
                rightAlign: false,
                prefix: 'Rp.',
                autoGroup: true,
                allowMinus:false 
            });

            var tbhargabangunan = $('#tbhargabangunan').dataTable( {
                          processing: true,
                          serverSide: true,
                          ajax: 'tbhargabangunan',
                          columns: [
                              {data: 'no', name: 'no'},
                              {data: 'nama', name: 'a.nama'},
                              {data: 'id_fungsi',name:'c.nama'},
                              {data: 'id_klasifikasi',name:'b.nama'},
                              {data: 'bangunan', name:'a.is_bangunan_tambahan'},
                              {data: 'bertingkat', name:'a.is_bertingkat'},
                              {data: 'harga', name:'a.harga'},
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
                              
                  $('#tbhargabangunan_filter input').unbind();
                  $('#tbhargabangunan_filter input').bind('keyup', function(e) {
                 if(e.keyCode == 13) {
                          tbhargabangunan.fnFilter(this.value);
                   }
              }); 


              $(document).on('submit', '#tambahhargabangunan', function() {
                      // post the data from the form
                      $('#modaltambahhargabangunan').modal('hide');
                      $('.overlay').css('display','block');
                      $.post("hargabangunan", $(this).serialize())
                          .done(function(data) {
                              // 'data' is the text returned, you can do any conditions based on that
                                  tbhargabangunan.api().ajax.reload();
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


                  $(document).on('submit', '#ubahhargabangunan', function() {
                      $('#modalubahhargabangunan').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.put("hargabangunan/"+ id, $(this).serialize())
                          .done(function(data) {
                                  tbhargabangunan.api().ajax.reload();
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

                  
              $('#modalubahhargabangunan').on('shown.bs.modal', function (e) {
                  //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
                  $('.overlay').css('display','block');
                  var id = $(e.relatedTarget).data('id');
                  $('#isi').load('hargabangunan/'+id+'/edit');
                  setTimeout(function() {
                          $('.overlay').css('display','none');
                  }, 1000);
              }); 

               $(document).on('submit', '#hapushargabangunan', function() {
                      $('#modalhapushargabangunan').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.delete("hargabangunan/"+id, $(this).serialize())
                          .done(function(data) {
                                  tbhargabangunan.api().ajax.reload();
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


                  $('#modalhapushargabangunan').on('shown.bs.modal', function (e) {
                      //$('#id_menu').val($(e.relatedTarget).data('id'));
                      $('.overlay').css('display','block');
                      var id = $(e.relatedTarget).data('id');
                      $('#isihapus').load('hargabangunan/'+ id +'/hapus');
                      setTimeout(function() {
                              $('.overlay').css('display','none');
                      }, 1000);
                  });
      });

      </script>
@endsection


