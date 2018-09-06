<!DOCTYPE html>
<html>

@include('admin/layouts/admin-head')
  
    <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">


    <!-- Site wrapper -->
    <div class="wrapper">
            
        <div class="overlay">
            <div class="load-bar">
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
            </div>            
        </div>

			 @include('admin/layouts/admin-menubar-top')
      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        @include('admin/layouts/admin-sidebar-left')
        <!-- /.sidebar -->
      </aside>
      
      
       <!-- DISINI BADAN DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN DISINI BADAN  DISINI BADAN  DISINI BADAN  -->
      <!-- DISINI BADAN DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN DISINI BADAN  DISINI BADAN  DISINI BADAN  -->
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper " id="badan">

        @yield('content')
      </div><!-- /.content-wrapper -->
      
      <!-- DISINI BADAN DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN DISINI BADAN  DISINI BADAN  DISINI BADAN  -->
      <!-- DISINI BADAN DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN DISINI BADAN  DISINI BADAN  DISINI BADAN  -->
      <!-- DISINI BADAN DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN  DISINI BADAN DISINI BADAN  DISINI BADAN  DISINI BADAN  -->
            
      <div id="loader">
        <div class="spinner">
          <div class="dot1"></div>
          <div class="dot2"></div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>IMB Karangasem</b>
        </div>
        <p> <strong> All Rights Reserved &copy; 2018 </strong>  <a href="http:/http://karangasemkab.go.id" target="_blank"> Kabupaten Karangasem</a></p>
      </footer>
      

        </div><!-- penutup body -->
      
        
      </div>
    </div>
  </div>
      
      @include('admin/layouts/admin-sidebar-right')
      
    
    </div><!-- ./wrapper -->
    

    @include('admin/layouts/admin-footer')
  
    
  
  </body>

    </html>