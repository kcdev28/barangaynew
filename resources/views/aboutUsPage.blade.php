<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Agustin E-Services</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/aboutUsPage.css') }}">

</head>

<body>
    @include('navbar')
    <section class="page-header">
        <div class="page-header-overlay">
            <div class="page-header-content">
                <h1>About Us</h1>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="about-section-container">
            <div class="about-image scroll-animate">
                <img src="{{ asset('images/home1.JPG') }}" alt="">
            </div>
            <div class="about-content scroll-animate">
                <h2>Barangay San Agustin</h2>
                <p>Barangay San Agustin is located at Patnubay St., Novaliches, Quezon City. The barangay was officially established on June 25, 1975, the barangay has since played an important role as the basic political unit in the community, serving as the frontline institution for delivering government services and programs to its residents. Barangay San Agustin is divided into several Sitios or distinct areas, specifically: Clemente Subdivision, Bagong Tuklas, St. Francis Village Subdivision, Susano Road, T.S Cruz Subdivision, Millionaires Village, Some part of Greenfields-1, Greenfields-3, Blueville Subdivision, and De Jesus Compound.</p>
            </div>
        </div>
    </section>

    <section class="mission-vision-section">
        <div class="mission-vision-container">
            <div class="mission-box">
                <div class="mission-content scroll-animate">
                    <h2>Our Mission</h2>
                    <p>To formulate and enforce transaparent plans, programs and regulation or the protection and interest of the community with regards to environment, education infrastructure, health, social services, moral, financial and peace and order.</p>
                </div>
                <div class="mission-image scroll-animate">
                    <img src="{{ asset('images/barangaymission.png') }}" alt="">
                </div>
            </div>

            <div class="vision-box">
                <div class="vision-image scroll-animate">
                    <img src="{{ asset('images/barangayvision.png') }}" alt="">
                </div>
                <div class="vision-content scroll-animate">
                    <h2>Our Vision</h2>
                    <p>Barangay San Agustin envisions to be a community of Law-Abiding, productive and healthy individuals, a community that is God-fearing, progressive, drug-free clean, environmentally aware, ready to help others, empowered consituents and collectively participating in decision-making, gearing towards good governance.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="elected-officials-section">
        <div class="elected-officials-container">
            <h2 class="officials-title">Barangay Officials</h2>

            <div class="official-card punong-barangay scroll-animate">
                <div class="official-avatar">
                    <img src="{{ asset('images/punongbarangay.png') }}" alt="Punong Barangay">
                </div>
                <h3 class="official-name">FABIO Y. ORTEGA</h3>
                <p class="official-position punong">PUNONG BARANGAY</p>
            </div>

            <div class="officials-row-two">
                <div class="official-card scroll-animate">
                    <div class="official-avatar">
                        <img src="{{ asset('images/secretary.png') }}" alt="Secretary">
                    </div>
                    <h3 class="official-name">PATRIA B. UNTALAN</h3>
                    <p class="official-position secretary">BRGY. SECRETARY</p>
                </div>

                <div class="official-card scroll-animate">
                    <div class="official-avatar">
                        <img src="{{ asset('images/treasurer.png') }}" alt="Treasurer">
                    </div>
                    <h3 class="official-name">DANIEL O. CLARIN</h3>
                    <p class="official-position treasurer">BRGY. TREASURER</p>
                </div>
            </div>

            <div class="officials-row">
                <div class="official-card scroll-animate">
                    <div class="official-avatar">
                        <img src="{{ asset('images/kagawad1.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">GERALD M. LAGATOC</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>

                <div class="official-card scroll-animate">
                    <div class="official-avatar">
                        <img src="{{ asset('images/kagawad2.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">EDMUNDO R. OSEA JR.</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>

                <div class="official-card scroll-animate">
                    <div class="official-avatar">
                        <img src="{{ asset('images/kagawad3.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">ROBERT R. PERALTA</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>

                <div class="official-card scroll-animate">
                    <div class="official-avatar">
                        <img src="{{ asset('images/kagawad4.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">ABIGAIL JEZREEL O. MILLAR</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>
            </div>

            <div class="officials-row">
                <div class="official-card scroll-animate">
                    <div class="official-avatar">
                        <img src="{{ asset('images/kagawad5.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">ALEJANDRO F. PALMA</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>

                <div class="official-card scroll-animate">
                    <div class="official-avatar">
                        <img src="{{ asset('images/kagawad6.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">LILIBETH P. MATA</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>

                <div class="official-card scroll-animate">
                    <div class="official-avatar">
                        <img src="{{ asset('images/kagawad7.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">JASMIN D. GILBUENA</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>

                <div class="official-card scroll-animate">
                    <div class="official-avatar">
                        <img src="{{ asset('images/skchairperson.png') }}" alt="SK Chairperson">
                    </div>
                    <h3 class="official-name">RACHEAL ANN LAUCHENCO</h3>
                    <p class="official-position sk-chair">SK CHAIRPERSON</p>
                </div>
            </div>
        </div>
    </section>

    <section class="awards-section">
        <h2 class="awards-title scroll-animate text-center">Awards & Recognitions</h2>
        <div class="awards-container">
            <div class="awards-grid scroll-animate">
                <div class="award-item">
                    <div class="award-icon">
                        <img src="{{ asset('icons/award-icon.png') }}" alt="Award">
                    </div>
                    <h3 class="award-name">Anti-Drug Abuse Campaign Recognition</h3>
                </div>

                <div class="award-item">
                    <div class="award-icon">
                        <img src="{{ asset('icons/award-icon.png') }}" alt="Award">
                    </div>
                    <h3 class="award-name">Climate Action Award</h3>
                </div>

                <div class="award-item">
                    <div class="award-icon">
                        <img src="{{ asset('icons/award-icon.png') }}" alt="Award">
                    </div>
                    <h3 class="award-name">Top Performer in Cleanliness</h3>
                </div>

                <div class="award-item">
                    <div class="award-icon">
                        <img src="{{ asset('icons/award-icon.png') }}" alt="Award">
                    </div>
                    <h3 class="award-name">Seal of Good Housekeeping</h3>
                </div>

                <div class="award-item">
                    <div class="award-icon">
                        <img src="{{ asset('icons/award-icon.png') }}" alt="Award">
                    </div>
                    <h3 class="award-name">Exemplary Performance in Disaster Preparedness</h3>
                </div>

                <div class="award-item">
                    <div class="award-icon">
                        <img src="{{ asset('icons/award-icon.png') }}" alt="Award">
                    </div>
                    <h3 class="award-name">Exemplary Performance in Health Compliances & Responsiveness </h3>
                </div>

                <div class="award-item">
                    <div class="award-icon">
                        <img src="{{ asset('icons/award-icon.png') }}" alt="Award">
                    </div>
                    <h3 class="award-name">Exemplary Performance in Legislative Services </h3>
                </div>

                <div class="award-item">
                    <div class="award-icon">
                        <img src="{{ asset('icons/award-icon.png') }}" alt="Award">
                    </div>
                    <h3 class="award-name">Exemplary Performance in Housing Governance</h3>
                </div>

                <div class="award-item">
                    <div class="award-icon">
                        <img src="{{ asset('icons/award-icon.png') }}" alt="Award">
                    </div>
                    <h3 class="award-name">Seal of Good Local Governance</h3>
                </div>
            </div>

            <div class="awards-carousel scroll-animate">
                <div class="carousel-container">
                    <button class="carousel-btn prev-btn" onclick="moveCarousel(-1)">&#10094;</button>

                    <div class="carousel-track-container">
                        <div class="carousel-track">
                            <div class="carousel-image-wrapper">
                                <img src="{{ asset('images/award1.png') }}" alt="Award 1">
                            </div>
                            <div class="carousel-image-wrapper">
                                <img src="{{ asset('images/award2.png') }}" alt="Award 2">
                            </div>
                            <div class="carousel-image-wrapper">
                                <img src="{{ asset('images/award3.png') }}" alt="Award 3">
                            </div>
                            <div class="carousel-image-wrapper">
                                <img src="{{ asset('images/award4.png') }}" alt="Award 4">
                            </div>
                            <div class="carousel-image-wrapper">
                                <img src="{{ asset('images/award5.png') }}" alt="Award 5">
                            </div>
                            <div class="carousel-image-wrapper">
                                <img src="{{ asset('images/award7.png') }}" alt="Award 7">
                            </div>
                            <div class="carousel-image-wrapper">
                                <img src="{{ asset('images/award8.png') }}" alt="Award 8">
                            </div>
                            <div class="carousel-image-wrapper">
                                <img src="{{ asset('images/award9.png') }}" alt="Award 9">
                            </div>
                            <div class="carousel-image-wrapper">
                                <img src="{{ asset('images/award10.png') }}" alt="Award 10">
                            </div>
                            <div class="carousel-image-wrapper">
                                <img src="{{ asset('images/award11.png') }}" alt="Award 11">
                            </div>
                        </div>
                    </div>

                    <button class="carousel-btn next-btn" onclick="moveCarousel(1)">&#10095;</button>
                </div>

                <div class="carousel-dots">
                    <span class="dot active" onclick="currentSlide(0)"></span>
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                </div>
            </div>
        </div>
    </section>




    @include('scrollToTop')
    @include('footer')

    <script>



        function toggleMenu() {
            const menu = document.getElementById('navbarMenu');
            menu.classList.toggle('active');
        }


        const scrollAnimateElements = document.querySelectorAll('.scroll-animate');

        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px'
        };

        const scrollObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, observerOptions);

        scrollAnimateElements.forEach(element => {
            scrollObserver.observe(element);
        });


        let currentIndex = 0;
        const track = document.querySelector('.carousel-track');
        const slides = document.querySelectorAll('.carousel-image-wrapper');
        const totalSlides = slides.length;


        const firstFourClones = Array.from(slides).slice(0, 4).map(slide => slide.cloneNode(true));
        firstFourClones.forEach(clone => track.appendChild(clone));


        const lastFourClones = Array.from(slides).slice(-4).map(slide => slide.cloneNode(true));
        lastFourClones.reverse().forEach(clone => track.insertBefore(clone, track.firstChild));


        currentIndex = 4;
        updateCarouselPosition(false);

        function updateCarouselPosition(animate = true) {
            if (!animate) {
                track.style.transition = 'none';
            } else {
                track.style.transition = 'transform 0.5s ease-in-out';
            }

            const slideWidth = track.querySelector('.carousel-image-wrapper').offsetWidth + 20;
            const offset = -currentIndex * slideWidth;
            track.style.transform = `translateX(${offset}px)`;

            updateDots();
        }

        function updateDots() {
            const dots = document.querySelectorAll('.dot');
            const actualIndex = ((currentIndex - 4) % totalSlides + totalSlides) % totalSlides;
            const dotIndex = Math.floor(actualIndex / 4);

            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === dotIndex);
            });
        }

        function moveCarousel(direction) {
            currentIndex += direction;
            updateCarouselPosition(true);


            setTimeout(() => {
                if (currentIndex >= totalSlides + 4) {
                    currentIndex = 4;
                    updateCarouselPosition(false);
                } else if (currentIndex < 4) {
                    currentIndex = totalSlides + 3;
                    updateCarouselPosition(false);
                }
            }, 500);
        }

        function currentSlide(dotIndex) {
            currentIndex = dotIndex * 4 + 4;
            updateCarouselPosition(true);
        }

        setInterval(() => {
            moveCarousel(1);
        }, 5000);


        window.addEventListener('resize', () => {
            updateCarouselPosition(false);
        });
    </script>

</body>

</html>