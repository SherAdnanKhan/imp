<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AcademicsController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\GeneralController; 
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
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
// Admin Routs 
Route::get('/admin',[App\Http\Controllers\AdminController::class,'index'])->name('admin');

// Campus Routes
Route::match(['get', 'post'], '/campus', [CampusController::class, 'index'])->name("campus")->middleware('isSuperAdmin');;

Route::match(['post'],'/addcampus', [App\Http\Controllers\CampusController::class, 'store'])->name('addcampus');

Route::get('/showcampus', [App\Http\Controllers\CampusController::class, 'showcampus']);

Route::get('/editcampus', [App\Http\Controllers\CampusController::class, 'getcampusdata'])->name('editcampus');

Route::post('/updatecampus', [App\Http\Controllers\CampusController::class, 'updatecampusdata'])->name('updatecampus');

Route::get('/deletecampus', [App\Http\Controllers\CampusController::class, 'deletecampusdata'])->name('deletecampus');


 // Academics Route Start

    //section route
    Route::match(['get', 'post'], '/admin/section', [AcademicsController::class, 'index_section'])->name("section");
    Route::match(['get', 'post'], '/addsection', [AcademicsController::class, 'add_section'])->name("addsection");
    Route::match(['get', 'post'], '/editsection', [AcademicsController::class, 'edit_section'])->name("editsection");
    Route::match(['get', 'post'], '/updatesection', [AcademicsController::class, 'update_section'])->name("updatesection");
    Route::match(['get', 'post'], '/deletesection', [AcademicsController::class, 'delete_section'])->name("deletesection");
    //end section routes

    //Class Routes
    Route::match(['get', 'post'], '/admin/class', [AcademicsController::class, 'index_class'])->name("class");
    Route::match(['get', 'post'], '/addclass', [AcademicsController::class, 'add_class'])->name("addclass");
    Route::match(['get', 'post'], '/editclass', [AcademicsController::class, 'edit_class'])->name("editclass");
    Route::match(['get', 'post'], '/updateclass', [AcademicsController::class, 'update_class'])->name("updateclass");
    Route::match(['get', 'post'], '/deleteclass', [AcademicsController::class, 'delete_class'])->name("deleteclass");
    //end class routes

    //Subject Routes
    Route::match(['get', 'post'], '/admin/subject', [AcademicsController::class, 'index_subject'])->name("subject");
    Route::match(['get', 'post'], '/addsubject', [AcademicsController::class, 'add_subject'])->name("addsubject");
    Route::match(['get', 'post'], '/editsubject', [AcademicsController::class, 'edit_subject'])->name("editsubject");
    Route::match(['get', 'post'], '/updatesubject', [AcademicsController::class, 'update_subject'])->name("updatesubject");
    Route::match(['get', 'post'], '/deletesubject', [AcademicsController::class, 'delete_subject'])->name("deletesubject");
    //end Subject routes

    //session-batch Routes
    Route::match(['get', 'post'], '/admin/session-batch', [AcademicsController::class, 'index_sessionbatch'])->name("session-batch");
    Route::match(['get', 'post'], '/addsession-batch', [AcademicsController::class, 'add_sessionbatch'])->name("addsession-batch");
    Route::match(['get', 'post'], '/editsession-batch', [AcademicsController::class, 'edit_sessionbatch'])->name("editsession-batch");
    Route::match(['get', 'post'], '/updatesession-batch', [AcademicsController::class, 'update_sessionbatch'])->name("updatesession-batch");
    Route::match(['get', 'post'], '/deletesession-batch', [AcademicsController::class, 'delete_sessionbatch'])->name("deletesession-batch");
    //end session-batch routes

// Academatics Routes End


// Student Routes Start

    Route::match(['get', 'post'], '/student', [StudentController::class, 'index_student'])->name("student");
    Route::match(['post'],'/addstudent', [StudentController::class, 'add_student'])->name('addstudent');
    Route::get('/showstudent', [StudentController::class, 'showstudent'])->name('showstudent');
    Route::get('/editstudent/{id}', [StudentController::class, 'getstudentdata'])->name('editstudent');
    Route::match(['get', 'post'], '/updatestudent', [StudentController::class, 'update_student'])->name("updatestudent");
    
    Route::get('/showstudent', [StudentController::class, 'show'])->name('showstudent');
    // Route::get('/getsection/{id}',  [StudentController::class, 'fetch']);
    Route::get('/getsection/{id}',  [GeneralController::class, 'getSections']);
    Route::get('/getclasses/',  [GeneralController::class, 'getClasses']);
    Route::get('getmatchingdata/{id}',  [StudentController::class, 'fetchstudentdata']);

    Route::get('/searchstudent', [StudentController::class, 'searchstudent'])->name('searchstudent');

/// Student Attendance start 
    Route::get('/student-attendance', [StudentAttendanceController::class, 'student_attendance'])->name('student-attendance');
    Route::post('/get-abscent-list', [StudentAttendanceController::class, 'getNonPresentStudents'])->name('get-abscent-list');
    Route::post('/get-std-for-attendance', [StudentAttendanceController::class, 'get_stds_for_attendance'])->name('get-std-for-attendance');
    Route::post('/save-students-attendance', [StudentAttendanceController::class, 'save_students_attendance'])->name('save-students-attendance');
    Route::match(['post','get'],'/non-present-students', [StudentAttendanceController::class, 'non_present_students'])->name('non-present-students');
/// Student Attendance end..