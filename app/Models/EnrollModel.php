<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollModel extends Model
{
    use HasFactory;


    protected $table = 'enroll_request';

    protected $primaryKey = 'id';



    //sholl all the data
    static public function getSubject($id)
    {
        return self::find($id);
    }


}
