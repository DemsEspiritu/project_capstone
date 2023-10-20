<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StudentProfile;

class StudentProfileController extends Controller
{
    // public function list()
    // {    
      
    //   $studentlist = StudentProfile::all();

      
    //   return view('faculty.student.list',compact("studentlist"));
    // }



    public function list()
    {    
      $data['getStudentProfile'] = StudentProfile::getStudentProfile();

      return view('faculty.student.list',compact("data"));
         
    }


}
