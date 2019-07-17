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
                               <h4 class="card-title">All Reservation</h4>


                               <div class="table-responsive">
                                   <table class="table color-table info-table table-bordered">
                                       <thead>
                                           <tr>
                                               <th>ID</th>
                                               <th>name</th>
                                               <th>Phone</th>
                                               <th>Email</th>
                                               <th>Time&Date</th>
                                               <th>message&Date</th>
                                               <th>status</th>
                                               <th>Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>

                           @foreach($reservations as  $key=>$reservation )
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$reservation->name}}</td>
                                    <td>{{$reservation->phone}}</td>
                                    <td>{{$reservation->email}}</td>
                                    <td>{{$reservation->date_and_time}}</td>
                                    <td>{{$reservation->message}}</td>
                                    <td>
                           @if($reservation->status==true)
                            <span  class="label label-info">Confirmed</span>
                            @else
                            <span  class="label label-danger">NotConfirmed yet</span>

                            @endif
                                    </td>

                                    <td>

            @if($reservation->status==false)

            <form id="status-form-{{ $reservation->id }}" action="{{route('reservation.status',$reservation->id)}}" method="POST" style="display:none;">
              @csrf


            </form>
        <button type="button" class="btn btn-info" name="button" onclick="if(confirm('Are you sure? You want to done this?'))
        {
          event.preventDefault();
          document.getElementById('status-form-{{ $reservation->id }}').submit();
        }else{
          event.preventDefault();
        }"><i class=" mdi mdi-checkbox-marked"></i></button>

            @endif

                            <form id="delete-form-{{ $reservation->id }}" action="{{route('reservation.destroy',$reservation->id)}}" method="POST" style="display:none;">
                              @csrf
                              @method('DELETE')

                            </form>
                        <button type="button" class="btn btn-danger" name="button" onclick="if(confirm('Are you sure? You want to delete this?'))
                        {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $reservation->id }}').submit();
                        }else{
                          event.preventDefault();
                        }"><i class="fa fa-trash"></i></button>

                                               </td>
                                           </tr>
                                           @endforeach

                                           {{$reservations->Links()}}

                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
    </div>



@endsection
