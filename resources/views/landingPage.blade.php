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
                <img src="{{ asset('images/home2.png') }}" class="d-block w-100" alt="Services">
                <div class="carousel-overlay">
                    <div class="carousel-text">
                        <h1>Your Trusted Partner</h1>
                        <p>Quality Services for All</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

                <div class="carousel-item">
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

    <section id="services" class="services-section">
        <div class="container-fluid">
            <h2 class="section-title">SERVICES</h2>
            <div class="services-grid">
              
                <div class="service-item">
                    <div class="service-content">
                        <div class="service-icon">
                            <img src="{{ asset('icons/greenID.png') }}" alt="Barangay ID">
                        </div>
                        <span class="service-name">Barangay ID Application</span>
                    </div>
                   <a href="{{ route('barangayIDpage') }}" class="btn-proceed">Proceed</a>
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

     @include('footer')

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

        function navigateTo(thisPage) {
            window.location.href = thisPage;
        }
    </script>

</body>

</html>