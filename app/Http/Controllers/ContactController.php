<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Contact;

class ContactController extends Controller
{
    public function sendMessage(Request $request){
      $this->validate($request,[
        'name'=>'required',
        'email'=>'required | email',
        'subject'=>'required',
        'message'=>'required'
      ]);

        $contact=new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->subject=$request->subject;
        $contact->message=$request->message;
        $contact->save();
        Toastr::success('your message successfully send','success', ["positionClass" => "toast-top-right"]);
        return view('welcome');


    }
}
