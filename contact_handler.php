<?php
session_start();
include 'db_connection.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare SQL statement
    $sql = "INSERT INTO contact_messages (name, phone, email, subject, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssss", $name, $phone, $email, $subject, $message);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows > 0) {
            header("Location: contact.php?status=success&message=" . urlencode("Message sent successfully!"));
        } else {
            header("Location: contact.php?status=error&message=" . urlencode("Error sending message."));
        }

        $stmt->close();
    } else {
        header("Location: contact.php?status=error&message=" . urlencode("Error preparing statement."));
    }
}

// Close connection
$conn->close();
?>
