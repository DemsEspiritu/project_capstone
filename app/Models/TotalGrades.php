<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalGrades extends Model
{
    use HasFactory;


    protected $primaryKey = "tgs_id";
    protected $table = 'total_grades_sbujects';

    

    // static public function getMyGrades()
    // {
    //     $return = RequestForm::select('total_grades_sbujects.*', 'users.name as requested_by_name' ,'users.last_name as requested_by_last_name')
    //         ->join('users', 'users.id', 'total_grades_sbujects.users_id')
    //         ->join('subject', 'subject.subject_id', 'total_grades_sbujects.subject_id');
            
          


    //     $return = $return->orderBy('form_request.form_id', 'desc')
    //         ->paginate(10);

    //         return $return;
    // }

    static public function getMyGrades($users_id)
    {
        return self::select('total_grades_sbujects.*','subject.subject_id as subject_id', 'subject.name as subject_name' , 'subject.description as subject_type',)
                ->join('subject', 'subject.subject_id', '=', 'total_grades_sbujects.subject_id')
                ->where('total_grades_sbujects.users_id', '=' , $users_id)
                ->get();

    }
}
