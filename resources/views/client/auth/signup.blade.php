@extends('layout.app')
@section('additional_css')
<style type="text/css">
    body {
        background-image: linear-gradient(45deg, rgb(37, 6, 46) 0%, rgb(37, 6, 46) 28%,rgb(66, 27, 59) 28%, rgb(66, 27, 59) 31%,rgb(96, 48, 72) 31%, rgb(96, 48, 72) 59%,rgb(125, 69, 85) 59%, rgb(125, 69, 85) 66%,rgb(154, 90, 97) 66%, rgb(154, 90, 97) 68%,rgb(184, 111, 110) 68%, rgb(184, 111, 110) 94%,rgb(213, 132, 123) 94%, rgb(213, 132, 123) 100%),linear-gradient(112.5deg, rgb(37, 6, 46) 0%, rgb(37, 6, 46) 28%,rgb(66, 27, 59) 28%, rgb(66, 27, 59) 31%,rgb(96, 48, 72) 31%, rgb(96, 48, 72) 59%,rgb(125, 69, 85) 59%, rgb(125, 69, 85) 66%,rgb(154, 90, 97) 66%, rgb(154, 90, 97) 68%,rgb(184, 111, 110) 68%, rgb(184, 111, 110) 94%,rgb(213, 132, 123) 94%, rgb(213, 132, 123) 100%),linear-gradient(90deg, rgb(37, 6, 46) 0%, rgb(37, 6, 46) 28%,rgb(66, 27, 59) 28%, rgb(66, 27, 59) 31%,rgb(96, 48, 72) 31%, rgb(96, 48, 72) 59%,rgb(125, 69, 85) 59%, rgb(125, 69, 85) 66%,rgb(154, 90, 97) 66%, rgb(154, 90, 97) 68%,rgb(184, 111, 110) 68%, rgb(184, 111, 110) 94%,rgb(213, 132, 123) 94%, rgb(213, 132, 123) 100%),linear-gradient(135deg, rgb(37, 6, 46) 0%, rgb(37, 6, 46) 28%,rgb(66, 27, 59) 28%, rgb(66, 27, 59) 31%,rgb(96, 48, 72) 31%, rgb(96, 48, 72) 59%,rgb(125, 69, 85) 59%, rgb(125, 69, 85) 66%,rgb(154, 90, 97) 66%, rgb(154, 90, 97) 68%,rgb(184, 111, 110) 68%, rgb(184, 111, 110) 94%,rgb(213, 132, 123) 94%, rgb(213, 132, 123) 100%),linear-gradient(90deg, rgb(100, 205, 26),rgb(46, 36, 113)); background-blend-mode:overlay,overlay,overlay,overlay,normal;
}
    input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button {
    visibility: hidden;
}
</style>
@endsection

@section('content')
<div class="container wall">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('SignUp') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('signup') }}">
                        @csrf

                        <div class="form-group row">
                            <i class="far fa-envelope"></i>
                            <div class="col-xs-10 col-sm-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                                @if($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <i class="far fa-user"></i>
                            <div class="col-xs-10 col-sm-6">
                                <input id="first-name" type="text" class="form-control" name="first_name"  value="{{ old('first_name') }}"  required placeholder="First Name">
                                @if($errors->has('first_name'))
                                <div class="error">{{ $errors->first('first_name') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <i class="far fa-user"></i>
                            <div class="col-xs-10 col-sm-6">
                                <input id="last-name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"  required placeholder="Last Name">
                                @if($errors->has('last_name'))
                                <div class="error">{{ $errors->first('last_name') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <i class="fas fa-lock"></i>
                            <div class="col-xs-10 col-sm-6">
                                <input id="password" type="password" class="form-control" name="password" minlength="4" maxlength="16" required placeholder="Password">
                                @if($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                                @endif
                                <i class="far fa-eye pass-icon pull-right" onclick="show_password()"></i>
                            </div>
                        </div>

                        <div class="form-group row">
                            <i class="fas fa-phone"></i>
                            <div class="col-xs-10 col-sm-6">
                                <input id="phone" type="number" class="form-control" name="phone" required placeholder="Phone">
                                @if($errors->has('phone'))
                                <div class="error">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Sign Up
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{route('login')}}">
                                    I already have an account !
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional_js')
<script>
function show_password() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
@endsection
