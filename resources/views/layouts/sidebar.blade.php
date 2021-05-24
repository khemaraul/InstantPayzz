  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/user1.jpg") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="/"><i class="fa fa-dashboard fa-lg"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="/"><i class="fa fa-user fa-lg"></i> <span> Employees </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="{{ url('excelTemp') }}">Import From File</a></li> -->
            <li><a href="{{ url('excelExport') }}">Import From File</a></li>
            <li><a href="{{ url('add-new-emp') }}">Add New Employee</a></li>
            <li><a href="{{ url('list-employees') }}">List All</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-usd fa-lg"></i> <span> Payroll </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('payroll/upload-payroll') }}">Upload Payroll</a></li>
            <li><a href="{{ url('payroll/list-uploaded-payroll') }}">View Uploaded Payrolls</a></li>
          </ul>
        </li>
        <li><a href="{{ url('change-password') }}"><i class="fa fa-key fa-lg"></i> <span> Change Password </span></a></li>
        <li><a href="{{ route('logout') }} " onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> <span> Logout </span></a></li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
