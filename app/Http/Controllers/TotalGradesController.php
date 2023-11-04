<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Models\User;


class TotalGradesController extends Controller
{
    public function list()
    {    
      $data['getStudentProfile'] = StudentProfile::getStudentProfile();

      return view('faculty.grades.list',compact("data"));
         
    }


    //teahcer side

    public function student_list_grades($id)
    {    

      $data['getStudentProfile'] = User::getSingle($id);
      if(!empty($data['getStudentProfile']))
      {
        return view('teacher.grades.list', compact('data'));
      }
      else
      {
           abort(404);
      }

    }

    public function add(Request $request, $id) {

        $user = $id;
        $firstgrade = $request->first_grading;
        $secondgrade = $request->second_grading;
        $thirdgrade = $request->third_grading;
        $fourthgrade = $request->fourth_grading;


        for ($i=0; $i < count($user); $i++)
        {
          $datasave = [
              'first_grading' => $fistgrade,
              'second_grading' => $secondgrade,
              'third_grading' => $thirdgrade,
              'fourth_grading' => $fourthgrade,
          ];
          DB::table('total_grades_sbujects')->insert($datasave);
        }
    }
}
