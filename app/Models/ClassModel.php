<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\TabCompletion\Matcher\FunctionsMatcher;
use Request;


class ClassModel extends Model
{
    use HasFactory;


    protected $table = 'class';

    protected $primaryKey = 'class_id';


    static public function getSingle($class_id)
    {
        return self::find($class_id);
    }

    


    static public function getClass()
    {
        $return = ClassModel::select('class.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'class.created_by');

            //This is for Search
            if (!empty(Request::get('name')))
                         {
                                $return = $return->where('class.name','like','%'.Request::get('name').'%');
                         }

            if (!empty(Request::get('date')))
                         {
                                $return = $return->whereDate('class.created_at','=', Request::get('date'));
                         }
            //End Search

             $return = $return->orderBy('class.class_id', 'desc')
            ->paginate(7);

            return $return;
    }



}
