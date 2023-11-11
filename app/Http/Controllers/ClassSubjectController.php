<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\ClassSubjectModel;
Use App\Models\ClassModel;
Use App\Models\SubjectModel;
Use App\Models\SchoolYearModel;
Use App\Models\User;
use Auth;

class ClassSubjectController extends Controller
{
    public function list(Request $request){

        // $classes = ClassModel::with('subjects')->get();
        $classes = ClassSubjectModel::getRecord();

        return view('faculty.assign_subject_class.list', compact('classes'));

    }

    public function AddClassSubjectAndTeacher(Request $request){
        // dd($request->all());
        $req = $request->all();
        
            for ($i=0; $i < count($req['subject_id']); $i++) { 
              $totalGrades = new ClassSubjectModel;
              $totalGrades->class_id = $req['class_id'];
              $totalGrades->subject_id = $req['subject_id'][$i];
              $totalGrades->school_year_id = $req['school_year_id'];
              $totalGrades->teacher_id = $req['teacher_id'][$i];
              $totalGrades->created_by = Auth::user()->id;
              $totalGrades->save();

            }

            notify()->success('Assign Subject Successfully Create!');
            return redirect('faculty/assign_subject_class/list');
      
      }

      public function MyClassSubject()
      {
          $data['getRecord'] = ClassSubjectModel::getMyClassSubject(Auth::user()->id);



          return view('teacher.myclass_subject.list', $data);
      }

    public function add(Request $request)
    
    {
        $data['getRecord'] = ClassModel::getRecord();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['getSchoolYearForAssign'] = SchoolYearModel::all();
        $data['getTeacher'] = User::getTeacher();

        return view('faculty.assign_subject_class.add', compact('data'));
    }




    public function remove($id){

            $remove = ClassSubjectModel::getSingle($id);
            $remove->delete();
           
        notify()->success('Assign Subject Successfully Delete!');
        return redirect('faculty/assign_subject_class/list');
    }


    public function edit($id)
    {   
        $getRecords = ClassSubjectModel::getSingle($id);
        if(!empty($getRecords))
        {
        $data['getRecords'] = $getRecords;
        $data['getAssignSubjectId'] = ClassSubjectModel::getAssignSubjectId($getRecords->class_id);
        $data['getRecord'] = ClassModel::getRecord();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['getSchoolYearForAssign'] = SchoolYearModel::all();
        
        return view('faculty.assign_subject_class.edit', $data );
        }
        else 
        {
            abort(404);
        }
    }

  
    ///Student Side
    
    public function MySubject()
    {
        $subjects = ClassSubjectModel::getMySubject(Auth::user()->class_id);
      
 
         return view('student.subject.list', compact('subjects'));
    }

    // Auth::user()->class_id)
    

}
