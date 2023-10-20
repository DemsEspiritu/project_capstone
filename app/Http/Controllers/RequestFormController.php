<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestForm;
use App\Models\User;
use Auth;

class RequestFormController extends Controller
{
    public function list()
    {

        $data['getRecord'] = RequestForm::getRecord();

        return view('faculty.request.list',compact("data"));
    }



    public function my_request()//student account page list request
    {    

        $user = Auth::user();

        $getOwnRecord = RequestForm::where('request_by',$user->id)->get();

        // $data['getOwnRecord'] = RequestForm::getOwnRecord()->where('form_id','=',Auth::user()->id);

        // return view ('student.request.mylist', compact('data'));

        return view('student.request.mylist', ['val' => $getOwnRecord]);

    }  

    


        public function add()
        {    
            return view('student.request.add');
        }

        public function insert(Request $request)
        {
            // dd($request->all());
            $save = new RequestForm;
            $save->request_by = Auth::user()->id;
            $save->status= 'In Progress';
            $save->type = $request->type;
            $save->save();
            return redirect('student/request/myrequest')->with('succes', "Request Successfully Sent!");
        }

        public function remove($form_id)
        {
            $post = RequestForm::where('form_id',$form_id);
            $post->delete();
            return redirect('faculty/request/list')->with('succes', "Successfully Deleted!");
        }





        public function approved($form_id )
        {
            $data = RequestForm::find($form_id);

            $data->status = 'Approve';
            
            $data->save();
            notify()->success('The Request Successfully Approved!');
            return redirect('faculty/request/list');

        }


        public function decline($form_id)
        {
            $data = RequestForm::find($form_id);

            $data->status = 'Decline';

            $data->save();
            notify()->success('The Request Successfully Declined!');

            return redirect('faculty/request/list');

        }



        public function remove_student_side($form_id)
        {
            $post = RequestForm::where('form_id',$form_id);
            $post->delete();
            
            notify()->success('Successfully Deleted!');
            return redirect('student/request/myrequest');
        }
}
