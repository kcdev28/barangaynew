

<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">


<nav class="navbar navbar-expand-xxl sticky-top px-5">

        <div class="navbar-brand-wrapper">
            <button class="hamburger-menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <img src="icons/greenmenu.png" alt="Menu">
            </button>

            <a class="navbar-brand" href="{{ route('landingPage') }}" style="color: #1b7f3b;">
                <div class="brand-logos">
                    <img src="images/sanagustinlogo.png" alt="Logo 1" class="sanagustinlogo">
                    <img src="images/lungsodquezonlogo.png" alt="Logo 2" class="lungsodquezonlogo">
                </div>
                BARANGAY SAN AGUSTIN
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link navbar-link" href="{{ route('landingPage') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-link" href="{{ route('aboutUsPage') }}">ABOUT</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        SERVICES
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                        <li><a class="dropdown-item" href="#barangay-id">Barangay ID Application</a></li>
                        <li><a class="dropdown-item" href="#clearance">Barangay Clearance</a></li>
                        <li><a class="dropdown-item" href="#residency">Certificate of Residency</a></li>
                        <li><a class="dropdown-item" href="#indigency">Certificate of Indigency</a></li>
                        <li><a class="dropdown-item" href="#job-seeker">First Time Job Seeker</a></li>
                        <li><a class="dropdown-item" href="#business-permit">Business Permit</a></li>
                        <li><a class="dropdown-item" href="#blotter">Blotter Report</a></li>
                        <li><a class="dropdown-item" href="#household">Household Information</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link register-link"  href="{{ route('register') }}">REGISTER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link login-link"  href="#login" id="loginBtn">LOGIN</a>
                </li>
            </ul>
        </div>

</nav>