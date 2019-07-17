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
   <a href="{{route('category.create')}}" class="btn btn-primary pull-right">Add Category</a>
 </div>


 <div class="card-body">
   <h4 class="card-title">All Category</h4>


   <div class="table-responsive">
     <table class="table color-table info-table table-bordered">
       <thead>
         <tr>
           <th>ID</th>
           <th>name</th>
           <th>Slug</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody>

         @foreach($categories as  $key=>$categorie )
         <tr>
          <td>{{$key +1}}</td>
          <td>{{$categorie->name}}</td>
          <td>{{$categorie->slug}}</td>
          <td>
            <a href="{{route('category.edit',$categorie->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            <form id="delete-form-{{ $categorie->id }}" action="{{route('category.destroy',$categorie->id)}}" method="POST" style="display:none;">
              @csrf
              @method('DELETE')

            </form>
            <button type="button" class="btn btn-danger" name="button" onclick="if(confirm('Are you sure? You want to delete this?'))
            {
              event.preventDefault();
              document.getElementById('delete-form-{{ $categorie->id }}').submit();
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
