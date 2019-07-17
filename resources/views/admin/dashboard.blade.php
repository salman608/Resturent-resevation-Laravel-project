@extends('layouts.admin_layout')
@section('admin_content')

  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">Dashboard</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
          </ol>
      </div>
      <div>
          <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
      </div>
  </div>

   <div class="container-fluid">
     <div class="card-group">
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-12">
                                 <h2 class="m-b-0"><i class="mdi mdi-briefcase-check text-info"></i></h2>
                                 <h3 class=""></h3>
                                 <h6 class="card-subtitle">Category</h6></div>
                             <div class="col-12">
                                 <div class="progress">
                                     <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Column -->
                 <!-- Column -->
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-12">
                                 <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success"></i></h2>
                                 <h3 class=""></h3>
                                 <h6 class="card-subtitle">Item</h6></div>
                             <div class="col-12">
                                 <div class="progress">
                                     <div class="progress-bar bg-success" role="progressbar" style="width: 40%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Column -->
                 <!-- Column -->
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-12">
                                 <h2 class="m-b-0"><i class="mdi mdi-comment-processing"></i></h2>
                                 <h3 class=""></h3>
                                 <h6 class="card-subtitle">Total Contact</h6></div>
                             <div class="col-12">
                                 <div class="progress">
                                     <div class="progress-bar bg-primary" role="progressbar" style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Column -->
                 <!-- Column -->
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-12">
                                 <h2 class="m-b-0"><i class="mdi mdi-buffer text-warning"></i></h2>
                                 <h3 class=""></h3>
                                 <h6 class="card-subtitle">Total Reservation</h6></div>
                             <div class="col-12">
                                 <div class="progress">
                                     <div class="progress-bar bg-warning" role="progressbar" style="width: 26%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

   </div>

@endsection
