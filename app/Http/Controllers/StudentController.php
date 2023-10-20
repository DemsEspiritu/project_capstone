<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;


class StudentController extends Controller
{
    public function request(){
        
        return view('student.list');
        
    }

  
    public function list()
    {    
      $data['getStudent'] = User::getStudent();
      return view('admin.student.list',compact("data"));
         
    }

    public function add()
    {    
         return view('admin.student.add');
 
    }


    public function insert(Request $request)
    {
      $request->validate([
           'email' => 'required|email|unique:users',
           'name' => 'required|max:50',
           'password' => 'required|max:50'
      ], 
      [
          'email.unique' => 'this email has already been used.'
      ]);
 
     $user = new User;
     $user->name = trim($request->name);
     $user->last_name = trim($request->last_name);
     $user->middle_name = trim($request->middle_name);
     $user->email = trim($request->email);
     $user->birthdate = trim($request->birthdate);
     $user->age = trim($request->age);
     $user->gender = trim($request->gender);
     $user->place_bdate = trim($request->place_bdate);
     $user->address = trim($request->address);
     $user->phone_number = trim($request->phone_number);
     $user->password = Hash::make($request->password);
     $user->user_type = 3;
     $user->save();
 

     notify()->success('Student Successfully Create!');
     return redirect('admin/student/list');
    }



    public function edit($id)
    {    
      $data['getRecord'] = User::getSingle($id);
      if(!empty($data['getRecord']))
      {
           return view('admin.student.edit',compact("data"));
      }
      else
      {
           abort(404);
      }
    }
  
      // ADMIN FUNCTION UPDATE To Admin
      public function update($id, Request $request)
      {    
           request()->validate([
                'email' => 'required|email|unique:users,email,'.$id ,
                'name' => 'required',
 
 
           ],[
                'email.unique' => 'email has already been taken.'
           ]);
 
           $user = User::getSingle($id);
           $user->name = trim($request->name);
           $user->email = trim($request->email);
           if(!empty($request->password))
           {
                $user->password = Hash::make($request->password);
           }
           $user->save();
           notify()->success('Student Successfully Updated!');
           return redirect('admin/student/list');
      }
 


    public function remove($id)
    {

            $post = User::where('id',$id);
            $post->delete();

            notify()->success('Successfully Deleted!');
            return redirect('admin/student/list');

    }

   
}
