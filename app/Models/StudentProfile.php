<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\getStudentProfile;
use Request;



class StudentProfile extends Model
{
    use HasFactory;

    
    protected $table = 'student_profile';

    protected $primaryKey = 'student_profile_id';


    protected $fillable = [
        'name',
        'last_name',
        'middle_name',
        'email',
        'birthdate',
        'address',
        'grade',
        'age',
        'gender',
        'phone_number',
        'lrn',
    ];
    

    public function user() {
        return $this->belongsTo(User::class);
    }




    static public function getSubject($subject_id)
    {
        return self::find($subject_id);
    }



    static public function getStudentProfile()
    {
       $return = StudentProfile::select('student_profile.*');
                 

                         if(!empty(Request::get('lrn')))
                         {
                                $return = $return->where('lrn','like','%'.Request::get('lrn').'%');
                         }

                         if(!empty(Request::get('name')))
                         {
                                $return = $return->where('name','like','%'.Request::get('name').'%');
                         }

                         if(!empty(Request::get('grade')))
                         {
                                $return = $return->where('grade','like','%' .Request::get('grade'));
                         }

                       
        $return = $return->orderBy('student_profile.student_profile_id','desc')
                         ->paginate(10);

        return $return;
    }

    static public function getSingle($student_profile_id)
    {
        return StudentProfile::find($student_profile_id);
    }



}
