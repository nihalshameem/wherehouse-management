<!-- Sidebar -->
<nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <div class="sidebar-header">
            <div class="sidebar-brand">
                <a href="{{ url('/') }}">
                    <span class="logo-letter">{{ auth()->user()->name }}[0]</span>
                    <span>{{ auth()->user()->name }}</span>
                </a>
            </div>
        </div>
        <li><a class="home" href="{{ url('/home') }}">Dashboard</a></li>
        <li><a class="receipt" href="{{ url('receipt') }}">Receipts</a></li>
        <li><a class="consumption" href="{{ url('consumption') }}">Consumptions</a></li>
        <li><a class="shifting" href="{{ url('shifting') }}">Shiftings</a></li>
        <li><a class="purchase-order" href="{{ url('purchase-order') }}">Purchase
                Order</a>
        </li>
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
