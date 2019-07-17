@extends('layouts.admin_layout')

@section('admin_content')

  <div class="row">
                   <div class="col-lg-12">
  @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif

   @if(session('successMsg'))

<div class="alert alert-dismissible alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>Well done!</strong> {{session('successMsg')}}

</div>
@endif

                       <div class="card">
                         <div class="card-header">
                           <a href="{{route('slider.create')}}" class="btn btn-primary pull-right">Add Slider</a>
                         </div>


                           <div class="card-body">
                               <h4 class="card-title">All Slider</h4>


                               <div class="table-responsive">
                                   <table class="table color-table info-table table-bordered">
                                       <thead>
                                           <tr>
                                               <th>ID</th>
                                               <th>Title</th>
                                               <th>Sub Title</th>
                                               <th>Image</th>
                                               <th>Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>

                           @foreach($sliders as  $key=>$slider )
                                <tr>


                                    <td>{{$key +1}}</td>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->sub_title}}</td>
                                    <td>
                                      <img src="{{URL::to('uploads/slider/'.$slider->image)}}"  style="height:80px;width:80px;border-radius: 50%;">
                                    </td>

                                    <td>
                            <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <form id="delete-form-{{ $slider->id }}" action="{{route('slider.destroy',$slider->id)}}" method="POST" style="display:none;">
                              @csrf
                              @method('DELETE')

                            </form>
                        <button type="button" class="btn btn-danger" name="button" onclick="if(confirm('Are you sure? You want to delete this?'))
                        {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $slider->id }}').submit();
                        }else{
                          event.preventDefault();
                        }"><i class="fa fa-trash"></i></button>

                                               </td>
                                           </tr>
                                           @endforeach

                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
    </div>



@endsection
