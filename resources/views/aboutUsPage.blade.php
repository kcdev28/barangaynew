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
                    <button type="submit" class="btn-login-submit">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- About Us -->
    <section class="about-section">
        <div class="about-section-container">
            <div class="about-image">
                <img src="{{ asset('images/home1.JPG') }}" alt="">
            </div>
            <div class="about-content">
                <h2>About Us</h2>
                <p>Barangay San Agustin is located at Patnubay St., Novaliches, Quezon City. The barangay was officially established on June 25, 1975, the barangay has since played an important role as the basic political unit in the community, serving as the frontline institution for delivering government services and programs to its residents. Barangay San Agustin is divided into several Sitios or distinct areas, specifically: Clemente Subdivision, Bagong Tuklas, St. Francis Village Subdivision, Susano Road, T.S Cruz Subdivision, Millionaires Village, Some part of Greenfields-1, Greenfields-3, Blueville Subdivision, and De Jesus Compound.</p>
            </div>
        </div>
    </section>


    <!-- Elected Officials Section -->
    <section class="elected-officials-section">
        <div class="elected-officials-container">
            <h2 class="officials-title">Elected Officials</h2>

            <!-- Punong Barangay -->
            <div class="official-card punong-barangay">
                <div class="official-avatar">
                    <img src="{{ asset('images/default-profile.png') }}" alt="Punong Barangay">
                </div>
                <h3 class="official-name">FABIOY Y. ORTEGA</h3>
                <p class="official-position punong">PUNONG BARANGAY</p>
            </div>

            <!-- Secretary and Treasurer -->
            <div class="officials-row-two">
                <div class="official-card">
                    <div class="official-avatar">
                        <img src="{{ asset('images/default-profile.png') }}" alt="Secretary">
                    </div>
                    <h3 class="official-name">PATRIA B. UNTALAN</h3>
                    <p class="official-position secretary">BRGY. SECRETARY</p>
                </div>

                <div class="official-card">
                    <div class="official-avatar">
                        <img src="{{ asset('images/default-profile.png') }}" alt="Treasurer">
                    </div>
                    <h3 class="official-name">DANIEL O. CLARIN</h3>
                    <p class="official-position treasurer">BRGY. TREASURER</p>
                </div>
            </div>

            <!-- Kagawad Row 1 -->
            <div class="officials-row">
                <div class="official-card">
                    <div class="official-avatar">
                        <img src="{{ asset('images/default-profile.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">GERALD M. LAGATOC</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>

                <div class="official-card">
                    <div class="official-avatar">
                        <img src="{{ asset('images/default-profile.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">EDMUNDO R. OSEA JR.</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>

                <div class="official-card">
                    <div class="official-avatar">
                        <img src="{{ asset('images/default-profile.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">ROBERT R. PERALTA</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>

                <div class="official-card">
                    <div class="official-avatar">
                        <img src="{{ asset('images/default-profile.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">ABIGAIL JEZREEL O. MILLAR</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>
            </div>

            <!-- Kagawad Row 2 -->
            <div class="officials-row">
                <div class="official-card">
                    <div class="official-avatar">
                        <img src="{{ asset('images/default-profile.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">ALEJANDRO F. PALMA</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>

                <div class="official-card">
                    <div class="official-avatar">
                        <img src="{{ asset('images/default-profile.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">LILIBETH P. MATA</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>

                <div class="official-card">
                    <div class="official-avatar">
                        <img src="{{ asset('images/default-profile.png') }}" alt="Kagawad">
                    </div>
                    <h3 class="official-name">JASMIN D. GILBUENA</h3>
                    <p class="official-position kagawad">BRGY. KAGAWAD</p>
                </div>

                <div class="official-card">
                    <div class="official-avatar">
                        <img src="{{ asset('images/default-profile.png') }}" alt="SK Chairperson">
                    </div>
                    <h3 class="official-name">RACHEAL ANN LAUCHENCO</h3>
                    <p class="official-position sk-chair">SK CHAIRPERSON</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="mission-vision-section">
        <div class="mission-vision-container">
            <!-- Mission -->
            <div class="mission-box">
                <div class="mission-content">
                    <h2>Our Mission</h2>
                    <p>To formulate and enforce transaparent plans, programs and regulation or the protection and interest of the community with regards to environment, educationm infrastructure, health, social services, moral, financial and peace and order.</p>
                </div>
                <div class="mission-image">
                    <img src="{{ asset('images/barangaymission.png') }}" alt="">
                </div>
            </div>

            <!-- Vision -->
            <div class="vision-box">
                <div class="vision-image">
                    <img src="{{ asset('images/barangayvision.png') }}" alt="">
                </div>
                <div class="vision-content">
                    <h2>Our Vision</h2>
                    <p>Barangay San Agustin envisions to be a community of Law-Abiding, productive and healthy individuals, a community that is God-fearing, progressice, drug-freem clean, environmentally aware, ready to help others, empowered consituents and collectively participating in decision-makin, gearing towards good governance.</p>
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
    </script>

</body>

</html>