<?php
session_start();
include 'db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$totalOrderPrice = 0;

// Calculate total cost from the cart
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $productId => $item) {
        $totalOrderPrice += $item['price'] * $item['quantity'];
    }
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $shipping_address = $_POST['shipping_address'];
    $phone_number = $_POST['phone_number'];

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Insert order for each item in the cart
        foreach ($_SESSION['cart'] as $productId => $item) {
            $quantity = $item['quantity'];
            $totalPrice = $item['price'] * $quantity;

            $stmt = $conn->prepare("INSERT INTO orders (user_id, product_id, quantity, total_price, name, shipping_address, phone_number, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')");
            $stmt->bind_param("iiidsss", $user_id, $productId, $quantity, $totalPrice, $name, $shipping_address, $phone_number);
            $stmt->execute();
        }

        // Commit the transaction
        $conn->commit();

        // Clear the cart after checkout
        unset($_SESSION['cart']);
        
        // Redirect with success message
        header("Location: checkout.php?status=success&message=" . urlencode("Order placed successfully!"));
        exit();
        
    } catch (Exception $e) {
        // Roll back the transaction in case of an error
        $conn->rollback();
        
        // Redirect with error message
        header("Location: checkout.php?status=error&message=" . urlencode("Failed to place the order. Please try again later."));
        exit();
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
</head>
<body>
<div class="container mt-5">
    <h2>Checkout</h2>
    
    <?php if (isset($_GET['status']) && isset($_GET['message'])): ?>
        <div class="alert alert-<?php echo $_GET['status'] === 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
            <?php echo htmlspecialchars(urldecode($_GET['message'])); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Display Total Order Amount -->
    <p><strong>Total Amount: $<?php echo number_format($totalOrderPrice, 2); ?></strong></p>
    
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="shipping_address" class="form-label">Shipping Address</label>
            <textarea name="shipping_address" id="shipping_address" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="tel" name="phone_number" id="phone_number" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Place Order</button>
        <a href="cart.php" class="btn btn-primary">Back</a>
        <a href="products.php" class="btn btn-secondary">Continue Shopping</a>
    </form>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
