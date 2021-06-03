@extends('layout.app')
@section('additional_css')

@endsection

@section('content')
<form method="POST" action="{{ route('product.store') }}">
    @csrf
    <input name="name" type="input" class="input" placeholder="Name">
    <input name="description" type="input" class="input" placeholder="Description">
    <input name="price" type="input" class="input" placeholder="Price">
    @php
        $counter = 0
    @endphp
@foreach ($category->categorySpecs as $spec)
<p>{{$spec->name}}</p>
<input type="hidden" name="specs[{{$counter}}][category_spec_id]" value="{{ $spec->id}}">
<select name='specs[{{$counter++}}][options][]' class="input-select">
    <option value="0">Choose Option</option>
    @foreach ($spec->categoryOptions as $opt)
    <option  value="{{$opt->id}}">{{ $opt->name }}</option>
    @endforeach
</select>
@endforeach
<button type="submit" class="search-btn">Save</button>
</form>
@endsection

@section('additional_js')

@endsection
