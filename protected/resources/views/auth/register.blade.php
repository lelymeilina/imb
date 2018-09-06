@extends('layouts.app')

@section('content')
<style type="text/css">
  #block_error p{
      font-size: 12px;
      color: #373737;
      font-family: Arial, Helvetica, sans-serif;
      line-height: 18px;
  }
  #block_error p a{
      color: #218bdc;
      font-size: 12px;
      text-decoration: none;
  }
  #block_error a{
      outline: none;
  }
  .f-left{
      float:left;
  }
  .f-right{
      float:right;
  }
  .clear{
      clear: both;
      overflow: hidden;
  }
  #block_error{
      width: 845px;
      height: 384px;
      border: 1px solid #cccccc;
      margin: 72px auto 0;
      -moz-border-radius: 4px;
      -webkit-border-radius: 4px;
      border-radius: 4px;
      background: #fff url(http://www.ebpaidrev.com/systemerror/block.gif) no-repeat 0 51px;
  }
  #block_error div{
      padding: 100px 40px 0 186px;
  }
  #block_error div h2{
      color: #218bdc;
      font-size: 24px;
      display: block;
      padding: 0 0 14px 0;
      border-bottom: 1px solid #cccccc;
      margin-bottom: 12px;
      font-weight: normal;
  }
</style>
<div class="container">
@if(App\tahunAjar::periode(date("Y-m-d")))
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <h2>Registrasi Mahasiswa <small>Lengkapi Form Berikut.</small></h2>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input id="name" type="text" class="form-control input-lg" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required="required">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input id="username" type="text" class="form-control input-lg" name="username" placeholder="N I M | Username" value="{{ old('username') }}" required="required">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input id="telp" type="text" class="form-control input-lg" name="telp" placeholder="Nomor HP" value="{{ old('telp') }}" required="required">

                                @if ($errors->has('telp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telp') }}</strong>
                                    </span>
                                @endif
            </div>
            <div class="form-group">
                <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Email Aktif" required="required">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Password (Min 6 Karakter)" required="required">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" placeholder="Ulangi Password" required="required">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-3 col-md-3">
                    <span class="button-checkbox">
                        <button type="button" class="btn" data-color="info" tabindex="7"> Saya Setuju</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
                    </span>
                </div>
                <div class="col-xs-8 col-sm-9 col-md-9">
                     Dengan memberikan centang pada checkbox persetujuan dan menekan tombol <strong class="label label-primary">Register</strong>, Anda telah menyetujui <a href="#" data-toggle="modal" data-target="#t_and_c_m">Syarat dan Ketentuan</a> yang diatur pada situs ini, termasuk penggunaan cookie.<br/>
                     Untuk login kembali ke sistem anda harus menggunakan <strong>NIM</strong> sebagai username dan password yang anda daftarkan saat ini.
                </div>
            </div>
            
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                <div class="col-xs-12 col-md-6"><a href="{{ URL('/login') }}" class="btn btn-success btn-block btn-lg">Sign In</a></div>
            </div>
        </form>
        
    </div>

@else
    <div id="block_error">
        <div>
         <h2>Error 403. &nbspOops Periode Pengajuan Belum Dibuka</h2>
        <p>
        Periode Pengajuan Tugas Akhir dan Kerja Praktek saat ini belum dibuka, jika tanggal periode pengajuan tidak sesuai dengan pengumuman, silahkan hubungi kepala program studi untuk ditindak lanjuti.
        </p>
        <p>
        Atau anda dapat menghubungi teknikal support sintesys <a href="http://www.adipancaiskandar.com" target="_blank">Hubungi Kami</a>.
        terima kasih atas perhatian anda.
        </p>
        </div>
    </div>
@endif
</div>
<br/>

<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Syarat & Ketentuan</h4>
            </div>
            <div class="modal-body">
                <p>Pastikan NIM yang anda masukan adalah nim yang sebenarnya, pastikan anda sudah melakukan KRS Tugas Akhir atau Kerja Praktek, karena pengajuan anda hanya akan disetujui jika hanya anda sudah melakuakan KRS pada mata kuliah tersebut.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>


@endsection
