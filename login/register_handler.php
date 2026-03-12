<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $repeat_password = isset($_POST['repeat_password']) ? $_POST['repeat_password'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Basic validation
    if (empty($username) || empty($password) || empty($repeat_password) || empty($email)) {
        header("Location: ../login.php?error=All fields are required.");
        exit();
    } elseif ($password !== $repeat_password) {
        header("Location: ../login.php?error=Passwords do not match.");
        exit();
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Database connection
        $conn = new mysqli("localhost", "pkholdin_dev", "K@veesha2005#", "pkholdin_production_db");
        if ($conn->connect_error) {
            header("Location: ../login.php?error=Connection failed: " . urlencode($conn->connect_error));
            exit();
        }

        // Insert into database
        $sql = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, 'customer')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $hashed_password, $email);

        if ($stmt->execute()) {
            header("Location: ../login.php?success=Registration successful!");
        } else {
            header("Location: ../login.php?error=" . urlencode("Error: " . $stmt->error));
        }

        $stmt->close();
        $conn->close();
        exit();
    }
} else {
    header("Location: ../login.php?error=Invalid request method.");
    exit();
} 