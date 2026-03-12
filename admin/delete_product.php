<?php
include('db_connection.php'); // Include your database connection file

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']); // Get the product ID from the URL and convert it to an integer

    // Prepare the delete query
    $query = "DELETE FROM products WHERE id = ?";
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        // Redirect to manage products page with success message
        header("Location: manage_products.php?message=Product deleted successfully.");
        exit();
    } else {
        // Redirect with error message
        header("Location: manage_products.php?error=Error deleting product.");
        exit();
    }

    $stmt->close();
} else {
    // Redirect to manage products page if no ID is provided
    header("Location: manage_products.php?error=No product ID provided.");
    exit();
}

$conn->close(); // Close the database connection
?>
