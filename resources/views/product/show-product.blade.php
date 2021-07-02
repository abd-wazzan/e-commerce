@extends('layout.app')

@section('additional_css')
<style>
    body{
        font-family: 'Montserrat';
        background-image: linear-gradient(45deg, transparent 0%, transparent 55%,rgba(64, 64, 64,0.04) 55%, rgba(64, 64, 64,0.04) 76%,transparent 76%, transparent 100%),linear-gradient(135deg, transparent 0%, transparent 14%,rgba(64, 64, 64,0.04) 14%, rgba(64, 64, 64,0.04) 41%,transparent 41%, transparent 100%),linear-gradient(45deg, transparent 0%, transparent 2%,rgba(64, 64, 64,0.04) 2%, rgba(64, 64, 64,0.04) 18%,transparent 18%, transparent 100%),linear-gradient(135deg, transparent 0%, transparent 61%,rgba(64, 64, 64,0.04) 61%, rgba(64, 64, 64,0.04) 71%,transparent 71%, transparent 100%),linear-gradient(90deg, rgb(255,255,255),rgb(255,255,255));
    }

    .d-flex img{
    border: 2px solid;
    border-radius: 20px 0px 20px 0px;
    margin-bottom: 20px;
    }
    h2{
        font-weight:bold;
    }
    h3{
        color: #D10024;
    }
    h4{
        color:black !important;
        font-size:18px;
    }
    textarea{
        color:rgba(0, 0, 0, 0.5);
        resize:none;
        font-size: 18px;
        text-align:left;
        padding: 15px;
        line-height: 24px;
        height:150px;
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
                    <div class="d-flex">
                        <div class="col-xs-8">
                        <img src={{$product->img ?? "./default-product.jpg"}} width="300" height="300" alt="">
                        <h3> Discription Of Product : <br><br><textarea  readonly  cols="23" rows="auto">{{$product->description}}</textarea></h3>
                        </div>
					    <!-- Product details -->
					    <div class="product-details col-xs-4">
                            <h3>Product Name</h3>
					        <h2 class="product-name">{{$product->name}}</h2>
					    	<div>
                                <h3>Product Price</h3>
					    		<h4 class="product-price"> $ {{$product->price}}</h4>
					    	</div>
                            @foreach ($product->productSpecs as $spec)
                            <h3>{{$spec->categorySpec->name}}</h3>
                            @foreach ($spec->productOptions as $option)
                            <h4>{{$option->categoryOption->name}}</h4>
                            @endforeach
                            @endforeach
					    </div>
					    <!-- /Product details -->
                    </div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@endsection

@section('additional_js')

@endsection
