<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYearModel;

class SchoolYearController extends Controller
{
    public function list()
    {    
      $school_year = SchoolYearModel::all();
      
      return view('faculty.school_year.list',compact("school_year"));
         
    }

    public function insert(Request $request)
    {
      $request->validate([
        'year_name' => 'required|unique:school_year',
      ], 
      [
          'year_name.unique' => 'this year has already created.'
      ]);
 
     $user = new SchoolYearModel;
     $user->year_name = trim($request->year_name);
     $user->save();

     notify()->success('School Year Successfully Create!');
     return redirect('faculty/school_year/list');
    }


    public function remove($school_year_id)
    {

        $post = SchoolYearModel::where('school_year_id',$school_year_id);
        $post->delete();
        notify()->success('Year Successfully Deleted!');
        return redirect('faculty/school_year/list');
    }


    
    public function edit($subject_year_id)
    {
    $school_year = SchoolYearModel::findOrFail($subject_year_id); // Retrieve the product by its ID

    return view('faculty.school_year.edit', compact('school_year'));
    }






    public function update($subject_year_id, Request $request)
    {    
      $request->validate([
        'year_name' => 'required|unique:school_year',
      ], 
      [
        'year_name.unique' => 'this year has already created.'
      ]);

         $user = SchoolYearModel::getSchoolYear($subject_year_id);
         $user->year_name = trim($request->year_name);
         $user->save();

         notify()->success('School Year Successfully Updated!');

         return redirect('faculty/school_year/list');
    }


    
}
