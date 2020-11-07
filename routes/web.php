<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AcademicsController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\NonTeachingController;
use App\Http\Controllers\StudentLoginController;
use App\Http\Controllers\TeacherLoginController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\TeacherAttendanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function ()
{

    return view('auth.kelexlogin');
})->name('login');

Route::match(['get', 'post'],'/timetable',[TimetableController::class,'index'])->name('timetable');

Route::match(['get', 'post'],'/Searchtimetable',[TimetableController::class,'Searchtimetable'])->name('Searchtimetable');
Route::match(['get', 'post'],'/Savetimetable',[TimetableController::class,'Savetimetable'])->name('Savetimetable');

Route::prefix('admin')->group(function () {

Route::match(['get', 'post'],'/login',[AdminLoginController::class,'login_Admin'])->name('adminlogin');

Route::match(['get', 'post'],'/logout',[AdminloginController::class,'logout_Admin'])->name('logout');

Route::post('/passwordreset',[AdminLoginController::class,'resetpassword_Admin'])->name('password.request');


});

Route::prefix('student')->group(function () {

Route::match(['get', 'post'],'/login_student',[StudentLoginController::class,'login_student'])->name('loginstudent');

Route::match(['get', 'post'],'/logout_student',[StudentLoginController::class,'logout_student'])->name('logoutstudent');

Route::post('/password_reset_student',[StudentLoginController::class,'resetpassword_student'])->name('passwordstudent');

Route::group([ 'middleware' => 'Student'], function()
{
Route::match(['get', 'post'],'/dashboard',[StudentLoginController::class,'dashboard'])->name('dashboard');
Route::get('viewstudentdetails/{id}', [StudentController::class, 'showdetails'])->name('viewstudentdetails');

//Student application routes
Route::match(['get', 'post'],'/Application',[StudentAttendanceController::class,'StudentApplication'])->name('StudentApplication');
Route::match(['get', 'post'],'/AddApplication',[StudentAttendanceController::class,'AddApplication'])->name('Student_Add_Application');
Route::match(['get', 'post'],'/ViewApplication',[StudentAttendanceController::class,'ViewApplication'])->name('Student_View_Application');

});

});


Route::prefix('teacher')->group(function () {

Route::match(['get', 'post'],'/login_teacher',[TeacherLoginController::class,'login_employee'])->name('loginteacher');

Route::match(['get', 'post'],'/logout_teacher',[TeacherLoginController::class,'logout_employee'])->name('logoutteacher');

Route::post('/passwordreset_teacher',[TeacherLoginController::class,'resetpassword_employee'])->name('passwordteacher');

Route::group([ 'middleware' => 'Teacher'], function()
{
Route::match(['get', 'post'],'/dashboard',[TeacherLoginController::class,'dashboard'])->name('dashboard');

Route::get('getemployeedetails/{employeeid}',  [EmployeeController::class, 'getemployeedetails'])->name('get-employee-details');
// Teacher Application routes

Route::match(['get', 'post'],'/Application',[TeacherAttendanceController::class,'TeacherApplication'])->name('TeacherApplication');
Route::match(['get', 'post'],'/AddApplication',[TeacherAttendanceController::class,'AddApplication'])->name('Teacher_Add_Application');
Route::match(['get', 'post'],'/ViewApplication',[TeacherAttendanceController::class,'ViewApplication'])->name('Teacher_View_Application');

});

});




Route::group([ 'middleware' => 'SuperAdmin'], function()
{
Route::get('/superadmin',[App\Http\Controllers\AdminController::class,'index'])->name('superadmin');
// Campus Routes
Route::match(['get', 'post'], '/campus', [CampusController::class, 'index'])->name("campus");

Route::match(['get','post'],'/addcampus', [App\Http\Controllers\CampusController::class, 'store'])->name('addcampus');

Route::get('/showcampus', [App\Http\Controllers\CampusController::class, 'showcampus'])->name('showcampus');

Route::get('/editcampus', [App\Http\Controllers\CampusController::class, 'getcampusdata'])->name('editcampus');

Route::post('/updatecampus', [App\Http\Controllers\CampusController::class, 'updatecampusdata'])->name('updatecampus');

Route::get('/deletecampus', [App\Http\Controllers\CampusController::class, 'deletecampusdata'])->name('deletecampus');

});


Route::group([ 'middleware' => 'Admin'], function()
{

Route::get('admin',[App\Http\Controllers\AdminController::class,'index'])->name('admin');
Route::get('/comingsoon', function ()
{

    return view('Coming_Soon');
});
// Academics Route Start


    //section route
    Route::match(['get', 'post'], '/section', [AcademicsController::class, 'index_section'])->name("section");
    Route::match(['get', 'post'], '/addsection', [AcademicsController::class, 'add_section'])->name("addsection");
    Route::match(['get', 'post'], '/editsection', [AcademicsController::class, 'edit_section'])->name("editsection");
    Route::match(['get', 'post'], '/updatesection', [AcademicsController::class, 'update_section'])->name("updatesection");
    Route::match(['get', 'post'], '/deletesection', [AcademicsController::class, 'delete_section'])->name("deletesection");
    //end section routes

    //Class Routes
    Route::match(['get', 'post'], '/class', [AcademicsController::class, 'index_class'])->name("class");
    Route::match(['get', 'post'], '/addclass', [AcademicsController::class, 'add_class'])->name("addclass");
    Route::match(['get', 'post'], '/editclass', [AcademicsController::class, 'edit_class'])->name("editclass");
    Route::match(['get', 'post'], '/updateclass', [AcademicsController::class, 'update_class'])->name("updateclass");
    Route::match(['get', 'post'], '/deleteclass', [AcademicsController::class, 'delete_class'])->name("deleteclass");
    //end class routes

    //Subject Routes
    Route::match(['get', 'post'], 'subject', [AcademicsController::class, 'index_subject'])->name("subject");
    Route::match(['get', 'post'], '/addsubject', [AcademicsController::class, 'add_subject'])->name("addsubject");
    Route::match(['get', 'post'], '/editsubject', [AcademicsController::class, 'edit_subject'])->name("editsubject");
    Route::match(['get', 'post'], '/updatesubject', [AcademicsController::class, 'update_subject'])->name("updatesubject");
    Route::match(['get', 'post'], '/deletesubject', [AcademicsController::class, 'delete_subject'])->name("deletesubject");
    //end Subject routes

    //session-batch Routes
    Route::match(['get', 'post'], '/session-batch', [AcademicsController::class, 'index_sessionbatch'])->name("session-batch");
    Route::match(['get', 'post'], '/addsession-batch', [AcademicsController::class, 'add_sessionbatch'])->name("addsession-batch");
    Route::match(['get', 'post'], '/editsession-batch', [AcademicsController::class, 'edit_sessionbatch'])->name("editsession-batch");
    Route::match(['get', 'post'], '/updatesession-batch', [AcademicsController::class, 'update_sessionbatch'])->name("updatesession-batch");
    Route::match(['get', 'post'], '/deletesession-batch', [AcademicsController::class, 'delete_sessionbatch'])->name("deletesession-batch");
    //end session-batch routes

     //Subject Group NAME Routes
     Route::match(['get', 'post'], '/sgroup', [AcademicsController::class, 'index_sgroup'])->name("sgroup");
     Route::match(['get', 'post'], '/addsgroup', [AcademicsController::class, 'add_sgroup'])->name("addsgroup");
     Route::match(['get', 'post'], '/editsgroup', [AcademicsController::class, 'edit_sgroup'])->name("editsgroup");
     Route::match(['get', 'post'], '/updatesgroup', [AcademicsController::class, 'update_sgroup'])->name("updatesgroup");
     //end Subject Group Routes

     //Subject Group Routes
     Route::match(['get', 'post'], 'subjectgroup', [AcademicsController::class, 'index_subjectgroup'])->name("subjectgroup");
     Route::match(['get', 'post'], '/addsubjectgroup', [AcademicsController::class, 'add_subjectgroup'])->name("addsubjectgroup");
     Route::match(['get', 'post'], '/editsubjectgroup', [AcademicsController::class, 'edit_subjectgroup'])->name("editsubjectgroup");
     Route::match(['get', 'post'], '/updatesubjectgroup', [AcademicsController::class, 'update_subjectgroup'])->name("updatesubjectgroup");
     //end Subject route



// Academatics Routes End


// Student Routes Start

    Route::match(['get', 'post'], '/student', [StudentController::class, 'index_student'])->name("student");
    Route::match(['post'],'/addstudent', [StudentController::class, 'add_student'])->name('addstudent');
    Route::get('/showstudent', [StudentController::class, 'showstudent'])->name('showstudent');
    Route::get('/editstudent/{id}', [StudentController::class, 'getstudentdata'])->name('editstudent');
    Route::match(['get', 'post'], '/updatestudent', [StudentController::class, 'update_student'])->name("updatestudent");

    Route::get('/showstudent', [StudentController::class, 'show'])->name('showstudent');
    Route::get('/getsections/{id}',  [StudentController::class, 'fetch']);
    Route::get('/getsection/{id}',  [GeneralController::class, 'getSections']);
    Route::get('/getclasses/',  [GeneralController::class, 'getClasses']);
    Route::get('getmatchingdata/{id}',  [StudentController::class, 'fetchstudentdata']);

    Route::get('/searchstudent', [StudentController::class, 'searchstudent'])->name('searchstudent');

    Route::get('/getidcard/{id}', [StudentController::class, 'get_student_data_for_id_card'])->name('getidcard');

// Student Add Through Csv Start here

Route::get('/import', [StudentController::class, 'getImport'])->name('import');
Route::get('/download', [StudentController::class, 'getDownload']);
Route::post('/import_process', [StudentController::class, 'processImport'])->name('import_process');



/// Student Attendance start
    Route::get('/student-attendance', [StudentAttendanceController::class, 'student_attendance'])->name('student-attendance');
    Route::post('/get-abscent-list', [StudentAttendanceController::class, 'getNonPresentStudents'])->name('get-abscent-list');
    Route::post('/get-std-for-attendance', [StudentAttendanceController::class, 'get_stds_for_attendance'])->name('get-std-for-attendance');
    Route::post('/save-students-attendance', [StudentAttendanceController::class, 'save_students_attendance'])->name('save-students-attendance');
    Route::match(['post','get'],'/non-present-students', [StudentAttendanceController::class, 'non_present_students'])->name('non-present-students');
    Route::match(['get', 'post'],'/ViewApplicationAdmin',[StudentAttendanceController::class,'ViewApplicationbyadmin'])->name('Admin_View_Application');
    Route::match(['get', 'post'],'/actionApplicationAdmin',[StudentAttendanceController::class,'actionApplicationbyadmin'])->name('Admin_action_Application');
    /// Student Attendance end..


/// Teacher Attendance start

/// Teacher Attendance start
    Route::match(['get', 'post'],'/teacher-attendance', [teacherAttendanceController::class, 'teacher_attendance'])->name('teacher-attendance');
    Route::match(['get', 'post'],'/get-tchrall-for-attendance', [teacherAttendanceController::class, 'get_tchrall_for_attendance'])->name('get-tchrall-for-attendance');
    Route::match(['get', 'post'],'/save-teachers-attendance', [teacherAttendanceController::class, 'save_teachers_attendance'])->name('save-teachers-attendance');

/// Teacher Attendance start
    Route::match(['get', 'post'],'/teacher-attendance', [teacherAttendanceController::class, 'teacher_attendance'])->name('teacher-attendance');
    Route::match(['get', 'post'],'/get-tchrall-for-attendance', [teacherAttendanceController::class, 'get_tchrall_for_attendance'])->name('get-tchrall-for-attendance');
    Route::match(['get', 'post'],'/save-teachers-attendance', [teacherAttendanceController::class, 'save_teachers_attendance'])->name('save-teachers-attendance');
    Route::match(['get', 'post'],'/TeacherViewApplicationAdmin',[TeacherAttendanceController::class,'ViewApplicationbyadmin'])->name('Teacher-View-Application-by-admin');
    Route::match(['get', 'post'],'/TeacteractionApplicationAdmin',[TeacherAttendanceController::class,'actionApplicationbyadmin'])->name('Teacher-Action-Application-by-admin');
  /// Teacher Attendance end..

    // Fee Catergory Routes Start

    Route::match(['get', 'post'], '/feecategory', [FeeController::class, 'index_feecategory'])->name("feecategory");
    Route::match(['get', 'post'], '/get-sections-by-session/{session_id}', [FeeController::class, 'fee_define_new'])->name("get-sections-by-session");
    Route::match(['get', 'post'], '/addfeecategory', [FeeController::class, 'add_feecategory'])->name("addfeecategory");
    Route::match(['get', 'post'], '/editfeecategory', [FeeController::class, 'edit_feecategory'])->name("editfeecategory");
    Route::match(['get', 'post'], '/updatefeecategory', [FeeController::class, 'update_feecategory'])->name("updatefeecategory");
     Route::match(['get', 'post'], '/get-fee-categories/{class_id}/{section_id}', [FeeController::class, 'get_fee_categories'])->name("get-fee-categories");

    //Fee type Routes Start
    Route::match(['get', 'post'], '/get-student-fee/{session_id}/{class_id}/{section_id}', [FeeController::class, 'get_student_fee'])->name("get-student-fee");
    Route::match(['get', 'post'], '/fee-type', [FeeController::class, 'fee_type'])->name("fee-type");
    Route::match(['get', 'post'], '/add-fee-type', [FeeController::class, 'add_fee_type'])->name("add-fee-type");
    Route::match(['get', 'post'], '/edit-fee-type', [FeeController::class, 'edit_fee_type'])->name("edit-fee-type");
    Route::match(['get', 'post'], '/update-fee-type', [FeeController::class, 'update_subjectgroup'])->name("update-fee-type");
    // Route::match(['get', 'post'], '/fee-structure', [FeeController::class, 'fee_structure'])->name("fee-structure");
    Route::match(['get', 'post'], '/fee-structure', [FeeController::class, 'fee_define_new'])->name("fee-structure");
    Route::match(['get', 'post'], '/add-fee-structure', [FeeController::class, 'add_fee_structure'])->name("add-fee-structure");
    Route::match(['get', 'post'], '/apply-fee-structure', [FeeController::class, 'apply_fee_structure'])->name("apply-fee-structure");
    Route::match(['get', 'post'], '/apply-fee', [FeeController::class, 'apply_fee'])->name("Apply-Fee");
    Route::match(['get', 'post'], '/get-section-fee-category/{session_id}/{class_id}/{section_id}', [FeeController::class, 'get_section_fee_category'])->name("get-section-fee-category");
    Route::match(['get', 'post'], '/get-section-fee/{session_id}/{class_id}/{section_id}', [FeeController::class, 'get_section_fee'])->name("get-section-fee");
    Route::match(['get', 'post'], '/print-fee-voucher', [FeeController::class, 'fee_voucher'])->name("fee-voucher");
    Route::match(['get', 'post'], '/apply-fee-on-sections', [FeeController::class, 'apply_fee_on_sections'])->name("apply-fee-on-sections");
    Route::get('/get-fee-type/{session_id}/{class_id}/{section_id}/{fee_cat_id}', [FeeController::class, 'get_fee_type'])->name("get-fee-type");


//Employee Routes Start
Route::match(['get', 'post'], '/employee', [EmployeeController::class, 'index_employee'])->name("employee");
Route::match(['post'],'/addemployee', [EmployeeController::class, 'add_employee'])->name('addemployee');
Route::get('/showemployee', [EmployeeController::class, 'showemployee'])->name('showemployee');
Route::get('/editemployee/{id}', [EmployeeController::class, 'getemployeedata'])->name('editemployee');
Route::match(['get', 'post'], '/updateemployee', [EmployeeController::class, 'update_employee'])->name("updateemployee");

//Add Non Teaching Staff
Route::match(['get', 'post'], '/staff', [NonTeachingController::class, 'index_staff'])->name("staff");
Route::match(['get', 'post'], '/addstaff', [NonTeachingController::class, 'store_staff'])->name("add-staff");
Route::match(['get', 'post'], '/showstaff', [NonTeachingController::class, 'show_all_staff'])->name("show-staff");
Route::match(['get', 'post'], '/editstaff/{id}', [NonTeachingController::class, 'edit_staff'])->name("edit-staff");
Route::match(['get', 'post'], '/updatestaff', [NonTeachingController::class, 'update_staff'])->name("update-staff");

// Add Exam Routes Start Here
Route::match(['get', 'post'], '/exam', [ExamController::class, 'index_exam'])->name("exam");
Route::match(['get', 'post'], '/addexam', [ExamController::class, 'add_exam'])->name("addexam");
Route::match(['get', 'post'], '/editexam', [ExamController::class, 'edit_exam'])->name("editexam");
Route::match(['get', 'post'], '/updateexam', [ExamController::class, 'update_exam'])->name("updateexam");
Route::match(['get', 'post'], '/deleteexam', [ExamController::class, 'delete_exam'])->name("deleteexam");

// Add Exam paper routes start here

Route::match(['get', 'post'], '/exampaper', [ExamController::class, 'index_exampaper'])->name("exampaper");
Route::match(['get', 'post'], '/view_exam_paper', [ExamController::class, 'view_exam_paper'])->name("view_exam_paper");
Route::match(['get', 'post'], '/add_exam_paper', [ExamController::class, 'add_exam_paper'])->name("add_exam_paper");
Route::match(['get', 'post'], '/edit_exam_paper', [ExamController::class, 'edit_exam_paper'])->name("edit_exam_paper");
Route::match(['get', 'post'], '/update_exam_paper', [ExamController::class, 'update_exam_paper'])->name("update_exam_paper");

// Assign Teacher to Paper Exam Start here
Route::match(['get', 'post'], '/assign_exam_paper', [ExamController::class, 'assign_exam_paper'])->name("assign_exam_paper");

});
