@extends('layouts.guest')

@section('content')
  <form class="form-login" method="POST" action="{{ route('login') }}">
    @csrf

    <h2 class="form-login-heading">{{ __('Login') }}</h2>

    <div class="login-wrap">
      <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          @error('email')
            <div class="alert alert-danger alert-dismissible" role="alert" style="margin-top:5px">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <strong>{{ $message }}</strong>
              </div>
          @enderror

        <br>

        <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <div class="alert alert-danger alert-dismissible" role="alert" style="margin-top:5px">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        <br>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        <label class="checkbox">
            <span class="pull-right">
              @if (Route::has('password.request'))
                   <a data-toggle="modal" href="/login#myModal">{{ __('Forgot Your Password?') }}</a>
              @endif

            </span>
        </label>

        <button type="submit" class="btn btn-theme btn-block"><i class="fa fa-lock"></i>
            {{ __('Login') }}
        </button>
        <hr>

        <div class="registration">
            Don't have an account yet?<br/>
            <a class="" href="/register">
                Create an account
            </a>
        </div>

    </div>

  </form>

  <!-- Modal -->
    @include('auth.login-modal')
  <!-- modal -->
@endsection
