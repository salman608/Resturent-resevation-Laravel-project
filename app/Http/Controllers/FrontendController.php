<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;
use App\Item;
use App\Category;

class FrontendController extends Controller
{
  public function index(){
    $sliders=slider::all();
    $items=Item::all();
    $categories=Category::all();
    return view('welcome',compact('sliders','categories','items'));
  }
}
