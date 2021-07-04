@extends('layout.app')
@section('additional_css')
<style type="text/css">
.quick-view {
    top:-15px;
}
.add-product{
    display: inline-block !important;
}
li { cursor: pointer; }
.add-to-wishlist{
    padding-right:40px;
}
.product-body a{
color: #468bc5 !important;
font-weight:initial !important;
font-family:'Montserrat' !important;
font-size:12px !important;
}
:root {
--size: 35px;
--frames: 62;
}

input.loveclass{
display: none;
}
.hearth {
background-image: url('https://assets.codepen.io/23500/Hashflag-AppleEvent.svg');
background-size: calc(var(--size) * var(--frames)) var(--size);
background-repeat: no-repeat;
background-position-x: calc(var(--size) * (var(--frames) * -1 + 2));
background-position-y: calc(var(--size) * 0.02);
width: var(--size);
height: var(--size);
}

input:checked + .hearth {
animation: like 1s steps(calc(var(--frames) - 3));
animation-fill-mode: forwards;
}

@keyframes like {
0% {
background-position-x: 0;
}
100% {
background-position-x: calc(var(--size) * (var(--frames) * -1 + 3));
}
}


</style>
@endsection

@section('content')
<div class="col-md-6 serch-container">
    <div class="header-search">
            <select id="category_select" class="input-select">
                <option value="0">Choose Category</option>
                @foreach ($categories as $category)
                <option {{($category->id == ($params['cat'] ?? 0))? 'selected=true' : ''}} value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input id="search" class="input" placeholder="Search here" value="{{$params['info'] ?? ''}}">
            <button onclick="filter()" class="search-btn">Search</button>
    </div>
</div>
<!-- SECTION -->
<div class="section">
    <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Our Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                {{-- <li class="active"><a data-toggle="tab" href="#tab1">Test</a></li> --}}
                                @foreach ($subCategories as $subCategory)
                                <li {{($subCategory->id == ($params['sub'] ?? 0))? 'class=active' : ''}}><a onclick="refreshWithParam('sub', {{$subCategory->id}})" >{{$subCategory->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    @foreach ($products as $product)
                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src={{$product->img ?? "./img/default-product.jpg"}} width="200" height="200" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$product->category->name}}</p>
                                            <h3 class="product-name">{{$product->name}}</h3>
                                            <h4 class="product-price">${{$product->price}}</h4>
                                            <a href="{{route('store.show',$product->user->id)}}" class="product-price">Seller : {{$product->user->name}}</a>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                {{-- <p>{{json_encode(auth()->user()->favorites->firstWhere('product_id', $product->id))}}</p> --}}
                                                <button class="add-to-wishlist">
                                                    <label class="like">
                                                        <input {{!empty(auth()->user()->favorites->firstWhere('product_id', $product->id))? 'checked' : ''}}  onclick="toggleFavorite({{$product->id}})" class="loveclass" type="checkbox"/>
                                                        <div class="hearth"/>
                                                    </label>
                                                    <span
                                                        class="tooltipp">add to wishlist</span></button>
                                                <button onclick="showProduct({{$product->id}})" class="quick-view"><i class="fa fa-eye"></i><span
                                                    class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button onclick="toggleCart({{$product->id}})" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                cart</button>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                    @endforeach
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav2"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    @foreach ($products as $product)
                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src={{$product->img ?? "./img/default-product.jpg"}} width="200" height="200" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$product->category->name}}</p>
                                            <h3 class="product-name">{{$product->name}}</h3>
                                            <h4 class="product-price">${{$product->price}}</h4>
                                            <a href="{{route('store.show',$product->user->id)}}" class="product-price">Seller : {{$product->user->name}}</a>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                {{-- <p>{{json_encode(auth()->user()->favorites->firstWhere('product_id', $product->id))}}</p> --}}
                                                <button class="add-to-wishlist">
                                                    <label class="like">
                                                        <input {{!empty(auth()->user()->favorites->firstWhere('product_id', $product->id))? 'checked' : ''}}  onclick="toggleFavorite({{$product->id}})" class="loveclass" type="checkbox"/>
                                                        <div class="hearth"/>
                                                    </label>
                                                    <span
                                                        class="tooltipp">add to wishlist</span></button>
                                                <button onclick="showProduct({{$product->id}})" class="quick-view"><i class="fa fa-eye"></i><span
                                                    class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button onclick="toggleCart({{$product->id}})" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                cart</button>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                    @endforeach
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav2"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>ASUS</h3>
                                    <span><i class="fa fa-laptop"></i></span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>DELL</h3>
                                    <span><i class="fa fa-laptop"></i></span>

                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>Lenovo</h3>
                                    <span><i class="fa fa-laptop"></i></span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>Sony</h3>
                                    <span><i class="fa fa-laptop"></i></span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal With Many Companies</h2>
                        <p>New Collection Every Day</p>
                        <a class="primary-btn cta-btn" href="{{route('chose-cat')}}">Be Seller With Us</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->


@endsection


@section('additional_js')
<script type="application/javascript">

var search = document.location.search.substr(1).split('&');

function insertParam(key, value) {
    key = encodeURIComponent(key);
    value = encodeURIComponent(value);
    // kvp looks like ['key1=value1', 'key2=value2', ...]
    var kvp = search;
    let i=0;

    for(; i<kvp.length; i++){
        if (kvp[i].startsWith(key + '=')) {
            let pair = kvp[i].split('=');
            pair[1] = value;
            kvp[i] = pair.join('=');
            break;
        }
    }

    if(i >= kvp.length){
        kvp[kvp.length] = [key,value].join('=');
    }
}

function filter()
{
    var categorySelect = document.getElementById( "category_select" );

    var cat = categorySelect.options[ categorySelect.selectedIndex ].value;
    if(cat == 0) cat = '';
    insertParam('cat', cat);


    var info = $("#search").val();
    insertParam('info', info);

    document.location.search = this.search.join('&');

}

function refreshWithParam(key, value) {
    key = encodeURIComponent(key);
    value = encodeURIComponent(value);

    // kvp looks like ['key1=value1', 'key2=value2', ...]
    var kvp = document.location.search.substr(1).split('&');
    let i=0;

    for(; i<kvp.length; i++){
        if (kvp[i].startsWith(key + '=')) {
            let pair = kvp[i].split('=');
            pair[1] = value;
            kvp[i] = pair.join('=');
            break;
        }
    }

    if(i >= kvp.length){
        kvp[kvp.length] = [key,value].join('=');
    }

    // can return this or...
    let params = kvp.join('&');

    // reload page with new params
    document.location.search = params;
}

function showProduct(id)
{
    var url = '{{ route("product.show", ":id") }}';
    url = url.replace(':id', id);
    window.location.href = url;
}

</script>
@endsection
