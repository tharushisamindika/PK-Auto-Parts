<?php
session_start();
include 'db_connection.php';

$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';

$query = "SELECT * FROM products";
if ($searchTerm) {
    $query .= " WHERE product_name LIKE ?";
}
$stmt = $conn->prepare($query);
if ($searchTerm) {
    $stmt->bind_param("s", $searchWildcard);
    $searchWildcard = '%' . $searchTerm . '%';
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PK AUTO PARTS</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css">
    <style>
        /* Popup Styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            border-radius: 5px;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        .popup h4 {
            color: green;
            margin-bottom: 15px;
        }

        .popup button {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 999;
        }
    </style>
</head>

<style>
  /* Container styling */
.container2 {
    padding: 2rem 0;
}

/* Search bar styling */
.search-bar {
    text-align: center;
    margin-bottom: 2rem;
    margin-top: 2rem;
}

.search-bar input[type="text"] {
    width: 70%;
    max-width: 500px;
    padding: 0.6rem;
    border: 2px solid #990a0a;
    border-radius: 20px;
    outline: none;
    margin-right: 0.5rem;
}

.search-bar .btn-primary {
    background-color: #990a0a;
    border: none;
    padding: 0.6rem 1.5rem;
    border-radius: 20px;
}

.row{
    padding: 50px 100px 50px 100px;
}

/* Cart button styling */
.btn-cart {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #990a0a;
    color: white;
    border: none;
    padding: 0.6rem 1.2rem;
    margin-left: 10px;
    border-radius: 20px;
    text-decoration: none;
    transition: background-color 0.2s;
}

.btn-cart i {
    font-size: 1.2rem;
}

.btn-cart:hover {
    background-color: #c00;
}


/* Card styling */
.card {
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out;
    overflow: hidden;
    width: 80%;
}

.card:hover {
    transform: scale(1.03);
}

.card-img-top {
    height: 300px;
    object-fit: cover;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.card-body {
    padding: 1rem;
    text-align: center;
}

.card-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
}

.card-text {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 0.8rem;
}

.card-price {
    font-size: 1.1rem;
    font-weight: bold;
    color: #990a0a;
    margin-bottom: 0.8rem;
}

/* Button styling */
.btn-add {
    background-color: #990a0a;
    color: white;
    border: none;
    padding: 0.5rem 1.2rem;
    border-radius: 5px;
    transition: background-color 0.2s;
}

.btn-add:hover {
    background-color: #c00;
}

/* Responsive styling */
@media (max-width: 768px) {
    .card-img-top {
        height: 150px;
    }
}

@media (max-width: 576px) {
    .search-bar input[type="text"] {
        width: 90%;
    }
}
.home-bg {
             background-image: url(assets/images/55.jpg);
             background-position: center center;
             background-size: cover;
             position: relative;
            display: flex;
             align-items: center;
            }

</style>

<body>

    <nav class="navbar navbar-expand-lg fixed-top custom-nav sticky">
        <div class="container">
            <a class='navbar-brand logo' href='assets/images/pk.jpg'>
                <h1 class="Header_Topic">P&K Parts</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">About</a>
                    </li>
                    <li class="nav-item active">
                        <a href="products.php" class="nav-link">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contact</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        // Display logout button if user is logged in
                        echo '<li class="nav-item">
                                <a href="logout.php" class="nav-link">Logout</a>
                              </li>';
                    } else {
                        // Display login button if user is not logged in
                        echo '<li class="nav-item">
                                <a href="login.php" class="nav-link">Login</a>
                              </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <section class="home-bg section h-100vh" id="home">
            <div class="bg-overlay"></div>
                <div class="container z-index">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="text-white text-center">
                                <h4>Welcome PK Website</h4>
                                <h1 class="header_title mb-0 mt-3">Our Products 
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popup for Success Message -->
    <div class="popup-overlay"></div>
    <div class="popup" id="successPopup">
        <h4 id="successMessage"></h4>
        <button onclick="closePopup()">Close</button>
    </div>

<div class="search-bar">
    <form method="post" style="display: inline;">
        <input type="text" name="search" placeholder="Search for products..." value="<?php echo $searchTerm; ?>">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <a href="cart.php" class="btn btn-cart">
        <i class="mdi mdi-cart-outline"></i> Cart <!-- Cart icon -->
    </a>
    <a href="orders.php" class="btn btn-cart">
        <i class="mdi mdi-receipt"></i> Order History <!-- Order history icon -->
    </a>
</div>


    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="uploads/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                        <p class="card-text"><?php echo substr($row['product_description'], 0, 100) . '...'; ?></p>
                        <p class="card-price">$<?php echo $row['product_price']; ?></p>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-add">Add to Cart</a>
                        <?php else: ?>
                            <p class="text-muted">Please log in to add items to the cart.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<!--Footer-->
<footer>
            <div class="footer-content">
                <div class="footer-section about">
                    <h3>PK AUTO PARTS</h3>
                    <p>PK Parts is a trusted, independent manufacturer of high-quality bushings for brands like Land Rover, Toyota, and Mitsubishi, serving both government agencies and retailers across Sri Lanka. </p>
                </div>
                <div class="footer-section links">
                    <h3>Quick Links</h3>
                    <ul>
                      <li><a href="index.php">Home</a></li>
                      <li><a href="about.php">About Us</a></li>
                      <li><a href="contact.php">Contact Us</a></li>
                      <li><a href="login.php">Login</a></li>
                    </ul>
                </div>
                <div class="footer-section contact">
                    <h3>Contact Us</h3>
                    <p>P&K Holdings Enterprises pvt.ltd No.73 Bulugahathannewathta,Yakgahapitiya,Kandy</p>
                    <p>Phone: +94 71 25 25 161</p>
                    <p>Email: pkholdingsenterprises1@gmail.com</p>
                </div>
              </div> 
                 <div class="footer-bottom">
            <p>©2024 PK AUTO PARTS All rights reserved</p>
        </div>
        </footer>
    
        <!--End Footer-->

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script>
        function showPopup(message) {
            document.getElementById("successMessage").textContent = message;
            document.getElementById("successPopup").style.display = "block";
            document.querySelector(".popup-overlay").style.display = "block";
        }

        function closePopup() {
            document.getElementById("successPopup").style.display = "none";
            document.querySelector(".popup-overlay").style.display = "none";
        }

        // Check URL for success parameter and show the corresponding success message
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('success') === 'admin') {
            showPopup("Admin Login Successful");
        } else if (urlParams.get('success') === 'customer') {
            showPopup("Login Successful");
        } else if (urlParams.get('error') === 'invalid') {
            showPopup("Invalid Username or Password");
        }
    </script>
    <!--chose us area end-->      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

         <script src="assets/js/jquery.min.js"></script>
         <script src="assets/js/typed.js"></script>         
        <script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
  prevScrollpos = currentScrollPos;
}
</script>

<script>
        function showPopup() {
            document.getElementById("logoutSuccessPopup").style.display = "block";
            document.querySelector(".popup-overlay").style.display = "block";
        }

        function closePopup() {
            document.getElementById("logoutSuccessPopup").style.display = "none";
            document.querySelector(".popup-overlay").style.display = "none";
        }

        // Check URL for logout parameter and show the logout success message
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('logout') === 'success') {
            showPopup();
        }
    </script>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
