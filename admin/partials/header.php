<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Sidebar styling */
        body{
            background-color: #f8f9fa;
        }
        #sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #212529;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #343a40;
            text-align: center;
        }

        #sidebar .nav-link {
            color: #ddd;
            font-size: 16px;
            padding: 15px 20px;
            transition: background 0.3s;
        }

        #sidebar .nav-link:hover {
            background-color: #495057;
            color: #fff;
        }

        #sidebar .nav-link i {
            margin-right: 10px;
        }

    </style>
</head>
<body>

<!-- Sidebar -->
<div id="sidebar">
    <div class="sidebar-header">
        <h3>Admin Panel</h3>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="admin_dashboard.php">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manage_products.php">
                <i class="fas fa-box-open"></i> Manage Products
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manage_orders.php">
                <i class="fas fa-shopping-cart"></i> Manage Orders
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manage_users.php">
                <i class="fas fa-users"></i> Manage Users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="view_feedback.php">
                <i class="fas fa-comments"></i> View Feedback
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="view_messages.php">
                <i class="fas fa-envelope"></i> View Messages
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
