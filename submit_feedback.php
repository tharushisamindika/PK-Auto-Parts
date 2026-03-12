<?php
session_start();
include('db_connection.php'); 

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: about.php?status=error&message=" . urlencode("You must be logged in to submit feedback."));
    exit();
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $rating = isset($_POST['rating']) ? (int) $_POST['rating'] : 0;
    $feedback_text = isset($_POST['feedback_text']) ? trim($_POST['feedback_text']) : '';

    // Validate inputs
    if ($rating < 1 || $rating > 5) {
        header("Location: about.php?status=error&message=" . urlencode("Invalid rating."));
        exit();
    }
    if (empty($feedback_text)) {
        header("Location: about.php?status=error&message=" . urlencode("Please enter your feedback."));
        exit();
    }

    // Insert feedback into the database
    $query = "INSERT INTO feedback (user_id, rating, feedback_text) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iis", $user_id, $rating, $feedback_text);

    if ($stmt->execute()) {
        header("Location: about.php?status=success&message=" . urlencode("Thank you for your feedback!"));
    } else {
        header("Location: about.php?status=error&message=" . urlencode("Error submitting feedback: " . $stmt->error));
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: about.php?status=error&message=" . urlencode("Invalid request method."));
}
?>
