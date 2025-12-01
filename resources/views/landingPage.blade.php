<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Agustin E-Services</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/landingPage.css') }}">

</head>

<body>

    <div class="datetime-bar">
        <span id="currentDateTime"></span>
    </div>

    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <button class="btn-menu" id="menuBtn">
                    ☰ Menu
                </button>
            </div>

            <div class="navbar-center">
                <img src="{{ asset('images/sanagustinlogo.png') }}" alt="San Agustin Logo" class="navbar-logo">
            </div>

            <div class="navbar-right">
                @if(Session::has('user_id') && Session::get('user_type') === 'resident')
                <!-- User Dropdown for logged-in residents -->
                <div class="user-dropdown">
                    <button class="user-dropdown-toggle" id="userDropdownBtn">
                        <img src="{{ asset('icons/user-green.png') }}" alt="User" class="user-icon">

                    </button>
                    <div class="user-dropdown-menu" id="userDropdownMenu">
                        <div class="user-info">
                            <strong>{{ Session::get('user_name') }}</strong>
                        </div>
                        <hr class="dropdown-divider">
                        <a href="" class="dropdown-item">
                            View Profile
                        </a>
                        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                            @csrf
                            <button type="submit" class="dropdown-item logout-item">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <!-- Login and Register buttons for guests -->
                <button class="btn-auth btn-login" id="loginBtn">Login</button>
                <a href="{{ route('register') }}" class="btn-auth btn-register">Register</a>
                @endif
            </div>
        </div>
    </nav>

    <div id="loginModal" class="login-modal">
        <div class="login-modal-content">
            <div class="login-modal-header">
                <button class="close-login-modal" id="closeLoginModal">&times;</button>
                <img src="{{ asset('images/sanagustinlogo.png') }}" alt="San Agustin Logo" style="object-fit: cover;" class="login-logo">
                <h2>Welcome Back</h2>
            </div>
            <div class="login-modal-body">
                <form id="loginForm" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="login-form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                    </div>
                    <div class="login-form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="show-password-wrapper">
                        <input type="checkbox" id="showPassword">
                        <label for="showPassword">Show Password</label>
                    </div>
                    <button type="submit" class="btn-login-submit">Login</button>
                </form>
            </div>
        </div>
    </div>


    <div id="sideMenu" class="side-menu">
        <button class="close-menu" id="closeMenuBtn">
            &times;
        </button>
        <ul class="menu-list">
            <li><a href="{{ route('landingPage') }}">Home</a></li>
            <li><a href="#">Barangay ID Application</a></li>
            <li><a href="#">Barangay Clearance</a></li>
            <li><a href="#">Certificate Of Indigency</a></li>
            <li><a href="#">Certificate Of Residency</a></li>
            <li><a href="#">First Time Job Seeker</a></li>
            <li><a href="#">Business Permit</a></li>
            <li><a href="#">Blotter Report</a></li>
            <li><a href="#">Household Info</a></li>
            <li><a href="#">Officials</a></li>
            <li><a href="#">Mission & Vision</a></li>
            <li><a href="#">Announcements</a></li>
        </ul>
    </div>
    <div id="menuOverlay" class="menu-overlay"></div>


    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/home.JPG') }}" class="d-block w-100" alt="Barangay Hall">
                <div class="carousel-overlay">
                    <div class="carousel-text">
                        <h1>Welcome to Barangay San Agustin</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/home1.jpg') }}" class="d-block w-100" alt="Community">
                <div class="carousel-overlay">
                    <div class="carousel-text">
                        <h1>Serving Our Community</h1>
                        <p>Online Services Made Easy</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/home2.JPG') }}" class="d-block w-100" alt="Services">
                <div class="carousel-overlay">
                    <div class="carousel-text">
                        <h1>Your Trusted Partner</h1>
                        <p>Quality Services for All</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="services" class="services-section">
        <div class="container">
            <h2 class="section-title">Our Services</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <img src="{{ asset('images/card.png') }}" style="width: 120px;" alt="">
                        <h5 class="service-title">Barangay ID Application</h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <img src="{{ asset('images/file.png') }}" style="width: 120px;" alt="">
                        <h5 class="service-title">Barangay Clearance</h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <img src="{{ asset('images/real-estate.png') }}" style="width: 120px;" alt="">
                        <h5 class="service-title">Certificate of Residency</h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <img src="{{ asset('images/gloves.png') }}" style="width: 120px;" alt="">
                        <h5 class="service-title">Certificate of Indigency</h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <img src="{{ asset('images/jobseeker.png') }}" style="width: 120px;" alt="">
                        <h5 class="service-title">First Time Job Seeker</h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <img src="{{ asset('images/jobseeker.png') }}" style="width: 120px;" alt="">
                        <h5 class="service-title">Business Permit</h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <img src="{{ asset('images/approval.png') }}" style="width: 120px;" alt="">
                        <h5 class="service-title">Blotter Report</h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <img src="{{ asset('images/family.png') }}" style="width: 120px;" alt="">
                        <h5 class="service-title">Household Information</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer>
        <div class="footer-content">
            <div class="footer-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!3d3180.4155609706354!2d121.0375284268437!3d14.729362641123487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b0542d0ccaf1%3A0x54be2536d53a48e8!2sSan%20Agustin%20Barangay%20Hall!5e1!3m2!1sen!2sph!4v1763160848325!5m2!1sen!2sph"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <div class="contact-item">
                    <img src="{{ asset('images/whitepin.png') }}" style="width: 20px;" alt="">
                    <span>Patnubay St. Cor. Katarungan Saint Francis / Blueville Subdivision, Barangay San Agustin, Novaliches, Quezon City.</span>
                </div>
                <div class="contact-item">
                    <img src="{{ asset('images/whitephone.png') }}" style="width: 20px;" alt="">
                    <span>8936-1295 ADMIN(OFFICE) / 09190647974 (BPSO)</span>
                </div>
                <div class="contact-item">
                    <img src="{{ asset('images/whiteemail.png') }}" style="width: 20px;" alt="">
                    <span>brgysanagustin13@gmail.com</span>
                </div>
                <div class="contact-item">
                    <img src="{{ asset('images/time.png') }}" style="width: 20px;" alt="">
                    <span>Mon - Fri: 8:00 AM - 5:00 PM</span>
                </div>
                <div class="contact-item">
                    <img src="{{ asset('images/whitefacebook.png') }}" style="width: 20px;" alt="">
                    <span>Pamahalaang Brgy. ng San Agustin</span>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Barangay San Agustin E-Services. All rights reserved.</p>
        </div>
    </footer>



    <script>
        document.addEventListener('DOMContentLoaded', function() {

            function updateDateTime() {
                const now = new Date();
                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                };
                document.getElementById('currentDateTime').textContent =
                    now.toLocaleDateString('en-US', options);
            }

            updateDateTime();
            setInterval(updateDateTime, 1000);

            const menuBtn = document.getElementById('menuBtn');
            const closeMenuBtn = document.getElementById('closeMenuBtn');
            const sideMenu = document.getElementById('sideMenu');
            const menuOverlay = document.getElementById('menuOverlay');
            const menuLinks = document.querySelectorAll('.menu-list li a');

            if (menuBtn && closeMenuBtn && sideMenu && menuOverlay) {
                menuBtn.addEventListener('click', () => {
                    sideMenu.classList.add('active');
                    menuOverlay.classList.add('active');
                });

                closeMenuBtn.addEventListener('click', () => {
                    sideMenu.classList.remove('active');
                    menuOverlay.classList.remove('active');
                });

                menuOverlay.addEventListener('click', () => {
                    sideMenu.classList.remove('active');
                    menuOverlay.classList.remove('active');
                });

                menuLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        sideMenu.classList.remove('active');
                        menuOverlay.classList.remove('active');
                    });
                });
            }

            const showPasswordCheckbox = document.getElementById('showPassword');
            const passwordInput = document.getElementById('password');
            if (showPasswordCheckbox && passwordInput) {
                showPasswordCheckbox.addEventListener('change', function() {
                    passwordInput.type = this.checked ? 'text' : 'password';
                });
            }

            const loginBtn = document.getElementById('loginBtn');
            const loginModal = document.getElementById('loginModal');
            const closeLoginModal = document.getElementById('closeLoginModal');

            if (loginBtn && loginModal && closeLoginModal) {
                loginBtn.addEventListener('click', () => loginModal.classList.add('active'));
                closeLoginModal.addEventListener('click', () => loginModal.classList.remove('active'));
                loginModal.addEventListener('click', e => {
                    if (e.target === loginModal) loginModal.classList.remove('active');
                });
            }

            const userDropdownBtn = document.getElementById('userDropdownBtn');
            const userDropdownMenu = document.getElementById('userDropdownMenu');

            if (userDropdownBtn && userDropdownMenu) {
                userDropdownBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    userDropdownMenu.classList.toggle('show');
                    this.classList.toggle('active');
                });

                document.addEventListener('click', function(e) {
                    if (!userDropdownBtn.contains(e.target) &&
                        !userDropdownMenu.contains(e.target)) {
                        userDropdownMenu.classList.remove('show');
                        userDropdownBtn.classList.remove('active');
                    }
                });
            }

        });
    </script>

</body>

</html>