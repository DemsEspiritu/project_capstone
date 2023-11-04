<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;
use App\Models\EnrollModel;
use Dotenv\Validator;
use App\Models\ClassModel;
use App\Models\SchoolYearModel;



class EnrollController extends Controller
{
    public function enroll(Request $request)
    {
        $request->validate([
            'lrn' => 'required|max:11',
            'name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'email' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'place_bdate' => 'required',
            'mother_name' => 'required',
            'father_name' => 'required',
            'mother_phone' => 'required',
            'father_phone' => 'required',
            'grade' => 'required',
           

          ],[

            'sex' => 'Please select gender.',
            'lrn' => 'This LRN number is already used.',
            'email' => 'This Email is already used.',
            
       ]);
 
        $user = new EnrollModel;

        //file handling
       $file = $request->file;
       $filename = time().'.'.$file->getClientOriginalExtension();
       $request->file->move('assets',$filename);
       $user->file=$filename;

       //student side handling
        $user->lrn = trim($request->lrn);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->middle_name = trim($request->middle_name);
        $user->email = trim($request->email);
        $user->birthdate = trim($request->birthdate);
        $user->address = trim($request->address);
        $user->age = trim($request->age);
        $user->gender = trim($request->gender);
        $user->phone_number = trim($request->phone_number);
        $user->place_bdate = trim($request->place_bdate);
        $user->user_type = 3;
        $user->grade = trim($request->grade);
        $user->status = 'Unofficial';
        //parents side 
        $user->mother_name = trim($request->mother_name);
        $user->mother_phone = trim($request->mother_phone);
        $user->father_name = trim($request->father_name);
        $user->father_phone = trim($request->father_phone);
        $user->ext_name = trim($request->ext_name);
        $user->save();



        $ch = curl_init();
        $parameters = array(
            'apikey' => 'd87d7a78783f4ea53fbc6b11682d0a79', //Your API KEY d87d7a78783f4ea53fbc6b11682d0a79
            'number' => $user->phone_number,
            'message' => 'Your enrollment has been successfully submitted. Wait for further update regarding your enrollment status.',
            'sendername' => 'SEMAPHORE'
        );
        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );
        
        //Send the parameters set above with the request
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
        
        // Receive response from server
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);
        
        //Show the server response
        echo $output;
        
        notify()->success('Submit Form Success!');
     return redirect('home/enroll');
    }



    public function list()
    {    
      
      $enrolls = EnrollModel::all();

      return view('faculty.enroll.list',compact("enrolls"));
         
    }

    public function view($id)
    {
    $enroll = EnrollModel::findOrFail($id); // Retrieve the product by its ID
    $enroll['getClass'] = ClassModel::getClass();
    $enroll['getSchoolYearForAssign'] = SchoolYearModel::all();

    return view('faculty.enroll.view', compact('enroll'));
    }




    public function update($id, Request $request)
    {    


                $user = EnrollModel::findOrFail($id);
                $user->lrn = trim($request->lrn);
                $user->name = trim($request->name);
                $user->last_name = trim($request->last_name);
                $user->middle_name = trim($request->middle_name);
                $user->email = trim($request->email);
                $user->address = trim($request->address);
                $user->age = trim($request->age);
                $user->gender = trim($request->gender);
                $user->phone_number = trim($request->phone_number);
                $user->place_bdate = trim($request->place_bdate);
                $user->grade = trim($request->grade);
                $user->class_id = $request->class_id;
                $user->school_year_id = $request->school_year_id;
                $user->mother_name = trim($request->mother_name);
                $user->father_name = trim($request->father_name);
                $user->mother_phone = trim($request->mother_phone);
                $user->father_phone = trim($request->father_phone);
                $user->status = 'Ready to Accept';
                $user->save();
      


         notify()->success('Update Form Success!');
         
   
         return redirect('faculty/enroll/list');
    }





    public function fileview($id)
    {
      $data = EnrollModel::find($id);

      return view('faculty.enroll.fileview', compact('data'));
    }


    
}
