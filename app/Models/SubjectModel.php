<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubjectModel;

class SubjectModel extends Model
{
    use HasFactory;


    protected $table = 'subject';

    protected $primaryKey = 'subject_id';
    




    public function showData() {
        $data = SubjectModel::all(); // Replace with your actual query to fetch data
        return view('faculty.subject.list', compact('data'));
    }
}
