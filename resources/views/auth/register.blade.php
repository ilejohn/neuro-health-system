@extends('layouts.guest')

@section('content')
        <form class="form-login" method="POST" action="{{ route('register') }}">
          @csrf

         <h2 class="form-login-heading font-weight-bold">{{ __('Register') }}</h2>

            <div class="login-wrap">

                <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>

                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                      <br>


                  <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                      <br>


                  <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                          <br>

                  <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                      <br>

                      <button type="submit" class="btn btn-theme btn-block"><i class="fa fa-user-plus"></i>
                          {{ __('Register') }}
                      </button>

            </div>
        </form>
@endsection
