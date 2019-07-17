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



                           <div class="card-body">
                               <h4 class="card-title">All Contact Message</h4>


                               <div class="table-responsive">
                                   <table class="table color-table info-table table-bordered">
                                       <thead>
                                           <tr>
                                               <th>ID</th>
                                               <th>Name</th>

                                               <th>Subject</th>

                                               <th>Send At</th>
                                               <th>Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>

                           @foreach($contact as  $key=>$contact )
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$contact->name}}</td>

                                    <td>{{$contact->subject}}</td>

                                    <td>{{$contact->created_at}}</td>
                                    <td>
                                      <a href="{{route('contact.show',$contact->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                      <form id="delete-form-{{ $contact->id }}" action="{{route('contact.destroy',$contact->id)}}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')

                                      </form>
                                  <button type="button" class="btn btn-danger" name="button" onclick="if(confirm('Are you sure? You want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $contact->id }}').submit();
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
