    <!-- HEADER -->
    <header>
        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="{{route('home')}}" class="logo">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->
                    <!-- ACCOUNT -->
                    <div class="col-md-6 clearfix pull-right">
                        <div class="header-ctn">
                            @auth

                            <!-- Wishlist -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Wishlist</span>
                                    <div class="qty">{{auth()->user()->favorites->count()}}</div>
                                </a>
                                <div class="cart-dropdown">
                                <div class="cart-list">
                                    @foreach (auth()->user()->favorites as $favorite)
                                    <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{$favorite->product->img ?? "./img/product02.png"}}" alt="">
                                            </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><h4 style="text-transform: uppercase">{{$favorite->product->name}}</h4></h3>
                                    </div>
                                    <button onclick="toggleFavorite({{$favorite->product_id}})" class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                    @endforeach
                                </div>
                                </div>
                            </div>
                            <!-- /Wishlist -->

                                <!-- Cart -->
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Cart</span>
                                        <div class="qty">{{auth()->user()->carts->count()}}</div>
                                    </a>
                                    <div class="cart-dropdown">
                                        <div class="cart-list">
                                            @foreach (auth()->user()->carts as $cart)
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="{{$cart->product->img ?? "./img/product02.png"}}" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><h4 style="text-transform: uppercase" >{{$cart->product->name}}</h4></h3>
                                                    <h4 class="product-price">${{$cart->product->price}}</h4>
                                                    {{-- <span class="qty">{{$cart->qty}}x</span> --}}
                                                </div>
                                                <button onclick="toggleCart({{$cart->product_id}})" class="delete"><i class="fa fa-close"></i></button>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="cart-summary">
                                            <small>{{auth()->user()->carts->count()}} Item(s) selected</small>
                                            <h5>SUBTOTAL: ${{auth()->user()->cartProducts()->sum('price')}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Cart -->

                            <!-- show Your Products -->
                            <div class="add-product">
                                <a href="{{route('store.show', auth()->user()->id)}}">
                                    <i class="fas fa-store-alt"></i>
                                    <span> My Products</span>
                                </a>
                            </div>
                            <!-- /show Your Products-->

                            <!-- Add a product -->
                            <div class="add-product">
                                <a href="{{route('chose-cat')}}">
                                    <i class="fa fa-cart-plus"></i>
                                    <span>Add product</span>
                                </a>
                            </div>
                            <!-- /Add a product-->

                            <!-- Add a product -->
                            <div class="add-product">
                                <a href="{{ route('logout') }}">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                            <!-- /Add a product-->

                            @endauth
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->
