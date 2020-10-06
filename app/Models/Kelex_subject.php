<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelex_subject extends Model
{
    use HasFactory;
    protected $primaryKey = 'SUBJECT_ID';
    protected $softDelete = true;
}

