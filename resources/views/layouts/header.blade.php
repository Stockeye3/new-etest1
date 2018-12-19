<div id="wrapper" class="animate">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      
      <a class="navbar-brand" href="{{ route('home') }}">E-FoOD</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"
      data-target="#navbarText" aria-controls="navbarText"
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

          @if($user = Auth::user())
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.dashboard', Auth()->user()->id)}}">
                Admin's Dashboard</a>
          </li>
          
        </ul>
        </div>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          
            <li class="nav-item">
            <a class="nav-link" href="{{route('admin.profile')}}">
                Welcome Back Admin {{ Auth()->user()->name }}
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


                        <!-- Authentication Links -->
                    <ul class="navbar-nav">
                        @if (Auth::guard('customer')->check())
                        @include('layouts.header-customer')

                        @elseif(Auth::check())
                        @include('layouts.header-admin')

                        @else 
                        @include('layouts.header-guest')
                        
                        @endif
                    </ul>
            
        
    </nav>
  </div>