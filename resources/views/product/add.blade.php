@extends('layout.app')
@section('additional_css')
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<style type="text/css">
body{
    background-image: linear-gradient(45deg, transparent 0%, transparent 55%,rgba(64, 64, 64,0.04) 55%, rgba(64, 64, 64,0.04) 76%,transparent 76%, transparent 100%),linear-gradient(135deg, transparent 0%, transparent 14%,rgba(64, 64, 64,0.04) 14%, rgba(64, 64, 64,0.04) 41%,transparent 41%, transparent 100%),linear-gradient(45deg, transparent 0%, transparent 2%,rgba(64, 64, 64,0.04) 2%, rgba(64, 64, 64,0.04) 18%,transparent 18%, transparent 100%),linear-gradient(135deg, transparent 0%, transparent 61%,rgba(64, 64, 64,0.04) 61%, rgba(64, 64, 64,0.04) 71%,transparent 71%, transparent 100%),linear-gradient(90deg, rgb(255,255,255),rgb(255,255,255));
}
@media only screen and (max-width: 1201px) {
    .product-form input, .product-form textarea,.product-form select{
        width: 35% !important;
    }
}
@media only screen and (max-width: 991px) {
    .product-form input, .product-form textarea,.product-form select{
        width: 40% !important;
    }
}

@media only screen and (min-width: 0px) and (max-width: 767) {
    .product-form h1{
    font-size: 25px !important;
    }
    .product-form input, .product-form textarea,.product-form select{
        width: 50% !important;
    }
}
@media only screen and (max-width: 768px) {
    .product-form h1{
    font-size: 25px !important;
    }
    .product-form input, .product-form textarea,.product-form select{
        width: 50% !important;
    }
}




</style>

@endsection

@section('content')
<form class="product-form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
    <h1>{{$category->name}} Sepcifications</h1>
    @csrf
<div class="row d-flex justify-content-center">
    <input name="name" type="input" class="input product-input" placeholder="Name" minlength="3" maxlength="255" required>
@if($errors->has('name'))
    <div class="error">{{ $errors->first('name') }}</div>
    @endif
    <textarea name="description" type="input" class="input product-input" placeholder="Description" minlength="10" maxlength="1000" required></textarea>
    @if($errors->has('description'))
    <div class="error">{{ $errors->first('description') }}</div>
    @endif
    <input name="price" type="number" class="input product-input" placeholder="Price" min=0 required>
    @if($errors->has('price'))
    <div class="error">{{ $errors->first('price') }}</div>
    @endif
    <input name="category_id" type="hidden" class="input product-input" value="{{$id}}" required>
</div>
    @php
        $counter = 0
    @endphp
@foreach ($category->categorySpecs as $spec)
<p>{{$spec->name}}</p>
<input type="hidden" name="specs[{{$counter}}][id]" value="{{ $spec->id}}">
<select name='specs[{{$counter++}}][option][]' class="input-select" required>
    <option value="0">Choose Option</option>
    @foreach ($spec->categoryOptions as $opt)
    <option  value="{{$opt->id}}">{{ $opt->name }}</option>
    @endforeach
</select>
@endforeach
<br>
<label  for="img">Select Image For Product :</label>
<input  type="file" id="input-img" name="img" accept="image/*" onchange="readURL(this);"/>
@if($errors->has('img'))
<div class="error">{{ $errors->first('img') }}</div>
@endif
<img    id="image" src="#" alt="image goes here" />
<br>
<button type="submit" class="search-btn">Save</button>
</form>
@endsection

@section('additional_js')
<script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection
