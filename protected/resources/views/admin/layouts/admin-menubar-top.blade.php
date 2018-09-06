      <header class="main-header">
        <!-- Logo -->
        <a href="{{ URL('/') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b> IMB </b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>IMB</b> Karangasem</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav kepala">
              <!-- Messages: style can be found in dropdown.less-->
 
              <!-- Notifications: style can be found in dropdown.less -->

             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  @if(empty(Auth::user()->foto))
                    <img avatar="{{substr(Auth::user()->name,0,1)}}" class="user-image" alt="User Image"/>
                  @else
                    <img src="{{URL(Auth::user()->foto)}}" class="user-image" alt="User Image" />
                  @endif
                  
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    @if(empty(Auth::user()->foto))
                      <img avatar="{{substr(Auth::user()->name,0,1)}}" class="img-circle" alt="User Image" />
                    @else
                      <img src="{{URL(Auth::user()->foto)}}" class="img-circle" alt="User Image" />
                    @endif
                    <p>

                    <!-- Student -->
                      <small>Member since {{ App\tanggalIndo::TanggalIndo(Auth::user()->created_at) }}</small>
                      <small>{{ Auth::user()->name }}</small>                      
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="{{URL('/')}}" target="_blank">Home</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#modalUbahPass" data-toggle="modal" data-id="{{ Auth::user()->id }}" >Password</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="http://stiki-indonesia.ac.id/" target="_blank">Website</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{URL('/admin')}}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-cogs"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>