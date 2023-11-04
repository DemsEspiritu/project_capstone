<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\ClassSubjectModel;
Use App\Models\ClassModel;
Use App\Models\SubjectModel;
Use App\Models\SchoolYearModel;
use Auth;

class ClassSubjectController extends Controller
{
    public function list(Request $request){

        $data['getRecord'] = ClassSubjectModel::getRecord();

        return view('faculty.assign_subject_class.list', compact('data'));

    }

    public function add(Request $request)
    {
        $data['getRecord'] = ClassModel::getRecord();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['getSchoolYearForAssign'] = SchoolYearModel::all();

        return view('faculty.assign_subject_class.add', compact('data'));
    }

    public function insert(Request $request){

        // dd($request->all()); 

        if(!empty($request->subject_id))
        {
            foreach ($request->subject_id as $subject_id)
            {

      
                $save = new ClassSubjectModel;
                $save->class_id = $request->class_id;
                $save->subject_id  = $subject_id; 
                $save->school_year_id  = $request->school_year_id;
                $save->created_by = Auth::user()->id;
                $save->save();

            }
            
            notify()->success('Assign Subject Successfully Create!');
            return redirect('faculty/assign_subject_class/list');
        }
        else 
        {
            return redirect()->back();
        }

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
}
