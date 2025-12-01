<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Indigency - Barangay Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/indigency.css') }}">
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
                            <a href="{{ route('admin.indigency') }}" class="active">
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
                    <h1 class="page-title">Certificate of Indigency Requests</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addIndigencyModal">
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
                                <option value="Claimed">Claimed</option>
                                <option value="Disapproved">Disapproved</option>
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

            <!-- add indigency modal -->
            <div class="modal fade" id="addIndigencyModal" tabindex="-1" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Add Indigency Request</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="resetIndigencyModal()"></button>
                        </div>

                        <div class="modal-body">

                            <label><b>Search ID / Firstname / Lastname</b></label>
                            <input type="text" id="searchResident" class="form-control" placeholder="Enter ID or Name">
                            <button class="btn btn-success mt-2" onclick="findResident()">Search</button>

                            <hr>

                            <div class="row">
                                <div class="col-md-4">
                                    <label>Fullname</label>
                                    <input type="text" id="fullname" class="form-control" disabled>
                                </div>

                                <div class="col-md-4">
                                    <label>Civil Status</label>
                                    <input type="text" id="civil_no" class="form-control" disabled>
                                </div>

                                <div class="col-md-4">
                                    <label>Citizenship</label>
                                    <input type="text" id="citizenship" class="form-control" disabled>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Purpose</label>
                                    <input type="text" id="purpose" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label>Year of Residency</label>
                                    <input type="date" id="year_of_residency" class="form-control">
                                </div>
                            </div>

                            <input type="hidden" id="residentID">

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetIndigencyModal()">Cancel</button>
                            <button class="btn btn-primary" onclick="saveIndigency()">Save</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- view indigency modal -->
            <div class="modal fade" id="viewModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Indigency Request Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <input type="hidden" id="view_indigencyID">

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" id="view_fullname" class="form-control" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Purpose</label>
                                <input type="text" id="view_purpose" class="form-control" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Year of Residency</label>
                                <input type="text" id="view_year" class="form-control" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <input type="text" id="view_status" class="form-control" readonly>
                            </div>

                        </div>

                        <div class="modal-footer">

                            <button class="btn btn-success" onclick="updateStatus('Approved')">Approve</button>
                            <button class="btn btn-danger" onclick="updateStatus('Disapproved')">Disapproved</button>
                            <button class="btn btn-primary" onclick="updateStatus('Claimed')">Claimed</button>

                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

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

        document.getElementById('searchInput').addEventListener('input', filterIndigencyRequests);
        document.getElementById('statusFilter').addEventListener('change', filterIndigencyRequests);
        document.getElementById('dateFilter').addEventListener('change', filterIndigencyRequests);

        function filterIndigencyRequests() {
            const searchValue = document.getElementById('searchInput').value.toLowerCase();
            const statusValue = document.getElementById('statusFilter').value;
            const dateValue = document.getElementById('dateFilter').value;

            const rows = document.querySelectorAll('#tableBody tr');
            let visibleCount = 0;

            rows.forEach(row => {
                const cells = row.cells;
                const name = cells[0].textContent.toLowerCase();
                const purpose = cells[1].textContent.toLowerCase();
                const dateIssued = cells[2].textContent.trim();
                const status = cells[3].textContent.trim();

                
                const matchesSearch = name.includes(searchValue) || purpose.includes(searchValue);
                const matchesStatus = !statusValue || status === statusValue;

                
                let matchesDate = true;
                if (dateValue && dateIssued) {
                 
                    const issuedDate = new Date(dateIssued);
                    const filterDate = new Date(dateValue);

                    matchesDate = issuedDate.toDateString() === filterDate.toDateString();
                } else if (dateValue && !dateIssued) {
                    matchesDate = false;
                }

             
                if (matchesSearch && matchesStatus && matchesDate) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            
            document.getElementById('recordCount').textContent = visibleCount;

           
            const noResults = document.getElementById('noResults');
            if (visibleCount === 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        }

       
        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('statusFilter').value = '';
            document.getElementById('dateFilter').value = '';
            filterIndigencyRequests(); 
        }

        

        function findResident() {
            let search = document.getElementById('searchResident').value;

            fetch(`/indigency/search?search=${search}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status === "not_found") {
                        alert("Resident not found");
                        return;
                    }

                    let r = data.data;

                    document.getElementById('residentID').value = r.residentID;
                    document.getElementById('fullname').value =
                        `${r.firstname} ${r.middlename ?? ''} ${r.lastname}`;


                    document.getElementById('civil_no').value = r.civil_status?.civil_stat || "";

                    document.getElementById('citizenship').value = r.citizenship;
                });
        }


        function saveIndigency() {

            const payload = {
                residentID: document.getElementById('residentID').value,
                purpose: document.getElementById('purpose').value,
                year_of_residency: document.getElementById('year_of_residency').value,
            };

            fetch('/indigency/add', {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(result => {
                    if (result.success) {
                        alert("Indigency Request Saved!");
                        location.reload();
                    }
                });
        }

        function resetIndigencyModal() {
            document.getElementById('searchResident').value = "";
            document.getElementById('residentID').value = "";

            document.getElementById('fullname').value = "";
            document.getElementById('civil_no').value = "";
            document.getElementById('citizenship').value = "";

            document.getElementById('purpose').value = "";
            document.getElementById('year_of_residency').value = "";
        }


        document.addEventListener("DOMContentLoaded", function() {
            loadIndigencyRequests();
        });

        function loadIndigencyRequests() {
            fetch('/indigency/load')
                .then(res => res.json())
                .then(data => {
                    const tableBody = document.getElementById('tableBody');
                    const recordCount = document.getElementById('recordCount');
                    const noResults = document.getElementById('noResults');

                    tableBody.innerHTML = "";

                    if (data.length === 0) {
                        noResults.style.display = "block";
                        recordCount.textContent = 0;
                        return;
                    }

                    noResults.style.display = "none";
                    recordCount.textContent = data.length;

                    data.forEach(req => {
                        let fullName = req.resident.firstname + " " + req.resident.lastname;

                        let row = `
                    <tr>
                        <td>${fullName}</td>
                        <td>${req.purpose}</td>
                        <td>${req.date_issued ?? ""}</td>
                        <td><span class="status-badge ${req.status.toLowerCase()}">${req.status}</span></td>
                        <td>
                            <button class="btn btn-info btn-sm" onclick='openViewModal(${req.indigencyID})'>View</button>
                            <button class="btn btn-success btn-sm">Generate</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteRequest(${req.indigencyID})">Delete</button>
                        </td>
                    </tr>
                `;

                        tableBody.insertAdjacentHTML("beforeend", row);
                    });
                });
        }

        function openViewModal(id) {
            fetch(`/indigency/get/${id}`)
                .then(res => res.json())
                .then(req => {

                    document.getElementById("view_indigencyID").value = req.indigencyID;
                    document.getElementById("view_fullname").value =
                        `${req.resident.firstname} ${req.resident.middlename ?? ''} ${req.resident.lastname}`;
                    document.getElementById("view_purpose").value = req.purpose;
                    document.getElementById("view_year").value = req.year_of_residency;
                    document.getElementById("view_status").value = req.status;

                    let modal = new bootstrap.Modal(document.getElementById('viewModal'));
                    modal.show();
                });
        }

        function updateStatus(status) {
            let id = document.getElementById("view_indigencyID").value;

            fetch(`/indigency/updateStatus/${id}`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        status
                    })
                })
                .then(res => res.json())
                .then(result => {
                    if (result.success) {
                        alert("Status Updated!");


                        let modal = bootstrap.Modal.getInstance(document.getElementById('viewModal'));
                        modal.hide();

                        loadIndigencyRequests();
                    }
                });
        }

        function deleteRequest(id) {
            if (!confirm("Are you sure you want to delete this request?")) {
                return;
            }

            fetch(`/indigency/delete/${id}`, {
                    method: 'DELETE',
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(res => res.json())
                .then(result => {
                    if (result.success) {
                        alert("Record deleted successfully!");
                        loadIndigencyRequests();
                    } else {
                        alert("Failed to delete the record.");
                    }
                });
        }
    </script>
</body>

</html>