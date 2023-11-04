<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RequestFormController;
use App\Http\Controllers\MyRecordController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\EnrollController;  
use App\Http\Controllers\AcceptStudentCrontroller;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\CreateClassRoomController;
use App\Http\Controllers\TotalGradesController;
use App\Http\Controllers\AssignClassController;
use App\Http\Controllers\ClassSubjectController; 
use App\Http\Controllers\AssignClassTeacherController; 


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/',[HomeController::class, 'index'] );

// Route::get('/chooselog', [HomeController::class, 'choose']);


//------------------------Home Route-------------------------//
    Route::get('/', [HomeController::class, 'home']);

    Route::get('home/enroll',[HomeController::class, 'enroll']);

    Route::post('home/enroll',[EnrollController::class, 'enroll']);

    Route::get('/login', [AuthController::class, 'login']);

    Route::post('login', [AuthController::class, 'Authlogin']);

    Route::get('logout', [AuthController::class, 'logout']);




//-------------------------------------------------Admin Route--------------------------------------------//

    Route::group(['middleware' => 'admin'], function (){

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/list', [AdminController::class, 'list']);
    Route::get('admin/add', [AdminController::class, 'add']);
    Route::post('admin/add', [AdminController::class, 'insert']);
    Route::get('admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/remove/{id}', [AdminController::class, 'remove']);
    
//--------------------------------------------Admin Student Route-----------------------------------------//
        
    Route::get('admin/student/list', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']); //Direct To add Page
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']); //Direct To Edit Page
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/list{id}', [StudentController::class, 'remove']);
    

//-------------------------------------------------Admin Class Route--------------------------------------//

    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::post('admin/class/list', [ClassController::class, 'add']);
    Route::post('admin/class/list{id}', [ClassController::class, 'edit']);
    Route::get('admin/class/list{class_id}', [ClassController::class, 'remove']);


    //-------------------------------------------------Admin Class Faculty Route--------------------------------------//

    Route::get('admin/faculty/list', [FacultyController::class, 'list']);
    Route::get('admin/faculty/add', [FacultyController::class, 'add']); //Direct To add Page
    Route::post('admin/faculty/add', [FacultyController::class, 'insert']);
    Route::get('admin/faculty/edit/{id}', [FacultyController::class, 'edit']); //Direct To Edit Page
    Route::post('admin/faculty/edit/{id}', [FacultyController::class, 'update']);
    Route::get('admin/faculty/list{id}', [FacultyController::class, 'remove']);
  

});



//-------------------------------------------------Teacher Account Route-----------------------------------------//

    Route::group(['middleware' => 'teacher'], function (){

    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
    

    Route::get('teacher/MyClassAndSubject/list', [AssignClassTeacherController::class, 'MyClassSubject']);

    Route::get('teacher/MyStudent/list', [StudentController::class, 'MyStudent']);

    Route::get('teacher/grades/list{id}', [TotalGradesController::class, 'student_list_grades']);

    Route::post('teacher/grades/list{id}', [TotalGradesController::class, 'add']);

    Route::post('teacher/addrecord', [TotalGradesController::class, 'addStudentRecord']);
    Route::post('teacher/addgrades', [TotalGradesController::class, 'addStudentGrades']);



    
});



//-------------------------------------------------Student Account Route-----------------------------------------//

    Route::group(['middleware' => 'student'], function (){

    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('student/request/myrequest', [RequestFormController::class, 'my_request']); //as a list

    Route::get('student/request/add', [RequestFormController::class, 'add']); //Direct To add Page

    Route::post('student/request/add', [RequestFormController::class, 'insert']);

    //----------------Student Request Route------------------//
    Route::get('student/request/myrequest/remove{id}', [RequestFormController::class, 'remove_student_side']);
    

    
    

});




//-------------------------------------------------Faculty as Admin Account Route-----------------------------------------//

    Route::group(['middleware' => 'faculty'], function (){

     // request Form
    Route::get('/faculty/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('faculty/request/list', [RequestFormController::class, 'list']);
    Route::get('faculty/request/list{id}', [RequestFormController::class, 'remove']);
    Route::get('faculty/request/list/approved{form_id}', [RequestFormController::class, 'approved']);
    Route::get('faculty/request/list/decline{form_id}', [RequestFormController::class, 'decline']);


     // user student

    Route::get('faculty/student_user/list', [StudentController::class, 'list']);
    Route::get('faculty/student_user/add', [StudentController::class, 'add']); //Direct To add Page
    Route::post('faculty/student_user/add', [StudentController::class, 'insert']);
    Route::get('faculty/student_user/edit/{id}', [StudentController::class, 'edit']); //Direct To Edit Page
    Route::post('faculty/student_user/edit/{id}', [StudentController::class, 'update']);
    Route::get('faculty/student_user/list{id}', [StudentController::class, 'remove']);

     // user faculty as a Admin
     Route::get('faculty/create_schedule/index', [AssignClassController::class, 'show']);
     Route::get('faculty/faculty_user/list', [FacultyController::class, 'list']);
     Route::get('faculty/faculty_user/add', [FacultyController::class, 'add']); //Direct To add Page
     Route::post('faculty/faculty_user/add', [FacultyController::class, 'insert']);
     Route::get('faculty/faculty_user/edit/{id}', [FacultyController::class, 'edit']); //Direct To Edit Page
     Route::post('faculty/faculty_user/edit/{id}', [FacultyController::class, 'update']);
     Route::get('faculty/faculty_user/list{id}', [FacultyController::class, 'remove']);


     // user Teacher as a Admin

    Route::get('faculty/teacher_user/list', [TeacherController::class, 'list']);
    Route::get('faculty/teacher_user/add', [TeacherController::class, 'add']); //Direct To add Page
    Route::post('faculty/teacher_user/add', [TeacherController::class, 'insert']);
    Route::get('faculty/teacher_user/edit/{id}', [TeacherController::class, 'edit']); //Direct To Edit Page
    Route::post('faculty/teacher_user/edit/{id}', [TeacherController::class, 'update']);
    Route::get('faculty/teacher_user/list{id}', [TeacherController::class, 'remove']);


        // Subject
    Route::get('faculty/subject/list', [SubjectController::class, 'list']);
    Route::get('faculty/subject/list{id}', [SubjectController::class, 'remove']);
    Route::post('faculty/subject/list', [SubjectController::class, 'insert']);
    Route::get('faculty/subject/edit{subject_id}', [SubjectController::class, 'edit']);
    Route::post('faculty/subject/edit{subject_id}', [SubjectController::class, 'update']);

     // Enroll
    Route::get('faculty/enroll/list', [EnrollController::class, 'list']);
    Route::get('faculty/enroll/view{id}', [EnrollController::class, 'view']);
    Route::post('faculty/enroll/view{id}', [EnrollController::class, 'update']);
    Route::get('faculty/enroll/fileview{id}', [EnrollController::class, 'fileview']);
    
    //School Year
    Route::get('faculty/school_year/list', [SchoolYearController::class, 'list']);
    Route::post('faculty/school_year/list', [SchoolYearController::class, 'insert']); //In the list page but can you add directly add 
    Route::get('faculty/school_year/list{school_year_id}', [SchoolYearController::class, 'remove']);
    Route::get('faculty/school_year/edit{school_year_id}', [SchoolYearController::class, 'edit']); // Direct to edit page
    Route::post('faculty/school_year/edit{school_year_id}', [SchoolYearController::class, 'update']); // Direct to edit page

    

    //Class
    Route::get('faculty/class/list', [ClassController::class, 'list']);
    Route::post('faculty/class/list', [ClassController::class, 'insert']); //In the list page but can you add directly add 
    Route::get('faculty/class/list{class_id}', [ClassController::class, 'remove']);
    Route::get('faculty/class/edit{class_id}', [ClassController::class, 'edit']); // Direct to edit page
    Route::post('faculty/class/edit{class_id}', [ClassController::class, 'update']); // Direct to edit page



     //Student List
    Route::get('faculty/student/list', [StudentProfileController::class, 'list']);
    Route::get('faculty/student/search', [StudentProfileController::class, 'search']);




     //Accept Student Enrolles
    Route::get('faculty/enroll/accept{id}', [AcceptStudentCrontroller::class, 'accept']);




    //Create class or class room
    Route::get('faculty/create_class/list', [CreateClassRoomController::class, 'list']);
    Route::get('faculty/create_class/add',  [CreateClassRoomController::class, 'add']);
    Route::post('faculty/create_class/add', [CreateClassRoomController::class, 'insert']);



    //Assign Subject to Class
    Route::get('faculty/assign_subject_class/list', [ClassSubjectController::class, 'list']);
    Route::get('faculty/assign_subject_class/add',  [ClassSubjectController::class, 'add']);
    Route::post('faculty/assign_subject_class/add', [ClassSubjectController::class, 'insert']);
    Route::get('faculty/assign_subject_class/remove{id}', [ClassSubjectController::class, 'remove']);
    Route::get('faculty/assign_subject_class/edit{id}', [ClassSubjectController::class, 'edit']);

    

     //Assign Teacher to Class
    Route::get('faculty/assign_class_teacher/list', [AssignClassTeacherController::class, 'list']);
    Route::get('faculty/assign_class_teacher/add',  [AssignClassTeacherController::class, 'add']);
    Route::post('faculty/assign_class_teacher/add', [AssignClassTeacherController::class, 'insert']);
    Route::get('faculty/assign_class_teacher/remove{id}', [AssignClassTeacherController::class, 'remove']);
    Route::get('faculty/assign_class_teacher/edit{id}', [AssignClassTeacherController::class, 'edit']);


    
    Route::get('faculty/grades/list', [TotalGradesController::class, 'list']);
    Route::get('faculty/grades/list_grades{student_profile_id}', [TotalGradesController::class, 'grades_list']);

});