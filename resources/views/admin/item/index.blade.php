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
                           <a href="{{route('item.create')}}" class="btn btn-primary pull-right">Add Item</a>
                         </div>


                           <div class="card-body">
                               <h4 class="card-title">All Items</h4>


                               <div class="table-responsive">
                                   <table class="table color-table info-table table-bordered">
                                       <thead>
                                           <tr>
                                               <th>ID</th>
                                               <th>name</th>
                                               <th>image</th>
                                               <th>Category Name</th>
                                               <th>Description</th>
                                               <th>Price</th>
                                               <th>Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>

                           @foreach($items as  $key=>$item )
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                      <img src="{{URL::to('uploads/item/'.$item->image)}}"  style="height:80px;width:80px;border-radius: 50%;">
                                    </td>
                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->price}}</td>

                                    <td>
                            <a href="{{route('item.edit',$item->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <form id="delete-form-{{ $item->id }}" action="{{route('item.destroy',$item->id)}}" method="POST" style="display:none;">
                              @csrf
                              @method('DELETE')

                            </form>
                        <button type="button" class="btn btn-danger" name="button" onclick="if(confirm('Are you sure? You want to delete this?'))
                        {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $item->id }}').submit();
                        }else{
                          event.preventDefault();
                        }"><i class="fa fa-trash"></i></button>

                                               </td>
                                           </tr>
                                           @endforeach



                                       </tbody>
                                        
                                   </table>

                                   {{$items->Links()}}
                               </div>
                           </div>
                       </div>
                   </div>
    </div>



@endsection
