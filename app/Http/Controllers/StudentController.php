<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index_student()
    {
       
        return view("Admin.Students.addstudent");
    }
}
