<nav class="navbar navbar-expand-md navbar-light navbar-laravel">

    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbarSupportedContent"
                aria-expanded="false" aria-label="TOGGLE NAVIGATION">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">

                @foreach($categories as $key => $c)
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $c->category_name }} <span class="caret"></span>
                        </a>
                        @if($c->products->count()!=0)
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($c->products as $key => $product)
                                    <a class="dropdown-item" href="#">
                                        {{ $product->product_name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif

                    </li>
                @endforeach

                <li class="nav-item">

                    <form action="#" class="form-inline">
                        <div class="input-group">

                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>

                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a href="{{ route('cart.read') }}" class="nav-link">
                        <i class="fa fa-shopping-cart"></i> Shopping Cart
                        <span class="badge badge-danger">{{ Cart::count() }}</span>
                    </a>
                </li>

                @if (!auth()->guard('customer')->check())

                    <li><a class="nav-link" href="{{ route('customer.login') }}">Login</a></li>

                @else

                    <li>
                        <a class="nav-link" href="{{ route('customer.home') }}">
                            <i class="fa fa-user"></i> Account
                        </a>
                    </li>

                @endif

            </ul>

        </div>

    </div>

</nav>
