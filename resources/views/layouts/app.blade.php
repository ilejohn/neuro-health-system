<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet">
    @stack('styles')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header header-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>

            <!--logo start-->      
            <a href="{{ url('/') }}" class="logo">{{ config('app.name', 'Laravel') }}</a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">

            </div>
            <div class="top-menu mt-3 mb-3">
            	<ul class="nav pull-right top-menu">
                @guest
                    <li>
                        <a class="logout" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a class="logout" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="dropdown">
                        <a id="navbarDropdown" class="logout dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="logout dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu mb-4" id="nav-accordion">
              <h3 class="centered text-white"><i class="fa fa-user-circle"></i> {{ucfirst(auth()->user()->status)}}</h3>
              	  <p class="centered"><a href="/users/{{auth()->user()->id}}"><img src="{{ asset('storage/images/'.auth()->user()->image) }}" alt="profilePic" class="rounded-circle" style="height:100px; width:100px;" width="60"></a></p>
                    <h5 class="centered">{{auth()->user()->name}}</h5>
                @status('admin')
                  <li class="sub-menu mt">
                      <a href="/admin">
                          <i class="fa fa-dashboard"></i>
                          <span>Admin Dashboard</span>
                      </a>
                  </li>
                @endstatus
                <li class="sub-menu">
                      <a href="/users/{{auth()->user()->id}}" >
                          <i class="fa fa-user"></i>
                          <span>User Profile</span>
                      </a>
                  </li>
                @status('admin|researcher')
                  <li class="sub-menu">
                      <a href="/patients" >
                          <i class="fa fa-list"></i>
                          <span>Patient List</span>
                      </a>
                  </li>
                @endstatus
                @status('user')
                <li class="sub-menu">
                      <a href="/users/{{auth()->user()->id}}/register" >
                          <i class="fa fa-book"></i>
                          <span>Register Patient</span>
                      </a>
                </li>
                @endstatus
                @status('admin|researcher')
                <li class="sub-menu">
                      <a href="/users/register" >
                          <i class="fa fa-user-plus"></i>
                          <span>Register Patient</span>
                      </a>
                </li>
                @endstatus
                @status('researcher')
                <li class="sub-menu">
                      <a href="/email" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Contact Admin</span>
                      </a>
                </li>
                @endstatus
                @status('admin')
                <li class="sub-menu">
                      <a href="/users" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                </li>
                <li class="sub-menu">
                      <a href="#" >
                          <i class=" fa fa-file"></i>
                          <span>Download Report</span>
                      </a>
                </li>
                <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-info-circle"></i>
                          <span>Prescriptions</span>
                      </a>
                </li>
                @endstatus
                @status('patient')
                <li class="sub-menu">
                      <a href="/patients/{{auth()->user()->id}}" >
                          <i class="fa fa-th"></i>
                          <span>View Record</span>
                      </a>
                </li>
                @endstatus
                </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              @yield('content')
		      </section> <!--wrapper-->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2019 - 08162868048
              <a href="#main-content" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>

    
    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
     @stack('scripts')
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  </body>
</html>