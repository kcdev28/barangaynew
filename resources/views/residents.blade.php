<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Barangay Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/residents.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="wrapper">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <img src="{{ asset('images/sanagustinlogo.png') }}" alt="Logo">
                </div>
                <div class="brand-name">Brgy. San Agustin</div>
            </div>

            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('icons/data-report.png') }}" alt="Dashboard">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.residents') }}" class="active">
                        <img src="{{ asset('icons/crowd-of-users.png') }}" alt="Resident Record">
                        <span>Resident Record</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('icons/group.png') }}" alt="Barangay Officials & Staff">
                        <span>Barangay Officials & Staff</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('icons/house.png') }}" alt="Household">
                        <span>Household</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('icons/resolution.png') }}" alt="Blotter Records">
                        <span>Blotter Records</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('icons/driver-license.png') }}" alt="Blotter Records">
                        <span>Barangay ID</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle">
                        <img src="{{ asset('icons/quality.png') }}" alt="Certificates">
                        <span>Certificates</span>
                    </a>
                    <ul class="submenu" id="certificatesMenu">
                        <li>
                            <a href="{{ route('admin.indigency') }}">
                                <span>Certificate of Indigency</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.residency') }}">
                                <span>Certificate of Residency</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.jobseeker') }}">
                                <span>First Time Job Seeker</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('icons/custom-clearance.png') }}" alt="Clearance">
                        <span>Barangay Clearance</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('icons/approval.png') }}" alt="Clearance">
                        <span>Business Permit</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('icons/advertising.png') }}" alt="Announcement">
                        <span>Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('icons/audit.png') }}" alt="Audit Trail">
                        <span>Audit Trail</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('icons/web-settings.png') }}" alt="Maintenance">
                        <span>Maintenance</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('icons/self-employed.png') }}" alt="User Accounts">
                        <span>User Accounts</span>
                    </a>
                </li>
            </ul>

            <div class="logout-section">
                <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button class="logout-btn" onclick="confirmLogout(event)">
                    <img src="{{ asset('icons/logout.png') }}" alt="Logout">
                    <span>Logout</span>
                </button>
            </div>
        </aside>

        <div class="main-content">
            <header class="header">
                <div>
                    <div class="user-name" id="userName">{{ session('user_name') }}</div>
                    <div class="date-time" id="dateTime"></div>
                </div>
            </header>

            <div class="content">
                <div class="page-header">
                    <h1 class="page-title">Resident Records</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#residentModal" onclick="openAddModal()">
                        <i class="bi bi-plus-circle"></i> Add Resident
                    </button>
                </div>

                <div class="filter-section">
                    <div class="filter-group">
                        <div class="filter-item">
                            <label for="searchInput">Search by Name or ID</label>
                            <input type="text" id="searchInput" placeholder="Enter name or ID...">
                        </div>
                        <div class="filter-item">
                            <label for="statusFilter">Status</label>
                            <select id="statusFilter">
                                <option value="">All Status</option>
                                <option value="Not Verified">Not Verified</option>
                                <option value="Verified">Verified</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                        <div class="filter-item">
                            <label for="genderFilter">Gender</label>
                            <select id="genderFilter">
                                <option value="">All Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="filter-item">
                            <label for="voterFilter">Voter Status</label>
                            <select id="voterFilter">
                                <option value="">All</option>
                                <option value="1">Registered Voter</option>
                                <option value="0">Non-Registered</option>

                            </select>
                        </div>
                        <button class="btn-reset" onclick="resetFilters()">Reset Filters</button>
                    </div>
                </div>

                <div class="table-section">
                    <div class="table-header">
                        <span class="record-count">Total Residents: <span id="recordCount">0</span></span>
                    </div>
                    <div class="table-responsive">
                        <table id="residentTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Voter</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                            </tbody>
                        </table>
                        <div id="noResults" class="no-results" style="display:none;">
                            No records found.
                        </div>
                    </div>
                </div>

                <!-- add modal -->
                <div class="modal fade" id="residentModal" tabindex="-1" aria-labelledby="residentModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="residentModalLabel">Add New Resident</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="residentForm" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Personal Information Section -->
                                    <div class="section-header">
                                        <h6>Personal Information</h6>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="middlename" class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" id="middlename" name="middlename">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="suffix" class="form-label">Suffix</label>
                                            <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Jr., Sr., III">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="profile_image" class="form-label">Profile Image</label>
                                            <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="date_of_birth" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                            <select class="form-select" id="gender" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="civil_no" class="form-label">Civil Status <span class="text-danger">*</span></label>
                                            <select class="form-select" id="civil_no" name="civil_no" required>
                                                <option value="">Select Civil Status</option>
                                                @foreach($civilStatuses as $civil)
                                                <option value="{{ $civil->civilID }}">{{ $civil->civil_stat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="contact_no" class="form-label">Contact Number <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="+63" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="religion_no" class="form-label">Religion <span class="text-danger">*</span></label>
                                            <select class="form-select" id="religion_no" name="religion_no" required>
                                                <option value="">Select Religion</option>
                                                @foreach($religions as $religion)
                                                <option value="{{ $religion->religionID }}">{{ $religion->religion }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="citizenship" class="form-label">Citizenship</label>
                                            <input type="text" class="form-control" id="citizenship" name="citizenship" value="Filipino">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="voter_status" class="form-label">Voter Status <span class="text-danger">*</span></label>
                                            <select class="form-select" id="voter_status" name="voter_status" required>
                                                <option value="0">Select Status</option>
                                                <option value="1">Registered Voter</option>
                                                <option value="0">Non-Registered</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="precinct_no" class="form-label">Precinct Number</label>
                                            <input type="text" class="form-control" id="precinct_no" name="precinct_no" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="occupation" class="form-label">Occupation</label>
                                            <input type="text" class="form-control" id="occupation" name="occupation">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="employment_status" class="form-label">Employment Status</label>
                                            <select class="form-select" id="employment_status" name="employment_status">
                                                <option value="">Select Status</option>
                                                <option value="Employed">Employed</option>
                                                <option value="Unemployed">Unemployed</option>
                                                <option value="Self-Employed">Self-Employed</option>
                                                <option value="Student">Student</option>
                                                <option value="Retired">Retired</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="special_group_no" class="form-label">Special Group</label>
                                            <select class="form-select" id="special_group_no" name="special_group_no">
                                                <option value="">None</option>
                                                @foreach($specialStatuses as $special)
                                                <option value="{{ $special->specialID }}">{{ $special->status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="verify_img" class="form-label">Verification Image</label>
                                            <input type="file" class="form-control" id="verify_img" name="verify_img" accept="image/*">
                                            <small class="form-text text-muted">Upload a valid ID, Meralco Bill, Internet Bill for verification</small>
                                        </div>
                                    </div>

                                    <!-- Address Information Section -->
                                    <div class="section-header mt-4">
                                        <h6>Address Information</h6>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="house_no" class="form-label">House No. <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="house_no" name="house_no" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="street" class="form-label">Street <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="street" name="street" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="area_no" class="form-label">Area/Purok <span class="text-danger">*</span></label>
                                            <select class="form-select" id="area_no" name="area_no" required>
                                                <option value="">Select Area</option>
                                                @foreach($areas as $area)
                                                <option value="{{ $area->areaID }}">{{ $area->area_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Account Information Section -->
                                    <div class="section-header mt-4">
                                        <h6>Account Information</h6>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                            <div class="invalid-feedback" id="passwordError" style="display: none;">
                                                Passwords do not match.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="showPassword">
                                                <label class="form-check-label" for="showPassword">
                                                    Show Password
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="saveResident()">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- view modal -->
                <div class="modal fade" id="viewResidentModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">View Resident Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <!-- PROFILE IMAGE CENTER -->
                                <div class="row mb-4 justify-content-center">
                                    <div class="col-md-6 text-center">
                                        <h6 class="fw-bold mb-2">Profile Image</h6>
                                        <img id="viewImage" class="img-fluid rounded border"
                                            style="height: 250px; width: 250px; object-fit: cover;">
                                    </div>
                                </div>

                                <hr>

                                <!-- PERSONAL INFORMATION -->
                                <h5 class="mb-3">Personal Information</h5>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <p><strong>First Name:</strong><br><span id="viewFirstname"></span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><strong>Middle Name:</strong><br><span id="viewMiddlename"></span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><strong>Last Name:</strong><br><span id="viewLastname"></span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><strong>Suffix:</strong><br><span id="viewSuffix"></span></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <p><strong>Date of Birth:</strong><br><span id="viewBirthdate"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Gender:</strong><br><span id="viewGender"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Civil Status:</strong><br><span id="viewCivilStatus"></span></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <p><strong>Contact Number:</strong><br><span id="viewContact"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Religion:</strong><br><span id="viewReligion"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Citizenship:</strong><br><span id="viewCitizenship"></span></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <p><strong>Voter Status:</strong><br><span id="viewVoterStatus"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Precinct No.:</strong><br><span id="viewPrecinct"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Occupation:</strong><br><span id="viewOccupation"></span></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <p><strong>Employment Status:</strong><br><span id="viewEmploymentStatus"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Special Group:</strong><br><span id="viewSpecialGroup"></span></p>
                                    </div>
                                </div>

                                <hr>

                                <!-- ADDRESS INFORMATION -->
                                <h5 class="mb-3">Address Information</h5>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <p><strong>House No.:</strong><br><span id="viewHouseNo"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Street:</strong><br><span id="viewStreet"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Purok / Area:</strong><br><span id="viewArea"></span></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <p><strong>Full Address:</strong><br>
                                            <span id="viewFullAddress" class="fw-bold text-primary"></span>
                                        </p>
                                    </div>
                                </div>

                                <hr>

                                <!-- VERIFICATION IMAGE CENTER AT BOTTOM -->
                                <div class="row mb-4 justify-content-center">
                                    <div class="col-md-6 text-center">
                                        <label class="fw-bold mb-2">Verification Image</label>
                                        <img id="viewVerifyImage" class="img-fluid rounded border"
                                            style="max-height: 250px; width: 100%; object-fit: cover;">
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">

                                <!-- VERIFY BUTTON -->
                                <button class="btn btn-success" id="verifyBtn">
                                    Verify Account
                                </button>

                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- edit modal -->
                <div class="modal fade" id="editResidentModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="residentModalLabel">Edit Resident</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="updateresidentForm" enctype="multipart/form-data" novalidate>
                                    @csrf

                                    <!-- Personal Information Section -->
                                    <div class="section-header">
                                        <h6>Personal Information</h6>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="middlename" class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" id="middlename" name="middlename">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="suffix" class="form-label">Suffix</label>
                                            <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Jr., Sr., III">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="profile_image" class="form-label">Profile Image</label>
                                            <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="date_of_birth" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                            <select class="form-select" id="gender" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="civil_no" class="form-label">Civil Status <span class="text-danger">*</span></label>
                                            <select class="form-select" id="civil_no" name="civil_no" required>
                                                <option value="">Select Civil Status</option>
                                                @foreach($civilStatuses as $civil)
                                                <option value="{{ $civil->civilID }}">{{ $civil->civil_stat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="contact_no" class="form-label">Contact Number <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="+63" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="religion_no" class="form-label">Religion <span class="text-danger">*</span></label>
                                            <select class="form-select" id="religion_no" name="religion_no" required>
                                                <option value="">Select Religion</option>
                                                @foreach($religions as $religion)
                                                <option value="{{ $religion->religionID }}">{{ $religion->religion }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="citizenship" class="form-label">Citizenship</label>
                                            <input type="text" class="form-control" id="citizenship" name="citizenship" value="Filipino">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="voter_status" class="form-label">Voter Status <span class="text-danger">*</span></label>
                                            <select class="form-select" id="voter_status" name="voter_status" required>
                                                <option value="0">Select Status</option>
                                                <option value="1">Registered Voter</option>
                                                <option value="0">Non-Registered</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="precinct_no" class="form-label">Precinct Number</label>
                                            <input type="text" class="form-control" id="precinct_no" name="precinct_no" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="occupation" class="form-label">Occupation</label>
                                            <input type="text" class="form-control" id="occupation" name="occupation">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="employment_status" class="form-label">Employment Status</label>
                                            <select class="form-select" id="employment_status" name="employment_status">
                                                <option value="">Select Status</option>
                                                <option value="Employed">Employed</option>
                                                <option value="Unemployed">Unemployed</option>
                                                <option value="Self-Employed">Self-Employed</option>
                                                <option value="Student">Student</option>
                                                <option value="Retired">Retired</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="special_group_no" class="form-label">Special Group</label>
                                            <select class="form-select" id="special_group_no" name="special_group_no">
                                                <option value="">None</option>
                                                @foreach($specialStatuses as $special)
                                                <option value="{{ $special->specialID }}">{{ $special->status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="verify_img" class="form-label">Verification Image</label>
                                            <input type="file" class="form-control" id="verify_img" name="verify_img" accept="image/*">
                                            <small class="form-text text-muted">Upload a valid ID, Meralco Bill, Internet Bill for verification</small>
                                        </div>
                                    </div>

                                    <!-- Address Information Section -->
                                    <div class="section-header mt-4">
                                        <h6>Address Information</h6>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="house_no" class="form-label">House No. <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="house_no" name="house_no" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="street" class="form-label">Street <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="street" name="street" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="area_no" class="form-label">Area/Purok <span class="text-danger">*</span></label>
                                            <select class="form-select" id="area_no" name="area_no" required>
                                                <option value="">Select Area</option>
                                                @foreach($areas as $area)
                                                <option value="{{ $area->areaID }}">{{ $area->area_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Account Information Section -->
                                    <div class="section-header mt-4">
                                        <h6>Account Information</h6>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                            <div class="invalid-feedback" id="passwordError" style="display: none;">
                                                Passwords do not match.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="showPassword">
                                                <label class="form-check-label" for="showPassword">
                                                    Show Password
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="updateResident()">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        function updateDateTime() {
            const dateTimeElement = document.getElementById('dateTime');
            const now = new Date();
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            };
            const formattedDateTime = now.toLocaleDateString('en-US', options);
            dateTimeElement.textContent = formattedDateTime;
        }

        updateDateTime();
        setInterval(updateDateTime, 1000);

        const dropdownToggle = document.querySelector('.dropdown-toggle');
        const certificatesMenu = document.getElementById('certificatesMenu');

        dropdownToggle.addEventListener('click', function(e) {
            e.preventDefault();
            certificatesMenu.classList.toggle('show');
        });

        const menuItems = document.querySelectorAll('.sidebar-menu > li > a:not(.dropdown-toggle)');
        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                menuItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });

        function confirmLogout(event) {
            event.preventDefault();

            if (confirm('Are you sure you want to logout?')) {
                document.getElementById('logoutForm').submit();
            }
        }

        document.getElementById('date_of_birth').addEventListener('change', function() {
            const dob = new Date(this.value);
            const today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            const monthDiff = today.getMonth() - dob.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }

            const precinctInput = document.getElementById('precinct_no');
            if (age >= 18) {
                precinctInput.disabled = false;
            } else {
                precinctInput.disabled = true;
                precinctInput.value = '';
            }
        });

        // Show/Hide password functionality
        document.getElementById('showPassword').addEventListener('change', function() {
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirm_password');

            if (this.checked) {
                passwordInput.type = 'text';
                confirmPasswordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
                confirmPasswordInput.type = 'password';
            }
        });

        // Password match validation
        function validatePasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const confirmPasswordInput = document.getElementById('confirm_password');
            const passwordError = document.getElementById('passwordError');

            if (password !== confirmPassword && confirmPassword !== '') {
                confirmPasswordInput.classList.add('is-invalid');
                passwordError.style.display = 'block';
                return false;
            } else {
                confirmPasswordInput.classList.remove('is-invalid');
                passwordError.style.display = 'none';
                return true;
            }
        }

        document.getElementById('password').addEventListener('input', validatePasswordMatch);
        document.getElementById('confirm_password').addEventListener('input', validatePasswordMatch);

        // Open modal function
        function openAddModal() {
            document.getElementById('residentForm').reset();
            document.getElementById('residentModalLabel').textContent = 'Add New Resident';
            document.getElementById('precinct_no').disabled = true;
            document.getElementById('confirm_password').classList.remove('is-invalid');
            document.getElementById('passwordError').style.display = 'none';
        }

        // Save resident function
        function saveResident() {
            const form = document.getElementById('residentForm');

            // Check form validity
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            // Validate password match
            if (!validatePasswordMatch()) {
                alert('Please make sure passwords match.');
                return;
            }

            const formData = new FormData(form);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const saveButton = event.target;
            const originalText = saveButton.textContent;
            saveButton.textContent = 'Saving...';
            saveButton.disabled = true;

            fetch('/admin/residents/store', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        const modal = bootstrap.Modal.getInstance(document.getElementById('residentModal'));
                        modal.hide();
                        form.reset();
                        loadResidents();
                    } else {
                        let errorMessage = data.message;
                        if (data.errors) {
                            errorMessage += '\n\n';
                            for (let field in data.errors) {
                                errorMessage += '• ' + data.errors[field].join('\n• ') + '\n';
                            }
                        }
                        alert(errorMessage);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while saving the resident. Please try again.');
                })
                .finally(() => {
                    saveButton.textContent = originalText;
                    saveButton.disabled = false;
                });
        }

        function loadResidents() {
            fetch('/admin/residents/list')
                .then(res => res.json())
                .then(data => {
                    const tbody = document.getElementById("tableBody");
                    tbody.innerHTML = "";

                    if (!data.data.length) {
                        document.getElementById("noResults").style.display = "block";
                        return;
                    }

                    document.getElementById("noResults").style.display = "none";

                    data.data.forEach(row => {
                        tbody.innerHTML += `
                            <tr>
                                <td>${row.firstname} ${row.lastname}</td>
                                <td>${row.gender}</td>
                                <td>${row.voter_status == 1 ? "Registered" : "Not-Registered"}</td>
                                <td>${row.status}</td>
                                
                                <td>
                                    <button class="btn btn-info btn-sm viewBtn" data-id="${row.residentID}">
                                         View
                                    </button>
                                    <button class="btn btn-warning btn-sm editBtn" data-id="${row.residentID}">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteResident(${row.residentID})">
                                        Delete
                                    </button>
                                 </td>
                            </tr>
                        `;
                    });

                    document.getElementById("recordCount").innerText = data.data.length;
                });
        }

        loadResidents();

        // Handle View and Edit button clicks
        document.addEventListener("click", function(e) {
            if (e.target.classList.contains("viewBtn")) {
                const id = e.target.getAttribute("data-id");
                loadResidentDetails(id);
            }

            if (e.target.classList.contains("editBtn")) {
                const id = e.target.getAttribute("data-id");
                loadResidentForEdit(id);
            }
        });

        // Store current resident ID for verify and update buttons
        let currentResidentId = null;

        function loadResidentDetails(id) {
            currentResidentId = id;

            fetch(`/admin/residents/view/${id}`)
                .then(res => res.json())
                .then(response => {
                    if (!response.success) {
                        alert("Resident not found!");
                        return;
                    }

                    const data = response.data;

                    // PROFILE IMAGE
                    document.getElementById("viewImage").src = data.profile_image ?
                        `/storage/${data.profile_image}` :
                        "/images/default-profile.png";

                    // VERIFICATION IMAGE
                    document.getElementById("viewVerifyImage").src = data.verify_image ?
                        `/storage/${data.verify_image}` :
                        "/images/default-verification.jpg";

                    // PERSONAL INFO
                    document.getElementById("viewFirstname").innerText = data.firstname || "";
                    document.getElementById("viewMiddlename").innerText = data.middlename || "N/A";
                    document.getElementById("viewLastname").innerText = data.lastname || "";
                    document.getElementById("viewSuffix").innerText = data.suffix || "N/A";
                    document.getElementById("viewBirthdate").innerText = data.date_of_birth || "";
                    document.getElementById("viewGender").innerText = data.gender || "";
                    document.getElementById("viewCivilStatus").innerText = (data.civil_status && data.civil_status.civil_stat) ? data.civil_status.civil_stat : "N/A";
                    document.getElementById("viewContact").innerText = data.contact_no || "";
                    document.getElementById("viewReligion").innerText = (data.religion && data.religion.religion) ? data.religion.religion : "N/A";
                    document.getElementById("viewCitizenship").innerText = data.citizenship || "";
                    document.getElementById("viewVoterStatus").innerText = data.voter_status == 1 ? "Registered" : "Not-Registered";
                    document.getElementById("viewPrecinct").innerText = data.precinct_no || "N/A";
                    document.getElementById("viewOccupation").innerText = data.occupation || "N/A";
                    document.getElementById("viewEmploymentStatus").innerText = data.employment_status || "N/A";
                    document.getElementById("viewSpecialGroup").innerText = (data.special_group && data.special_group.status) ? data.special_group.status : "N/A";

                    // ADDRESS
                    document.getElementById("viewHouseNo").innerText = data.house_no || "";
                    document.getElementById("viewStreet").innerText = data.street || "";
                    document.getElementById("viewArea").innerText = (data.area && data.area.area_name) ? data.area.area_name : "N/A";

                    // Full Address
                    const areaName = (data.area && data.area.area_name) ? data.area.area_name : "";
                    document.getElementById("viewFullAddress").innerText =
                        `${data.house_no || ""}, ${data.street || ""}, ${areaName}`;

                    // Update Verify Button based on status
                    const verifyBtn = document.getElementById("verifyBtn");
                    if (data.status === 'Verified') {
                        verifyBtn.disabled = true;
                        verifyBtn.textContent = 'Already Verified';
                        verifyBtn.classList.remove('btn-success');
                        verifyBtn.classList.add('btn-secondary');
                    } else {
                        verifyBtn.disabled = false;
                        verifyBtn.textContent = 'Verify Account';
                        verifyBtn.classList.remove('btn-secondary');
                        verifyBtn.classList.add('btn-success');
                    }

                    // Show modal
                    const modal = new bootstrap.Modal(document.getElementById("viewResidentModal"));
                    modal.show();
                })
                .catch(err => {
                    console.error(err);
                    alert("Error loading resident details.");
                });
        }

        // Load Resident Data for Editing

        function loadResidentForEdit(id) {
            currentResidentId = id;

            fetch(`/admin/residents/view/${id}`)
                .then(res => res.json())
                .then(response => {
                    if (!response.success) {
                        alert("Resident not found!");
                        return;
                    }

                    const data = response.data;
                    console.log("Loaded data:", data); // Debug line

                    // Get the form inside editResidentModal
                    const modal = document.getElementById('editResidentModal');

                    // Populate form fields - make sure these IDs exist in your editResidentModal
                    modal.querySelector('#firstname').value = data.firstname || '';
                    modal.querySelector('#middlename').value = data.middlename || '';
                    modal.querySelector('#lastname').value = data.lastname || '';
                    modal.querySelector('#suffix').value = data.suffix || '';
                    modal.querySelector('#house_no').value = data.house_no || '';
                    modal.querySelector('#street').value = data.street || '';
                    modal.querySelector('#area_no').value = data.area_no || '';
                    modal.querySelector('#date_of_birth').value = data.date_of_birth || '';
                    modal.querySelector('#gender').value = data.gender || '';
                    modal.querySelector('#civil_no').value = data.civil_no || '';
                    modal.querySelector('#contact_no').value = data.contact_no || '';
                    modal.querySelector('#religion_no').value = data.religion_no || '';
                    modal.querySelector('#citizenship').value = data.citizenship || 'Filipino';
                    modal.querySelector('#voter_status').value = data.voter_status || '0';
                    modal.querySelector('#precinct_no').value = data.precinct_no || '';
                    modal.querySelector('#occupation').value = data.occupation || '';
                    modal.querySelector('#employment_status').value = data.employment_status || '';
                    modal.querySelector('#special_group_no').value = data.special_group_no || '';
                    modal.querySelector('#email').value = data.email || '';

                    // Make password fields optional for editing
                    modal.querySelector('#password').required = false;
                    modal.querySelector('#confirm_password').required = false;
                    modal.querySelector('#password').value = '';
                    modal.querySelector('#confirm_password').value = '';

                    // Enable precinct field if age >= 18
                    const dob = new Date(data.date_of_birth);
                    const today = new Date();
                    let age = today.getFullYear() - dob.getFullYear();
                    const monthDiff = today.getMonth() - dob.getMonth();
                    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                        age--;
                    }
                    modal.querySelector('#precinct_no').disabled = age < 18;

                    // Update modal title
                    modal.querySelector('#residentModalLabel').textContent = 'Edit Resident';

                    // Show modal
                    const bootstrapModal = new bootstrap.Modal(modal);
                    bootstrapModal.show();
                })
                .catch(err => {
                    console.error(err);
                    alert("Error loading resident data for editing.");
                });
        }
        // Update Resident Function
        function updateResident() {
            const form = document.getElementById('updateresidentForm');

            // Check form validity
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }



            const password = document.getElementById('password').value;
            if (password && !validatePasswordMatch()) {
                alert('Please make sure passwords match.');
                return;
            }

            const formData = new FormData(form);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const updateButton = event.target;
            const originalText = updateButton.textContent;
            updateButton.textContent = 'Updating...';
            updateButton.disabled = true;

            fetch(`/admin/residents/update/${currentResidentId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);

                        // Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('editResidentModal'));
                        modal.hide();

                        // Reset form
                        form.reset();

                        // Reload residents table
                        loadResidents();
                    } else {
                        let errorMessage = data.message;
                        if (data.errors) {
                            errorMessage += '\n\n';
                            for (let field in data.errors) {
                                errorMessage += '• ' + data.errors[field].join('\n• ') + '\n';
                            }
                        }
                        alert(errorMessage);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating the resident. Please try again.');
                })
                .finally(() => {
                    updateButton.textContent = originalText;
                    updateButton.disabled = false;
                });
        }

        // Verify Button Click Handler
        document.getElementById("verifyBtn").addEventListener("click", function() {
            if (!currentResidentId) {
                alert("No resident selected!");
                return;
            }

            if (!confirm("Are you sure you want to verify this resident's account?")) {
                return;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const button = this;
            const originalText = button.textContent;

            button.textContent = 'Verifying...';
            button.disabled = true;

            fetch(`/admin/residents/verify/${currentResidentId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);

                        const modal = bootstrap.Modal.getInstance(document.getElementById("viewResidentModal"));
                        modal.hide();

                        loadResidents();
                    } else {
                        alert(data.message);
                        button.textContent = originalText;
                        button.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while verifying the resident.');
                    button.textContent = originalText;
                    button.disabled = false;
                });
        });

        function deleteResident(id) {

            if (!confirm("Are you sure you want to delete this resident?")) {
                return;
            }

            fetch(`/admin/residents/delete/${id}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json"
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("Resident deleted successfully.");
                        loadResidents(); // refresh table
                    } else {
                        alert("Delete failed.");
                    }
                })
                .catch(err => {
                    alert("Error deleting resident.");
                    console.error(err);
                });
        }

        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('statusFilter').value = '';
            document.getElementById('genderFilter').value = '';
            document.getElementById('voterFilter').value = '';
        }
    </script>
</body>

</html>