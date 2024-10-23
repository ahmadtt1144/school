<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Custom responsive styles for mobile devices */
        .login-container {
            max-width: 400px; 
            margin: 0 auto;
            padding: 15px; 
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            width: 100%; 
        }

        @media (max-width: 768px) {
            .login-container {
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            .login-container {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Include the Navbar -->
    @include('pages.nav') 

    <div class="login-container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
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
                <input type="checkbox" onclick="togglePassword()"> Show Password
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Log In</button>
            </div>

            <p class="mt-3">New customer? <a href="{{ route('register') }}">Create your account</a></p>
        </form>
    </div>
   

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</body>
</html>
