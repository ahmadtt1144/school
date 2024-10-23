<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Custom responsive styles for mobile devices */
        .signup-container {
            max-width: 400px; /* Small width for mobile */
            margin: 0 auto;
            padding: 15px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            width: 100%; /* Full width button for mobile */
        }
        .account{
            margin-left:60px;
        }

        @media (max-width: 768px) {
            .signup-container {
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            .signup-container {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Include the Navbar -->
    @include('pages.nav') 

    <div class="signup-container">
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter your first name" value="{{ old('first_name') }}" required>
                @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter your last name" value="{{ old('last_name') }}" required>
                @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
           <div class="account">
           <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
           </div>
           
        </form>
    </div>

    
   
</body>
</html>
