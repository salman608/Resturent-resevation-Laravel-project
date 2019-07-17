<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\slider;
use Carbon\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sliders=slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'title'=>'required',
          'sub_title'=>'required',
          'image'=>'required |mimes:jpeg,jpg,png',
        ]);

        $image=$request->file('image');
        $slug=str_slug($request->title);
        if(isset($image))
        {
          $currentData= Carbon::now()->toDateString();
          $imagename=$slug .'-'. $currentData .'-'. uniqid() .'.'.
          $image->getClientOriginalExtension();
          if(!file_exists('uploads/slider')){
              mkdir('uploads/slider',0777,true);
          }
          $image->move('uploads/slider',$imagename);

        }else{
          $imagename='default.png';
          }

    $slider = new slider();
    $slider ->title= $request->title;
    $slider ->sub_title= $request->sub_title;
    $slider ->image= $imagename ;
    $slider->save();
    return redirect()->route('slider.index');

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'title'=>'required',
        'sub_title'=>'required',
        'image'=>'mimes:jpeg,jpg,png',
      ]);

      $image=$request->file('image');
      $slug=str_slug($request->title);
      $slider=slider::find($id);
      if(isset($image))
      {
        $currentData= Carbon::now()->toDateString();
        $imagename=$slug .'-'. $currentData .'-'. uniqid() .'.'.
        $image->getClientOriginalExtension();
        if(!file_exists('uploads/slider')){
            mkdir('uploads/slider',0777,true);
        }
        $image->move('uploads/slider',$imagename);

      }else{
        $imagename=$slider->image;
        }


  $slider ->title= $request->title;
  $slider ->sub_title= $request->sub_title;
  $slider ->image= $imagename ;
  $slider->save();
  return redirect()->route('slider.index')->with('successMsg','Slider update successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider= slider::find($id);
        if(file_exists('uploads/slider/'.$slider->image))
        {
          unlink('uploads/slider/'.$slider->image);
        }

        $slider->delete();
        return redirect()->route('slider.index')->with('successMsg','Slider Delete successfully!!');
    }
}
