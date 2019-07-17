<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Notifications\ReservationConfirmed;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index(){
      $reservations=Reservation::paginate(5);
      return view('admin.reservation.index',compact('reservations'));
    }


    public function create()
    {
        return view('admin.reservation.create');
    }


    public function destroy($id)
    {
        $reservation= Reservation::find($id);

        $reservation->delete();

        Toastr::success('Reservation send successfully.we will confirm to you shortly','Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('reservation.index');
        // ->with('successMsg','Reservation Delete successfully!!');
    }

    public function status($id){
      $reservation= Reservation::find($id);
      $reservation->status=true;
      $reservation->save();

      Notification::route('mail',$reservation->email)
            ->notify(new ReservationConfirmed());

      Toastr::success('Reservation send successfully.we will confirm to you shortly','Success', ["positionClass" => "toast-top-center"]);

       return redirect()->route('reservation.index');

    }
}
