@extends('layout')
@section('title', 'Profile')

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
                <form id="editProfileForm" method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label"><strong>Email</strong></label>
                        <p id="email" class="form-control-plaintext">{{ $user->email }}</p>
                    </div>
                    
                    <!-- First Name -->
                    <div class="mb-3">
                        <label for="firstName" class="form-label"><strong>First Name</strong></label>
                        <input type="text" class="form-control" id="firstName" name="firstName" 
                            value="{{ $user->firstName }}" readonly>
                    </div>

                    <!-- Last Name -->
                    <div class="mb-3">
                        <label for="lastName" class="form-label"><strong>Last Name</strong></label>
                        <input type="text" class="form-control" id="lastName" name="lastName" 
                            value="{{ $user->lastName }}" readonly>
                    </div>

                    <!-- Gender -->
                    <div class="mb-3">
                        <label for="gender" class="form-label"><strong>Gender</strong></label>
                        <select id="gender" name="gender" class="form-select" disabled>
                            <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <!-- Edit Button -->
                        <button type="button" id="editButton" class="btn btn-primary" 
                            onclick="enableEditing()">Edit</button>
                        
                        <!-- Save Button -->
                        <button type="submit" id="saveButton" class="btn btn-success" style="display: none;">Save</button>
                    </div>
                </form>
            </div>
        </div>

                <div class="d-flex justify-content-between mt-4">
            <!-- Delete Account Button -->
            <form action="{{ route('profile.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Account</button>
            </form>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

    </div>
</main>

<script>
    function enableEditing() {
        // Enable fields for editing
        document.getElementById('firstName').removeAttribute('readonly');
        document.getElementById('lastName').removeAttribute('readonly');
        document.getElementById('gender').removeAttribute('disabled');

        // Show save button, hide edit button
        document.getElementById('editButton').style.display = 'none';
        document.getElementById('saveButton').style.display = 'inline-block';
    }
</script>

@section('footer')
@include('partials.footer')
@endsection
@endsection
