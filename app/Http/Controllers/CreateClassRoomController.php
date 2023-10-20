<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\SchoolYearModel;
use App\Models\StudentProfile;
use App\Models\User;
use App\Models\ClassTeacherStudentModel;


class CreateClassRoomController extends Controller
{
    public function list(Request $request){

        return view('faculty.create_class.list');
    }

    public function add(Request $request){

        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::all();
        $data['getSchoolYearForAssign'] = SchoolYearModel::all();
        $data['getStudentProfile'] = StudentProfile::getStudentProfile();
        $data['getTeacher'] = User::getTeacher();

        return view('faculty.create_class.add', compact("data"));

    }

    public function insert(Request $request){

        if(!empty($request->teacher_id))
        {
            foreach ($request->teacher_id as $teacher_id)
            {
                $getAlreadyFirst = ClassTeacherStudentModel::getAlreadyFirst();
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->school_year_id = $request->school_year_id;
                    $getAlreadyFirst->save;
                }
                else
                {
                    $save = new ClassTeacherStudentModel;
                    $save->class_id            = $request->class_id;
                    $save->teacher_id          = $request->teacher_id;
                    $save->schooly_year_id     = $request->school_year_id;
                    $save->subject_id          = $request->subject_id;
                    $save->student_profile_id  = $request->student_profile_id;
                    $save->save();
                }
            }
            notify()->success('Class Successfully Create!');
            return view('faculty.create_class.add');
        }

     
    }



    }

