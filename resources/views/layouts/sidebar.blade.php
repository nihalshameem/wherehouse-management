<!-- Sidebar -->
<nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <div class="sidebar-header">
            <div class="sidebar-brand">
            @if (Auth::check())
                <a href="{{ url('/') }}">
                    <span class="logo-letter">{{ substr(auth()->user()->name,0,1) }}</span>
                    <span>{{ auth()->user()->name }}</span>
                </a>
            @endif
            </div>
        </div>
        <li><a class="home" href="{{ url('/home') }}">Dashboard</a></li>
        <li><a class="purchase-order" href="{{ url('purchase-order') }}">Purchase
                Order</a>
        </li>
        <li><a class="receipt" href="{{ url('receipt') }}">Receipts</a></li>
        <li><a class="consumption" href="{{ url('consumption') }}">Consumptions</a></li>
        <li><a class="shifting" href="{{ url('shifting') }}">Shiftings</a></li>
        <li><a class="opening" href="{{ url('opening') }}">Opening</a></li>
        <li><a class="report" href="{{ url('report') }}">Report</a></li>
        @if (Auth::check())
  <li><a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
        </li>
@endif
        {{-- dropdown --}}
        {{-- <li class="dropdown">
            <a href="#works" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
            <ul class="dropdown-menu animated fadeInLeft" role="menu">
                <div class="dropdown-header">Dropdown heading</div>
                <li><a href="#" class="pictures">Pictures</a></li>
                <li><a href="#" class="videos">Videeos</a></li>
                <li><a href="#" class="books">Books</a></li>
                <li><a href="#" class="art">Art</a></li>
                <li><a href="#" class="awards">Awards</a></li>
            </ul>
        </li> --}}
    </ul>
</nav>
