<div id="wrapper" class="animate">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      
      <a class="navbar-brand" href="{{ route('home') }}">E-FoOD</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav animate side-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          @if($user = Auth::user() )
          <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">Admin's Dashboard</a>
          </li>
          
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          
            <li class="nav-item">
            <a class="nav-link" href="admin/{{ Auth()->user()->id }}/profile"> Welcome Back Admin {{ Auth()->user()->name }}
              <span class="sr-only">(current)</span>
            </a>
          
          </li>
               <li class="nav-item">
            <a class="nav-link" href="#"> |
              <span class="sr-only">(current)</span>
            </a>
          </li>
          </ul>
@endif

<ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @if (Auth::guard('customer')->check())
                        <li class="nav-item">
                                <a class="nav-link" href="#">{{"Welcome Back " . Auth::guard('customer')->user()->fname}}</a>
                            </li>
                        <li class="nav-item">
                        <a href=""
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                                    
                        @else 
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Admin Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.login') }}">{{ __('Customer Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.register') }}">{{ __('Customer Register') }}</a>
                            </li>
                            <!-- <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li> -->
                        @endif

                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <!-- <a class="dropdown-item" href="/users/{{Auth()->user()->id}}"> Show Profile </a> -->

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        
                        @endauth
                    </ul>
            
        
    </nav>
  </div>