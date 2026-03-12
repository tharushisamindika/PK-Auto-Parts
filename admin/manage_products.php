<?php
include('db_connection.php');
include('partials/header.php');

$success_message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<div class="content" style="margin-left: 260px; padding: 20px;">
    <div class="container">
        <h2>Manage Products</h2>

        <!-- Display success message if available -->
        <?php if ($success_message): ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <button class="btn btn-primary mb-3" onclick="window.location.href='add_product.php'">Add New Product</button>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM products";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td><img src='" . $row['product_image'] . "' alt='Product Image' style='width: 50px; height: 50px;'></td>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td>" . $row['product_description'] . "</td>";
                            echo "<td>$" . $row['product_price'] . "</td>";
                            echo "<td>
                            <a href='edit_product.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary'>Edit</a>
                            <a href='delete_product.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirmDelete()'>Delete</a>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No products found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this product?");
}
</script>
