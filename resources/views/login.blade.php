@extends('layout')
@section('title', 'Log In')

@section('header')
@include('partials.header')
@endsection

@section('content')
<main class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 30rem;">
        <h1 class="text-center">Login</h1>
        <p class="text-center">Enter your email and password to login!</p>
        <form action="{{ route('loginAccount') }}" method="post" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="E-mail"
                    value="{{old('email')}}" required>
            </div>
            <div class=" mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                    required>
            </div>
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <small class="text-danger">{{ $error }}</small>
            @endforeach
            @endif
            <button type="submit" class="btn btn-dark w-100">Login</button>
        </form>
        <p class="mt-4 text-center">
            Don't have an account?
            <a href="{{ route('createAccountView') }}" class="text-decoration-underline sign-in-direction">Sign Up</a>
        </p>
    </div>
    @section('footer')
    @include('partials.footer')
    @endsection
</main>
@endsection