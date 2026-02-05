<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Agustin E-Services</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/registerResident.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>
    @include('navbar')

    <div class="registration-container container-fluid">
        <div class="registration-card">
            <h1 class="registration-title">Registration Form</h1>

            <div class="tab-navigation">
                <div class="tab-item active" data-page="0">
                    <span class="tab-number">&#49;</span>
                    <span class="tab-label">Personal Information</span>
                </div>
                <div class="tab-item" data-page="1">
                    <span class="tab-number">&#50;</span>
                    <span class="tab-label">Address Information</span>
                </div>
                <div class="tab-item" data-page="2">
                    <span class="tab-number">&#51;</span>
                    <span class="tab-label">Account Information</span>
                </div>
            </div>
            <hr style="border: none; border-top: 2px solid #146c43; width: 100%; margin-bottom: 10px; opacity: 1;">
            <form id="registrationForm" method="POST" action="" enctype="multipart/form-data" novalidate>
                @csrf

                <div class="form-page active" id="page1">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="firstName" class="form-label">First Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" name="firstname" placeholder="Juan" required>
                        </div>
                        <div class="col-md-3">
                            <label for="middleName" class="form-label">Middle Name:</label>
                            <input type="text" class="form-control" id="middleName" name="middlename" placeholder="Dela">
                        </div>
                        <div class="col-md-3">
                            <label for="lastName" class="form-label">Last Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lastName" name="lastname" placeholder="Dela Cruz" required>
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
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="civilStatus" class="form-label">Civil Status:</label>
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
                            <input type="tel" class="form-control" id="contactNo" name="contact_no" maxlength="11"
                                placeholder="09XXXXXXXXX" required>
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
                            <input type="text" class="form-control" id="religion" name="religion" placeholder="Catholic, Iglesia Ni Cristo, Muslim etc.">
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
                            <input type="text" class="form-control" id="precintNo" name="precinct_no" disabled>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn-primary-custom" id="nextBtn1">Next</button>
                    </div>
                </div>


                <div class="form-page" id="page2">
                    <h3 class="section-title">Home Address:</h3>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <label for="houseNumber" class="form-label">House Number: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="houseNumber" name="house_no" placeholder="House Number" required>
                        </div>
                        <div class="col-md-4">
                            <label for="street" class="form-label">Street: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="street" name="street" placeholder="Street Name" required>
                        </div>
                        <div class="col-md-4">
                            <label for="area" class="form-label">Area: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="area" name="area" placeholder="Area Name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="barangay" class="form-label">Barangay:</label>
                            <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Barangay Name">
                        </div>
                        <div class="col-md-4">
                            <label for="city" class="form-label">City:</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City Name">
                        </div>
                        <div class="col-md-4">
                            <label for="province" class="form-label">Province:</label>
                            <input type="text" class="form-control" id="province" name="province" placeholder="Province Name">
                        </div>
                    </div>

                    <h3 class="section-title">Business Address:</h3>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="businessHouseNumber" class="form-label">House Number:</label>
                            <input type="text" class="form-control" id="businessHouseNumber" name="business_house_no" placeholder="House Number">
                        </div>
                        <div class="col-md-4">
                            <label for="businessStreet" class="form-label">Street:</label>
                            <input type="text" class="form-control" id="businessStreet" name="business_street" placeholder="Street Name">
                        </div>
                        <div class="col-md-4">
                            <label for="businessArea" class="form-label">Area:</label>
                            <select class="form-select" id="businessArea" name="business_area_no">
                                <option value="">Select Area</option>
                                @foreach($areas as $area)
                                <option value="{{ $area->areaID }}">{{ $area->area_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="businessBarangay" class="form-label">Barangay:</label>
                            <input type="text" class="form-control" id="businessBarangay" name="business_barangay" placeholder="Barangay Name">
                        </div>
                        <div class="col-md-4">
                            <label for="businessCity" class="form-label">City:</label>
                            <input type="text" class="form-control" id="businessCity" name="business_city" placeholder="City Name">
                        </div>
                        <div class="col-md-4">
                            <label for="businessProvince" class="form-label">Province:</label>
                            <input type="text" class="form-control" id="businessProvince" name="business_province" placeholder="Province Name">
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn-secondary-custom" id="prevBtn2">Previous</button>
                        <button type="button" class="btn-primary-custom" id="nextBtn2">Next</button>
                    </div>
                </div>


                <div class="form-page" id="page3">
                    <div class="row mb-3 d-flex justify-content-center">
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email: <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address" required>
                        </div>

                    </div>

                    <div class="row mb-3 d-flex justify-content-center">
                        <div class="col-md-4">
                            <label for="password" class="form-label">Password: <span class="text-danger">*</span></label>
                            <div class="password-toggle">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" required>

                                <button type="button"
                                    class="toggle-password"
                                    onclick="togglePassword('password', 'eye-password')">
                                    <img id="eye-password" src="{{ asset('images/eye.png') }}" alt="Toggle Password">
                                </button>
                            </div>
                            <small id="passwordRuleText" class="password-rules text-danger d-block mt-2">
                                Password must have at least 8 characters that include at least
                                1 lowercase character, 1 uppercase character, 1 number,
                                and 1 special character (!@#$%^&*).
                            </small>


                            <div class="progress mt-2" style="height: 6px;">
                                <div id="passwordStrengthBar" class="progress-bar" style="width: 0%"></div>
                            </div>

                            <small id="passwordStrengthText" class="fw-bold"></small>


                        </div>
                    </div>

                    <div class="row mb-3 d-flex justify-content-center">
                        <div class="col-md-4">
                            <label for="confirmPassword" class="form-label">Confirm Password: <span class="text-danger">*</span></label>
                            <div class="password-toggle">
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Confirm your Password" required>

                                <button type="button"
                                    class="toggle-password"
                                    onclick="togglePassword('password_confirmation', 'eye-confirm')">
                                    <img id="eye-confirm" src="{{ asset('images/eye.png') }}" alt="Toggle Password">
                                </button>
                            </div>
                            <div id="passwordMismatchMessage" class="text-danger mt-1" style="display: none; font-size: 0.875rem;">
                                Passwords do not match
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 d-flex justify-content-center">
                        <div class="col-md-4 text-center">
                            <div class="g-recaptcha"
                                id="recaptcha"
                                data-sitekey="6LfXWlwsAAAAACfK_U7AkBJ3Yu0mQ_kY0O8tnPSQ">
                            </div>

                            @error('g-recaptcha-response')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
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

    <div class="modal fade" id="dataPrivacyModal" tabindex="-1" aria-labelledby="dataPrivacyLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="dataPrivacyLabel">
                        Data Privacy Act & Terms and Conditions
                    </h5>
                </div>

                <div class="modal-body" style="font-size: 16px; line-height: 1.6;">

                    <h6 class="fw-bold">Data Privacy Act of 2012 (RA 10173)</h6>
                    <p>
                        In compliance with the <strong>Data Privacy Act of 2012 (Republic Act No. 10173)</strong>,
                        the Barangay San Agustin E-Services System ensures that all personal information collected
                        shall be processed fairly, lawfully, and securely.
                    </p>
                    <p>
                        The information you provide will be used solely for official barangay purposes such as
                        resident registration, verification, record management, and service delivery.
                    </p>

                    <hr>

                    <h6 class="fw-bold">Terms and Conditions</h6>
                    <ol style="padding-left: 18px;">
                        <li>
                            You confirm that all information you provide is <strong>true, accurate, and complete</strong>.
                        </li>
                        <li>
                            You understand that submitting false or misleading information may result in
                            <strong>denial of services or administrative action</strong>.
                        </li>
                        <li>
                            You authorize the Barangay San Agustin to store and process your data for
                            <strong>legitimate barangay transactions</strong>.
                        </li>
                        <li>
                            Your account credentials are your responsibility. The barangay is not liable for
                            issues caused by unauthorized access due to user negligence.
                        </li>
                        <li>
                            The barangay reserves the right to <strong>update or modify these terms</strong>
                            to comply with laws, policies, or system improvements.
                        </li>
                    </ol>

                    <p class="fw-semibold mt-3">
                        By clicking <strong>“I Agree”</strong>, you acknowledge that you have read,
                        understood, and agreed to the Data Privacy Policy and Terms & Conditions.
                    </p>
                </div>

                <div class="modal-footer">
                    <a href="{{ route('landingPage') }}" class="btn btn-secondary">
                        Decline
                    </a>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                        I Agree
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dataPrivacyModal = new bootstrap.Modal(
                document.getElementById('dataPrivacyModal')
            );
            dataPrivacyModal.show();
        });


        const pages = document.querySelectorAll('.form-page');
        const tabItems = document.querySelectorAll('.tab-item');
        let currentPage = 0;

        function showPage(n) {
            pages.forEach(page => page.classList.remove('active'));
            tabItems.forEach(tab => tab.classList.remove('active'));

            pages[n].classList.add('active');
            tabItems[n].classList.add('active');
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
            const confirmPasswordField = document.getElementById('password_confirmation');
            const mismatchMessage = document.getElementById('passwordMismatchMessage');

            if (passwordField.value !== confirmPasswordField.value) {
                mismatchMessage.style.display = 'block';
                confirmPasswordField.classList.add('is-invalid');
                showPage(2);
                return;
            }

            const recaptchaResponse = grecaptcha.getResponse();

            if (!recaptchaResponse) {
                showPage(2);

                Swal.fire({
                    icon: 'error',
                    title: 'Verification Required',
                    text: 'Please complete the reCAPTCHA to continue.',
                    confirmButtonColor: '#d33'
                });

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

                            if (field === 'email') {
                                showPage(2);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Email Already Taken',
                                    text: 'Please choose a different email.',
                                    confirmButtonColor: '#d33'
                                });

                                return;
                            }
                        }

                        if (firstErrorPage !== null) {
                            showPage(firstErrorPage);
                        }

                        if (errorMessages.length > 0) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Error',
                                html: `
                                        <div style="text-align: left;">
                                            <p>Please correct the following errors:</p>
                                            <ul>
                                                ${errorMessages.map(error => `<li>${error}</li>`).join('')}
                                            </ul>
                                        </div>
                                    `,
                                confirmButtonColor: '#198754'
                            });
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Registration Failed',
                            text: result.message || 'Registration failed. Please try again.',
                            confirmButtonColor: '#d33'
                        });
                    }
                    return;
                }

                const alertConfig = result.alert || {
                    icon: 'success',
                    title: 'Registration Successful!',
                    text: result.message || 'Resident added successfully!'
                };

                Swal.fire({
                    icon: alertConfig.icon,
                    title: alertConfig.title,
                    text: alertConfig.text,
                    showConfirmButton: false,
                    timer: 3000
                }).then(() => {
                    this.reset();
                    document.querySelectorAll('.is-invalid').forEach(el => {
                        el.classList.remove('is-invalid');
                    });
                    showPage(0);
                    window.location.href = "{{ route('landingPage') }}";
                });

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

        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.src = "{{ asset('images/eyeslash.png') }}";
            } else {
                input.type = 'password';
                icon.src = "{{ asset('images/eye.png') }}";
            }
        }
        const passwordInput = document.getElementById('password');
        const strengthBar = document.getElementById('passwordStrengthBar');
        const strengthText = document.getElementById('passwordStrengthText');
        const passwordRuleText = document.getElementById('passwordRuleText');

        passwordInput.addEventListener('input', function() {
            const password = this.value;

            let strength = 0;

            const lengthRule = password.length >= 8;
            const uppercaseRule = /[A-Z]/.test(password);
            const lowercaseRule = /[a-z]/.test(password);
            const numberRule = /[0-9]/.test(password);
            const specialRule = /[^A-Za-z0-9]/.test(password);

            const isValid = lengthRule && uppercaseRule && lowercaseRule && numberRule && specialRule;

            passwordRuleText.classList.toggle('text-success', isValid);
            passwordRuleText.classList.toggle('text-danger', !isValid);

            strength = [lengthRule, uppercaseRule, lowercaseRule, numberRule, specialRule]
                .filter(Boolean).length;

            updateStrengthBar(strength);
        });

        function updateRule(id, valid) {
            const el = document.getElementById(id);
            el.classList.remove('text-danger', 'text-success');
            el.classList.add(valid ? 'text-success' : 'text-danger');
        }

        function updateStrengthBar(strength) {
            const percent = (strength / 5) * 100;
            strengthBar.style.width = percent + '%';

            strengthBar.className = 'progress-bar';

            if (strength <= 2) {
                strengthBar.classList.add('bg-danger');
                strengthText.textContent = 'Weak';
                strengthText.className = 'text-danger';
            } else if (strength <= 4) {
                strengthBar.classList.add('bg-warning');
                strengthText.textContent = 'Medium';
                strengthText.className = 'text-warning';
            } else {
                strengthBar.classList.add('bg-success');
                strengthText.textContent = 'Strong';
                strengthText.className = 'text-success';
            }
        }

        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const message = document.getElementById('passwordMismatchMessage');

            if (password && confirmPassword && password !== confirmPassword) {
                message.style.display = 'block';
            } else {
                message.style.display = 'none';
            }
        }

        document.getElementById('password').addEventListener('input', checkPasswordMatch);
        document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);

        const contactInput = document.getElementById('contactNo');

        contactInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');

            if (this.value.length > 11) {
                this.value = this.value.slice(0, 11);
            }

            if (this.value.length === 1 && this.value !== '0') {
                this.value = '';
            }

            if (this.value.length === 2 && this.value !== '09') {
                this.value = '09';
            }
        });
    </script>

</body>

</html>