<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Certificate of Residency - Barangay Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/residency.css') }}">
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
                    <a href="{{ route('admin.residents') }}">
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
                    <a href="#" class="dropdown-toggle" class="active">
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
                            <a href="{{ route('admin.residency') }}" class="active">
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
                    <h1 class="page-title">Certificate of Residency Requests</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addResidencyModal">
                        Add Request
                    </button>
                </div>

                <div class="filter-section">
                    <div class="filter-group">
                        <div class="filter-item">
                            <label for="searchInput">Search by Name</label>
                            <input type="text" id="searchInput" placeholder="Enter name...">
                        </div>
                        <div class="filter-item">
                            <label for="statusFilter">Status</label>
                            <select id="statusFilter">
                                <option value="">All Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Disapproved">Disapproved</option>
                                <option value="Claimed">Claimed</option>
                            </select>
                        </div>
                        <div class="filter-item">
                            <label for="dateFilter">Date Issued</label>
                            <input type="date" id="dateFilter">
                        </div>
                        <button class="btn-reset" onclick="resetFilters()">Reset Filters</button>
                    </div>
                </div>

                <div class="table-section">
                    <div class="table-header">
                        <span class="record-count">Total Requests: <span id="recordCount">0</span></span>
                    </div>
                    <div class="table-responsive">
                        <table id="requestTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Purpose</th>
                                    <th>Date Issued</th>
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

            </div>

            <!-- add residency modal -->
            <div class="modal fade" id="addResidencyModal" tabindex="-1" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Add Residency Request</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="resetResidencyModal()"></button>
                        </div>

                        <div class="modal-body">


                            <label><b>Search ID / Firstname / Lastname</b></label>
                            <input type="text" id="searchResident" class="form-control" placeholder="Enter ID or Name">
                            <button class="btn btn-success mt-2" onclick="findResident()">Search</button>

                            <hr>


                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Full Name</label>
                                    <input type="text" id="fullname" class="form-control" disabled>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Date of Birth</label>
                                    <input type="date" id="date_of_birth" class="form-control" disabled>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Civil Status</label>
                                    <input type="text" id="civil_no" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Address</label>
                                    <input type="text" id="address" class="form-control" disabled>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Citizenship</label>
                                    <input type="text" id="citizenship" class="form-control" disabled>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Purpose</label>
                                    <input type="text" id="purpose" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Year of Residency</label>
                                    <input type="date" id="year_of_residency" class="form-control">
                                </div>
                            </div>

                            <input type="hidden" id="residentID">

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetResidencyModal()">Cancel</button>
                            <button class="btn btn-primary" onclick="saveResidency()">Save</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- view residency modal -->
            <div class="modal fade" id="viewResidencyModal" tabindex="-1" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">View Residency Request</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="resetViewResidencyModal()"></button>
                        </div>

                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <label>Fullname</label>
                                    <input type="text" id="view_fullname" class="form-control" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label>Date of Birth</label>
                                    <input type="date" id="view_date_of_birth" class="form-control" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label>Civil Status</label>
                                    <input type="text" id="view_civil_no" class="form-control" disabled>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Address</label>
                                    <input type="text" id="view_address" class="form-control" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label>Citizenship</label>
                                    <input type="text" id="view_citizenship" class="form-control" disabled>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Purpose</label>
                                    <input type="text" id="view_purpose" class="form-control" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label>Year of Residency</label>
                                    <input type="date" id="view_year_of_residency" class="form-control" disabled>
                                </div>
                            </div>


                            <input type="hidden" id="view_residencyID">

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-success" onclick="updateResidencyStatus('Approved')">Approved</button>
                            <button class="btn btn-danger" onclick="updateResidencyStatus('Disapproved')">Disapproved</button>
                            <button class="btn btn-primary" onclick="updateResidencyStatus('Claimed')">Claimed</button>
                            <button class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetViewResidencyModal()">Cancel</button>
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

        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('statusFilter').value = '';
            document.getElementById('dateFilter').value = '';
        }


        function findResident() {
            let search = document.getElementById("searchResident").value;

            fetch(`/residency/search?q=${search}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'not_found') {
                        alert("Resident not found!");
                        resetResidencyModal();
                        return;
                    }

                    // Fill hidden residentID
                    document.getElementById("residentID").value = data.residentID;

                    // Autofill fields
                    document.getElementById("fullname").value =
                        `${data.firstname} ${data.middlename ?? ''} ${data.lastname}`;
                    document.getElementById("date_of_birth").value = data.date_of_birth;
                    document.getElementById("civil_no").value = data.civil_status_name; // NAME, not ID
                    document.getElementById("address").value =
                        `${data.house_no} ${data.street}, ${data.area}`;
                    document.getElementById("citizenship").value = data.citizenship;
                });
        }

        function resetResidencyModal() {
            document.getElementById("searchResident").value = "";
            document.getElementById("residentID").value = "";
            document.getElementById("fullname").value = "";
            document.getElementById("date_of_birth").value = "";
            document.getElementById("civil_no").value = "";
            document.getElementById("address").value = "";
            document.getElementById("citizenship").value = "";
            document.getElementById("purpose").value = "";
            document.getElementById("year_of_residency").value = "";
        }

        function saveResidency() {
            const payload = {
                residentID: document.getElementById("residentID").value,
                purpose: document.getElementById("purpose").value,
                year_of_residency: document.getElementById("year_of_residency").value
            };

            fetch("/residency/store", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(data => {
                    alert("Residency request saved!");
                    location.reload();
                });
        }

        document.addEventListener("DOMContentLoaded", function() {
            loadResidencyRequests();
        });

        function loadResidencyRequests() {
            fetch('/residency/load')
                .then(res => res.json())
                .then(data => {
                    const tableBody = document.getElementById('tableBody');
                    const recordCount = document.getElementById('recordCount');
                    const noResults = document.getElementById('noResults');

                    tableBody.innerHTML = "";

                    if (!data || data.length === 0) {
                        noResults.style.display = "block";
                        recordCount.textContent = 0;
                        return;
                    }

                    noResults.style.display = "none";
                    recordCount.textContent = data.length;

                    data.forEach(req => {
                        let fullName = req.resident ? `${req.resident.firstname} ${req.resident.lastname}` : 'N/A';
                        let row = `
                    <tr>
                        <td>${fullName}</td>
                        <td>${req.purpose}</td>
                        <td>${req.date_issued ?? ""}</td>
                        <td><span class="status-badge ${req.status.toLowerCase()}">${req.status}</span></td>
                        <td>
                            <button class="btn btn-info btn-sm" onclick="openViewResidencyModal(${req.residencyID})">View</button>
                            <button class="btn btn-success btn-sm">Generate</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteResidency(${req.residencyID})">Delete</button>
                        </td>
                    </tr>
                `;
                        tableBody.insertAdjacentHTML("beforeend", row);
                    });
                });
        }

        // Open view modal and populate data
        function openViewResidencyModal(residencyID) {
            fetch(`/residency/view/${residencyID}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'not_found') {
                        alert(data.message);
                        return;
                    }

                    document.getElementById("view_residencyID").value = data.residencyID;
                    document.getElementById("view_fullname").value =
                        `${data.resident.firstname} ${data.resident.middlename ?? ''} ${data.resident.lastname}`;
                    document.getElementById("view_date_of_birth").value = data.resident.date_of_birth;
                    document.getElementById("view_civil_no").value = data.resident.civil_status?.civil_stat ?? '';
                    console.log(data.resident);
                    document.getElementById("view_address").value =
                        `${data.resident.house_no} ${data.resident.street}, ${data.resident.area?.area_name ?? ''}`;
                    document.getElementById("view_citizenship").value = data.resident.citizenship;
                    document.getElementById("view_purpose").value = data.purpose;
                    document.getElementById("view_year_of_residency").value = data.year_of_residency;

                    // Show modal
                    new bootstrap.Modal(document.getElementById('viewResidencyModal')).show();
                });
        }

        // Reset modal
        function resetViewResidencyModal() {
            document.getElementById("view_residencyID").value = "";
            document.getElementById("view_fullname").value = "";
            document.getElementById("view_date_of_birth").value = "";
            document.getElementById("view_civil_no").value = "";
            document.getElementById("view_address").value = "";
            document.getElementById("view_citizenship").value = "";
            document.getElementById("view_purpose").value = "";
            document.getElementById("view_year_of_residency").value = "";
        }


        function updateResidencyStatus(status) {
            const residencyID = document.getElementById("view_residencyID").value;

            fetch(`/residency/status/${residencyID}`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert(`Residency request ${status.toLowerCase()} successfully!`);
                        location.reload();
                    }
                });
        }

        function deleteResidency(residencyID) {
            if (!confirm("Are you sure you want to delete this request?")) return;

            fetch(`/residency/delete/${residencyID}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        loadResidencyRequests(); // reload table
                    } else {
                        alert(data.message);
                    }
                });
        }
    </script>
</body>

</html>