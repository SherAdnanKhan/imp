   <!-- ========== Left Sidebar Start ========== -->
   <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="index.html" class="waves-effect">
                                    <i class="mdi mdi-home"></i><span class="badge badge-primary float-right"></span> <span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-email"></i><span> Profile <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                               
                                    <li><a href=" {{route('viewstudentdetails',['id' =>  Crypt::encryptString(Session::get('STUDENT_ID')) ])}}"> Student Details</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-email"></i><span> Application <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                               
                                    <li><a href=" {{route('StudentApplication')}}"> Add New Application</a></li>
                                    <li><a href=" {{route('Student_View_Application')}}"> View Application Status</a></li>
                                </ul>
                            </li>

                    
                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
            <div class="content-page">
    <!-- Start content -->
