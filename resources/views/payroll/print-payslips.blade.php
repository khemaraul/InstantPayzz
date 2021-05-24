{{-- @extends('layouts.app-template') --}}

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>InstantPayzz</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!--<link href="{{ asset("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />-->
    <link href="{{ asset("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/AdminLTE/plugins/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css')}}">
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
      page. However, you can choose any other skin. Make sure you
      apply the skin class to the body tag so the changes take effect.
      -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/_all-skins.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app-template.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{asset('/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.css')}}">

    <!-- Script -->
    <script src="{{asset('/bower_components/AdminLTE/plugins/jQuery/jquery-3.5.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>


    <!-- Datatables CSS CDN -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> -->

    <!-- jQuery CDN -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <!-- Datatables JS CDN -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
    <style>
    .container-fluid{
        background: white;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-right: 160px;
        margin-left: 160px;
    }
    #btnprn{
        color: black;
        border: 2px solid #2B0F0E;
    }
    td{
        color: #808080;
    }
    </style>
  </head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <!-- Sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payslips
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Payslips</li>
      </ol>
    </section><br />

    <!-- Main content -->
    @foreach($dataSlip as $dataslips)
    <div class="container-fluid">
    <center><u><h4 style="color: #808080;">Payslip</h4></u></center>
    <div>
    <img src="/bower_components/AdminLTE/dist/img/hr_logo.jpg" style="border-radius: 50%;border: 2px solid #2B0F0E;float: left;" width="100px" height="100px">
    <div style="float: right;">
    <h1>PAYSLIP # {{ $dataslips->id }}</h1>
    <p style="color: #808080;">Salary Month: {{ $dataslips->month }}-{{ $dataslips->year }}</p>
    </div>
    </div>
    <br><br><br><br><br><br>
    <div>
    <p style="color: #808080;">Zeki Software Solutions Pvt. Ltd.</p>
    <p>{{ $dataslips->emp_name }}</p>
    <p style="color: #808080;">{{ $dataslips->job_title }}</p>
    <p style="color: #808080;">Employee ID: {{ $dataslips->emp_no }}</p>
    <p style="color: #808080;">Bank A/C Branch: {{ $dataslips->bank }}</p>
    </div>
    <div>
    <div style="float: left;">
    <h4>Payments</h4>
    <table class="table table-bordered">
    <tr>
        <td>Basic Salary&emsp;&emsp;&emsp;{{ $dataslips->gross_pay }}</td>
    </tr>
    <tr>
        <td>Leave Allowance&emsp;{{ $dataslips->leave_allowance }}</td>
    </tr>
    <tr>
        <td>Arrears&emsp;&emsp;&emsp;&emsp;&emsp;{{ $dataslips->arrears }}</td>
    </tr>
    <tr>
        <td>Commission&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $dataslips->commission }}</td>
    </tr>
    <tr>
        <td>Total Earnings&emsp;&emsp;{{ $dataslips->total_pay }}</td>
    </tr>
    </table><br><br><br><br><br><br><br><br><br>
    <p>Net Salary: {{ $dataslips->net_amt }}</p>
    <p>PAYMENT BY BANK TRANSFER</p>
    <br>
    <p>STATEMENT VALUES</p>
    <p>NSSF-Employer</p>
    </div>
    </div>
    <div style="float: right;">
    <h4>Deductions</h4>
    <table class="table table-bordered">
    <tr>
        <td>Pay As You Earn&emsp;&emsp;{{ $dataslips->paye }}<p></td>
    </tr>
    <tr>
        <td>NSSF&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;{{ $dataslips->nssf }}</td>
    </tr>
    <tr>
        <td>NHIF&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;{{ $dataslips->nhif }}</td>
    </tr>
    <tr>
        <td>Insurance&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;{{ $dataslips->insurance }}</td>
    </tr>
    <tr>
        <td>Recovery&emsp;&emsp;&emsp;&emsp;&emsp;{{ $dataslips->recovery }}</td>
    </tr>
    <tr>
        <td>HELB&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;{{ $dataslips->helb }}<p></td>
    </tr>
    <tr>
        <td>Lost Hours&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;{{ $dataslips->last_hours }}</td>
    </tr>
    <tr>
        <td>Sacco/Microfinance&nbsp;&nbsp;&nbsp;&nbsp;{{ $dataslips->sacco }}</td>
    </tr>
    <tr>
        <td>Total Deductions&emsp;&emsp;{{ $dataslips->total_deductions }}</td>
    </tr>
    </table>
    </div>
    </div>
  </div>
  @endforeach
  <!-- /.content-wrapper -->

  <!-- Footer -->

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

 <!-- jQuery 2.1.3 -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/AdminLTE/tables/media/js/jquery.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/AdminLTE/tables/media/js/jquery.dataTables.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/AdminLTE/tables/media/js/dataTables.bootstrap.js") }}" type="text/javascript"></script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
