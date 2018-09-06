@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                 <img src="{{ URL('assets/img/slider/02.jpg') }}" width="100%">
                <div class="carousel-caption caption-slide">
                    <h3>
                    Penelitian.
                    </h3>
                    <p>
                        Peneitian dan pengembangan juga sangatlah penting bagi kemajuan perguruan tinggi,kesejahteraan masyarakat serta kemajuan bangsa dan negara<br/><br/>
                        <a class="btn btn-default btn-outline btn-lg" href="{{URL('/login')}}">Daftar Sekarang</a>
                    </p>
                </div>
                
            </div>
            <!-- End Item -->
            <div class="item">
               <img src="{{ URL('assets/img/slider/03.jpg') }}" width="100%">
                <div class="carousel-caption caption-slide">
                    <h3>
                        Pengabdian</h3>
                    <p>
                        Telah menempuh mata kuliah dengan jumlah SKS minimal adalah 120 SKS yang telah lulus (minimal dengan nilai C). Telah lulus mata kuliah Riset Teknologi Informasi.<br/><br/>
                        <a class="btn btn-default btn-outline btn-lg" href="{{URL('/login')}}">Daftar Sekarang</a>
                        </p>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <img src="{{ URL('assets/img/slider/01.jpg') }}" width="100%">
                <div class="carousel-caption">
                    <h3>
                        &nbsp;</h3>
                    <p>
                        &nbsp;</p>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <img src="{{ URL('assets/img/slider/04.jpg') }}" width="100%">
                <div class="carousel-caption">
                    <h3>
                        &nbsp;</h3>
                    <p>
                        &nbsp;
                    </p>
                </div>
            </div>
            <!-- End Item -->
        </div>
        <!-- End Carousel Inner -->
        <ul class="nav nav-pills nav-justified" id="slidepills">
            <li id="font-pills" data-target="#myCarousel" data-slide-to="0" class="active"><a href="#">Penelitian<small>LPPM STIKI Indonesia</small></a></li>
            <li id="font-pills" data-target="#myCarousel" data-slide-to="1"><a href="#">Pengabdian<small>LPPM STIKI Indonesia</small></a></li>
            <li id="font-pills" data-target="#myCarousel" data-slide-to="2"><a href="#">SITASI<small>Sistem Informasi Penelitian dan Pengabdian STIKI</small></a></li>
            <li id="font-pills" data-target="#myCarousel" data-slide-to="3"><a href="#">LPPM<small>STIKI Indonesia</small></a></li>
        </ul>
    </div>
    <!-- End Carousel -->
<!-- </div> -->



<div class="container">

<!-- <div class="row">
<div class="bs-callout bs-callout-primary">
  <h4>Primary Callout</h4>
  This is a primary callout.
</div>

<div class="bs-callout bs-callout-success">
  <h4>Success Callout</h4>
  This is a success callout.
</div>

<div class="bs-callout bs-callout-info">
  <h4>Info Callout</h4>
  This is an info callout.
</div>

<div class="bs-callout bs-callout-warning">
  <h4>Warning Callout</h4>
  This is a warning callout.
</div>

<div class="bs-callout bs-callout-danger">
  <h4>Danger Callout</h4>
  This is a danger callout.
</div>
</div> -->



    <div class="row">
    <h3>SITASI</h3>
    <p>
        SITASI merupakan sistem yang dapat melakukan pengajuan Penelitian, Pengabdian Dosen dan membantu proses yang terlibat didalamnya seperti progres pengajuan, mengelola data pengajuan, dll. sistem ini dibuat dengan tujuan meringankan pekerjaan ketua LPPM, mencegah hilangnya file karena virus atau bencana alam, dengan menggunakan tempat penyimpanan yang lebih terstruktur dan efektif seperti database, memperkecil kesalahan dalam penulisan nama dosen, dll.   
    </p>
    <h3>Penelitian</h3>
    <p align="justify">
    Peneitian dan pengembangan juga sangatlah penting bagi kemajuan perguruan tinggi,kesejahteraan masyarakat serta kemajuan bangsa dan negara.
    </p>
    <h3>Pengabdian</h3>
    <p align="justify">
    Menurut undang – undang tentang pendidikan tinggi, pengabdian kepada masyarakat adalah kegiatan sivitas akademika yang memanfaatkan ilmu pengetahuan dan teknologi untuk memajukan kesejahteraan masyarakat dan mencerdaskan kehidupan bangsa.
    Pengabdian kepada masyarakan dapat dilakukan dengan berbagai kegiatan positif
    </p>
    </div>
</div>
<br/>
@endsection
