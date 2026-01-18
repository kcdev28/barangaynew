<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Agustin E-Services</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/registerResident.css') }}">
</head>

<body>
    @include('navbar')

    <div class="registration-container">
        <div class="registration-card">
            <h1 class="registration-title">Registration Form</h1>

            <form id="registrationForm" method="POST" action="" enctype="multipart/form-data" novalidate>
                @csrf

                <div class="form-page active" id="page1">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="firstName" class="form-label">First Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" name="firstname" required>
                        </div>
                        <div class="col-md-3">
                            <label for="middleName" class="form-label">Middle Name:</label>
                            <input type="text" class="form-control" id="middleName" name="middlename">
                        </div>
                        <div class="col-md-3">
                            <label for="lastName" class="form-label">Last Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lastName" name="lastname" required>
                        </div>
                        <div class="col-md-3">
                            <label for="suffix" class="form-label">Suffix:</label>
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
                        <div class="col-md-4">
                            <label for="date_of_birth" class="form-label">Date of Birth: <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Gender: <span class="text-danger">*</span></label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="LGBTQ">LGBTQ</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="civilStatus" class="form-label">Civil Status: <span class="text-danger">*</span></label>
                            <select class="form-select" id="civilStatus" name="civil_no">
                                <option value="">Select Civil Status</option>
                                @foreach($civilStatuses as $status)
                                <option value="{{ $status->civilID }}">{{ $status->civil_stat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="contactNo" class="form-label">Contact No: <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="contactNo" name="contact_no" required>
                        </div>
                        <div class="col-md-4">
                            <label for="citizenshipTop" class="form-label">Citizenship:</label>
                            <select class="form-select" id="citizenshipTop" name="citizenship">
                                <option value="">Select Citizenship</option>
                                <option value="Filipino">Filipino</option>
                                <option value="Foreign">Foreign</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="religion" class="form-label">Religion:</label>
                            <select class="form-select" id="religion" name="religion_no">
                                <option value="">Select Religion</option>
                                @foreach($religions as $religion)
                                <option value="{{ $religion->religionID }}">{{ $religion->religion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="voterStatus" class="form-label">Voter Status:</label>
                            <select class="form-select" id="voterStatus" name="voter_status">
                                <option value="">Select Voter Status</option>
                                <option value="1">Registered Voter</option>
                                <option value="0">Non-Registered</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="precintNo" class="form-label">Precinct No:</label>
                            <input type="text" class="form-control" id="precintNo" name="precint_no" disabled>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn-primary-custom" id="nextBtn1">Next</button>
                    </div>
                </div>

            
                <div class="form-page" id="page2">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="houseNumber" class="form-label">House Number: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="houseNumber" name="house_no" required>
                        </div>
                        <div class="col-md-4">
                            <label for="street" class="form-label">Street: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="street" name="street" required>
                        </div>
                        <div class="col-md-4">
                            <label for="area" class="form-label">Area: <span class="text-danger">*</span></label>
                            <select class="form-select" id="area" name="area_no" required>
                                <option value="">Select Area</option>
                                @foreach($areas as $area)
                                <option value="{{ $area->areaID }}">{{ $area->area_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="employmentStatus" class="form-label">Employment Status:</label>
                            <select class="form-select" id="employmentStatus" name="employment_status">
                                <option value="">Select Employment Status</option>
                                <option value="Employed">Employed</option>
                                <option value="Self-Employed">Self-Employed</option>
                                <option value="Unemployed">Unemployed</option>
                                <option value="Student">Student</option>
                                <option value="Retired">Retired</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="occupation" class="form-label">Occupation:</label>
                            <input type="text" class="form-control" id="occupation" name="occupation">
                        </div>
                        <div class="col-md-4">
                            <label for="specialGroupStatus" class="form-label">Special Group Status:</label>
                            <select class="form-select" id="specialGroupStatus" name="special_group_no">
                                <option value="">Select Special Group Status</option>
                                @foreach($specialStatuses as $group)
                                <option value="{{ $group->specialID }}">{{ $group->status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn-secondary-custom" id="prevBtn2">Previous</button>
                        <button type="button" class="btn-primary-custom" id="nextBtn2">Next</button>
                    </div>
                </div>

            
                <div class="form-page" id="page3">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="username" class="form-label">Email: <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="username" required>
                        </div>
                        <div class="col-md-4">
                            <label for="password" class="form-label">Password: <span class="text-danger">*</span></label>
                            <div class="password-toggle">
                                <input type="password" class="form-control" id="password" name="password" required>
                        
                                <button type="button" class="toggle-password" onclick="togglePassword()">
                                    <img id="eyeIcon" src="{{ asset('images/eye.png') }}" alt="Toggle Password">
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="confirmPassword" class="form-label">Confirm Password: <span class="text-danger">*</span></label>
                            <div class="password-toggle">
                                <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
                            
                                <button type="button" class="toggle-password" onclick="togglePassword()">
                                    <img id="eyeIcon" src="{{ asset('images/eye.png') }}" alt="Toggle Password">
                                </button>
                            </div>
                            <div id="passwordMismatchMessage" class="text-danger mt-1" style="display: none; font-size: 0.875rem;">
                                Passwords do not match
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="profilePicture" class="form-label">Profile Image: (Optional)</label>
                            <input type="file" class="form-control" id="profilePicture" name="profile_image" accept="image/*">

                        </div>
                        <div class="col-md-6">
                            <label for="verificationId" class="form-label">For verification upload photo of any Valid ID, Meralco Bill, Internet Bill</label>
                            <input type="file" class="form-control" id="verificationId" name="verify_img" accept="image/*">
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn-secondary-custom" id="prevBtn3">Previous</button>
                        <button type="submit" class="btn-primary-custom" id="submitBtn">Register</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    @include('footer')
    <script>
        const pages = document.querySelectorAll('.form-page');
        let currentPage = 0;

        function showPage(n) {
            pages.forEach(page => page.classList.remove('active'));
            pages[n].classList.add('active');
            currentPage = n;
        }

        function validatePage(pageIndex) {
            const currentPageElement = pages[pageIndex];
            const inputs = currentPageElement.querySelectorAll('input[required], select[required]');
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

  
        document.getElementById('nextBtn1').addEventListener('click', (e) => {
            e.preventDefault();
            if (validatePage(0)) {
                showPage(1);
            }
        });

  
        document.getElementById('prevBtn2').addEventListener('click', (e) => {
            e.preventDefault();
            showPage(0);
        });

        document.getElementById('nextBtn2').addEventListener('click', (e) => {
            e.preventDefault();
            if (validatePage(1)) {
                showPage(2);
            }
        });

   
        document.getElementById('prevBtn3').addEventListener('click', (e) => {
            e.preventDefault();
            showPage(1);
        });

   
        document.getElementById('registrationForm').addEventListener('submit', async function(e) {
            e.preventDefault();

      
            let allValid = true;
            for (let i = 0; i < pages.length; i++) {
                if (!validatePage(i)) {
                    allValid = false;
                    showPage(i);
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
                showPage(2);
                return;
            }

            const formData = new FormData(this);
            const submitBtn = document.getElementById('submitBtn');

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
                        let firstErrorPage = null;
                        let errorMessages = [];

                        for (let field in result.errors) {
                            const element = document.getElementById(field);
                            errorMessages.push(...result.errors[field]);

                            if (element) {
                                element.classList.add('is-invalid');
                                if (firstErrorPage === null) {
                                    const page = element.closest('.form-page');
                                    if (page) {
                                        const pageIndex = Array.from(pages).indexOf(page);
                                        firstErrorPage = pageIndex;
                                    }
                                }
                            }

                            if (field === 'username') {
                                showPage(2);
                                alert('Email already taken. Please choose a different email.');
                                return;
                            }
                        }

                        if (firstErrorPage !== null) {
                            showPage(firstErrorPage);
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
                showPage(0);

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

        showPage(0);

      
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

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirmPassword');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
              
                eyeIcon.src = 'images/eyeslash.png';
            } else {
                passwordInput.type = 'password';
              
                eyeIcon.src = 'images/eye.png';
            }

            if (confirmPasswordInput.type === 'confirmPassword') {
                confirmPasswordInput.type = 'text';
               
                eyeIcon.src = 'images/eyeslash.png';
            } else {
                confirmPasswordInput.type = 'confirmPassword';
              
                eyeIcon.src = 'images/eye.png';
            }
        }


    </script>

</body>

</html>