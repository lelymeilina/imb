@extends('home.layout')

@section('title')
    <title>Real Quick Count | Home</title>
@endsection
@section('content')

 <!-- Start Page Banner -->
<div class="page-banner no-subtitle">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Hasil Suara - Real Quick Count</h2>
			</div>
			<div class="col-md-6">
				<ul class="breadcrumbs">
					<li><a href="#">Data</a></li>
					<li>Hasil Suara</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Page Banner -->

 <div class="hr1 margin-top"></div>
 <br/>

 <div class="container">
		<!-- Start Big Heading -->
		<div class="big-title text-center" data-animation="fadeInDown" data-animation-delay="01">
			<div class="col-sm-12">
		              <h3 class="box-title">Data PEMILU Provinsi Bali</h3>
		  	</div>
		  	<div class="col-sm-12">
			  	<div class="col-sm-5" align="left">
			  		<div class="col-md-12"><div style="background-color:{{$warnaBelumMasuk}}; height:20px;" class="col-md-1"></div><div class="col-md-11" align="left"> &nbsp; &nbsp;  Belum Perhitungan Suara</div></div>
			  		<div class="col-md-12"><div style="background-color:{{$warnaNetral}}; height:20px;  " class="col-md-1"></div><div class="col-md-11" align="left"> &nbsp; &nbsp;  Perhitungan Suara Sama</div></div>
			  		<div class="col-md-12"><div style="background-color:{{$warnaPaslon1}}; height:20px; " class="col-md-1"></div><div class="col-md-11" align="left"> &nbsp; &nbsp;  Paslon 1 Menang</div></div>
			  		<div class="col-md-12"><div style="background-color:{{$warnaPaslon2}}; height:20px; " class="col-md-1"></div><div class="col-md-11" align="left"> &nbsp; &nbsp;  Paslon 2 Menang</div></div>
			  	</div>
				<div class="col-sm-4" align="left">
					<div class="col-md-12">Total : <strong>{{$totalTps}} TPS</strong></div>
                    <div class="col-md-12">Suara Masuk : <strong>{{$masukTps}} TPS</strong></div>
                    <div class="col-md-12">Suara Belum : <strong>{{$belumTps}} TPS</strong></div>
				</div>
				<div class="col-sm-3">
			              {!! Form::open(['class' => 'form-horizontal','role' => 'form', 'method' => 'get']) !!}
			              {!! Form::select('pemilu', [1 => 'Pilgub Bali', 2 => 'Pilbup Gianyar', 3 => 'Pilbup Klungkung'], (Request::has('pemilu'))?Request::get('pemilu'):1  ,['class' => 'form-control', 'onchange' => 'this.form.submit()']) !!}
			              {!! Form::close() !!}
			  </div>
			  <br/>
		  	  <div class="hr1 margin-top"></div>
		  	</div>
		</div>
		


		<!-- End Big Heading -->
		<div class="container blog-post gallery-post ">
			<div class="post-content" style="padding-left:0px !important;">
				<div class="author-info " align="center">
					 @include('dashboard/peta')
				</div>
			</div>
		</div>
</div>

@endsection
