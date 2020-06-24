@extends('layouts.app')

@section('content')
<div class="container col-8">
    <div class="card mt-2 h-100">
        <div class="card-header">Profile
            @self($user)
            <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-info pull-right">Edit</a>
            @endself
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p><img src="{{ asset('storage/images/'.$user->image) }}" alt="profilePic" class="rounded-circle" width="60"></p>

              <div class="col-md-11">
                <div class="card-block">
                  <span><strong>Full name:</strong>{{$user->name}}</span><br>
                  <span><strong>Phone no:</strong> {{$user->phoneNumber}}</span><br>
                  <span><strong>Email:</strong>{{$user->email}}</span><br>
                  <span><strong>Contact Address:</strong>{{$user->address}}</span><br>
                  <span><strong>City:</strong>{{$user->city}}</span><br>
                  <span><strong>Country:</strong>{{$user->country}}</span><br>
                </div>
               </div>

        </div>
    </div>
</div>
@endsection
