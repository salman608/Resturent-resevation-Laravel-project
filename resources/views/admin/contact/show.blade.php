@extends('layouts.admin_layout')

@section('admin_content')

<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Message details</h3>
                </div>

                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('contact.index')}}">All message</a></li>

                    </ol>
                </div>
          </div>

<div class="container-fluid">


          <div class="row">
                  <!-- Column -->
                  <div class="col-lg-4 col-xlg-3 col-md-5">
                      <div class="card"> <img class="card-img" src="/backend/assets/images/background/socialbg.jpg" alt="Card image">
                          <div class="card-img-overlay card-inverse social-profile d-flex ">
                              <div class="align-self-center" style="padding-left: 60px;"> <img src="/backend/assets/images/users/1.jpg" class="img-circle" width="100">
                                  <h4 class="card-title">{{$contact->name}}</h4>
                                  <h6 class="card-subtitle"> <strong style="font-size:15px;">Email:</strong>
                                  {{$contact->email}}</h6>
                                  <h3 class="text-white">Subject</h3>

                                  <p>{{$contact->subject}}</p>
                              </div>
                          </div>
                      </div>

                  </div>
                  <!-- Column -->
                  <!-- Column -->
                  <div class="col-lg-8 col-xlg-9 col-md-7">
                      <div class="card">
                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs profile-tab" role="tablist">
                              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Message</a> </li>

                          </ul>
                          <!-- Tab panes -->
                          <div class="tab-content">
                              <div class="tab-pane active" id="home" role="tabpanel">
                                  <div class="card-body">
                                      <div class="profiletimeline">

                                          <div class="sl-item">
                                              <div class="sl-left"> <img src="/backend/assets/images/users/4.jpg" alt="user" class="img-circle" /> </div>
                                              <div class="sl-right">
                                                  <div><a href="#" class="link">John Doe</a> <span class="sl-date">{{$contact->created_at}}</span>
                                                    
                                                    <hr>
                                                      <blockquote class="m-t-10">
                                                        {{$contact->message}}
                                                      </blockquote>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  </div>
                </div>
                  <!-- Column -->



@endsection
