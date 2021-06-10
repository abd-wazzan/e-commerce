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
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
</style>
@endsection

@section('content')
<form class="center">
    <select class="input-select">
        <option value="0">Main Category</option>
        @foreach ($categories as $category)
        <option {{($category->id == ($params['cat'] ?? 0))? 'selected' : ''}} value="{{$category->id}}">{{ $category->name }}</option>
        @endforeach
    </select>
    <select class="input-select">
        <option value="0">Sub Category</option>
        @foreach ($categories as $category)
        @foreach ($category->categories as $subCategories)
        <option value="{{$subCategories->id}}">{{ $subCategories->name }}</option>
        @endforeach
        @endforeach
    </select>
    <button class="submit-btn">Next</button>
</form>

<div class="container">
    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Category
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        @foreach ($categories as $category)
        <li class="dropdown-submenu">
            <a class="test" tabindex="-1" href="#">{{$category->name}}<span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach ($category->categories as $subCategory)
                <li><a tabindex="-1" href="{{route('product.add', $subCategory->id)}}">{{$subCategory->name}}</a></li>
                @endforeach
            </ul>
        </li>
        @endforeach
      </ul>
    </div>
  </div>


@endsection

@section('additional_js')
<script>
    $(document).ready(function(){
      $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });
    });
    </script>
@endsection
