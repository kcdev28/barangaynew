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

    <section class="about-section">
        <div class="about-section-container">
            <div class="about-image scroll-animate">
                <img src="{{ asset('images/home1.JPG') }}" alt="">
            </div>
            <div class="about-content scroll-animate">
                <h2>About Us</h2>
                <p>Barangay San Agustin is located at Patnubay St., Novaliches, Quezon City. The barangay was officially established on June 25, 1975, the barangay has since played an important role as the basic political unit in the community, serving as the frontline institution for delivering government services and programs to its residents. Barangay San Agustin is divided into several Sitios or distinct areas, specifically: Clemente Subdivision, Bagong Tuklas, St. Francis Village Subdivision, Susano Road, T.S Cruz Subdivision, Millionaires Village, Some part of Greenfields-1, Greenfields-3, Blueville Subdivision, and De Jesus Compound.</p>
            </div>
        </div>
    </section>


    <section class="elected-officials-section">
        <div class="elected-officials-container">
            <h2 class="officials-title">Elected Officials</h2>


            <div class="official-card punong-barangay scroll-animate">
                <div class="official-avatar">
                    <img src="{{ asset('images/punongbarangay.png') }}" alt="Punong Barangay">
                </div>
                <h3 class="official-name">FABIOY Y. ORTEGA</h3>
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
     @include('scrollToTop')
    @include('footer')

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
                document.getElementById('dateTime').textContent =
                    now.toLocaleDateString('en-US', options);
            }

            updateDateTime();
            setInterval(updateDateTime, 1000);

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
    </script>

</body>

</html>