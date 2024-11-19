@extends('layout')
@section('title', 'Sign Up')


@section('header')
@include('partials.header')
@endsection

@section('content')
<main class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 30rem;">
        <h1 class="text-center">Sign Up</h1>
        <p class="text-center">Please fill in the information below!</p>
        <form action="{{ route('createAccount') }}" method="post" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="First Name"
                    required value="{{old('firstName')}}">
                @if ($errors->any())
                @foreach ($errors->get('firstName') as $error)
                <small class=" text-danger">{{ $error }}</small>
                @endforeach
                @endif
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last Name"
                    value="{{old('lastName')}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="E-mail"
                    value="{{old('email')}}" required>
                @if ($errors->any())
                @foreach ($errors->get('email') as $error)
                <small class="text-danger">{{ $error }}</small>
                @endforeach
                @endif
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                    required>
                @if ($errors->any())
                @foreach ($errors->get('password') as $error)
                <small class="text-danger">{{ $error }}</small>
                @endforeach
                @endif
            </div>
            <div class="mb-3">
                <label for="password_confirm" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirm" name="password_confirm" class="form-control"
                    placeholder="Confirm Password" required>
                @if ($errors->any())
                @foreach ($errors->get('password_confirm') as $error)
                <small class="text-danger">{{ $error }}</small>
                @endforeach
                @endif
            </div>
            <button type="submit" class="btn btn-dark w-100">Sign Up</button>
        </form>
        <p class="mt-4 text-center">
            Already have an account?
            <a href="{{ route('loginAccountView') }}" class="text-decoration-underline sign-in-direction">Login</a>
        </p>
    </div>

    @section('footer')
    @include('partials.footer')
    @endsection
</main>
@endsection