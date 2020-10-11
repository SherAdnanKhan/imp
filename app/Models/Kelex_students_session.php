<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelex_students_session extends Model
{
    use HasFactory;
    protected $fillable = ['SESSION_ID','CLASS_ID','SECTION_ID','IS_ACTIVE','STUDENT_ID'];

}