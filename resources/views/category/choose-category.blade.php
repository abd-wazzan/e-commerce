@extends('layout.app')
@section('additional_css')
<style type="text/css">

body{
    background-image: linear-gradient(45deg, transparent 0%, transparent 55%,rgba(64, 64, 64,0.04) 55%, rgba(64, 64, 64,0.04) 76%,transparent 76%, transparent 100%),linear-gradient(135deg, transparent 0%, transparent 14%,rgba(64, 64, 64,0.04) 14%, rgba(64, 64, 64,0.04) 41%,transparent 41%, transparent 100%),linear-gradient(45deg, transparent 0%, transparent 2%,rgba(64, 64, 64,0.04) 2%, rgba(64, 64, 64,0.04) 18%,transparent 18%, transparent 100%),linear-gradient(135deg, transparent 0%, transparent 61%,rgba(64, 64, 64,0.04) 61%, rgba(64, 64, 64,0.04) 71%,transparent 71%, transparent 100%),linear-gradient(90deg, rgb(255,255,255),rgb(255,255,255));
}
@media only screen and (min-width: 1202px) {
    form{
    width: 450px;
    margin: 200px 400px;
    }
}
@media only screen and (max-width: 1201px) {
    form{
    width: 450px;
    margin: 200px 200px;
    }
}
@media only screen and (max-width: 767px) {
    form{
    width: 450px;
    margin: 200px 20px;
    }
}

</style>
@endsection

@section('content')
<form class="choose-cat">
    <h1>Choose Category</h1>
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
    <button class="submit-btn">Next</button>
</form>


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
