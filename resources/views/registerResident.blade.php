<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Agustin E-Services - Registration</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/registerResident.css') }}">
</head>

<body>
    @include('navbar')
    <!--
    <div class="datetime-bar">
        <span id="currentDateTime"></span>
    </div>

 
    <nav class="navbar navbar-custom">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center gap-3">
                <button class="btn-menu" id="menuBtn">
                    ☰ Menu
                </button>
                <a class="navbar-brand" href="#">
                    <img src="images/sanagustinlogo.png" alt="">
                    San Agustin E-Services
                </a>
            </div>
        </div>
    </nav>


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
    -->
    <div class="registration-container">
        <div class="registration-card">
            <h1 class="registration-title">Register Account</h1>

            <ul class="nav nav-tabs" id="registrationTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal"
                        type="button" role="tab" aria-controls="personal" aria-selected="true">Personal
                        Information</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="address-tab" data-bs-toggle="tab" data-bs-target="#address"
                        type="button" role="tab" aria-controls="address" aria-selected="false">Address
                        Information</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="account-tab" data-bs-toggle="tab" data-bs-target="#account"
                        type="button" role="tab" aria-controls="account" aria-selected="false">Account
                        Information</button>
                </li>
            </ul>

            <form id="registrationForm" method="POST" action="" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="tab-content" id="registrationTabContent">

                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="firstName" class="form-label">First Name *</label>
                                        <input type="text" class="form-control" id="firstName" name="firstname" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastName" class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" id="lastName" name="lastname" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="middleName" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="middleName" name="middlename">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="suffix" class="form-label">Suffix</label>
                                        <select class="form-select" id="suffix" name="suffix">
                                            <option value="">Select Suffix</option>
                                            <option value="Jr">Jr.</option>
                                            <option value="Sr">Sr.</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="dateOfBirth" class="form-label">Date of Birth *</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Gender *</label>
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="LGBTQ">LGBTQ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="civilStatus" class="form-label">Civil Status</label>
                                        <select class="form-select" id="civilStatus" name="civil_no">
                                            <option value="">Select Civil Status</option>
                                            @foreach($civilStatuses as $status)
                                            <option value="{{ $status->civilID }}">{{ $status->civil_stat }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="contactNo" class="form-label">Contact No. *</label>
                                        <input type="tel" class="form-control" id="contactNo" name="contact_no" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="religion" class="form-label">Religion</label>
                                        <select class="form-select" id="religion" name="religion_no">
                                            @foreach($religions as $religion)
                                            <option value="">Select Religion</option>
                                            <option value="{{ $religion->religionID }}">{{ $religion->religion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="voterStatus" class="form-label">Voter Status</label>
                                        <select class="form-select" id="voterStatus" name="voter_status">
                                            <option value="">Select Voter Status</option>
                                            <option value="1">Registered Voter</option>
                                            <option value="0">Non-Registered</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="precintNo" class="form-label">Precinct No.</label>
                                        <input type="text" class="form-control" id="precintNo" name="precint_no" disabled>
                                        <small class="text-muted">Available for 18 years old and above</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control" id="occupation" name="occupation">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="employmentStatus" class="form-label">Employment Status</label>
                                        <select class="form-select" id="employmentStatus" name="employment_status">
                                            <option value="">Select Employment Status</option>
                                            <option value="Employed">Employed</option>
                                            <option value="Self-Employed">Self-Employed</option>
                                            <option value="Unemployed">Unemployed</option>
                                            <option value="Student">Student</option>
                                            <option value="Retired">Retired</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="specialGroupStatus" class="form-label">Special Group Status</label>
                                        <select class="form-select" id="specialGroupStatus" name="special_group_no">
                                            <option value="">Select Special Group Status</option>
                                            @foreach($specialStatuses as $group)
                                            <option value="{{ $group->specialID }}">{{ $group->status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="citizenship" class="form-label">Citizenship </label>
                                    <select class="form-select" id="citizenshipTop" name="citizenship">
                                        <option value="">Select Citizenship</option>
                                        <option value="Filipino">Filipino</option>
                                        <option value="Foreign">Foreign</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="profilePicture" class="form-label">Profile Picture (Optional)</label>
                                    <input type="file" class="form-control" id="profilePicture" name="profile_image" accept="image/*">
                                    <small class="text-muted">Accepted formats: JPG, PNG</small>
                                    <div class="profile-preview mt-3" id="profilePreview" style="display:none;">
                                        <img id="profilePreviewImg" style="max-width: 200px; max-height: 200px; border-radius: 6px; border: 1px solid #ccc;">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="verificationId" class="form-label">For verification upload photo of any Valid ID, Meralco Bill, Internet Bill</label>
                                    <div class="verification-id-container mb-3">
                                        <div id="idPreview" class="id-preview"></div>
                                    </div>
                                    <input type="file" class="form-control" id="verificationId" name="verify_img" accept="image/*">
                                    <small class="text-muted">Accepted formats: JPG, PNG</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <div class="mb-3">
                            <label for="houseNumber" class="form-label">House Number *</label>
                            <input type="text" class="form-control" id="houseNumber" name="house_no" required>
                        </div>
                        <div class="mb-3">
                            <label for="street" class="form-label">Street *</label>
                            <input type="text" class="form-control" id="street" name="street" required>
                        </div>

                        <div class="mb-3">
                            <label for="area" class="form-label">Area *</label>
                            <select class="form-select" id="area" name="area_no" required>
                                <option value="">Select Area</option>
                                @foreach($areas as $area)
                                <option value="{{ $area->areaID }}">{{ $area->area_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="username" class="form-control" name="email" id="username" required>
                        </div>
                        <div class="mb-3 password-toggle">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <button type="button" class="password-toggle-btn" data-target="password">Show</button>
                        </div>

                        <div class="mb-3 password-toggle">
                            <label for="confirmPassword" class="form-label">Confirm Password *</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
                            <button type="button" class="password-toggle-btn" data-target="confirmPassword">Show</button>
                            <div id="passwordMismatchMessage" class="text-danger mt-1" style="display: none; font-size: 0.875rem;">
                                Passwords do not match
                            </div>
                        </div>
                    </div>
                </div>

                <div class="button-group">
                    <button type="button" class="btn-secondary-custom" id="prevBtn"
                        style="display: none;">Previous</button>
                    <button type="button" class="btn-primary-custom" id="nextBtn">Next</button>
                    <button type="submit" class="btn-primary-custom" id="submitBtn"
                        style="display: none;">Register</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Tab Navigation
        const tabs = document.querySelectorAll('#registrationTabs .nav-link');
        const tabContents = document.querySelectorAll('.tab-pane');
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        const submitBtn = document.getElementById('submitBtn');
        let currentTab = 0;

        function updateTabStates() {
            tabs.forEach((tab, index) => {
                if (index <= currentTab) {
                    tab.classList.remove('disabled');
                } else {
                    tab.classList.add('disabled');
                }
            });
        }

        function showTab(n) {
            tabs.forEach(tab => tab.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('show', 'active'));

            tabs[n].classList.add('active');
            tabContents[n].classList.add('show', 'active');

            prevBtn.style.display = n === 0 ? 'none' : 'block';
            nextBtn.style.display = n === tabContents.length - 1 ? 'none' : 'block';
            submitBtn.style.display = n === tabContents.length - 1 ? 'block' : 'none';

            currentTab = n;
            updateTabStates();
        }

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', (e) => {
                e.preventDefault();
                if (index <= currentTab) {
                    showTab(index);
                }
            });
        });


        function validateCurrentTab() {
            const currentTabPane = tabContents[currentTab];
            const inputs = currentTabPane.querySelectorAll('input[required], select[required]');
            let isValid = true;
            let firstInvalidField = null;

            inputs.forEach(input => {
                input.classList.remove('is-invalid');
                if (input.hasAttribute('required') && !input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                    if (!firstInvalidField) {
                        firstInvalidField = input;
                    }
                }
            });

            if (!isValid && firstInvalidField) {
                firstInvalidField.focus();
            }

            return isValid;
        }

        nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (validateCurrentTab() && currentTab < tabContents.length - 1) {
                showTab(currentTab + 1);
            }
        });

        prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentTab > 0) {
                showTab(currentTab - 1);
            }
        });

        // Form Submission
        document.getElementById('registrationForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            let allValid = true;
            for (let i = 0; i < tabContents.length; i++) {
                currentTab = i;
                if (!validateCurrentTab()) {
                    allValid = false;
                    showTab(i);
                    break;
                }
            }

            if (!allValid) {
                return;
            }

            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('confirmPassword');
            const mismatchMessage = document.getElementById('passwordMismatchMessage');

            if (passwordField.value !== confirmPasswordField.value) {
                mismatchMessage.style.display = 'block';
                confirmPasswordField.classList.add('is-invalid');
                showTab(2);
                return;
            }

            const formData = new FormData(this);

            submitBtn.disabled = true;
            submitBtn.textContent = 'Registering...';

            try {
                const response = await fetch("", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (!response.ok) {
                    if (result.errors) {
                        let firstErrorTab = null;
                        let errorMessages = [];

                        for (let field in result.errors) {
                            const element = document.getElementById(field);
                            errorMessages.push(...result.errors[field]);

                            if (element) {
                                element.classList.add('is-invalid');
                                if (!firstErrorTab) {
                                    const tabPane = element.closest('.tab-pane');
                                    if (tabPane) {
                                        const tabIndex = Array.from(tabContents).indexOf(tabPane);
                                        firstErrorTab = tabIndex;
                                    }
                                }
                            }

                            if (field === 'username') {
                                showTab(2);
                                alert('Email already taken. Please choose a different email.');
                                return;
                            }
                        }

                        if (firstErrorTab !== null) {
                            showTab(firstErrorTab);
                        }

                        if (errorMessages.length > 0) {
                            alert('Please correct the following errors:\n\n' + errorMessages.join('\n'));
                        }
                    } else {
                        alert(result.message || 'Registration failed. Please try again.');
                    }
                    return;
                }

                alert(result.message);
                this.reset();
                document.querySelectorAll('.is-invalid').forEach(el => {
                    el.classList.remove('is-invalid');
                });
                showTab(0);

                setTimeout(() => {
                    window.location.href = "{{ route('landingPage') }}";
                }, 1500);

            } catch (error) {
                console.error('Registration error:', error);
                alert('An error occurred during registration. Please try again.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Register';
            }
        });

        showTab(0);
        updateTabStates();

        // Date of Birth and Precinct No Logic
        const dateOfBirthInput = document.getElementById('date_of_birth');
        const precintNoInput = document.getElementById('precintNo');

        function calculateAge(birthDate) {
            const today = new Date();
            const birth = new Date(birthDate);
            let age = today.getFullYear() - birth.getFullYear();
            const monthDiff = today.getMonth() - birth.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
                age--;
            }

            return age;
        }

        dateOfBirthInput.addEventListener('change', function() {
            const age = calculateAge(this.value);

            if (age >= 18) {
                precintNoInput.disabled = false;
            } else {
                precintNoInput.disabled = true;
                precintNoInput.value = '';
            }
        });

        const today = new Date().toISOString().split('T')[0];
        dateOfBirthInput.setAttribute('max', today);

        // Profile Picture Preview
        const profilePictureInput = document.getElementById('profilePicture');
        const profilePreview = document.getElementById('profilePreview');
        const profilePreviewImg = document.getElementById('profilePreviewImg');

        profilePictureInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePreviewImg.src = e.target.result;
                    profilePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });

        // Password Toggle
        document.addEventListener('click', function(e) {

            if (!e.target.classList.contains('password-toggle-btn')) return;

            const targetId = e.target.getAttribute('data-target');
            const field = document.getElementById(targetId);

            if (!field) return;

            if (field.type === 'password') {
                field.type = 'text';
                e.target.textContent = 'Hide';
            } else {
                field.type = 'password';
                e.target.textContent = 'Show';
            }

        });
    </script>

</body>

</html>