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
<<<<<<< HEAD:resources/views/Admin/layout/master.blade.php
=======
     <!-- <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
   
     <script src="{{asset('assets/js/jquery.min.js')}}"></script>
     
>>>>>>> db7adcbff7753c8c6d8cf4ce4fba43abbc56ef06:resources/views/Admin/AdminLayout/header.blade.php
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
    </head>
<body >
 

    <div class="wrapper">
<!-- header below -->
@include('Admin.layout.header')
<!-- leftsidebar below -->
@include('Admin.layout.sidebar')
<!-- footer below -->
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

@yield('customscript')
</body>

</html>

