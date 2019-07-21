<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($pengajuan, [ 'method' => 'PUT','id' => 'parameter','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id Fungsi', 'id' => 'id']) !!}


                          <div class="form-group">
                            {!! Form::label('tahun', 'Tahun Pengajuan IMB',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('tahun',[""=>"Pilih Tahun IMB"]+$tahun, null, ['class' => 'form-control select2','style'=>'width:100%','disabled'=>'disabled']) !!}
                            </div>
                          </div>
                          
                          <div class="form-group">
                            {!! Form::label('nik', ($pengajuan->id_jenis_identitas == 1?"NIK":($pengajuan->id_jenis_identitas == 2?"KITAS":"Paspor")).' Pendaftar',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nik', null, ['class' => 'form-control', 'placeholder' => 'Masukkan NIK (Nomor Identitas Kependudukan) Pendaftar Pengajuan','disabled'=>'disabled']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama Pendaftar',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Pendaftar Pengajuan','disabled'=>'disabled']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'No. NIB',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('no_nib', null, ['class' => 'form-control', 'placeholder' => 'Masukkan No. NIB','disabled'=>'disabled']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('deskripsi_bangunan', 'Deskripsi Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::textarea('deskripsi_bangunan', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Deskripsi Singkat Bangunan, Contoh : Akomodasi Pariwisata Non Bintang (Villa)','disabled'=>'disabled','rows'=>'3']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Luas Bangunan Tidak Bertingkat',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('luas_tidakbertingkat', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Luas Bangunan Utama (Angka) Contoh. 517.23','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Luas Bangunan Bertingkat',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('luas_bertingkat', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Luas Bangunan Utama (Angka) Contoh. 517.23','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Luas Bangunan Basement',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('luas_basement', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Luas Bangunan Utama (Angka) Contoh. 517.23','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                              {!! Form::label('nama', 'KDB Lama',['class' => 'col-md-3 control-label']) !!}
                              <div class="col-md-8">
                                     {!! Form::text('kdb_lama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan KDB Presentase (%) Contoh. 5']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('nama', 'KLB Lama',['class' => 'col-md-3 control-label']) !!}
                              <div class="col-md-8">
                                     {!! Form::text('klb_lama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan KDB Presentase (%) Contoh. 5']) !!}
                              </div>
                          </div>


                          <div class="form-group">
                              {!! Form::label('nama', 'KDB Baru',['class' => 'col-md-3 control-label']) !!}
                              <div class="col-md-8">
                                     {!! Form::text('kdb_baru', null, ['class' => 'form-control', 'placeholder' => 'Masukkan KDB Presentase (%) Contoh. 5']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('nama', 'KLB Baru',['class' => 'col-md-3 control-label']) !!}
                              <div class="col-md-8">
                                     {!! Form::text('klb_baru', null, ['class' => 'form-control', 'placeholder' => 'Masukkan KDB Presentase (%) Contoh. 5']) !!}
                              </div>
                          </div>

                          <div class="form-group">
                              {!! Form::label('nama', 'Total KDB',['class' => 'col-md-3 control-label']) !!}
                              <div class="col-md-8">
                                     {!! Form::text('total_kdb', null, ['class' => 'form-control', 'placeholder' => 'Masukkan KDB Presentase (%) Contoh. 5']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('nama', 'Total KLB',['class' => 'col-md-3 control-label']) !!}
                              <div class="col-md-8">
                                     {!! Form::text('total_klb', null, ['class' => 'form-control', 'placeholder' => 'Masukkan KDB Presentase (%) Contoh. 5']) !!}
                              </div>
                          </div>

                          <div class="form-group ">
                              <div class="col-md-12">
                              <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th width="5%">No</th>
                                      <th width="30%">Persyaratan Teknis</th>
                                      <th width="35%">Hasil Survey Lapangan</th>
                                      <th width="30%">Keterangan</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <!-- {{ $no = 1 }} -->
                                    @foreach($PengajuanParameter AS $d)
                                    <tr>
                                      <td>{{$no}}</td>
                                      <td>{{$d->getParameter->nama}}</td>
                                      
                                      <td>
                                        {!! Form::select('id_klasifikasi_parameter_detail['.$d->id_klasifikasi_parameter.']',[""=>"Pilih Hasil Survey"]+ \App\PengajuanParameter::getDetailParameter($d->id_klasifikasi_parameter), $d->id_klasifikasi_parameter_detail, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required']) !!}
                                      </td>

                                      <td>
                                        {!! Form::textarea('keterangan['.$d->id_klasifikasi_parameter.']', $d->keterangan, ['class' => 'form-control', 'placeholder' => 'Masukkan Keterangan Hasil Survey '.$d->getParameter->nama,'required'=>'required','rows'=>'3']) !!}
                                      </td>

                                    </tr>
                                    <!-- {{$no++}} -->
                                    @endforeach
                                  </tbody>
                              </table>
                              </div>
                          </div>


                          <!-- <hr/>
                          
                          <div class="form-group">
                            {!! Form::label('nama', 'Luas Tanah',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('luas_tanah', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Luas Tanah (Angka) Contoh. 517.23','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Jenis KDB/KLB',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('jenis_kdb_klb',[""=>"Pilih Jenis KDB/KLB","1"=>"Baru","2"=>"Lama"], null, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required','id'=>'jenis_kdb_klb']) !!}
                            </div>
                          </div>

                          <hr/>

                          <div class="well hide" id="isiandatalama">
                              <div class="form-group">
                                {!! Form::label('nama', 'KDB Lama',['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-3">
                                       {!! Form::text('kdb', null, ['class' => 'form-control', 'placeholder' => 'Masukkan KDB Presentase (%) Contoh. 5','required'=>'required']) !!}
                                </div>
                                {!! Form::label('nama', 'No. SK',['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-4">
                                       {!! Form::text('no_sk_kdb', null, ['class' => 'form-control', 'placeholder' => 'Masukkan No. SK KDB Contoh. 001/D/IV/2019']) !!}
                                </div>
                              </div>
                              <div class="form-group">
                                {!! Form::label('nama', 'KLB Lama',['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-3">
                                       {!! Form::text('klb', null, ['class' => 'form-control', 'placeholder' => 'Masukkan KLB Presentase (%) Contoh. 5','required'=>'required']) !!}
                                </div>
                                {!! Form::label('nama', 'No. SK',['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-4">
                                       {!! Form::text('no_sk_klb', null, ['class' => 'form-control', 'placeholder' => 'Masukkan No. SK KLB Contoh. 001/D/IV/2019']) !!}
                                </div>
                              </div>
                          </div>
                          <div class="hide " id="isiandatabaru">
                            <div class="col-md-6 well ">
                              <h4>KDB</h4>
                              {!! Form::hidden('is_hasil[]', 0, ['class' => 'form-control', 'placeholder' => 'Is Hasil', 'id' => 'is_hasil']) !!}
                              <div class="form-group">
                                {!! Form::label('nama', 'Tidak Bertingkat',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-8">
                                       {!! Form::text('tidak_bertingkat[]', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Presentase (%) Contoh. 5']) !!}
                                </div>
                              </div>
                              <div class="form-group">
                                {!! Form::label('nama', 'Bertingkat',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-8">
                                       {!! Form::text('bertingkat[]', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Presentase (%) Contoh. 5']) !!}
                                </div>
                              </div>
                              <div class="form-group">
                                {!! Form::label('nama', 'Basement',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-8">
                                       {!! Form::text('basement[]', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Presentase (%) Contoh. 5']) !!}
                                </div>
                              </div>
                              <div class="form-group">
                                {!! Form::label('nama', 'KDB Baru',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-8">
                                       {!! Form::text('hasil[]', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Presentase (%) Contoh. 5']) !!}
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 well ">
                              <h4>KLB</h4>
                              {!! Form::hidden('is_hasil[]', 1, ['class' => 'form-control', 'placeholder' => 'Is Hasil', 'id' => 'is_hasil']) !!}
                              <div class="form-group">
                                {!! Form::label('nama', 'Tidak Bertingkat',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-8">
                                       {!! Form::text('tidak_bertingkat[]', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Presentase (%) Contoh. 5']) !!}
                                </div>
                              </div>
                              <div class="form-group">
                                {!! Form::label('nama', 'Bertingkat',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-8">
                                       {!! Form::text('bertingkat[]', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Presentase (%) Contoh. 5']) !!}
                                </div>
                              </div>
                              <div class="form-group">
                                {!! Form::label('nama', 'Basement',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-8">
                                       {!! Form::text('basement[]', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Presentase (%) Contoh. 5']) !!}
                                </div>
                              </div>
                              <div class="form-group">
                                {!! Form::label('nama', 'KDB Baru',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-8">
                                       {!! Form::text('hasil[]', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Presentase (%) Contoh. 5']) !!}
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('nama', 'Total KDB',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-8">
                                       {!! Form::text('total_kdb', null, ['class' => 'form-control', 'placeholder' => 'Masukkan KDB Presentase (%) Contoh. 5']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('nama', 'Total KLB',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-8">
                                       {!! Form::text('total_klb', null, ['class' => 'form-control', 'placeholder' => 'Masukkan KDB Presentase (%) Contoh. 5']) !!}
                                </div>
                            </div>
                          </div> -->

                        <div class="modal-footer">
                          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="clear">Batal</button>
                          {!! Form::submit('Simpan Data', ['class' => 'btn btn-primary']) !!}
                        </div>

{!! Form::close() !!}
<!-- Button trigger modal -->
<!-- Modal -->

<script type="text/javascript">
    $(".select2").select2();

    if($("#jenis_kdb_klb").val() == 2){
      $('#isiandatabaru').addClass("hide");
      $('#isiandatalama').removeClass("hide");
    }else{
      $('#isiandatabaru').removeClass("hide");
      $('#isiandatalama').addClass("hide");
    }

    $(document).on('change', '#jenis_kdb_klb', function() {
        if(this.value == 2){
          $('#isiandatabaru').addClass("hide");
          $('#isiandatalama').removeClass("hide");
        }else if(this.value == 1){
          $('#isiandatabaru').removeClass("hide");
          $('#isiandatalama').addClass("hide");
        }else{
          $('#isiandatabaru').addClass("hide");
          $('#isiandatalama').addClass("hide");
        }
    });
</script>