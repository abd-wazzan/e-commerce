@extends('layout.app')
@section('additional_css')
<style type="text/css">
body{
    background-image: linear-gradient(45deg, transparent 0%, transparent 55%,rgba(64, 64, 64,0.04) 55%, rgba(64, 64, 64,0.04) 76%,transparent 76%, transparent 100%),linear-gradient(135deg, transparent 0%, transparent 14%,rgba(64, 64, 64,0.04) 14%, rgba(64, 64, 64,0.04) 41%,transparent 41%, transparent 100%),linear-gradient(45deg, transparent 0%, transparent 2%,rgba(64, 64, 64,0.04) 2%, rgba(64, 64, 64,0.04) 18%,transparent 18%, transparent 100%),linear-gradient(135deg, transparent 0%, transparent 61%,rgba(64, 64, 64,0.04) 61%, rgba(64, 64, 64,0.04) 71%,transparent 71%, transparent 100%),linear-gradient(90deg, rgb(255,255,255),rgb(255,255,255));
}
@media only screen and (max-width: 767px) {
    .product-form h1{
    font-size: 25px;
    }
}

</style>

@endsection

@section('content')
<form class="product-form" method="POST" action="{{ route('product.store') }}">
    <h1>Choose Your Product Sepcifications</h1>
    @csrf
<div class="row d-flex justify-content-center">
    <input name="name" type="input" class="input product-input" placeholder="Name" required>
    {{-- <input name="description" type="input" class="input product-input" placeholder="Description" required> --}}
    <textarea name="description" type="input" class="input product-input" placeholder="Description" maxlength="100" required></textarea>
    <input name="price" type="input" class="input product-input" placeholder="Price" required>
</div>
    @php
        $counter = 0
    @endphp
@foreach ($category->categorySpecs as $spec)
<p>{{$spec->name}}</p>
<input type="hidden" name="specs[{{$counter}}][category_spec_id]" value="{{ $spec->id}}">
<select name='specs[{{$counter++}}][options][]' class="input-select" required>
    <option value="0">Choose Option</option>
    @foreach ($spec->categoryOptions as $opt)
    <option  value="{{$opt->id}}">{{ $opt->name }}</option>
    @endforeach
</select>
@endforeach
<br>
<button type="submit" class="search-btn">Save</button>
</form>
@endsection

@section('additional_js')

@endsection
