@extends('template.master')

@section('title', 'Register Page')

@section('content')

<div class="d-flex justify-content-center">
    <div class="box">
        <form class="form1" action="{{route('login')}}" method="post" autocomplete="off">
            @csrf
            <h3>Register Page</h3>
            <div class="inputBox">
                <input type="text" name="name" id="name" required="">
                <span>Username</span>
                <i></i>
            </div>
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
            <div class="inputBox">
                <input type="password" name="confirm" id="confirm" required="">
                <span>Confirm Password</span>
                <i></i>
            </div>
            <div class="mb-2 form-check d-flex justify-content-start gap-2">
                <input class="form-check-input" type="checkbox" name="terms" value="0" id="terms">
                <label class="form-check-label text-white" for="terms">
                    I Agree To The Terms & Conditions.
                </label>
                </div>
                <div class="mb-2">
                    @if($errors->any())
                <p class="text-danger">{{$errors->first()}}</p>
                    @endif
            </div>

            <div class="links">
                <p class="text">Already have an account ? Click <a class="link-blue" href="{{route('login')}}">Here</a> to Login.</p>
            </div>
            <div class="d-flex justify-content-center">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</div>

@endsection
