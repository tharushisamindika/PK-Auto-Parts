<?php
// session_start();
require_once '../db_connection.php'; 

// // Check if admin is logged in (modify as needed based on your setup)
// if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
//     header("Location: login.php");
//     exit();
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $imagePath = '';

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $targetDir = "../uploads/";
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
            $imagePath = '';
        }
    }

    // Insert product into the database
    $stmt = $conn->prepare("INSERT INTO products (product_name, product_description, product_price, product_image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $description, $price, $imagePath);
    $stmt->execute();
    $stmt->close();

    // Redirect or notify success
    echo "<script>alert('Product added successfully!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Container and card styling */
        .form-container {
            margin: 2rem auto;
            max-width: 600px;
            background: #f9f9f9;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.15);
        }
        h2 {
            color: #990a0a;
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: bold;
        }
        /* Custom input and label styling */
        .form-label {
            font-weight: 500;
            color: #333;
        }
        .form-control {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 0.75rem;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #990a0a;
            box-shadow: 0px 0px 5px rgba(153, 10, 10, 0.2);
        }
        /* Custom button styling */
        .btn-custom {
            background-color: #990a0a;
            color: #fff;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #cc0d0d;
        }
        .btn-secondary{
            margin-top: 10px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container form-container">
        <h2>Add New Product</h2>
        <form action="add_product.php" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-4">
                <label for="description" class="form-label">Product Description</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="form-label">Product Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="mb-4">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-custom w-100">Add Product</button>
            <a href="manage_products.php" class="btn btn-secondary mb-3">&larr; Back</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


