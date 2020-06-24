@extends('layouts.app')

@section('content')
<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-md-8">
      <div class="card h-100">
        <div class="card-header card-header-success">
          <div class="row">
            <div class="col-2">
              <h4>Profile</h4>
            </div>
            <div class="col-2 offset-8">
              @self($user)
                <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-primary float-right">Edit</a>
              @endself
            </div>
          </div>
          
        </div>
        <div class="card-body">
            @include('layouts.message')
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label class="bmd-label-floating">Name:</label>
                  <input type="text" class="form-control" value="{{$user->name}}" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Email Address:</label>
                  <input type="text" class="form-control" value="{{$user->email}}" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Address:</label>
                  <input type="text" class="form-control" value="{{$user->address}}" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">City:</label>
                  
                  <input type="text" class="form-control" value="{{$user->city}}" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Country:</label>
                  <input type="text" class="form-control" value="{{$user->country}}" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Phone Number:</label>
                  
                  <input type="text" class="form-control" value="{{$user->phoneNumber}}" disabled>
                </div>
              </div>
            </div>
          
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100">
         <img class="card-img-top rounded-circle mx-auto d-block mt-1" src="{{ asset('storage/images/'.$user->image) }}" style="height:200px; width:200px;" alt="profilePic"/>
      <div class="card-body">
          <h6 class="text-info">{{ucfirst($user->status)}}</h6>
          <h4 class="card-title">{{$user->name}}</h4>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('styles')
    <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet"/>  
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.1') }}" type="text/javascript"></script>
@endpush