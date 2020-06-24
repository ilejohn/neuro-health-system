<header class="header" id="header">
  <div>
    <div class="header_nav" id="header_nav_pin">
      <div class="header_nav_inner">
        <div class="header_nav_container">
          <div class="container">
            <div class="row">

                <div class="header_nav_content d-flex flex-row align-items-center justify-content-start">
                  <nav class="main_nav">
                    <ul class="d-flex flex-row align-items-center justify-content-start">
                      <li><a href="/home">Home</a></li>
                      <li><a href="/about">About BrainApp</a></li>
                      <li><a href="/services">Services</a></li>
                      <li><a href="#">Contact</a></li>
                    </ul>
                  </nav>
                  </div>
                  <div class="header_nav_content d-flex flex-row align-items-center justify-content-end ml-auto">
                    <nav class="main_nav">
                      <ul class="d-flex flex-row align-items-center justify-content-end">
                        @if (Route::has('login'))
                          @auth
                              <li><a href="{{ url('/home') }}">Home</a></li>
                          @else
                              <li><a href="{{ route('login') }}">Login</a></li>
                              @if (Route::has('register'))
                              <li><a href="{{ route('register') }}">Register</a></li>
                              @endif
                          @endauth
                        @endif
                      </ul>
                    </nav>
                  </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
