@extends('template.master')

@section('title', 'Login Page')

@section('content')

<style>
.box {
    height: 400px;
}

.box::before {
    height: 400px;
}

.box::after {
    height: 400px;
}

</style>

<div class="d-flex justify-content-center">
    <div class="box">
        <form class="form1" action="{{route('login')}}" method="post" autocomplete="off">
            @csrf
            <h3>Login Page</h3>
                <div class="inputBox">
                    <input type="text" name="email" id="email" required="">
                    <span>Email</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" id="password" required="">
                    <span>Password</span>
                    <i></i>
                </div>
                <div class="mb-2 form-check d-flex justify-content-start gap-2">
                    <input class="form-check-input" type="checkbox" name="remember" value="" id="remember">
                    <label class="form-check-label text-white" for="remember">
                    Remember Me
                    </label>
                </div>
                <div class="links">
                    <p>Don't Have an Account Yet ? Click <a class="link-blue" href="{{route('register')}}">Here</a> to Register.</p>
                </div>
                <div class="mb-2">
                    @if($errors->any())
                    <p class="text-danger">{{$errors->first()}}</p>
                    @endif
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Login">
                </div>
        </form>
    </div>
</div>

@endsection
