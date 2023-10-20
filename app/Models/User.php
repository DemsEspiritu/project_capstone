<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;
use App\Models\StudentProfie;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'middle_name',
        'email',
        'password',
        'birthdate',
        'address',
        'age',
        'gender',
        'phone_number',
        'place_bdate',
        'user_type',
        'lrn',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    static public function getAdmin()
    {
       $return = User::select('users.*')
                         ->where('user_type','=',1);

                         if(!empty(Request::get('name')))
                         {
                                $return = $return->where('name','like','%'.Request::get('name').'%');
                         }

                         if(!empty(Request::get('email')))
                         {
                                $return = $return->where('email','like','%'.Request::get('email').'%');
                         }

                         if(!empty(Request::get('date')))
                         {
                                $return = $return->whereDate('created_at','=', Request::get('date'));
                         }
        $return = $return->orderBy('id','desc')
                         ->paginate(2);

        return $return;
    }




    static public function getStudent()
    {
       $return = User::select('users.*')
                         ->where('users.user_type','=',3);

                         if(!empty(Request::get('name')))
                         {
                                $return = $return->where('name','like','%'.Request::get('name').'%');
                         }

                         if(!empty(Request::get('email')))
                         {
                                $return = $return->where('email','like','%'.Request::get('email').'%');
                         }

                         if(!empty(Request::get('date')))
                         {
                                $return = $return->whereDate('created_at','=', Request::get('date'));
                         }

                       
        $return = $return->orderBy('users.id','desc')
                         ->paginate(5);

        return $return;
    }


    static public function getFaculty()
    {
       $return = User::select('users.*')
                         ->where('users.user_type','=',4);

                         if(!empty(Request::get('name')))
                         {
                                $return = $return->where('name','like','%'.Request::get('name').'%');
                         }

                         if(!empty(Request::get('email')))
                         {
                                $return = $return->where('email','like','%'.Request::get('email').'%');
                         }

                         if(!empty(Request::get('date')))
                         {
                                $return = $return->whereDate('created_at','=', Request::get('date'));
                         }

                       
        $return = $return->orderBy('users.id','desc')
                         ->paginate(5);

        return $return;
    }


    static public function getTeacher()
    {
       $return = User::select('users.*')
                         ->where('users.user_type','=',2);

                         if(!empty(Request::get('name')))
                         {
                                $return = $return->where('name','like','%'.Request::get('name').'%');
                         }

                         if(!empty(Request::get('email')))
                         {
                                $return = $return->where('email','like','%'.Request::get('email').'%');
                         }

                         if(!empty(Request::get('date')))
                         {
                                $return = $return->whereDate('created_at','=', Request::get('date'));
                         }

                       
        $return = $return->orderBy('users.id','desc')
                         ->paginate(5);

        return $return;
    }

    static public function getSingle($id)
    {
        return User::find($id);
    }



    public function profile() {
       return $this->hasOne(Profile::class);
   }
 
}
