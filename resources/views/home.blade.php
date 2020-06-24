@extends('layouts.app')

@section('content')
  <div class="container col-8">
     <div class="card mt-2">
       <div class="card-header">Dashboard</div>
          <div class="card-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
              <h5 class="card-title"><a href="/users/{{$user->id}}">My Profile</a></h5>
              <p class="card-text">
                Welcome {{$user->name}}!
              </p>
              @status('user')
                <a href="/users/{{$user->id}}/register" class="btn btn-primary">Register as Patient</a>
              @else 
                
              @endstatus
              
          </div>
        </div>
  </div>
@endsection
