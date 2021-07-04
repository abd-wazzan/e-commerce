@extends('layout.app')
@section('additional_css')
<style type="text/css">

.add-product{
    display: inline-block !important;
}
li { cursor: pointer; }

<style type="text/css">

.add-product{
    display: inline-block !important;
}
.add-to-wishlist{
    padding-right:40px;
}
li { cursor: pointer; }

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
.quick-view {
    top:-15px;
}
a.trash{
    color: initial !important;
}
a.trash:hover{
    color: #D10024 !important;
}
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
                        @if(count($products) == 0)
                            <h2> You Do not have products Yet </h2>
                            <a class="primary-btn cta-btn" href="{{route('chose-cat')}}">Be Seller With Us</a>
                        @endif
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    @foreach ($products as $product)
                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src={{$product->img ?? "./default-product.jpg"}} width="200" height="200" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$product->category->name}}</p>
                                            <h3 class="product-name">{{$product->name}}</h3>
                                            <h4 class="product-price">${{$product->price}}</h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist">
                                                    <label class="like">
                                                        <input {{!empty(auth()->user()->favorites->firstWhere('product_id', $product->id))? 'checked' : ''}}  onclick="toggleFavorite({{$product->id}})" class="loveclass" type="checkbox"/>
                                                        <div class="hearth"/>
                                                    </label>
                                                    <span
                                                        class="tooltipp">add to wishlist</span></button>
                                                <button onclick="showProduct({{$product->id}})" class="quick-view"><i class="fa fa-eye"></i><span
                                                    class="tooltipp">quick view</span></button>
                                                    @if(auth()->user()->id == $product->user->id)
                                                <button class="quick-view"><a href="{{route('product.delete' , $product->id)}}" class="quick-view trash"><i class="fa fa-trash"></i><span
                                                    class="tooltipp">delete product</span></a></button>
                                                    @endif
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
