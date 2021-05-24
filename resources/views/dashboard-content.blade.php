 <!-- Main content -->
 <section class="content">
    <!-- Info boxes -->
    <div class="row">
       <!-- /.col -->
       <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><img src="/bower_components/AdminLTE/dist/img/employee.jpg" width="50" height="50"></span>

          <div class="info-box-content">
            <span class="info-box-text">Employees</span>
            <span class="info-box-number">{{ $employeeCount }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><img src="/bower_components/AdminLTE/dist/img/payroll.jpg" width="50" height="50"></span>

          <div class="info-box-content">
            <span class="info-box-text">Payrolls</span>
            <span class="info-box-number">{{ $payrollCount }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><img src="/bower_components/AdminLTE/dist/img/payslip.jpg" width="50" height="50"></span>

          <div class="info-box-content">
            <span class="info-box-text">Payslips</span>
            <span class="info-box-number">{{ $payslipCount }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><img src="/bower_components/AdminLTE/dist/img/users.jpg" width="50" height="50"></span>

          <div class="info-box-content">
            <span class="info-box-text">users</span>
            <span class="info-box-number">{{ $usersCount }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
