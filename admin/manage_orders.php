
<?php
session_start();
include '../db_connection.php';
include('partials/header.php');

// Fetch all orders
$sql = "SELECT o.id, o.user_id, o.product_id, o.quantity, o.total_price, o.order_date, o.status, o.name, o.shipping_address, o.phone_number, 
               p.product_name, u.username
        FROM orders o
        JOIN products p ON o.product_id = p.id
        JOIN users u ON o.user_id = u.user_id
        ORDER BY o.order_date DESC";
$result = $conn->query($sql);

// Handle status update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $orderId = $_POST['order_id'];
    $newStatus = $_POST['status'];
    $updateSql = "UPDATE orders SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("si", $newStatus, $orderId);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Order status updated successfully');window.location.href='manage_orders.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Orders - Admin Dashboard</title>
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #ffffff;
            margin-top: 2rem;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            margin-left: 300px;
        }
        h2 {
            color: #333;
            margin-bottom: 1.5rem;
        }
        .table {
            margin-top: 1rem;
            color: #333;
        }
        .table thead th {
            background-color: #343a40;
            color: #ffffff;
            font-weight: 500;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .form-control, .btn {
            border-radius: 6px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .status-select {
            width: 100px;
        }
        
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Manage Orders</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Order Date</th>
                <th>Shipping Address</th>
                <th>Phone Number</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                    <td>$<?php echo number_format($row['total_price'], 2); ?></td>
                    <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['shipping_address']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                            <select name="status" class="form-control">
                                <option value="pending" <?php echo ($row['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                                <option value="completed" <?php echo ($row['status'] == 'completed') ? 'selected' : ''; ?>>Completed</option>
                                <option value="canceled" <?php echo ($row['status'] == 'canceled') ? 'selected' : ''; ?>>Canceled</option>
                            </select>
                            <button type="submit" name="update_status" class="btn btn-sm btn-primary mt-2">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
