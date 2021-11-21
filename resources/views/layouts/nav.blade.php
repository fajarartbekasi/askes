<nav class="navbar navbar-expand-md navbar-light navbar-laravel shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav d-flex justify-content-bettwen ">
                    <li class="nav-item text-secondary">
                        <a href="{{route('home')}}" class="nav-link">Home</a>
                    </li>
                @role('admin')
                    <li class="nav-item text-secondary">
                        <a href="{{route('categori')}}" class="nav-link">Kategori</a>
                    </li>
                    <li class="nav-item text-secondary">
                        <a href="{{route('produk')}}" class="nav-link">Produk</a>
                    </li>
                    <li class="nav-item text-secondary">
                        <a href="{{route('pembelian')}}" class="nav-link">Pembelian</a>
                    </li>
                    <li class="nav-item text-secondary">
                        <a href="{{route('pengajuan')}}" class="nav-link">Pengajuan</a>
                    </li>
                    <li class="nav-item text-secondary">
                        <a href="{{route('invite')}}" class="nav-link">Invite</a>
                    </li>
                @endrole
                @role('user')
                    <li class="nav-item text-secondary">
                        <a href="{{route('cart.show')}}" class="nav-link">Cart</a>
                    </li>
                    <li class="nav-item text-secondary">
                        <a href="{{route('user.pembelian')}}" class="nav-link">Belanjaan</a>
                    </li>
                    <li class="nav-item text-secondary">
                        <a href="{{route('user.invoice')}}" class="nav-link">Invoice</a>
                    </li>
                @endrole
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
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

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>