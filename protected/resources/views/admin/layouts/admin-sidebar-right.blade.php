  <!-- Control Sidebar Pengaturan Menu-->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <div class="tab-content">
          <h3 class="control-sidebar-heading">Privilege User</h3>
          @php
            $data = App\rbacRoleUser::getListRoleUser(Auth::user()->username);
            $permision = Session::get('userPermission');
          @endphp
          <div class="form-group">
            {!! Form::select('userPermission', $data, $permision, ['class' => 'form-control selectpicker','id'=>'listRole','data-style'=>'btn-inverse','style'=>'display: block;']) !!}
          </div>
        </div>
        <!-- Tab panes -->
        <hr/>
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <!-- /.control-sidebar-menu -->
          </div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              
            </form>
          </div><!-- /.tab-pane -->
        </div>

      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>