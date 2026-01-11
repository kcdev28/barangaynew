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
    @include('navbar')

    <!-- Login Modal -->
    <div id="loginModal" class="login-modal">
        <div class="login-modal-content">
            <div class="login-modal-header">
                <button class="close-login-modal" id="closeLoginModal">&times;</button>
                <img src="{{ asset('images/sanagustinlogo.png') }}" alt="San Agustin Logo" class="login-logo">
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
                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                    @endif
                    <button type="submit" class="btn-login-submit">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Carousel -->
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

    <!-- Services Section 
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
    -->

    <section class="announcements-section">
        <div class="section-header">
            <h2>ANNOUNCEMENTS</h2>
        </div>

        <div id="announcementsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#announcementsCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#announcementsCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#announcementsCarousel" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                <!-- Announcement 1 -->
                <div class="carousel-item active">
                    <div class="announcement-card">
                        <div class="announcement-header">
                            KASALANG BAYAN
                        </div>
                        <div class="announcement-body">
                            <div class="announcement-image">
                                <img src="{{ asset('images/announcement1.png') }}" alt="Kasalang Bayan Poster">
                            </div>
                            <div class="announcement-details">
                                <div class="detail-item">
                                    <div class="detail-label">WHAT:</div>
                                    <div class="detail-content">
                                        Mass wedding ceremony for couples. Requirements include original/physical QC ID, photocopy of QC ID with 3 signatures, and Handog Claim Stub.
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">WHEN:</div>
                                    <div class="detail-content">
                                        To be announced. Registration is now open at the Barangay Hall.
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">WHERE:</div>
                                    <div class="detail-content">
                                        Barangay San Agustin Hall, Quezon City
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">WHO:</div>
                                    <div class="detail-content">
                                        All qualified residents of Barangay San Agustin. Sponsored by Punong Barangay Fable Y. Ortega & Council.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Announcement 2 -->
                <div class="carousel-item">
                    <div class="announcement-card">
                        <div class="announcement-header">
                            COMMUNITY HEALTH PROGRAM
                        </div>
                        <div class="announcement-body">
                            <div class="announcement-image">
                                <img src="{{ asset('images/announcement1.png') }}" alt="Health Program Poster">
                            </div>
                            <div class="announcement-details">
                                <div class="detail-item">
                                    <div class="detail-label">WHAT:</div>
                                    <div class="detail-content">
                                        Free medical check-up, dental services, and vaccination program for all residents. Blood pressure monitoring and health consultation available.
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">WHEN:</div>
                                    <div class="detail-content">
                                        Every Saturday, 8:00 AM - 12:00 PM throughout the month
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">WHERE:</div>
                                    <div class="detail-content">
                                        Barangay San Agustin Health Center
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">WHO:</div>
                                    <div class="detail-content">
                                        Open to all residents of Barangay San Agustin. Please bring valid ID and Barangay ID for registration.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#announcementsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#announcementsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container-fluid">
            <h2 class="section-title">SERVICES</h2>
            <div class="services-grid">
                <!-- Row 1 -->
                <div class="service-item">
                    <div class="service-content">
                        <div class="service-icon">
                            <img src="{{ asset('icons/greenID.png') }}" alt="Barangay ID">
                        </div>
                        <span class="service-name">Barangay ID Application</span>
                    </div>
                    <button class="btn-proceed">Proceed</button>
                </div>

                <div class="service-item">
                    <div class="service-content">
                        <div class="service-icon">
                            <img src="{{ asset('icons/greenJobSeeker.png') }}" alt="First Time Job Seeker">
                        </div>
                        <span class="service-name">First Time Job Seeker</span>
                    </div>
                    <button class="btn-proceed">Proceed</button>
                </div>

                <!-- Row 2 -->
                <div class="service-item">
                    <div class="service-content">
                        <div class="service-icon">
                            <img src="{{ asset('icons/greenClearance.png') }}" alt="Barangay Clearance">
                        </div>
                        <span class="service-name">Barangay Clearance</span>
                    </div>
                    <button class="btn-proceed">Proceed</button>
                </div>

                <div class="service-item">
                    <div class="service-content">
                        <div class="service-icon">
                            <img src="{{ asset('icons/greenPermit.png') }}" alt="Business Permit">
                        </div>
                        <span class="service-name">Business Permit</span>
                    </div>
                    <button class="btn-proceed">Proceed</button>
                </div>

                <!-- Row 3 -->
                <div class="service-item">
                    <div class="service-content">
                        <div class="service-icon">
                            <img src="{{ asset('icons/greenResidency.png') }}" alt="Certificate of Residency">
                        </div>
                        <span class="service-name">Certificate of Residency</span>
                    </div>
                    <button class="btn-proceed">Proceed</button>
                </div>

                <div class="service-item">
                    <div class="service-content">
                        <div class="service-icon">
                            <img src="{{ asset('icons/greenBlotter.png') }}" alt="Blotter Report">
                        </div>
                        <span class="service-name">Blotter Report</span>
                    </div>
                    <button class="btn-proceed">Proceed</button>
                </div>

                <!-- Row 4 -->
                <div class="service-item">
                    <div class="service-content">
                        <div class="service-icon">
                            <img src="{{ asset('icons/greenIndigency.png') }}" alt="Certificate of Indigency">
                        </div>
                        <span class="service-name">Certificate of Indigency</span>
                    </div>
                    <button class="btn-proceed">Proceed</button>
                </div>

                <div class="service-item">
                    <div class="service-content">
                        <div class="service-icon">
                            <img src="{{ asset('icons/greenHousehold.png') }}" alt="Household Information">
                        </div>
                        <span class="service-name">Household Information</span>
                    </div>
                    <button class="btn-proceed">Proceed</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
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
                    <img src="{{ asset('images/whitepin.png') }}" alt="">
                    <span>Patnubay St. Cor. Katarungan Saint Francis / Blueville Subdivision, Barangay San Agustin, Novaliches, Quezon City.</span>
                </div>
                <div class="contact-item">
                    <img src="{{ asset('images/whitephone.png') }}" alt="">
                    <span>8936-1295 ADMIN(OFFICE) / 09190647974 (BPSO)</span>
                </div>
                <div class="contact-item">
                    <img src="{{ asset('images/whiteemail.png') }}" alt="">
                    <span>brgysanagustin13@gmail.com</span>
                </div>
                <div class="contact-item">
                    <img src="{{ asset('images/time.png') }}" alt="">
                    <span>Mon - Fri: 8:00 AM - 5:00 PM</span>
                </div>
                <div class="contact-item">
                    <img src="{{ asset('images/whitefacebook.png') }}" alt="">
                    <span>Pamahalaang Brgy. ng San Agustin</span>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Barangay San Agustin E-Services. All rights reserved.</p>
        </div>
    </footer>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
           

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

            // User Dropdown functionality
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

        function toggleMenu() {
            const menu = document.getElementById('navbarMenu');
            menu.classList.toggle('active');
        }
    </script>

</body>

</html>