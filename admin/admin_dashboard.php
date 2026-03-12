<?php
include('../db_connection.php');

// Fetch total admins and customers
$result_users = $conn->query("SELECT role, COUNT(*) as count FROM users GROUP BY role");
$admins = $customers = 0;
while ($row = $result_users->fetch_assoc()) {
    if ($row['role'] == 'admin') {
        $admins = $row['count'];
    } else {
        $customers = $row['count'];
    }
}

// Fetch total products
$result_products = $conn->query("SELECT COUNT(*) as total_products FROM products");
$total_products = $result_products->fetch_assoc()['total_products'];

// Fetch orders status
$result_orders = $conn->query("SELECT status, COUNT(*) as count FROM orders GROUP BY status");
$pending_orders = $completed_orders = $canceled_orders = 0;
while ($row = $result_orders->fetch_assoc()) {
    switch ($row['status']) {
        case 'pending':
            $pending_orders = $row['count'];
            break;
        case 'completed':
            $completed_orders = $row['count'];
            break;
        case 'canceled':
            $canceled_orders = $row['count'];
            break;
    }
}
include('partials/header.php');
?>
<style>
    
        /* Content styling */
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        /* Adjust layout to leave space for sidebar */
    .content-container {
        margin-left: 280px; /* Adjust to fit your sidebar width */
    }

    /* Card Styles */
    .custom-card {
        height: 220px; /* Ensure consistent height for all cards */
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease; /* Smooth hover effect */
    }
    
    .custom-card:hover {
        transform: translateY(-10px); /* Lift effect on hover */
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15); /* Add shadow on hover */
    }

    .custom-card .card-body {
        text-align: center; /* Center-align content */
    }

    .custom-card i {
        font-size: 50px; /* Bigger icon */
        margin-bottom: 15px; /* Space between icon and text */
    }

    .card-title {
        font-size: 1.3rem;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .card-text {
        font-size: 1.1rem;
    }
    /* Popup Styles */
    .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            border-radius: 5px;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        .popup h4 {
            color: green;
            margin-bottom: 15px;
        }

        .popup button {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 999;
        }
</style>
<!-- Main Content -->
<div class="content">
    <div class="container">
        <h1 class="mt-4">Welcome to the Admin Dashboard</h1>
        <p>This is your admin control panel. Use the links in the sidebar to navigate.</p>
    </div>
</div>

<!-- Popup for Success Message -->
<div class="popup-overlay"></div>
    <div class="popup" id="successPopup">
        <h4 id="successMessage"></h4>
        <button onclick="closePopup()">Close</button>
</div>

<div class="container content-container mt-5">
    <div class="row">
        <!-- Card 1: Users (Admins and Customers) -->
        <div class="col-md-4">
            <div class="card text-white bg-primary custom-card mb-3">
                <div class="card-body">
                    <i class="fas fa-users"></i>
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">
                        <strong>Admins:</strong> <?= $admins ?><br>
                        <strong>Customers:</strong> <?= $customers ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 2: Products -->
        <div class="col-md-4">
            <div class="card text-white bg-success custom-card mb-3">
                <div class="card-body">
                    <i class="fas fa-boxes"></i>
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">
                        <strong>Total Products:</strong> <?= $total_products ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 3: Orders Status -->
        <div class="col-md-4">
            <div class="card text-white bg-warning custom-card mb-3">
                <div class="card-body">
                    <i class="fas fa-clipboard-list"></i>
                    <h5 class="card-title">Orders</h5>
                    <p class="card-text">
                        <strong>Pending:</strong> <?= $pending_orders ?><br>
                        <strong>Completed:</strong> <?= $completed_orders ?><br>
                        <strong>Canceled:</strong> <?= $canceled_orders ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
        function showPopup(message) {
            document.getElementById("successMessage").textContent = message;
            document.getElementById("successPopup").style.display = "block";
            document.querySelector(".popup-overlay").style.display = "block";
        }

        function closePopup() {
            document.getElementById("successPopup").style.display = "none";
            document.querySelector(".popup-overlay").style.display = "none";
        }

        // Check URL for success parameter and show the corresponding success message
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('success') === 'admin') {
            showPopup("Admin Login Successful");
        } else if (urlParams.get('success') === 'customer') {
            showPopup("Login Successful");
        } else if (urlParams.get('error') === 'invalid') {
            showPopup("Invalid Username or Password");
        }
    </script>

<?php include('partials/footer.php'); ?>