
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
          <!-- Sidebar user panel -->

          <div class="user-panel">
            <div class="pull-left image">
              @if(empty(Auth::user()->foto))
                <img avatar="{{substr(Auth::user()->name,0,1)}}" class="img-circle" alt="User Image" />
              @else
                <img src="{{URL(Auth::user()->foto)}}" alt="User Image" />
              @endif
            </div>
            <div class="pull-left info">
              <p>{{ Session::get('namePermission') }}</p>
              <a><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form -->
          <!-- /.search form -->

          <ul class="sidebar-menu">           
            <li class="header">Main Menu</li>
          </ul>
          
          {!! Session::get('navigation') !!}
          <!-- sidebar menu: : style can be found in sidebar.less -->
</section>
<!-- /.sidebar -->