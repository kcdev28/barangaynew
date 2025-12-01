<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>First Time Job Seeker - Barangay Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/jobseeker.css') }}">
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
                            <a href="{{ route('admin.residency') }}">
                                <span>Certificate of Residency</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.jobseeker') }}" class="active">
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
                    <h1 class="page-title">First Time Job Seeker Requests</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobseekerModal">
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
                                <option value="Released">Released</option>
                                <option value="Rejected">Rejected</option>
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
                        <span class="record-count">Total Requests: <span id="js_recordCount">0</span></span>
                    </div>
                    <div class="table-responsive">
                        <table id="requestTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Date Issued</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="js_tableBody">
                                
                            </tbody>
                        </table>
                        <div id="js_noResults" class="no-results" style="display:none;">
                            No records found.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Job Seeker Modal -->
            <div class="modal fade" id="addJobseekerModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Add Job Seeker Request</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="resetJobSeekerModal()"></button>
                        </div>

                        <div class="modal-body">

                            <label><b>Search ID / Firstname / Lastname</b></label>
                            <input type="text" id="js_search" class="form-control" placeholder="Enter ID or Name">
                            <button class="btn btn-success mt-2" onclick="findJSResident()">Search</button>

                            <hr>

                            <div class="row">
                                <div class="col-md-4">
                                    <label>Fullname</label>
                                    <input type="text" id="js_fullname" class="form-control" disabled>
                                </div>

                                <div class="col-md-4">
                                    <label>Date of Birth</label>
                                    <input type="text" id="js_dob" class="form-control" disabled>
                                </div>

                                <div class="col-md-4">
                                    <label>Address</label>
                                    <input type="text" id="js_address" class="form-control" disabled>
                                </div>
                            </div>
                            <input type="hidden" id="js_residentID">

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" onclick="closeJobSeekerModal()">Cancel</button>
                            <button class="btn btn-primary" onclick="saveJobseeker()">Save</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- View Job Seeker Modal -->
            <div class="modal fade" id="viewJobSeekerModal" tabindex="-1" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">View Job Seeker Request</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="resetViewJobSeekerModal()"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Full Name</label>
                                <input type="text" id="view_fullname" class="form-control" disabled>
                            </div>

                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" id="view_address" class="form-control" disabled>
                            </div>

                            <input type="hidden" id="view_jobID">
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-success" onclick="updateJobSeekerStatus('Approved')">Approve</button>
                            <button class="btn btn-danger" onclick="updateJobSeekerStatus('Disapproved')">Disapprove</button>
                            <button class="btn btn-primary" onclick="updateJobSeekerStatus('Claimed')">Claimed</button>
                            <button class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetViewJobSeekerModal()">Close</button>
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

        document.getElementById('searchInput').addEventListener('input', filterJobSeekerRequests);
        document.getElementById('statusFilter').addEventListener('change', filterJobSeekerRequests);
        document.getElementById('dateFilter').addEventListener('change', filterJobSeekerRequests);


        function filterJobSeekerRequests() {
            const searchValue = document.getElementById('searchInput').value.toLowerCase();
            const statusValue = document.getElementById('statusFilter').value;
            const dateValue = document.getElementById('dateFilter').value;

            const rows = document.querySelectorAll('#js_tableBody tr');
            let visibleCount = 0;

            rows.forEach(row => {
                const cells = row.cells;
                const name = cells[0].textContent.toLowerCase();
                const address = cells[1].textContent.toLowerCase();
                const dateIssued = cells[2].textContent.trim();
                const status = cells[3].textContent.trim();

                
                const matchesSearch = name.includes(searchValue) || address.includes(searchValue);
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

            
            document.getElementById('js_recordCount').textContent = visibleCount;

            
            const noResults = document.getElementById('js_noResults');
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
            filterJobSeekerRequests();
        }

        document.querySelector('.btn.btn-primary').addEventListener('click', function() {
            new bootstrap.Modal(document.getElementById('addJobseekerModal')).show();
        });

     
        function findJSResident() {
            let search = document.getElementById('js_search').value;

            fetch(`/jobseeker/search?search=${search}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'not_found') {
                        alert('Resident not found');
                        resetJobSeekerModal();
                        return;
                    }

                    let r = data.data;
                    document.getElementById('js_residentID').value = r.residentID;
                    document.getElementById('js_fullname').value = r.fullname;
                    document.getElementById('js_dob').value = r.dob;
                    document.getElementById('js_address').value = r.address;
                });
        }

       
        function saveJobseeker() {
            const payload = {
                residentID: document.getElementById('js_residentID').value
            };

            fetch('/jobseeker/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(result => {
                    if (result.success) {
                        alert('Job Seeker request added successfully!');
                        resetJobSeekerModal();
                        location.reload(); 
                    }
                });
        }

        function resetJobSeekerModal() {
            document.getElementById('js_search').value = '';
            document.getElementById('js_residentID').value = '';
            document.getElementById('js_fullname').value = '';
            document.getElementById('js_dob').value = '';
            document.getElementById('js_address').value = '';
        }

        document.addEventListener("DOMContentLoaded", function() {
            loadJobSeekerRequests();
        });

        function loadJobSeekerRequests() {
            fetch('/jobseeker/load') 
                .then(res => res.json())
                .then(data => {
                    const tableBody = document.getElementById('js_tableBody');
                    const recordCount = document.getElementById('js_recordCount');
                    const noResults = document.getElementById('js_noResults');

                    tableBody.innerHTML = "";

                    if (!data || data.length === 0) {
                        noResults.style.display = "block";
                        recordCount.textContent = 0;
                        return;
                    }

                    noResults.style.display = "none";
                    recordCount.textContent = data.length;

                    data.forEach(req => {
                        const fullName = req.resident ? `${req.resident.firstname} ${req.resident.middlename ?? ''} ${req.resident.lastname}` : 'N/A';
                        const address = req.resident ? `${req.resident.house_no} ${req.resident.street}, ${req.resident.area?.area_name ?? ''}` : '';
                        const status = req.status ?? 'Pending';
                        const dateIssued = req.date_issued ?? '';

                        let row = `
                    <tr>
                        <td>${fullName}</td>
                        <td>${address}</td>
                        <td>${dateIssued}</td>
                        <td><span class="status-badge ${status.toLowerCase()}">${status}</span></td>
                        <td>
                           <button class="btn btn-info btn-sm" onclick="viewJobSeeker(${req.jobID})">View</button>
                            <button class="btn btn-success btn-sm">Generate</button>
                             <button class="btn btn-danger btn-sm" onclick="deleteJobSeeker(${req.jobID})">Delete</button>
                        </td>
                    </tr>
                `;
                        tableBody.insertAdjacentHTML("beforeend", row);
                    });
                });
        }

        function viewJobSeeker(jobID) {
            fetch(`/jobseeker/view/${jobID}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'not_found') {
                        alert('Job Seeker not found!');
                        return;
                    }

                    const js = data.data;

                    document.getElementById('view_jobID').value = js.jobID;
                    document.getElementById('view_fullname').value = js.fullname;
                    document.getElementById('view_address').value = js.address;


                    new bootstrap.Modal(document.getElementById('viewJobSeekerModal')).show();
                });
        }

        function updateJobSeekerStatus(status) {
            const jobID = document.getElementById('view_jobID').value;

            fetch(`/jobseeker/updateStatus/${jobID}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        status
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert(`Status updated to ${status}`);

                        loadJobSeekerRequests();
                    }
                });
        }

        function resetViewJobSeekerModal() {
            document.getElementById('view_jobID').value = '';
            document.getElementById('view_fullname').value = '';
            document.getElementById('view_address').value = '';

        }


        function deleteJobSeeker(jobID) {
            if (!confirm("Are you sure you want to delete this Job Seeker request?")) return;

            fetch(`/jobseeker/delete/${jobID}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        loadJobSeekerRequests(); 
                    } else {
                        alert(data.message);
                    }
                });
        }

        function closeJobSeekerModal() {
           
            resetJobSeekerModal();

           
            const modalEl = document.getElementById('addJobseekerModal');
            const modal = bootstrap.Modal.getInstance(modalEl);

            if (!modal) {
                const newModal = new bootstrap.Modal(modalEl);
                newModal.hide();
            } else {
                modal.hide();
            }
        }
    </script>
</body>

</html>