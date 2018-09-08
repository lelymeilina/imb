@extends('admin.layout')

@section('content')
<section class="content-header">
          <h1>
            IMB
            <small>Karangasem</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
            <li><a href="#">Data Fungsi</a></li>
            <li class="active">Daftar Fungsi</li>
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
          <h3 class="box-title">Data Fungsi</h3>
          </div>
          <div class="col-sm-4">
          <div align="right">
          <a href="#modaltambahfungsi" class="btn btn-info" data-toggle="modal" ><strong>Tambah</strong></a>
          </div>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
<table  id="tbfungsi" class="table table-bordered table-striped table-hover">
    <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th width="40%">Nama</th>
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

<div class="modal fade bs-modal-lg" id="modaltambahfungsi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Tambah fungsi</h4>
        </div>
        
      
        <div class="modal-body">
            {!! Form::open(['id' => 'tambahfungsi','class' => 'form-horizontal','role' => 'form']) !!}
            <div class="box-body">
                          

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama',['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-9">
                                   {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Fungsi']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Indeks',['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-9">
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

<div class="modal fade bs-modal-lg" id="modalubahfungsi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Ubah Data Fungsi</h4>
        </div>
        
      
        <div class="modal-body" id="isi">


        </div><!-- penutup body -->
      
        
      </div>
    </div>
  </div>




<div class="modal fade bs-modal-lg" id="modalhapusfungsi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header ">
					<button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Formulir Hapus Data Fungsi</h4>
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
            var tbfungsi = $('#tbfungsi').dataTable( {
                          processing: true,
                          serverSide: true,
                          ajax: 'tbfungsi',
                          columns: [
                              {data: 'no', name: 'no'},
                              {data: 'nama',name:'a.nama'},
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
                              
                  $('#tbfungsi_filter input').unbind();
                  $('#tbfungsi_filter input').bind('keyup', function(e) {
                 if(e.keyCode == 13) {
                          tbfungsi.fnFilter(this.value);
                   }
              }); 


              $(document).on('submit', '#tambahfungsi', function() {
                      // post the data from the form
                      $('#modaltambahfungsi').modal('hide');
                      $('.overlay').css('display','block');
                      $.post("fungsi", $(this).serialize())
                          .done(function(data) {
                              // 'data' is the text returned, you can do any conditions based on that
                                  tbfungsi.api().ajax.reload();
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


                  $(document).on('submit', '#ubahfungsi', function() {
                      $('#modalubahfungsi').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.put("fungsi/"+ id, $(this).serialize())
                          .done(function(data) {
                                  tbfungsi.api().ajax.reload();
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

                  
              $('#modalubahfungsi').on('shown.bs.modal', function (e) {
                  //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
                  $('.overlay').css('display','block');
                  var id = $(e.relatedTarget).data('id');
                  $('#isi').load('fungsi/'+id+'/edit');
                  setTimeout(function() {
                          $('.overlay').css('display','none');
                  }, 1000);
              }); 

               $(document).on('submit', '#hapusfungsi', function() {
                      $('#modalhapusfungsi').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.delete("fungsi/"+id, $(this).serialize())
                          .done(function(data) {
                                  tbfungsi.api().ajax.reload();
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


                  $('#modalhapusfungsi').on('shown.bs.modal', function (e) {
                      //$('#id_menu').val($(e.relatedTarget).data('id'));
                      $('.overlay').css('display','block');
                      var id = $(e.relatedTarget).data('id');
                      $('#isihapus').load('fungsi/'+ id +'/hapus');
                      setTimeout(function() {
                              $('.overlay').css('display','none');
                      }, 1000);
                  });
      });

      </script>
@endsection


