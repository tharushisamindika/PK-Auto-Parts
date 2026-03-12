<?php
session_start();
include 'db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch orders for the logged-in user
$stmt = $conn->prepare("SELECT orders.*, products.product_name AS product_name FROM orders JOIN products ON orders.product_id = products.id WHERE orders.user_id = ? ORDER BY orders.order_date DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Orders</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <style>
        body {
            background-color: #fff;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: 2px solid #990a0a;
        }
        .card-header, .table th {
            background-color: #990a0a;
            color: #fff;
        }
        .card-footer{
            margin-top: 10px;
        }
        .table tbody tr td {
            vertical-align: middle;
        }
        .status-pending {
            color: #ff9933;
            font-weight: bold;
        }
        .status-completed {
            color: #4caf50;
            font-weight: bold;
        }
        .status-canceled {
            color: #e60000;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center text-danger">Your Orders</h2>
    
    <?php if ($result->num_rows > 0): ?>
        <div class="card">
            <div class="card-header">
                <h4>Order History</h4>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped m-0">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Order Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td>$<?php echo number_format($row['total_price'], 2); ?></td>
                                <td><?php echo date("Y-m-d H:i", strtotime($row['order_date'])); ?></td>
                                <td class="<?php echo 'status-' . strtolower($row['status']); ?>">
                                    <?php echo ucfirst($row['status']); ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer text-center">
                <a href="products.php" class="btn btn-success">Continue Shopping</a>
            </div>

    <?php else: ?>
        <p class="text-center text-muted">You have no orders. <a href="products.php" class="text-danger">Start shopping now!</a></p>
    <?php endif; ?>

</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
