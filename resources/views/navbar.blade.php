<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="sticky-top">
    <div class="top-nav px-5">
        <div class="contact-item-navbar">
            <img src="{{ asset('images/whitephone.png') }}" alt="Phone" class="contact-icon-nav" >
            <span class="contact-text ">8936-1295 ADMIN(OFFICE) / 09190647974 (BPSO)</span>
        </div>
        <div class="contact-item-navbar">
            <a href="https://www.facebook.com/p/Pamahalaang-Brgy-ng-San-Agustin-61553997204246/" target="_blank" class="facebook-link">
                <img src="{{ asset('images/whitefacebook.png') }}" alt="Facebook" class="top-facebook-icon">
                <span class="contact-text-fb ms-2 ">Pamahalaang Brgy. ng San Agustin</span>
            </a>
        </div>
        <div class="contact-item-navbar ms-auto">
            <span class="contact-text" id="currentTime"></span>
        </div>
    </div>

    <nav class="navbar navbar-expand-xl px-5">

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
                        <li><a class="dropdown-item" href="{{ route('barangayIDpage') }}">Barangay ID Application</a></li>
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
                    <a class="nav-link" href="#news&events">NEWS & EVENTS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">CONTACT</a>
                </li>


                @if(Session::has('user_id'))

                <li class="nav-item dropdown">
                    <a class="nav-link user-dropdown-toggle dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('icons/user-green.png')}}" alt="User Icon" class="user-icon">
                        {{ Session::get('user_name') }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="">View Requests</a></li>
                        <li><a class="dropdown-item" href="">View Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="margin: 0;">
                                @csrf
                                <button type="button" class="dropdown-item" onclick="confirmLogout()">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else

                <li class="nav-item">
                    <a class="nav-link register-link" href="{{ route('register') }}">REGISTER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link login-link" href="{{ route('loginPage') }}" id="loginBtn">LOGIN</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>

</div>

<script>
function updateTime() {
    const now = new Date();
    const options = { 
        month: 'short', 
        day: '2-digit',
        weekday: 'short',
        year: 'numeric',
        hour: '2-digit', 
        minute: '2-digit', 
        hour12: true 
    };
    const timeString = now.toLocaleTimeString('en-US', options);
    document.getElementById('currentTime').textContent = timeString;
}

updateTime();
setInterval(updateTime, 1000);

</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmLogout() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You will be logged out of your account.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1b7f3b',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logoutForm').submit();
        }   
    });
}
</script>