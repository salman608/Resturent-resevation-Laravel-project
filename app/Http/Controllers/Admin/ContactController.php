<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Contact;

class ContactController extends Controller
{
    public function index(){
      $contact=Contact::all();
      return view('admin.contact.index',compact('contact'));
    }

    public function show($id){
        $contact=Contact::find($id);
        return view('admin.contact.show',compact('contact'));
    }

    public function destroy($id){
        $contact=Contact::find($id);
        $contact->delete();
        Toastr::success('your message successfully send','success', ["positionClass" => "toast-top-right"]);
        return view('admin.contact.index');
    }
}
