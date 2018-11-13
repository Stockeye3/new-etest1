<li class="nav-item">
    <a class="nav-link" href="#">{{"Welcome Back " . Auth::guard('customer')->user()->fname}}</a>
</li>
<li class="nav-item">
    <a href="" onclick="event.preventDefault();
    document.getElementById('logout-formm').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-formm" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>