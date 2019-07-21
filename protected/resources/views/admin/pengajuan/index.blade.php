@extends('admin.layout')

@section('content')
<section class="content-header">
          <h1>
            IMB
            <small>Karangasem</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
            <li><a href="#">Data Pengajuan</a></li>
            <li class="active">Daftar Pengajuan</li>
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
          <h3 class="box-title">Data Pengajuan</h3>
          </div>
          <div class="col-sm-4">
          <div align="right">
          <a href="#modaltambahpengajuan" class="btn btn-info" data-toggle="modal" ><strong>Tambah</strong></a>
          </div>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
<table  id="tbpengajuan" class="table table-bordered table-striped table-hover">
    <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th width="7%">NIK/Kitas/Paspor</th>
                        <th width="10%">Nama</th>
                        <th width="13%">Jenis</th>
                        <th width="13%">Fungsi Klasifikasi</th>
                        <th width="13%">Surveyor</th>
                        <th width="8%">Status</th>
                        <th width="35%">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
</table>

      </div><!-- /.box-body -->
   </div><!-- /.box-body out -->
</section><!-- /.content -->

<div class="modal fade bs-modal-lg" id="modaltambahpengajuan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Tambah Pengajuan</h4>
        </div>
        
      
        <div class="modal-body">
            {!! Form::open(['id' => 'tambahpengajuan','class' => 'form-horizontal','role' => 'form']) !!}
            <div class="box-body">

                          <div class="form-group">
                            {!! Form::label('tahun', 'Tahun Pengajuan IMB',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('tahun',[""=>"Pilih Tahun IMB"]+$tahun, null, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Jenis Identitas Pemohon',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('id_jenis_identitas',[""=>"Pilih Jenis Identitas","1"=>"NIK","2"=>"KITAS","3"=>"Paspor"], null, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required','id'=>'jenis_id']) !!}
                            </div>
                          </div>
                          
                          <div class="form-group">
                            {!! Form::label('nik', 'NIK Pemohon',['class' => 'col-md-3 control-label','id'=>'identitas']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nik', null, ['class' => 'form-control', 'placeholder' => 'Masukkan NIK (Nomor Identitas Kependudukan) Pemohon Pengajuan','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama Pemohon',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Pemohon Pengajuan','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'No. NIB',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('no_nib', null, ['class' => 'form-control', 'placeholder' => 'Masukkan No. NIB','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Jenis Kegiatan IMB',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('id_jenis_imb',[""=>"Pilih Jenis IMB"]+$jenisImb, null, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Fungsi Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('id_jenis_klasifikasi_bangunan',[""=>"Pilih Fungsi Bangunan"]+$jenisKlasifikasiBangunan, null, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('deskripsi_bangunan', 'Deskripsi Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::textarea('deskripsi_bangunan', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Deskripsi Singkat Bangunan, Contoh : Akomodasi Pariwisata Non Bintang (Villa)','required'=>'required','rows'=>'3']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('lokasi', 'Lokasi Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::textarea('lokasi', null, ['class' => 'form-control', 'placeholder' => 'Alamat/Banjar/Desa/Kecamatan/Lokasi Bangunan Yang Akan didirikan','required'=>'required','rows'=>'3']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Latitude',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('latitude', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Latitude','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Longitude',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('longitude', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Longitude','required'=>'required']) !!}
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

<div class="modal fade bs-modal-lg" id="modalubahpengajuan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Ubah Data Pengajuan</h4>
        </div>
        
      
        <div class="modal-body" id="isi">


        </div><!-- penutup body -->
      
        
      </div>
    </div>
  </div>


  <div class="modal fade bs-modal-lg" id="modalsetsurveyor" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Set Surveyor</h4>
        </div>
        
      
        <div class="modal-body" id="isiSurveyor">


        </div><!-- penutup body -->
      
        
      </div>
    </div>
  </div>



  <div class="modal fade bs-modal-lg" id="modalcekpersyaratan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Cek Persyaratan</h4>
        </div>
        
      
        <div class="modal-body" id="isiPersyaratan">


        </div><!-- penutup body -->
      
        
      </div>
    </div>
  </div>



  <div class="modal fade bs-modal-lg" id="modalisisurvey" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Pengisian Hasil Survey</h4>
        </div>
        
      
        <div class="modal-body" id="isiSurvey">


        </div><!-- penutup body -->
      
        
      </div>
    </div>
  </div>



  <div class="modal fade bs-modal-lg" id="modaltambahprasarana" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Penambahan Prasarana</h4>
        </div>
        
      
        <div class="modal-body" id="isiPrasarana">


        </div><!-- penutup body -->
      
        
      </div>
    </div>
  </div>



<div class="modal fade bs-modal-xl" id="modalperhitungan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Detail Perhitungan</h4>
        </div>
        
      
        <div class="modal-body" id="isiPerhitungan">


        </div><!-- penutup body -->
      
        
      </div>
    </div>
  </div>



<div class="modal fade bs-modal-lg" id="modalhapuspengajuan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header ">
					<button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Formulir Hapus Data Pengajuan</h4>
				</div>
			  
		  
				<div class="modal-body" id="isihapus">


				</div> <!--penutup body -->
			
				
			</div>
		</div>
	</div>

<!-- Button trigger modal -->
<!-- Modal -->


<div class="modal fade bs-modal-lg" id="modalcetak" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Formulir Cetak Data Pengajuan</h4>
        </div>
        
      
        <div class="modal-body" id="isicetak">


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
            $(document).on('change', '#jenis_id', function() {
                $('#identitas').text($( "#jenis_id option:selected" ).text() +" Pemohon");
            });

            var tbpengajuan = $('#tbpengajuan').dataTable( {
                          processing: true,
                          serverSide: true,
                          ajax: 'tbpengajuan',
                          columns: [
                              {data: 'no', name: 'no'},
                              {data: 'nik',name:'a.nik'},
                              {data: 'nama',name:'a.nama'},
                              {data: 'jenis_imb',name:'f.nama'},
                              {data: 'fungsi_klasifikasi',name:'fungsi_klasifikasi'},
                              {data: 'surveyor',name:'surveyor'},
                              {data: 'status_pengajuan',name:'c.nama'},
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
                              
                  $('#tbpengajuan_filter input').unbind();
                  $('#tbpengajuan_filter input').bind('keyup', function(e) {
                 if(e.keyCode == 13) {
                          tbpengajuan.fnFilter(this.value);
                   }
              }); 


              $(document).on('submit', '#tambahpengajuan', function() {
                      // post the data from the form
                      $('#modaltambahpengajuan').modal('hide');
                      $('.overlay').css('display','block');
                      $.post("pengajuan", $(this).serialize())
                          .done(function(data) {
                              // 'data' is the text returned, you can do any conditions based on that
                                  tbpengajuan.api().ajax.reload();
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


              $(document).on('submit', '#ubahpengajuan', function() {
                      $('#modalubahpengajuan').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.put("pengajuan/"+ id, $(this).serialize())
                          .done(function(data) {
                                  tbpengajuan.api().ajax.reload();
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

                  
              $('#modalubahpengajuan').on('shown.bs.modal', function (e) {
                  //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
                  $('.overlay').css('display','block');
                  var id = $(e.relatedTarget).data('id');
                  $('#isi').load('pengajuan/'+id+'/edit');
                  setTimeout(function() {
                          $('.overlay').css('display','none');
                  }, 1000);
              }); 


              $(document).on('submit', '#setsurveyor', function() {
                      $('#modalsetsurveyor').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.put("pengajuan/"+ id +"/updatesurveyor", $(this).serialize())
                          .done(function(data) {
                                  tbpengajuan.api().ajax.reload();
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

                  
              $('#modalsetsurveyor').on('shown.bs.modal', function (e) {
                  //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
                  $('.overlay').css('display','block');
                  var id = $(e.relatedTarget).data('id');
                  $('#isiSurveyor').load('pengajuan/'+id+'/surveyor');
                  setTimeout(function() {
                          $('.overlay').css('display','none');
                  }, 1000);
              }); 


              $(document).on('submit', '#cekpersyaratan', function() {
                      $('#modalcekpersyaratan').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.put("pengajuan/"+ id +"/updatepersyaratan", $(this).serialize())
                          .done(function(data) {
                                  tbpengajuan.api().ajax.reload();
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

                  
              $('#modalcekpersyaratan').on('shown.bs.modal', function (e) {
                  //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
                  $('.overlay').css('display','block');
                  var id = $(e.relatedTarget).data('id');
                  $('#isiPersyaratan').load('pengajuan/'+id+'/persyaratan');
                  setTimeout(function() {
                          $('.overlay').css('display','none');
                  }, 1000);
              }); 


              $(document).on('submit', '#parameter', function() {
                      $('#modalisisurvey').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.put("pengajuan/"+ id +"/updateparameter", $(this).serialize())
                          .done(function(data) {
                                  tbpengajuan.api().ajax.reload();
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

                  
              $('#modalisisurvey').on('shown.bs.modal', function (e) {
                  //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
                  $('.overlay').css('display','block');
                  var id = $(e.relatedTarget).data('id');
                  $('#isiSurvey').load('pengajuan/'+id+'/parameter');
                  setTimeout(function() {
                          $('.overlay').css('display','none');
                  }, 1000);
              }); 


              $(document).on('submit', '#prasarana', function() {
                      $('#modaltambahprasarana').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.put("pengajuan/"+ id +"/updateprasarana", $(this).serialize())
                          .done(function(data) {
                                  tbpengajuan.api().ajax.reload();
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

                  
              $('#modaltambahprasarana').on('shown.bs.modal', function (e) {
                  //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
                  $('.overlay').css('display','block');
                  var id = $(e.relatedTarget).data('id');
                  $('#isiPrasarana').load('pengajuan/'+id+'/prasarana');
                  setTimeout(function() {
                          $('.overlay').css('display','none');
                  }, 1000);
              }); 


              $(document).on('submit', '#perhitungan', function() {
                      $('#modalperhitungan').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.put("pengajuan/"+ id +"/updateperhitungan", $(this).serialize())
                          .done(function(data) {
                                  tbpengajuan.api().ajax.reload();
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

                  
              $('#modalperhitungan').on('shown.bs.modal', function (e) {
                  //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
                  $('.overlay').css('display','block');
                  var id = $(e.relatedTarget).data('id');
                  $('#isiPerhitungan').load('pengajuan/'+id+'/perhitungan');
                  setTimeout(function() {
                          $('.overlay').css('display','none');
                  }, 1000);
              }); 


               $(document).on('submit', '#hapuspengajuan', function() {
                      $('#modalhapuspengajuan').modal('hide');
                      $('.overlay').css('display','block');
                      var id = $("#id").val();
                      $.delete("pengajuan/"+id, $(this).serialize())
                          .done(function(data) {
                                  tbpengajuan.api().ajax.reload();
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


                  $('#modalhapuspengajuan').on('shown.bs.modal', function (e) {
                      //$('#id_menu').val($(e.relatedTarget).data('id'));
                      $('.overlay').css('display','block');
                      var id = $(e.relatedTarget).data('id');
                      $('#isihapus').load('pengajuan/'+ id +'/hapus');
                      setTimeout(function() {
                              $('.overlay').css('display','none');
                      }, 1000);
                  });


                  $('#modalcetak').on('shown.bs.modal', function (e) {
                      //$('#id_menu').val($(e.relatedTarget).data('id'));
                      $('.overlay').css('display','block');
                      var id = $(e.relatedTarget).data('id');
                      $('#isicetak').load('pengajuan/get/'+ id +'/cetak');
                      setTimeout(function() {
                              $('.overlay').css('display','none');
                      }, 1000);
                  });
      });

      </script>
@endsection


