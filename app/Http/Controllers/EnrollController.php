<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;
use App\Models\EnrollModel;
use Dotenv\Validator;

class EnrollController extends Controller
{
    public function enroll(Request $request)
    {
        $request->validate([
            'lrn' => 'required|max:20',
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
            'user_type' => 'required',      

          ],[
            'user_type' => 'The type is required.',
            'sex' => 'Please select gender.',
            'lrn' => 'This LRN number is already used.',
            'email' => 'This Emaail is already used.',
            
       ]);
 
        $user = new EnrollModel;
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
        $user->user_type = trim($request->user_type);
        $user->grade = trim($request->grade);
        $user->status = 'Unofficial';
        $user->save();



        $ch = curl_init();
        $parameters = array(
            'apikey' => 'd87d7a78783f4ea53fbc6b11682d0a79', //Your API KEY
            'number' => $user->phone_number,
            'message' => 'Your enrollment has been successfully submitted. wait for a message to know that you are officially enrolled.',
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


    
}
