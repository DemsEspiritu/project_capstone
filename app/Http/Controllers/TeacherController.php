<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class TeacherController extends Controller
{
    public function request(){
        
        return view('teacher.list');
        
    }

  
    public function list()
    {    
      $data['getTeacher'] = User::getTeacher();
      return view('admin.teacher.list',compact("data"));
         
    }

    public function add()
    {    
         return view('admin.teacher.add');
 
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
     $user->email = trim($request->email);
     $user->password = Hash::make($request->password);
     $user->user_type = 2;
     $user->save();
     notify()->success('Teacher Successfully Create!');
     return redirect('admin/teacher/list');
    }



    public function edit($id)
    {    
      $data['getRecord'] = User::getSingle($id);
      if(!empty($data['getRecord']))
      {
           return view('admin.teacher.edit',compact("data"));
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
 
           notify()->success('Teacher Successfully Updated!');
           return redirect('admin/teacher/list');
      }
 


    public function remove($id)
    {

            $post = User::where('id',$id);
            $post->delete();
            notify()->success('Successfully Deleted!');
            return redirect('admin/teacher/list');

    }
}
