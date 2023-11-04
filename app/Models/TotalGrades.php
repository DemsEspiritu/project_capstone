<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalGrades extends Model
{
    use HasFactory;


    protected $primaryKey = "tgs_id";
    protected $table = 'total_grades_sbujects';

    
}
