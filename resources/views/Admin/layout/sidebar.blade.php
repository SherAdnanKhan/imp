   <!-- ========== Left Sidebar Start ========== -->
   <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li>
<<<<<<< HEAD
                            <?php
                            if(isset($permissions)){
                            $permissions= json_decode($permissionstaff);
                            }
                            else{
                            $permission=session::get('permissions');
                            $permissions= json_decode($permission);
                            }

||||||| merged common ancestors
                            <?php 
                            if(isset($permissions)){
                            $permissions= json_decode($permissionstaff);
                            }
                            else{
                            $permission=session::get('permissions');
                            $permissions= json_decode($permission);  
                            }
                                
=======
                            <?php 
                            $permission=Session::get('permissions');
                            $permissions= json_decode($permission); 
                 
                              //  dd($permissions);
>>>>>>> 8b13e8d8e55af8cf4b9c329fe8625a612ad2333f
                            ?>
                                <a href="{{route('admin')}}" class="waves-effect">
                                    <i class="mdi mdi-home"></i><span class="badge badge-primary float-right">3</span> <span>
                                    <?php
                                    ?>
                                     Dashboard </span>
                                </a>
                            </li>

                            @if(isset($permissions->registermanagment->status)=="1")
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-email"></i><span> Students <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                @if(isset($permissions->acadamics->student_manage->view)=="1")
                                <ul class="submenu">
                                    <li><a href="{{route('student')}}">Student Admission</a></li>
                                    <li><a href="{{route('showstudent')}}">Student Details</a></li>
                                </ul>
                                @endif
                            </li>
                           @endif
                            @if(isset($permissions->acadamics->status)=="1")
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-buffer"></i> <span> Academics <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
                                <ul class="submenu">
                                @if(isset($permissions->acadamics->session->status)=="1")
                                    <li><a href="{{route('session-batch')}}">Session/Batches</a></li>
                                @endif
                                @if(isset($permissions->acadamics->classess->status)=="1")
                                    <li><a href="{{route('class')}}">Classes</a></li>
                                @endif
                                @if(isset($permissions->acadamics->sections->status)=="1")
                                    <li><a href="{{route('section')}}">Section</a></li>
                                @endif
                                @if(isset($permissions->acadamics->subjects->status)=="1")
                                    <li><a href="{{route('subject')}}">Subject</a></li>
                                    <li><a href="{{route('sgroup')}}">Subject Group Name</a></li>
                                    <li><a href="{{route('subjectgroup')}}">Subject Group</a></li>
                                @endif
                                </ul>
                            </li>
                            @endif
                            @if(isset($permissions->hr_managment->status)=="1")
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-album"></i> <span> HR Managment  <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span></span> </a>
                                <ul class="submenu">
                                @if(isset($permissions->hr_managment->emp_manage->status)=="1")
                                    <li><a href="{{route('employee')}}">Add New Employee</a></li>
                                    <li><a href="{{route('showemployee')}}">Employee Managment</a></li>
                                @endif
                                </ul>

                            </li>
                            @endif
                            @if(isset($permissions->fee_managament->status)=="1")
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-finance"></i><span> Fee Management <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                            @if(isset($permissions->fee_managament->fee_category->status)=="1")
                                    <li><a href="{{route('feecategory')}}">Define Fee Category</a></li>
                            @endif
                            @if(isset($permissions->fee_managament->define_fee->status)=="1")
                                    {{-- <li><a href="{{route('fee-type')}}">Define Fee Type</a></li> --}}
                            @endif
                            @if(isset($permissions->fee_managament->define_fee->status)=="1")
                                    <li><a href="{{route('fee-structure')}}">Apply Fee Structure</a></li>

                            @endif
                            @if(isset($permissions->fee_managament->fee_collection->status)=="1")
                                    <li><a href="charts-flot.html">Fee Collection</a></li>
                            @endif
                            @if(isset($permissions->fee_managament->fee_voucher->status)=="1")
                                    <li><a href="charts-c3.html">Print Fee Voucher</a></li>
                            @endif
                            @if(isset($permissions->fee_managament->fee_register->status)=="1")
                                    <li><a href="charts-morris.html">Fee register</a></li>
                            @endif
                            @if(isset($permissions->fee_managament->family_accounts->status)=="1")
                                    <li><a href="charts-other.html">Family Accounts</a></li>
                            @endif
                                </ul>
                            </li>
                            @endif
                            @if(isset($permissions->std_attendance->status)=="1")
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table-settings"></i><span> Student Attendance <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                            @if(isset($permissions->std_attendance->application->status)=="1")
                                    <li><a href="{{route('Admin_View_Application')}}">Applications</a></li>
                            @endif
                            @if(isset($permissions->std_attendance->std_attendance_manage->status)=="1")
                                    <li><a href="{{route('student-attendance')}}">Attendance Managment</a></li>
                            @endif
                            @if(isset($permissions->std_attendance->non_present->status)=="1")
                                    <li><a href="{{route('non-present-students')}}">Non-Present Report</a></li>
                            @endif
                                </ul>
                            </li>
                            @endif
                            @if(isset($permissions->hr_managment->status)=="1")
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table-settings"></i><span> Teacher Attendance <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                            @if(isset($permissions->hr_managment->emp_attendance->status)=="1")
                                    <li><a href="{{route('Teacher-View-Application-by-admin')}}">Applications</a></li>
                                    <li><a href="{{route('teacher-attendance')}}">Attendance Managment</a></li>
                                    <li><a href="{{route('non-present-students')}}">Non-Present Report</a></li>
                            @endif
                                </ul>
                            </li>
                            @endif
                            @if(isset($permissions->admissionwithdraw->status)=="1")
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-black-mesa"></i> <span> Admission Withdraw <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
                                <ul class="submenu">
                            @if(isset($permissions->admissionwithdraw->withdraw_register->status)=="1")
                                    <li><a href="components-lightbox.html">With-Draw Register</a></li>
                                    <li><a href="components-rangeslider.html">Register Managment</a></li>
                            @endif
                                </ul>
                            </li>
                            <li>
                            @endif
                            @if(isset($permissions->correspondence->status)=="1")
                            <li>

                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard"></i><span> Correspondence <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
                                <ul class="submenu">
                                @if(isset($permissions->complaintletter->status)=="1")
                                    <li><a href="form-elements.html">Complaint Letter Managment</a></li>
                                @endif
                                @if(isset($permissions->showcause->status)=="1")
                                    <li><a href="form-validation.html">Showcause Managment</a></li>
                                @endif
                                @if(isset($permissions->notification->status)=="1")
                                    <li><a href="form-advanced.html">Notification</a></li>
                                @endif

                                </ul>
                            </li>
                            @endif
                            @if(isset($permissions->accounts->status)=="1")
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-google-maps"></i><span> Accounts  <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span></span></a>
                                <ul class="submenu">
                                @if(isset($permissions->accounts->asset_category->status)=="1")
                                    <li><a href="maps-google.html"> Assets Category</a></li>
                                @endif
                                @if(isset($permissions->accounts->asset_managment->status)=="1")
                                    <li><a href="maps-vector.html"> Assets Managamnet</a></li>
                                @endif
                                </ul>
                            </li>
                            @endif
                            @if(isset($permissions->certificate->status)=="1")
                            <li>

                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-page-layout-sidebar-left"></i><span> Certificate Managment <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
                                <ul class="submenu">
                            @if(isset($permissions->certificate->slc->status)=="1")
                                    <li><a href="layouts-dark-sidebar.html">SLC</a></li>
                            @endif
                            @if(isset($permissions->certificate->experience->status)=="1")
                                    <li><a href="layouts-sidebar-user.html">Experience</a></li>
                            @endif
                            @if(isset($permissions->certificate->curricular->status)=="1")
                                    <li><a href="layouts-collapsed.html">Curricular </a></li>
                            @endif
                                </ul>
                            </li>
                            @endif
                            <li class="menu-title">Settings</li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-google-pages"></i><span>System Settings <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="pages-login.html">General Settings</a></li>
                                    @if(isset($permissions->usermanagment->status)=="1")
                                    <li><a href="{{route('staff')}}">Roles/Permission</a></li>
                                    @endif

                                </ul>
                            </li>
                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

    </div>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <!-- <h4 class="page-title">Blank page</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Agroxa</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Blank page</li>
                        </ol>

                        <div class="state-information d-none d-sm-block">
                            <div class="state-graph">
                                <div id="header-chart-1"></div>
                                <div class="info">Balance $ 2,317</div>
                            </div>
                            <div class="state-graph">
                                <div id="header-chart-2"></div>
                                <div class="info">Item Sold 1230</div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
