<?php
require_once '../db_connection.php';
session_start(); // Start the session

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user data to display in the confirmation message
    $stmt = $conn->prepare("SELECT username FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->fetch();
    $stmt->close();

    // If the form is submitted, delete the user
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm_delete'])) {
        $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->close();
        
        // Redirect with a success message
        echo "<script>alert('User deleted successfully!'); window.location.href = 'manage_users.php';</script>";
        exit;
    }
} else {
    // Redirect back if no user_id is provided
    echo "<p>No user ID provided. Please go back and try again.</p>";
    echo "<a href='manage_users.php'>Back to Users</a>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User Confirmation</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        .confirm-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .btn-confirm {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 8px 8px 8px;
            cursor: pointer;
        }
        .btn-cancel {
            background-color: #6c757d;
            color: white;
            border: none;
            text-decoration: none;
            padding: 8px 8px 8px 8px;
        }
    </style>
</head>
<body>
    <div class="container confirm-container">
        <h2>Delete User</h2>
        <p>Are you sure you want to delete the user <strong><?php echo htmlspecialchars($username); ?></strong>?</p>
        
        <form method="POST">
            <button type="submit" name="confirm_delete" class="btn btn-confirm">Yes, Delete</button>
            <a href="manage_users.php" class="btn btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>
