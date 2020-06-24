<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ __('Reset Password') }}</h4>
            </div>
            <div class="modal-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif

              <form id="reset" method="POST" action="{{ route('password.email') }}">
                  @csrf

                  <div class="form-group">
                      <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>

                          <input name="email" type="email" class="form-control placeholder-no-fix @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                  </div>

                  <hr>
                      <button data-dismiss="modal" class="btn btn-secondary" type="button">Cancel</button>
                      <button class="btn btn-theme" type="submit">{{ __('Send Password Reset Link') }}</button>

              </form>
            </div>

        </div>
    </div>
</div>
