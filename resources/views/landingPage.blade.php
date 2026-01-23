<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Agustin E-Services</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/landingPage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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

    <section class="news-events-section">
        <div class="container-fluid">
            <div class="section-header">
                <h2>Recent News & Events</h2>
                <p>Egestas venenatis in sociis. Augue posuellus duis nam eleifend? Eleifend et ad tortor arcu mollis!</p>
            </div>

            <div class="news-grid" id="newsGrid">

                <div class="news-card" data-delay="0">
                    <div class="news-card-image">
                        <img src="{{ asset('images/kasal.jpg') }}" alt="Kasalang Bayan">
                    </div>
                    <div class="news-card-content">
                        <h3 class="news-card-title">Kasalang Bayan</h3>
                        <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                        <div class="news-card-footer">
                            <span class="news-card-date">1/21/2026</span>
                            <a href="#" class="news-card-link">Read More &#10095</a>
                        </div>
                    </div>
                </div>


                <div class="news-card" data-delay="100">
                    <div class="news-card-image">
                        <img src="{{ asset('images/giftgiving.png') }}" alt="Gift Giving">
                    </div>
                    <div class="news-card-content">
                        <h3 class="news-card-title">Gift Giving</h3>
                        <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                        <div class="news-card-footer">
                            <span class="news-card-date">1/21/2026</span>
                            <a href="#" class="news-card-link">Read More &#10095</a>
                        </div>
                    </div>
                </div>

                <div class="news-card" data-delay="200">
                    <div class="news-card-image">
                        <img src="{{ asset('images/feeding.png') }}" alt="Feeding Program">
                    </div>
                    <div class="news-card-content">
                        <h3 class="news-card-title">Feeding Program</h3>
                        <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                        <div class="news-card-footer">
                            <span class="news-card-date">1/21/2026</span>
                            <a href="#" class="news-card-link">Read More &#10095</a>
                        </div>
                    </div>
                </div>


                <div class="news-card" data-delay="0">
                    <div class="news-card-image">
                        <img src="{{ asset('images/skillstraining.jpg') }}" alt="Skills Training">
                    </div>
                    <div class="news-card-content">
                        <h3 class="news-card-title">Skills Training/Workshops</h3>
                        <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                        <div class="news-card-footer">
                            <span class="news-card-date">1/21/2026</span>
                            <a href="#" class="news-card-link">Read More &#10095</a>
                        </div>
                    </div>
                </div>

                <div class="news-card" data-delay="100">
                    <div class="news-card-image">
                        <img src="{{ asset('images/tutor.jpg') }}" alt="Volunteer Tutors">
                    </div>
                    <div class="news-card-content">
                        <h3 class="news-card-title">Volunteer Tutors Program</h3>
                        <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                        <div class="news-card-footer">
                            <span class="news-card-date">1/21/2026</span>
                            <a href="#" class="news-card-link">Read More &#10095</a>
                        </div>
                    </div>
                </div>


                <div class="news-card" data-delay="200">
                    <div class="news-card-image">
                        <img src="{{ asset('images/fiesta.jpg') }}" alt="Barangay Fiesta">
                    </div>
                    <div class="news-card-content">
                        <h3 class="news-card-title">Barangay Fiesta</h3>
                        <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                        <div class="news-card-footer">
                            <span class="news-card-date">1/21/2026</span>
                            <a href="#" class="news-card-link">Read More &#10095</a>
                        </div>
                    </div>
                </div>
                <div class="news-card" data-delay="200">
                    <div class="news-card-image">
                        <img src="{{ asset('images/fiesta.jpg') }}" alt="Barangay Fiesta">
                    </div>
                    <div class="news-card-content">
                        <h3 class="news-card-title">Barangay Fiesta</h3>
                        <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                        <div class="news-card-footer">
                            <span class="news-card-date">1/21/2026</span>
                            <a href="#" class="news-card-link">Read More &#10095</a>
                        </div>
                    </div>
                </div>
                <div class="news-card" data-delay="200">
                    <div class="news-card-image">
                        <img src="{{ asset('images/fiesta.jpg') }}" alt="Barangay Fiesta">
                    </div>
                    <div class="news-card-content">
                        <h3 class="news-card-title">Barangay Fiesta</h3>
                        <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                        <div class="news-card-footer">
                            <span class="news-card-date">1/21/2026</span>
                            <a href="#" class="news-card-link">Read More &#10095</a>
                        </div>
                    </div>
                </div>
                <div class="news-card" data-delay="200">
                    <div class="news-card-image">
                        <img src="{{ asset('images/fiesta.jpg') }}" alt="Barangay Fiesta">
                    </div>
                    <div class="news-card-content">
                        <h3 class="news-card-title">Barangay Fiesta</h3>
                        <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                        <div class="news-card-footer">
                            <span class="news-card-date">1/21/2026</span>
                            <a href="#" class="news-card-link">Read More &#10095</a>
                        </div>
                    </div>
                </div>
                <div class="news-card" data-delay="200">
                    <div class="news-card-image">
                        <img src="{{ asset('images/fiesta.jpg') }}" alt="Barangay Fiesta">
                    </div>
                    <div class="news-card-content">
                        <h3 class="news-card-title">Barangay Fiesta</h3>
                        <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                        <div class="news-card-footer">
                            <span class="news-card-date">1/21/2026</span>
                            <a href="#" class="news-card-link">Read More &#10095</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="news-navigation">
                <button class="nav-arrow-btn" id="prevBtn" onclick="navigateNews(-1)">&#10094</button>
                <button class="view-all-btn">View All News & Events</button>
                <button class="nav-arrow-btn" id="nextBtn" onclick="navigateNews(1)">&#10095</button>
            </div>
        </div>
    </section>

    <section id="services" class="services-section">
        <div class="container-fluid">
            <h2 class="section-title">SERVICES</h2>
            <div class="services-grid">
                <div class="service-item">
                    <div class="service-content">
                        <div class="service-icon">
                            <img src="{{ asset('icons/greenHousehold.png') }}" alt="Household Information">
                        </div>
                        <span class="service-name">Household Information</span>
                    </div>
                    <button class="btn-proceed">Proceed</button>
                </div>
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
                            <img src="{{ asset('icons/greenIndigency.png') }}" alt="Certificate of Indigency">
                        </div>
                        <span class="service-name">Certificate of Indigency</span>
                    </div>
                    <button class="btn-proceed">Proceed</button>
                </div>


            </div>
        </div>
    </section>
    @include('scrollToTop')
    @include('footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {


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

            const observerOptions = {
                threshold: 0.2,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const delay = entry.target.dataset.delay || 0;
                        setTimeout(() => {
                            entry.target.classList.add('animate-in');
                        }, delay);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.news-card').forEach(card => {
                observer.observe(card);
            });


            const serviceObserverOptions = {
                threshold: 0.2,
                rootMargin: '0px 0px -50px 0px'
            };

    
            const serviceObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    } else {
                        entry.target.classList.remove('animate-in');
                    }
                });
            }, serviceObserverOptions);

            document.querySelectorAll('.service-item').forEach(item => {
                serviceObserver.observe(item);
            });


        });

        const newsGrid = document.getElementById('newsGrid');
        const newsCards = document.querySelectorAll('.news-card');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const maxVisible = 6;
        let currentPage = 0;
        const totalPages = Math.ceil(newsCards.length / maxVisible);

        function updateNewsDisplay() {
            const start = currentPage * maxVisible;
            const end = start + maxVisible;

            newsCards.forEach((card, index) => {
                if (index >= start && index < end) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });

           
            if (newsCards.length > maxVisible) {
                prevBtn.style.display = currentPage > 0 ? 'inline-block' : 'none';
                nextBtn.style.display = currentPage < totalPages - 1 ? 'inline-block' : 'none';
            }
        }

        prevBtn.addEventListener('click', function() {
            if (currentPage > 0) {
                currentPage--;
                updateNewsDisplay();
            }
        });

        nextBtn.addEventListener('click', function() {
            if (currentPage < totalPages - 1) {
                currentPage++;
                updateNewsDisplay();
            }
        });

       
        updateNewsDisplay();

        function toggleMenu() {
            const menu = document.getElementById('navbarMenu');
            menu.classList.toggle('active');
        }

        function navigateTo(thisPage) {
            window.location.href = thisPage;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Login Successful!',
            text: "{{ session::get('success') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    </script>
    @endif

 
</body>

</html>