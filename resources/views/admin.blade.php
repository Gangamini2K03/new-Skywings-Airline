@extends('layouts.app')

@section('content')
<!-- Admin Login Section -->
<section class="login-container" id="adminLogin">
    <div class="login-box">
        <h2>Admin Login</h2>
        <form id="loginForm">
            <div class="input-group">
                <label for="adminUsername">Username</label>
                <input type="text" id="adminUsername" required>
            </div>
            <div class="input-group">
                <label for="adminPassword">Password</label>
                <input type="password" id="adminPassword" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</section>

<!-- Admin Dashboard -->
<section class="admin-section" id="adminDashboard" style="display: none;">
    <div class="container">
        <div class="admin-header">
            <h2>Admin Dashboard</h2>
            <button class="btn btn-primary" id="logoutBtn">Logout</button>
        </div>

        <div class="admin-container">
            <!-- Flight Management -->
            <div class="admin-header">
                <h2>Flight Management</h2>
                <button class="btn btn-primary" id="addFlightBtn">Add New Flight</button>
            </div>

            <table class="crud-table">
                <thead>
                    <tr>
                        <th>Flight No</th>
                        <th>Route</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Aircraft</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="flightTableBody">
                    <tr>
                        <td>SW101</td>
                        <td>NYC to LON</td>
                        <td>2023-07-30 08:00</td>
                        <td>2023-07-30 20:00</td>
                        <td>Boeing 787</td>
                        <td><span style="color: var(--success);">On Time</span></td>
                        <td>
                            <button class="action-btn edit-btn">Edit</button>
                            <button class="action-btn delete-btn">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Hotel Management -->
            <div class="admin-header">
                <h2>Hotel Management</h2>
                <button class="btn btn-primary" id="addHotelBtn">Add New Hotel</button>
            </div>

            <table class="crud-table">
                <thead>
                    <tr>
                        <th>Hotel Name</th>
                        <th>Location</th>
                        <th>Rating</th>
                        <th>Price/Night</th>
                        <th>Available Rooms</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="hotelTableBody">
                    <tr>
                        <td>Grand Plaza Hotel</td>
                        <td>New York</td>
                        <td>★★★★★</td>
                        <td>$249</td>
                        <td>42</td>
                        <td>
                            <button class="action-btn edit-btn">Edit</button>
                            <button class="action-btn delete-btn">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Admin Script -->
<script>
    const loginForm = document.getElementById('loginForm');
    const adminLoginSection = document.getElementById('adminLogin');
    const adminDashboard = document.getElementById('adminDashboard');
    const logoutBtn = document.getElementById('logoutBtn');

    if (localStorage.getItem('isAdminLoggedIn') === 'true') {
        adminLoginSection.style.display = 'none';
        adminDashboard.style.display = 'block';
    }

    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const username = document.getElementById('adminUsername').value;
        const password = document.getElementById('adminPassword').value;

        if (username === 'admin' && password === 'skywings123') {
            localStorage.setItem('isAdminLoggedIn', 'true');
            adminLoginSection.style.display = 'none';
            adminDashboard.style.display = 'block';
        } else {
            alert('Invalid credentials. Try admin / skywings123');
        }
    });

    logoutBtn.addEventListener('click', () => {
        localStorage.setItem('isAdminLoggedIn', 'false');
        adminLoginSection.style.display = 'flex';
        adminDashboard.style.display = 'none';
    });

    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            if (confirm('Delete this entry?')) {
                this.closest('tr').remove();
            }
        });
    });

    document.getElementById('addFlightBtn').addEventListener('click', function () {
        const table = document.getElementById('flightTableBody');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>SW999</td>
            <td>Sample Route</td>
            <td>2023-08-01</td>
            <td>2023-08-01</td>
            <td>Airbus A330</td>
            <td><span style="color: var(--success);">Scheduled</span></td>
            <td><button class="action-btn edit-btn">Edit</button>
                <button class="action-btn delete-btn">Delete</button>
            </td>`;
        table.appendChild(row);
        alert('New flight added!');
    });

    document.getElementById('addHotelBtn').addEventListener('click', function () {
        const table = document.getElementById('hotelTableBody');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>New Hotel</td>
            <td>Location</td>
            <td>★★★★☆</td>
            <td>$199</td>
            <td>30</td>
            <td><button class="action-btn edit-btn">Edit</button>
                <button class="action-btn delete-btn">Delete</button>
            </td>`;
        table.appendChild(row);
        alert('New hotel added!');
    });
</script>
@endsection
