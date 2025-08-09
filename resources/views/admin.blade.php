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

    // ✈️ Flight CRUD
    const flightTable = document.getElementById('flightTableBody');
    const addFlightBtn = document.getElementById('addFlightBtn');

    addFlightBtn.addEventListener('click', () => {
        addOrEditRow('flight', null);
    });

    // 🏨 Hotel CRUD
    const hotelTable = document.getElementById('hotelTableBody');
    const addHotelBtn = document.getElementById('addHotelBtn');

    addHotelBtn.addEventListener('click', () => {
        addOrEditRow('hotel', null);
    });

    function addOrEditRow(type, row) {
        let data = [];
        if (row) {
            row.querySelectorAll('td').forEach(td => data.push(td.innerText));
        }

        if (type === 'flight') {
            const flightNo = prompt("Flight No:", data[0] || "");
            const route = prompt("Route:", data[1] || "");
            const departure = prompt("Departure:", data[2] || "");
            const arrival = prompt("Arrival:", data[3] || "");
            const aircraft = prompt("Aircraft:", data[4] || "");
            const status = prompt("Status:", data[5] || "");

            if (flightNo && route && departure && arrival && aircraft && status) {
                const rowHTML = `
                    <td>${flightNo}</td>
                    <td>${route}</td>
                    <td>${departure}</td>
                    <td>${arrival}</td>
                    <td>${aircraft}</td>
                    <td style="color: var(--success);">${status}</td>
                    <td>
                        <button class="action-btn edit-btn">Edit</button>
                        <button class="action-btn delete-btn">Delete</button>
                    </td>
                `;
                if (row) row.innerHTML = rowHTML;
                else {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = rowHTML;
                    flightTable.appendChild(newRow);
                }
                setupActions();
            }
        } else if (type === 'hotel') {
            const hotelName = prompt("Hotel Name:", data[0] || "");
            const location = prompt("Location:", data[1] || "");
            const rating = prompt("Rating:", data[2] || "");
            const price = prompt("Price/Night:", data[3] || "");
            const rooms = prompt("Available Rooms:", data[4] || "");

            if (hotelName && location && rating && price && rooms) {
                const rowHTML = `
                    <td>${hotelName}</td>
                    <td>${location}</td>
                    <td>${rating}</td>
                    <td>${price}</td>
                    <td>${rooms}</td>
                    <td>
                        <button class="action-btn edit-btn">Edit</button>
                        <button class="action-btn delete-btn">Delete</button>
                    </td>
                `;
                if (row) row.innerHTML = rowHTML;
                else {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = rowHTML;
                    hotelTable.appendChild(newRow);
                }
                setupActions();
            }
        }
    }

    function setupActions() {
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.onclick = function () {
                const row = this.closest('tr');
                const isFlight = row.parentElement.id === 'flightTableBody';
                addOrEditRow(isFlight ? 'flight' : 'hotel', row);
            };
        });

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.onclick = function () {
                if (confirm('Are you sure you want to delete this entry?')) {
                    this.closest('tr').remove();
                }
            };
        });
    }

    setupActions(); // initial setup
</script>
@endsection
