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
                    <div class="col-md-5 clearfix pull-right">
                        <div class="header-ctn">
                            @auth
                            <!-- Wishlist -->
                            <div>
                                <a href="#">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <div class="qty">{{auth()->user()->favorites->count()}}</div>
                                </a>
                            <!-- /Wishlist -->
                            </div>
                                <!-- Cart -->
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Your Cart</span>
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
                                                    <h3 class="product-name"><a href="#">{{$cart->product->name}}</a></h3>
                                                    <h4 class="product-price"><span class="qty">{{$cart->qty}}x</span>${{$cart->product->price}}</h4>
                                                </div>
                                                <button onclick="toggleCart({{$cart->product_id}})" class="delete"><i class="fa fa-close"></i></button>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="cart-summary">
                                            <small>{{auth()->user()->carts->count()}} Item(s) selected</small>
                                            <h5>SUBTOTAL: ${{auth()->user()->cartProducts()->sum('price')}}</h5>
                                        </div>
                                        <div class="cart-btns">
                                            <a href="#">View Cart</a>
                                            <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Cart -->

                            <!-- show Your Products -->
                            <div class="add-product">
                                <a href="{{route('store.show', auth()->user()->id)}}">
                                    <i class="fas fa-store-alt"></i>
                                    <span> Your Products</span>
                                </a>
                            </div>
                            <!-- /show Your Products-->

                            <!-- Add a product -->
                            <div class="add-product">
                                <a href="{{route('chose-cat')}}">
                                    <i class="fas fa-cart-plus"></i>
                                    <span>Add product</span>
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
