@extends('layout.app')
@section('additional_css')
<style type="text/css">

@media only screen and (min-width: 1202px) {
    form{
    width: 450px;
    margin: 100px 400px;
}
}
@media only screen and (max-width: 1201px) {
    form{
    width: 450px;
    margin: 100px 200px;
}
}
@media only screen and (max-width: 767px) {
    form{
    width: 450px;
    margin: 100px 20px;
}

}

</style>
@endsection

@section('content')
<form class="center">
    <select class="input-select" required>
        <option value="0">Main Category</option>
        @foreach ($categories as $category)
        <option  {{($category->id == ($params['cat'] ?? 0))? 'selected' : ''}} value="{{$category->id}}">{{ $category->name }}</option>
        @endforeach
    </select>
    <select class="input-select" required>
        <option value="0">Sub Category</option>
        @foreach ($categories as $category->categorySpecs)
        <option {{($category->id == ($params['cat'] ?? 0))? 'selected' : ''}} value="{{$category->id}}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button class="submit-btn">Save</button>
</form>

@endsection

@section('additional_js')

@endsection
