<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Agustin E-Services</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/loginPage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    @include('navbar')
    <div class="login-section" style="background-image: url('images/home1.jpg');">
        <div class="content-wrapper">
            <div class="left-section">
                <div class="welcome-text">
                    <h1>WELCOME TO BARANGAY<br>SAN AGUSTIN</h1>
                </div>
                <div class="logo-container">
                    <img src="{{ asset('images/sanagustinlogo.png') }}" alt="Barangay San Agustin Logo">
                </div>
            </div>

            <div class="login-form-container">
                <h6 class="login-text text-center mb-3">Sign In to your account</h6>
                <form id="loginForm" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter e-mail address" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password:</label>
                        <div class="password-wrapper">
                            <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Enter Password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword()">
                                <img id="eyeIcon" src="{{ asset('images/eye.png') }}" alt="Toggle Password">
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn-login">Login</button>
                </form>

                <button class="btn-google" type="button">
                    <span class="google-icon">
                        <img src="{{ asset('images/google.png') }}" alt="Google">
                    </span>
                    Continue with Google
                </button>

                <div class="register-text">
                    No account yet? <a href="{{ route('register') }}">Register here</a>
                </div>
            </div>
        </div>
    </div>
    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.src = 'images/eyeslash.png';
            } else {
                passwordInput.type = 'password';
                eyeIcon.src = 'images/eye.png';
            }
        }
    </script>
    
    @if(session::has('logoutsuccess'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Logout Successful!',
            text: "{{ session::get('logoutsuccess') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    </script>
    @endif
 
    
    @if(session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: "{{ session::get('error') }}",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        });
    </script>
    @endif
</body>

</html>