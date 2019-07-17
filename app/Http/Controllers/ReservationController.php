<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use App\Reservation;

class ReservationController extends Controller
{
    public function reserve(Request $request){
      $this->validate($request,[
        'name'=>'required',
        'phone'=>'required',
        'email'=>'required | email',
        'date_and_time'=>'required'

      ]);

      $reservation=new Reservation();
      $reservation->name=$request->name;
      $reservation->phone=$request->phone;
      $reservation->email=$request->email;
      $reservation->date_and_time=$request->date_and_time;
      $reservation->message=$request->message;
      $reservation->status=false;
      $reservation->save();
      Toastr::success('Reservation send successfully.we will confirm to you shortly','success', ["positionClass" => "toast-top-right"]);
      return view('welcome');


    }
}
