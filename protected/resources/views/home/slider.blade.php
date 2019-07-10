<!-- Start Home Page Slider -->
        <section id="home">
            <!-- Carousel -->
            <div id="main-slide" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @if(count($slider) >= 1)
                        <!-- {{ $i = 1 }} -->
                        @foreach($slider as $d)
                            @if($i == 1)
                                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                            @else
                                <li data-target="#main-slide" data-slide-to="{{$i}}"></li>
                            @endif
                        <!-- {{$i++}} -->
                        @endforeach

                    @else
                        <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                    @endif
                </ol>
                <!--/ Indicators end-->

                <!-- Carousel inner -->
                <div class="carousel-inner">

                    @if(count($slider) >= 1)
                        <!-- {{ $i = 1 }} -->
                        @foreach($slider as $d)
                            @if($i == 1)
                                <div class="item active">
                            @else
                                <div class="item">
                            @endif
                                <img class="img-responsive" src="{{URL($d->content)}}" alt="slider">
                                <div class="slider-content">
                                    <div class="col-md-12 text-center">
                                        <h2 class="animated2">
                                          <span style="background:#fff; opacity:0.9; padding:0px 10px 0px 10px;"><strong>{{ $d->judul }}</strong></span>
                                        </h2>
                                        <h3 class="animated3" style="font-size: 24px;">
                                            <span style="background:#fff; opacity:0.9; padding:0px 10px 0px 10px;">{{$d->katakunci}}</span>
                                        </h3>
                                        <p class="animated4"><a href="{{URL('/hasil-suara')}}" class="slider btn btn-system btn-large">Check Now</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- {{$i++}} -->
                        @endforeach

                    @else
                    <div class="item active">
                        <img class="img-responsive" src="{{URL('assets/img/slide/1.jpg')}}" alt="slider">
                        <div class="slider-content">
                            <div class="col-md-12 text-center">
                                <h2 class="animated2">
                                  <span style="background:#fff; opacity:0.9; padding:0px 10px 0px 10px;">Welcome to <strong>SIMETRIS IMB</strong></span>
                                </h2>
                                <h3 class="animated3">
                                    <span style="background:#fff; opacity:0.9; padding:0px 10px 0px 10px;">Kabupaten Karangasem</span>
                                </h3>
                                <p class="animated4"><a href="{{URL('/hasil-suara')}}" class="slider btn btn-system btn-large">Check Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    <!--/ Carousel item end -->
                </div>
                <!-- Carousel inner end-->

                <!-- Controls -->
                <a class="left carousel-control" href="#main-slide" data-slide="prev">
                    <span><i class="fa fa-angle-left"></i></span>
                </a>
                <a class="right carousel-control" href="#main-slide" data-slide="next">
                    <span><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
            <!-- /carousel -->
        </section>
        <!-- End Home Page Slider -->