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
          {{Breadcrumbs::render('profile')}}
          @if (count($profiles)!=0)
          @if (session('status'))
          <div class="alert alert-success">{{session('status')}}</div>
          @endif
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>{{Auth::user()->username}}</h4>
                                <p>{{Auth::user()->email}}</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                          @foreach ($profiles as $item)              
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Fullname</h6>
                                </div>
                                <div class="col-sm-9 ">
                                    <h6 class="mb-0">{{$item->first_name." ".$item->last_name}}</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 ">
                                    <h6 class="mb-0">{{$item->no_hp}}</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 ">
                                    <h6 class="mb-0">{{$item->address}}</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Birth Date</h6>
                                </div>
                                <div class="col-sm-9 ">
                                    <h6 class="mb-0">{{date_format(date_create($item->birth_date), 'd-m-Y')}}</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info" href="{{route('profile.update', $item->account_id)}}">Edit</a>
                                </div>    
                            </div>
                            @endforeach
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