<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user from database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Store user information in session
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on role with success message
        if ($user['role'] === 'admin') {
            header("Location: ../admin/admin_dashboard.php?success=admin");
        } else {
            header("Location: ../products.php?success=customer");
        }
        exit();
    } else {
        // Redirect with error message
        header("Location: ../login.php?error=invalid");
        exit();
    }
}

?>
