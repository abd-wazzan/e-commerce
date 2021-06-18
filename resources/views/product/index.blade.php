@extends('layout.app')
@section('additional_css')
<style type="text/css">

.add-product{
    display: inline-block !important;
}
li { cursor: pointer; }
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
                        <h3 class="title">New Products</h3>
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
                                            <img src={{$product->img ?? "./img/product05.png"}} width="250" height="250" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$product->category->name}}</p>
                                            <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                                            <h4 class="product-price">${{$product->price}}</h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button onclick="toggleFavorite({{$product->id}})" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
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
                                <div id="slick-nav-1" class="products-slick-nav"></div>
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
