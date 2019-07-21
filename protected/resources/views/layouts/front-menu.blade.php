 <!-- Start Header Section --> 
        <div class="hidden-header"></div>
        <header class="clearfix">
            
            <!-- Start Top Bar -->
            <div class="top-bar color-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- Start Contact Info -->
                            <ul class="contact-details">
                                <li><a href="#"><i class="fa fa-map-marker"></i> Denpasar-Bali, Indonesia</a>
                                </li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i> puprpenataanruang@gmail.com</a>
                                </li>
                                <li><a href="#"><i class="fa fa-phone"></i> (0363) 21757</a>
                                </li>
                            </ul>
                            <!-- End Contact Info -->
                        </div><!-- .col-md-6 -->
                        <div class="col-md-5">
                            <!-- Start Social Links -->
                            
                            <!-- End Social Links -->
                        </div><!-- .col-md-6 -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .top-bar -->
            <!-- End Top Bar -->
            
            
            <!-- Start  Logo & Naviagtion  -->
            <div class="navbar navbar-default navbar-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Stat Toggle Nav Link For Mobiles -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- End Toggle Nav Link For Mobiles -->
                        <a class="navbar-brand" href="{{URL('/')}}">
                            <!-- <img alt="" src="images/margo.png"> -->
                            <!-- <strong class="">CraftIslands</strong> -->
                            <span class="accent-color sh-tooltip"><strong>SIMETRIS IMB</strong></span>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <!-- Stat Search -->
                        <div class="search-side">
                            <a href="#" class="show-search"><i class="fa fa-search"></i></a>
                            <div class="search-form">
                                <form autocomplete="off" role="search" method="get" class="searchform" action="#">
                                    <input type="text" value="" name="s" id="s" placeholder="Search the site...">
                                </form>
                            </div>
                        </div>
                        <!-- End Search -->
                        <!-- Start Navigation List -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a class="" href="{{URL('/')}}">Home</a>
                            </li>
                              <li>
                                <a class="" href="{{URL('/alur')}}">Alur</a>
                            </li>
                              <li>
                                <a class="" href="{{URL('/simulasi')}}">Simulasi</a>
                            </li>
                            @if(Auth::check())
                            <li>
                                <a href="#">Admin</a>
                                <ul class="dropdown">
                                    <li><a href="{{URL('admin')}}">Halaman Admin</a>
                                    </li>
                                    <!-- <li><a href="{{URL('/')}}/../user/logout">Logout</a> -->
                                    <li><a href="{{URL('/logout')}}">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            @else
                            <li>
                                <!-- <a href="{{URL('/')}}/../user/login">Login</a> -->
                                <a href="{{URL('/login')}}">Login</a>
                            </li>
                            @endif
                        </ul>
                        <!-- End Navigation List -->
                    </div>
                </div>
            </div>
            <!-- End Header Logo & Naviagtion -->
            
        </header> 
        <!-- End Header Section -->