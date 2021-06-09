@extends('layout.app')
@section('additional_css')

@endsection

@section('content')
<div class="col-md-6 serch-container">
    <div class="header-search">
        <form>
            <select class="input-select">
                <option value="0">Choose Category</option>
                @foreach ($categories as $category)
                <option {{($category->id == ($params['cat'] ?? 0))? 'selected' : ''}} value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input class="input" placeholder="Search here">
            <button class="search-btn">Search</button>
        </form>
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
                                <li {{($subCategory->id == ($params['sub'] ?? 0))? 'class=active' : ''}}><a data-toggle="tab" href="#tab1">{{$subCategory->name}}</a></li>
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
                                            <img src="./img/product05.png" alt="">
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
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                        class="tooltipp">add to wishlist</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                    class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
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

@endsection
