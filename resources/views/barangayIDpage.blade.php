<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Agustin E-Services</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/barangayIDpage.css') }}">
</head>

<body>
    @include('navbar')
    <div class="registration-container">
        <div class="registration-card">
            <h1 class="registration-title text-start">Barangay ID Application Form</h1>
            <form id="barangayIdForm" method="POST" enctype="multipart/form-data" novalidate>
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
                            <label for="dateOfBirth" class="form-label">Date of Birth: <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="dateOfBirth" name="date_of_birth" required>
                        </div>
                        <div class="col-md-4">
                            <label for="placeOfBirth" class="form-label">Place of Birth: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="placeOfBirth" name="place_of_birth" required>
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Gender: <span class="text-danger">*</span></label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="height" class="form-label">Height (cm): <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="height" name="height" required min="50" max="300">
                        </div>
                        <div class="col-md-4">
                            <label for="weight" class="form-label">Weight (kg): <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="weight" name="weight" required min="1" max="500">
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
                            <label for="religion" class="form-label">Religion: <span class="text-danger">*</span></label>
                            <select class="form-select" id="religion" name="religion_no">
                                <option value="">Select Religion</option>
                                @foreach($religions as $religion)
                                <option value="{{ $religion->religionID }}">{{ $religion->religion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="citizenship" class="form-label">Citizenship: <span class="text-danger">*</span></label>
                            <select class="form-select" id="citizenship" name="citizenship" required>
                                <option value="">Select Citizenship</option>
                                <option value="Filipino">Filipino</option>
                                <option value="Foreign">Foreign</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="precinctNo" class="form-label">Precinct No:</label>
                            <input type="text" class="form-control" id="precinctNo" name="precinct_no">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="idPicture" class="form-label">ID Picture (1x1): <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="idPicture" name="id_picture" accept="image/*" required>
                            <small class="text-muted">Please upload a 1x1 ID photo</small>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn-primary-custom" id="nextBtn1">Next</button>
                    </div>
                </div>

                <div class="form-page" id="page2">
                    <h4 class="mb-4" style="color: #198754;">In Case of Emergency Contact Information</h4>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="emergencyFirstName" class="form-label">First Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="emergencyFirstName" name="emergency_firstname" required>
                        </div>
                        <div class="col-md-3">
                            <label for="emergencyMiddleName" class="form-label">Middle Name:</label>
                            <input type="text" class="form-control" id="emergencyMiddleName" name="emergency_middlename">
                        </div>
                        <div class="col-md-3">
                            <label for="emergencyLastName" class="form-label">Last Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="emergencyLastName" name="emergency_lastname" required>
                        </div>
                        <div class="col-md-3">
                            <label for="emergencySuffix" class="form-label">Suffix: </label>
                            <select class="form-select" id="emergencySuffix" name="emergency_suffix">
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
                            <label for="emergencyHouseNo" class="form-label">House Number: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="emergencyHouseNo" name="emergency_house_no" required>
                        </div>
                        <div class="col-md-4">
                            <label for="emergencyStreet" class="form-label">Street: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="emergencyStreet" name="emergency_street" required>
                        </div>
                        <div class="col-md-4">
                            <label for="emergencyArea" class="form-label">Area: <span class="text-danger">*</span></label>
                            <select class="form-select" id="emergencyArea" name="emergency_area_no" required>
                                <option value="">Select Area</option>
                                @foreach($areas as $area)
                                <option value="{{ $area->areaID }}">{{ $area->area_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="emergencyContactNo" class="form-label">Contact No: <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="emergencyContactNo" name="emergency_contact_no" required>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn-secondary-custom" id="prevBtn2">Previous</button>
                        <button type="submit" class="btn-primary-custom" id="submitBtn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('footer')
</body>

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

    const today = new Date().toISOString().split('T')[0];
    document.getElementById('dateOfBirth').setAttribute('max', today);

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

    document.getElementById('barangayIdForm').addEventListener('submit', async function(e) {
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

        const formData = new FormData(this);
        const submitBtn = document.getElementById('submitBtn');

        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitting...';

        try {
            const response = await fetch("/submit-barangay-id", {
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

            alert(result.message || 'Barangay ID registration submitted successfully!');
            this.reset();
            document.querySelectorAll('.is-invalid').forEach(el => {
                el.classList.remove('is-invalid');
            });
            showPage(0);

        } catch (error) {
            console.error('Registration error:', error);
            alert('An error occurred during registration. Please try again.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Submit';
        }
    });

    showPage(0);
</script>

</html>