@extends('web.layouts.app')

@section('slider')
    <!-- Contact Start -->
    <div class="container-fluid pt-5 text-align">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Đăng nhập</span></h2>
        </div>

        <div class="row justify-content-md-center px-xl-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="col-md-6 col-12" action="{{route('login.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" name="email" 
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password"
                        id="exampleInputPassword1">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="remember_me" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="#" class="btn btn-primary" style="margin-left: 20px">
                    Forgot password
                </a>
                <div class="login-google" style="margin-top: 16px">
                    <a href="{{route('login-google')}}" class="">
                        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                            style="margin-left: 3em;">
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact End -->
@endsection
