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
<!-- SECTION -->
<div class="section">
    <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Store Products</h3>
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
                                            <img src={{$product->img ?? "./default-product.jpg"}} width="250" height="250" alt="">
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

function showProduct(id)
{
    var url = '{{ route("product.show", ":id") }}';
    url = url.replace(':id', id);
    window.location.href = url;
}

</script>
@endsection
