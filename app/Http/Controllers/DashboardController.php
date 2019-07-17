<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\Contact;
use App\Reservation;


class DashboardController extends Controller
{
    public function dashboard(){
      $categoryCount=Category::count();
      $itemCount=Item::count();
      $reservation=Reservation::where('status',false)->get();
      $contactCount=Contact::count();
      return view('admin.dashboard',compact('itemCount','categoryCount','contactCount',
      'reservation'));
    }
}
