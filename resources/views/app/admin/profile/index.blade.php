@extends('app.admin.layout.master')

@section('title')
    : My Profile
@endsection

@section('custom_css')
<style>

</style>
@endsection

@section('content')
<div class="container">
    <div class="main-body">    
          {{-- <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb --> --}}
          {{Breadcrumbs::render('profile')}}
          @if (count($profiles)!=0)
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>John Doe</h4>
                      <p class="mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                      {{-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 ">
                      <h6 class="mb-0">{{Auth::user()->username}}</h6>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Fullname</h6>
                    </div>
                    <div class="col-sm-9 ">
                        <h6 class="mb-0">Jhon Doe</h6>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 ">
                        <h6 class="mb-0">{{Auth::user()->email}}</h6>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 ">
                        @if (Auth::user()->no_hp)
                            <h6 class="mb-0">{{Auth::user()->no_hp}}</h6>    
                        @else
                            <h6 class="mb-0">-</h6>    
                        @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 ">
                        <h6 class="mb-0">Majalaya, Jawa Barat, Indonesia</h6>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @else
              <h1>{{Auth::user()->username}} belum punya profile <i class="mdi mdi-emoticon-sad"></i></h1>
              <h6><a class="text-link" href="{{route('profile.create')}}">klik disini</a> untuk membuat profile</h6>
          @endif
        </div>
    </div>
@endsection