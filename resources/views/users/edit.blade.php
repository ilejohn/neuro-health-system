@extends('layouts.app')

@section('content')
@self($user)
 <form class="form-login" method="POST" action="{{ route('edit',['id'=>$user->id]) }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  
    <h2 class="form-login-heading font-weight-bold"><i class="fa fa-edit"></i> {{ __('Edit Profile') }}</h2>

      <div class="login-wrap">

      @if($errors->count())
        @foreach ($errors->all() as $error)
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
           <strong>{{ $error }}</strong>
        </div>
        @endforeach
      @endif

        <div class="d-flex justify-content-center mb-1">
          <img src="{{ asset('storage/images/'.$user->image) }}" width="90" alt="profilePic" class="rounded">
        </div>
         
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="image" name="image">
          <label class="custom-file-label" for="image">Choose Image</label>
        </div>

        <br>

        <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>

          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?: $user->name}}" required autocomplete="name">


          <br>


          <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?: $user->email}}" required autocomplete="email">


          <br>

          <label for="address" class="col-form-label text-md-right">{{ __('Address') }}</label>
          
          <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?: $user->address}}" autocomplete="address" rows="3" style="resize: none;"></textarea>
              <!--input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?: $user->address}}" required autocomplete="address"-->


           <br>

          <label for="city" class="col-form-label text-md-right">{{ __('City') }}</label>

          <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') ?: $user->city}}" autocomplete="city">


          <br>

          <label for="country" class="col-form-label text-md-right">{{ __('Country') }}</label>

          <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') ?: $user->country}}" autocomplete="country">


          <br>

          <label for="phoneNumber" class="col-form-label text-md-right">{{ __('Phone Number') }}</label>

          <input id="phoneNumber" type="tel" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') ?: $user->phoneNumber}}">

          <br>

          <button type="submit" class="btn btn-theme btn-block">
              {{ __('Submit') }}
          </button>

      </div>
 </form>
 @else 
@include('layouts.unauthorise')
 @endself
@endsection
