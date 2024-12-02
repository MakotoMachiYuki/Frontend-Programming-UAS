@extends('layout')
@section('title', 'Log In')


@section('header')
@include('partials.header')
@endsection
@section('content')
<main ng-controller="ProfileController">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Profile</h2>
            </div>
            <div class="card-body">
                <p><strong>Email : </strong> [[ user.email ]]</p>
                <p><strong>First Name : </strong>[[ user.firstName ]]</p>
                <p><strong>Last Name : </strong>[[ user.lastName ]]</p>
                <p><strong>Gender : </strong></p>
                <p><strong>Registered At : </strong> [[ user.created_at | date ]]</p>
            </div>
        </div>

        <div class="mt-4">
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
            <form>
                @csrf
                <button type="submit" class="btn btn-danger">Edit</button>
            </form>
        </div>
    </div>
</main> 
    @section('footer')
    @include('partials.footer')
    @endsection
@endsection