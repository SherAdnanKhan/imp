<!DOCTYPE html>
<html lang="en">


<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Title</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
        <link rel="shortcut icon" href="{{asset('admin_assets/dist/img/ico/favicon.png')}}" type="image/x-icon">
     
     <script src="{{asset('assets/js/jquery.min.js')}}"></script>
     
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="{{asset('admin_assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <!-- <link href="{{asset('admin_assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/> -->
      <!-- Bootstrap rtl -->
      <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="{{asset('admin_assets/plugins/lobipanel/lobipanel.min.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="{{asset('admin_assets/plugins/pace/flash.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="{{asset('admin_assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="{{asset('admin_assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="{{asset('admin_assets/themify-icons/themify-icons.css')}}" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start page Label Plugins 
         =====================================================================-->
      @yield('page-css')
      <!-- End page Label Plugins 
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      
     
      
      <link href="{{asset('admin_assets/dist/css/stylecrm.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->

        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
        <style>
        table td{
  color:#FFFFFF;
}
         </style>
    </head>
<body >
 

    <div class="wrapper">
<!-- header below -->
@include('Admin.layout.header')
<!-- leftsidebar below -->
@if(Auth::user()->CAMPUS_ID==0)
@include('Admin.layout.sidebar')
<!-- footer below -->
@else
@include('Admin.layout.superadminsidebar')

@endif
@yield('content')
@include('Admin.layout.footer')
</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->


<!-- jQuery  -->

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/js/waves.min.js')}}"></script>
<!-- Required datatable js -->

<script src="{{asset('assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
 <!-- App js -->
 <script src="{{asset('assets/js/app.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@yield('customscript')
</body>

</html>

