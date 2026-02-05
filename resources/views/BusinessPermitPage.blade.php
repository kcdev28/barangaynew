<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Permit Application Form</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/businessPermitPage.css') }}">
</head>

<body>

@include('navbar')

<div class="business-container">

    <h1 class="business-title">Business Permit Application Form</h1>

    <form id="businessPermitForm" method="POST" novalidate>
        @csrf

        <div class="row mb-4">
            <div class="col-md-3">
                <label class="form-label">First Name <span class="required">*</span></label>
                <input type="text" class="form-control" name="owner_firstname" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Middle Name</label>
                <input type="text" class="form-control" name="owner_middlename">
            </div>
            <div class="col-md-3">
                <label class="form-label">Last Name <span class="required">*</span></label>
                <input type="text" class="form-control" name="owner_lastname" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Suffix</label>
                <select class="form-select" name="owner_suffix">
                    <option value="">Select Suffix</option>
                    <option>Jr.</option>
                    <option>Sr.</option>
                    <option>II</option>
                    <option>III</option>
                </select>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <label class="form-label">House Number <span class="required">*</span></label>
                <input type="text" class="form-control" name="owner_house_no" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Street <span class="required">*</span></label>
                <input type="text" class="form-control" name="owner_street" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Area <span class="required">*</span></label>
                <input type="text" class="form-control" name="owner_area" required>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label">Barangay <span class="required">*</span></label>
                <input type="text" class="form-control" name="owner_barangay" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">City <span class="required">*</span></label>
                <input type="text" class="form-control" name="owner_city" required>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label">Business Name <span class="required">*</span></label>
                <input type="text" class="form-control" name="business_name" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Business Type <span class="required">*</span></label>
                <input type="text" class="form-control" name="business_type" required>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <label class="form-label">House Number <span class="required">*</span></label>
                <input type="text" class="form-control" name="business_house_no" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Street <span class="required">*</span></label>
                <input type="text" class="form-control" name="business_street" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Area <span class="required">*</span></label>
                <input type="text" class="form-control" name="business_area" required>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label">Barangay <span class="required">*</span></label>
                <input type="text" class="form-control" name="business_barangay" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">City <span class="required">*</span></label>
                <input type="text" class="form-control" name="business_city" required>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label">Business Location Status <span class="required">*</span></label>
                <div class="d-flex gap-4 mt-2">
                    <div class="form-check">
                        <input class="form-check-input locationStatus" type="checkbox" value="Owned">
                        <label class="form-check-label">Owned</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input locationStatus" type="checkbox" value="Rented">
                        <label class="form-check-label">Rented</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-6">
                <label class="form-label">Contact No. <span class="required">*</span></label>
                <input type="tel" class="form-control" name="contact_no" required>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn-submit">Submit</button>
        </div>

    </form>
</div>

@include('footer')

<script>
    document.querySelectorAll('.locationStatus').forEach(box => {
        box.addEventListener('change', () => {
            document.querySelectorAll('.locationStatus').forEach(cb => {
                if (cb !== box) cb.checked = false;
            });
        });
    });

    document.getElementById('businessPermitForm').addEventListener('submit', function (e) {
        e.preventDefault();

        let valid = true;
        this.querySelectorAll('[required]').forEach(input => {
            input.classList.remove('is-invalid');
            if (!input.value.trim()) {
                input.classList.add('is-invalid');
                valid = false;
            }
        });

        const statusChecked = document.querySelector('.locationStatus:checked');
        if (!statusChecked) {
            alert('Please select business location status.');
            return;
        }

        if (!valid) {
            alert('Please fill in all required fields.');
            return;
        }

        alert('Business Permit Application submitted successfully!');
        this.reset();
    });
</script>

</body>
</html>
