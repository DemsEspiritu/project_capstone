<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;


class TotalGradesController extends Controller
{
    public function list()
    {    
      $data['getStudentProfile'] = StudentProfile::getStudentProfile();

      return view('faculty.grades.list',compact("data"));
         
    }

    public function grades_list($student_profile_id)
    {    

      $data['getStudentProfile'] = StudentProfile::getSingle($student_profile_id);
      if(!empty($data['getStudentProfile']))
      {
        return view('faculty.grades.list_grades', compact('data'));
      }
      else
      {
           abort(404);
      }


         
    }
}
