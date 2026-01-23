<link rel="stylesheet" href="{{ asset('css/footer.css') }}">

<footer class="footer">
    <div class="container">
        <div class="row">
       
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="footer-logo-section">
                    <img src="{{ asset('images/sanagustinlogo.png') }}" alt="Barangay Logo" class="sanagustinlogo">
                    <img src="{{ asset('images/lungsodquezonlogo.png') }}" alt="Triangle Logo" class="lungsodquezonlogo">
                </div>
                <div class="footer-title">BARANGAY SAN AGUSTIN</div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <h5>Quick Links</h5>
                <a href="{{ route('landingPage') }}">Home</a>
                <a href="{{ route('aboutUsPage') }}">About</a>
                <a href="#">Mission & Vision</a>
                <a href="#">Announcements</a>
                <a href="#">Services</a>
                <a href="#">Contact</a>
            </div>


            <div class="col-lg-3 col-md-6 mb-4">
                <h5>Services</h5>
                <a href="{{ route('barangayIDpage') }}">Barangay ID Application</a>
                <a href="#">Barangay Clearance</a>
                <a href="#">Certificate of Residency</a>
                <a href="#">Certificate of Indigency</a>
                <a href="#">First Time Job Seeker</a>
                <a href="#">Business Permit</a>
                <a href="#">Blotter Report</a>
                <a href="#">Household Information</a>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <h5>Contact</h5>
                <div class="contact-item">
                    <img src="{{ asset('images/whitepin.png') }}" alt="Location" class="contact-icon">
                    <span>Patindao St. Cor. Katarungan Saint Francis / Blueville Subdivision, Barangay San Agustin, Novaliches, Quezon City</span>
                </div>
                <div class="contact-item">
                    <img src="{{ asset('images/whitephone.png') }}" alt="Phone" class="contact-icon">
                    <span>8936-1295 ADMIN(OFFICE) / 09190647974 (BPSO)</span>
                </div>
                <div class="contact-item">
                    <img src="{{ asset('images/whiteemail.png') }}" alt="Email" class="contact-icon">
                    <span>brgysanagustin3@gmail.com</span>
                </div>
                <div class="contact-item">
                    <img src="{{ asset('images/time.png') }}" alt="Clock" class="contact-icon">
                    <span>Mon - Fri: 8:00 AM - 5:00 PM</span>
                </div>
                <div class="contact-item">
                    <a href="https://www.facebook.com/p/Pamahalaang-Brgy-ng-San-Agustin-61553997204246/" target="_blank" class="facebook-link">
                        <img src="{{ asset('images/whitefacebook.png') }}" alt="Facebook" class="facebook-icon">
                        <span class="ms-2">Pamahalaang Brgy. ng San Agustin</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
        <hr style="margin: 0 !important;">
    
        <div class="footer-bottom">
            © 2026 Barangay San Agustin E-Services. All rights reserved.
        </div>


</footer>