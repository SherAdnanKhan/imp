<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicsController;
use App\Http\Controllers\CampusController;
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
Route::match(['get', 'post'], '/addcampus', [CampusController::class, 'index'])->name("campus");

Route::post('/addcampus', [App\Http\Controllers\CampusController::class, 'store'])->name('addcampus');

Route::get('/showcampus', [App\Http\Controllers\CampusController::class, 'showcampus']);

Route::get('/editcampus', [App\Http\Controllers\CampusController::class, 'getcampusdata'])->name('editcampus');

Route::post('/updatecampus', [App\Http\Controllers\CampusController::class, 'updatecampusdata'])->name('updatecampus');

Route::get('/deletecampus', [App\Http\Controllers\CampusController::class, 'deletecampusdata'])->name('deletecampus');








 // Academics Route

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

