<?php
include 'db_connection.php';
include('partials/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        .container { margin-top: 20px; }
        .table-container { background: #fff; padding: 15px; border-radius: 8px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); }
        .table th, .table td { vertical-align: middle; }
        .btn-action { margin-right: 5px; }
    </style>
</head>
<style>
    .container {
        margin-left: 300px;
    }
</style>
<body>

<div class="container">
    <h2>Manage Users</h2>
    <!-- Button to Add New Admin -->
    <a href="create_admin.php" class="btn btn-primary mb-3">Add New Admin</a>

    <!-- Admins Table -->
    <div class="table-container mb-4">
        <h4>Admins</h4>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch admin users
                $query = "SELECT * FROM users WHERE role = 'admin'";
                $result = $conn->query($query);
                while ($admin = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$admin['user_id']}</td>
                        <td>{$admin['username']}</td>
                        <td>{$admin['email']}</td>
                        <td>{$admin['role']}</td>
                        <td>{$admin['created_at']}</td>
                        <td>
                            <a href='delete_user.php?id={$admin['user_id']}' class='btn btn-danger btn-sm btn-action'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Users Table -->
    <div class="table-container">
        <h4>Users</h4>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch customer users
                $query = "SELECT * FROM users WHERE role = 'customer'";
                $result = $conn->query($query);
                while ($user = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$user['user_id']}</td>
                        <td>{$user['username']}</td>
                        <td>{$user['email']}</td>
                        <td>{$user['role']}</td>
                        <td>{$user['created_at']}</td>
                        <td>
                            <a href='delete_user.php?id={$user['user_id']}' class='btn btn-danger btn-sm btn-action'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
