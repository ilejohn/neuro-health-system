@extends('layouts.app')
@section('content')
@auth
@status('admin|researcher')

  <div class="container col-8">
     <div class="card mt-4">
       <div class="card-header">Select User to Register</div>
          <div class="card-body">
              <h4 class="card-title">Users</h4>
              <p class="card-text">
                @if ($users->count())
                <select class="form-control" onchange="location = this.value;" required>
                        <option>...</option>
                    @foreach ($users as $user)
                        <option value="/users/{{$user->id}}/register">{{$user->name}}</option> 
                    @endforeach
                </select>  
                @else
                   <h3 class="ml-2 text-info">No User Available for Registeration!</h3> 
                @endif
                
              </p> 
          </div>
        </div>
  </div>
    
@else 
 @include('layouts.unauthorise')
@endstatus
@endauth
@endsection