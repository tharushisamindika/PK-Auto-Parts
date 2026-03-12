<?php
session_start();
include 'db_connection.php';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Check if the cart session exists, create if not
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product already exists in the cart
    if (isset($_SESSION['cart'][$productId])) {
        // Increase quantity if already in cart
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        // Fetch product details to add to the cart
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $_SESSION['cart'][$productId] = [
                'id' => $product['id'],
                'name' => $product['product_name'],
                'price' => $product['product_price'],
                'quantity' => 1
            ];
        }
        $stmt->close();
    }

    // Redirect to cart page
    header("Location: cart.php");
} else {
    echo "Product ID is missing.";
}

$conn->close();
?>
