
 <div class="hr1 margin-top"></div>
 <br/>
<!-- Start Big Heading -->
<div class="big-title text-center" data-animation="fadeInDown" data-animation-delay="01">
	<h1>Informasi Tentang<strong> SITASI</strong></h1>
</div>
<!-- End Big Heading -->
<div class="container blog-post gallery-post ">
	<div class="post-content" style="padding-left:0px !important;">
		<div class="author-info clearfix">
			 <!-- <div class="author-image">
			   <a href="#"><img alt="" src="{{URL('assets/img/author.png')}}" /></a>
			 </div> -->
			 <!-- <div class="author-bio"> -->
			@if(count($profile) >= 1)
                <!-- {{ $i = 1 }} -->
                @foreach($profile as $d)
				 <div class="">
				   <h4>{{$d->judul}}</h4>
				   <p align="justify">{!! $d->content !!}</p>
				 </div>
				@endforeach
			@else
				<div class="">
				   <h4>Tentang Website</h4>
				   <p align="justify">No Data</p>
				 </div>
			@endif
		</div>
	</div>
</div>