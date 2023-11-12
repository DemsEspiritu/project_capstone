<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use App\Models\GradesHandlingSetDate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Models\TotalGrades;
use App\Models\ClassModel;
use App\Models\AssignClassTeacherModel;
use App\Models\User;
use App\Models\GradingLogModel;
use App\Models\ClassSubjectModel;
use Illuminate\Support\Facades\DB;
use Auth;


class TotalGradesController extends Controller
{
    public function list()
    {    
      $data['getStudentProfile'] = StudentProfile::getStudentProfile();


      return view('faculty.grades.list',compact("data"));
         
    }
   



    public function addStudentGrades(Request $request){
      $req = $request->all();
      
      for ($i=0; $i < count($req['ids']); $i++) { 
        $totalGrades = TotalGrades::find($req['ids'][$i]);
        $totalGrades->first_grading = $req['first_grading'][$i];
        $totalGrades->second_grading = $req['second_grading'][$i];
        $totalGrades->third_grading = $req['third_grading'][$i];
        $totalGrades->fourth_grading = $req['fourth_grading'][$i];
        $total = ($req['first_grading'][$i] + $req['second_grading'][$i] + $req['third_grading'][$i] +$req['fourth_grading'][$i]) / 4;
        $totalGrades->final_grades = $total;
        $totalGrades->passed_failed = $total >= 75 ? "PASSED" : "FAILED";
        $totalGrades->save();
      }
      notify()->success('Grade Successfully save!');
      return redirect()->back();
    }
    
   
    public function addStudentRecord(Request $request){
      
      $req = $request->all();
      
      $existingData = DB::table("total_grades_sbujects")->where('users_id',$req['users_id'])->where('school_year_id',$req['school_year_id'])->get()->toArray();
      $newData = array_map( function ($data){
        return $data->subject_id;
      },$existingData);
      
      foreach ($req['subjects'] as $key => $value) {
        if(!in_array($value,$newData)){
            $record = new TotalGrades();
            $record-> users_id = $req['users_id'];
            $record-> school_year_id = $req['school_year_id'];
            $record-> subject_id = $value;
            $record->Save();
        }else{
          foreach($newData as $temp){
            if(!in_array($temp,$req['subjects'])){
                DB::table("total_grades_sbujects")->where('users_id',$req['users_id'])->where('subject_id',$temp)->where('school_year_id',$req['school_year_id'])->delete();
            }
          }
          
            
          
        }
      }
      
      return redirect()->back();

    }

    //teahcer side

    public function student_list_grades($id)
    {    

      $data['getStudentProfile'] = User::getSingle($id);
      
      $subjects = ClassSubjectModel::getStudentSubject(Auth::user()->id,$data['getStudentProfile']->class_id)->toArray();
      
      $grades = DB::table('total_grades_sbujects')->join('subject', 'total_grades_sbujects.subject_id', '=', 'subject.subject_id')->where('users_id', $data['getStudentProfile']->id)->where('school_year_id',$data['getStudentProfile']->school_year_id)->get()->toArray();


      

      $gradingFilter = GradingLogModel::where('school_year_id','=',2)->get();
      $now = date('Y-m-d');
      $now=date('Y-m-d', strtotime($now));
      
     foreach ($gradingFilter as $key => $value) {
        if(($now >= $value->fromdate) && ($now <= $value->enddate)){
            $gradingFilter = $value->description;
        }
     }
     
     
   
      //tryyy 


   

      if(!empty($data['getStudentProfile']))
      {
        return view('teacher.grades.list', compact('data','subjects','grades','gradingFilter'));
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


    public function MyGrades()
    {
        $data['getRecord'] = TotalGrades::getMyGrades(Auth::user()->id);

       // dd($data['getRecord']->toArray());

        return view('student.grade.list', $data);
    }
}
