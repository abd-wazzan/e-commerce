@extends('layout.app')
@section('additional_css')
<style type="text/css">
    body{
        background-image: linear-gradient(45deg, rgb(37, 6, 46) 0%, rgb(37, 6, 46) 28%,rgb(66, 27, 59) 28%, rgb(66, 27, 59) 31%,rgb(96, 48, 72) 31%, rgb(96, 48, 72) 59%,rgb(125, 69, 85) 59%, rgb(125, 69, 85) 66%,rgb(154, 90, 97) 66%, rgb(154, 90, 97) 68%,rgb(184, 111, 110) 68%, rgb(184, 111, 110) 94%,rgb(213, 132, 123) 94%, rgb(213, 132, 123) 100%),linear-gradient(112.5deg, rgb(37, 6, 46) 0%, rgb(37, 6, 46) 28%,rgb(66, 27, 59) 28%, rgb(66, 27, 59) 31%,rgb(96, 48, 72) 31%, rgb(96, 48, 72) 59%,rgb(125, 69, 85) 59%, rgb(125, 69, 85) 66%,rgb(154, 90, 97) 66%, rgb(154, 90, 97) 68%,rgb(184, 111, 110) 68%, rgb(184, 111, 110) 94%,rgb(213, 132, 123) 94%, rgb(213, 132, 123) 100%),linear-gradient(90deg, rgb(37, 6, 46) 0%, rgb(37, 6, 46) 28%,rgb(66, 27, 59) 28%, rgb(66, 27, 59) 31%,rgb(96, 48, 72) 31%, rgb(96, 48, 72) 59%,rgb(125, 69, 85) 59%, rgb(125, 69, 85) 66%,rgb(154, 90, 97) 66%, rgb(154, 90, 97) 68%,rgb(184, 111, 110) 68%, rgb(184, 111, 110) 94%,rgb(213, 132, 123) 94%, rgb(213, 132, 123) 100%),linear-gradient(135deg, rgb(37, 6, 46) 0%, rgb(37, 6, 46) 28%,rgb(66, 27, 59) 28%, rgb(66, 27, 59) 31%,rgb(96, 48, 72) 31%, rgb(96, 48, 72) 59%,rgb(125, 69, 85) 59%, rgb(125, 69, 85) 66%,rgb(154, 90, 97) 66%, rgb(154, 90, 97) 68%,rgb(184, 111, 110) 68%, rgb(184, 111, 110) 94%,rgb(213, 132, 123) 94%, rgb(213, 132, 123) 100%),linear-gradient(90deg, rgb(100, 205, 26),rgb(46, 36, 113)); background-blend-mode:overlay,overlay,overlay,overlay,normal;
        }
</style>
@endsection

@section('content')
<div class="container wall">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{-- <i class="fas fa-sign-in-alt"></i> --}}
                        <div class="form-group row">
                            <label for="email" class="col-xs-5 col-md-4 col-lg-3 col-form-label text-md-right email">{{ __('E-Mail Address') }}</label>
                            <div class="col-xs-10 col-sm-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-xs-5 col-md-4 col-lg-3 col-form-label text-md-right password">{{ __('Password') }}</label>

                            <div class="col-xs-10 col-sm-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
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

@endsection

