<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::user()->user_type == 4 ){

            // $totalAdmin = getAdmin::count();
            // $totalFaculty = getFaculty::count();
            // $totalTeacher = getTeacher::count();
            // $totalStudent = getStudent::count();

            $totalAllUser = User::count();

            $totalTeacher = User::where('user_type', '2')->count(); //teacher
            $totalStudent = User::where('user_type', '3')->count(); //student
            $totalFaculty = User::where('user_type', '4')->count(); //faculty as a admin
            


            return view('faculty.dashboard',compact('totalTeacher','totalStudent','totalFaculty'));
        }

        if(Auth::user()->user_type == 2 ){
            return view('teacher.dashboard');
        }

        if(Auth::user()->user_type == 3 ){
            return view('student.dashboard');
        }

        if(Auth::user()->user_type == 4 ){
            return view('faculty.dashboard');
        }
    }

    
}






