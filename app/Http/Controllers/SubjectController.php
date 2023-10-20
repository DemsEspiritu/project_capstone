<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;

use App\Models\SubjectModel;

class SubjectController extends Controller
{





    public function list() {
      $subjectdata = SubjectModel::all(); // Replace with your actual query to fetch data
      return view('faculty/subject/list', compact('subjectdata'));
  }



    
  



    public function insert(Request $request)
    {
      $request->validate([
        'name' => 'required|unique:subject',
      ], 
      [
          'name.unique' => 'this subject has already created.'
      ]);
 
     $user = new SubjectModel;
     $user->name = trim($request->name);
     $user->description = trim($request->description);
     $user->save();
     notify()->success('Subject Successfully Create!');
     return redirect('faculty/subject/list');
    }




    public function remove($subject_id)
    {

        $post = SubjectModel::where('subject_id',$subject_id);
        $post->delete();
        notify()->success('Successfully Deleted!');
        return redirect('faculty/subject/list');
    }






    public function edit($subject_id)
    {
    $subjects = SubjectModel::findOrFail($subject_id); // Retrieve the product by its ID

    return view('faculty.subject.edit', compact('subjects'));
    }






    public function update($subject_id, Request $request)
    {    
      $request->validate([
        'name' => 'required|unique:subject',
      ], 
      [
          'name.unique' => 'this subject has already created.'
      ]);

         $user = SubjectModel::getSubject($subject_id);
         $user->name = trim($request->name);
         $user->description = trim($request->description);
         $user->save();

         notify()->success('Subject Successfully Updated!');

         return redirect('faculty/subject/list');
    }


}
