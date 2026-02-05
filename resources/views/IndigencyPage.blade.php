<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Agustin E-Services</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/indigencyPage.css') }}">
</head>

<body>
    @include('navbar')
    
    <div class="indigency-container">
        <div class="indigency-card">
            <h1 class="indigency-title">Certificate of Indigency Application Form</h1>

            <form id="indigencyForm" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                
                <div class="indigency-section">
                    <h4 class="indigency-section-title">Personal Information</h4>
                    
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="firstName" class="indigency-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="indigency-input" id="firstName" name="firstname" required>
                        </div>
                        <div class="col-md-3">
                            <label for="middleName" class="indigency-label">Middle Name</label>
                            <input type="text" class="indigency-input" id="middleName" name="middlename">
                        </div>
                        <div class="col-md-3">
                            <label for="lastName" class="indigency-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="indigency-input" id="lastName" name="lastname" required>
                        </div>
                        <div class="col-md-3">
                            <label for="suffix" class="indigency-label">Suffix</label>
                            <select class="indigency-select" id="suffix" name="suffix">
                                <option value="">Select Suffix</option>
                                <option value="Jr">Jr.</option>
                                <option value="Sr">Sr.</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                            </select>
                        </div>
                    </div>
                </div>

          
                <div class="indigency-section">
                    <h4 class="indigency-section-title">Address Information</h4>
                    
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="houseNumber" class="indigency-label">House Number <span class="text-danger">*</span></label>
                            <input type="text" class="indigency-input" id="houseNumber" name="house_no" required>
                        </div>
                        <div class="col-md-3">
                            <label for="street" class="indigency-label">Street <span class="text-danger">*</span></label>
                            <input type="text" class="indigency-input" id="street" name="street" required>
                        </div>
                        <div class="col-md-3">
                            <label for="area" class="indigency-label">Area <span class="text-danger">*</span></label>
                            <select class="indigency-select" id="area" name="area_no" required>
                                <option value="">Select Area</option>
                                @foreach($areas as $area)
                                <option value="{{ $area->areaID }}">{{ $area->area_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="barangay" class="indigency-label">Barangay <span class="text-danger">*</span></label>
                            <input type="text" class="indigency-input" id="barangay" name="barangay"
                                value="San Agustin" readonly required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="city" class="indigency-label">City <span class="text-danger">*</span></label>
                            <input type="text" class="indigency-input" id="city" name="city"
                                value="Quezon City" readonly required>
                        </div>
                    </div>
                </div>


                <div class="indigency-section">
                    <h4 class="indigency-section-title">Other Details</h4>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="dateOfBirth" class="indigency-label">Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" class="indigency-input" id="dateOfBirth" name="date_of_birth" required>
                        </div>
                        <div class="col-md-4">
                            <label for="civilStatus" class="indigency-label">Civil Status <span class="text-danger">*</span></label>
                            <select class="indigency-select" id="civilStatus" name="civil_no" required>
                                <option value="">Select Civil Status</option>
                                @foreach($civilStatuses as $status)
                                <option value="{{ $status->civilID }}">{{ $status->civil_stat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="placeOfBirth" class="indigency-label">Place of Birth <span class="text-danger">*</span></label>
                            <input type="text" class="indigency-input" id="placeOfBirth" name="place_of_birth" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="yearOfResidency" class="indigency-label">Year of Residency <span class="text-danger">*</span></label>
                            <input type="number" class="indigency-input" id="yearOfResidency" name="year_of_residency"
                                min="1900" max="2026" placeholder="e.g., 2015" required>
                        </div>
                    </div>
                </div>

            
                <div class="indigency-section">
                    <h4 class="indigency-section-title">Purpose of Certificate</h4>
                    
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="purpose" class="indigency-label">Purpose <span class="text-danger">*</span></label>
                            <textarea class="indigency-textarea" id="purpose" name="purpose"
                                rows="4" placeholder="Please specify the purpose of this certificate of indigency" required></textarea>
                            <small class="text-muted">Example: For medical assistance, educational support, financial aid, etc.</small>
                        </div>
                    </div>
                </div>

                <div class="indigency-submit-group">
                    <button type="submit" class="indigency-submit-btn" id="submitBtn">Submit</button>
                </div>
            </form>
        </div>
    </div>

    @include('footer')
</body>

<script>
  
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('dateOfBirth').setAttribute('max', today);

   
    document.getElementById('indigencyForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const requiredFields = this.querySelectorAll('[required]');
        let isValid = true;
        let firstInvalidField = null;

        requiredFields.forEach(field => {
            field.classList.remove('is-invalid');
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
                if (!firstInvalidField) {
                    firstInvalidField = field;
                }
            }
        });

        if (!isValid) {
            if (firstInvalidField) {
                firstInvalidField.focus();
            }
            alert('Please fill in all required fields.');
            return;
        }

        const formData = new FormData(this);
        const submitBtn = document.getElementById('submitBtn');

        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitting...';

        try {
            const response = await fetch("/submit-indigency", {
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
                    let errorMessages = [];

                    for (let field in result.errors) {
                        const element = document.getElementById(field);
                        errorMessages.push(...result.errors[field]);

                        if (element) {
                            element.classList.add('is-invalid');
                        }
                    }

                    if (errorMessages.length > 0) {
                        alert('Please correct the following errors:\n\n' + errorMessages.join('\n'));
                    }
                } else {
                    alert(result.message || 'Application failed. Please try again.');
                }
                return;
            }

            alert(result.message || 'Certificate of Indigency application submitted successfully!');
            this.reset();
            document.querySelectorAll('.is-invalid').forEach(el => {
                el.classList.remove('is-invalid');
            });

        } catch (error) {
            console.error('Submission error:', error);
            alert('An error occurred during submission. Please try again.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Submit Application';
        }
    });


    document.querySelectorAll('.indigency-input, .indigency-select, .indigency-textarea').forEach(field => {
        field.addEventListener('input', function() {
            this.classList.remove('is-invalid');
        });
    });
</script>

</html>