<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PK AUTO PARTS</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css">
        <style> 
            @import url('https://fonts.googleapis.com/css2?family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        
        * {
            box-sizing: border-box;
        }
        
        .contact-info {
            text-align: left;
            font-size: 0.9em;
            background-color: white;
            padding: 10px 0;
            margin: 0 40px;
            border-radius: 0 0 20px 20px;
        }
        
        .contact-info span {
            margin: 0 15px;
        }
        
        .contact-info i {
            margin-right: 5px;
        }
        
        .btn{
            text-decoration: none;
            background-color: var(--bg);
            border: solid var(--accent);
            color: var(--accent);
            padding: 10px 20px;
            border-radius: 12px 0px;
            font-size: 1em;
        }
        
        .btn:hover {
            background-color: var(--accent);
            color: var(--bg);
        }
        
        .contact-section {
            background-color: var(--secon);
            padding: 50px 0;
        }
        
        .contact-container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .contact-form {
            background-color:#830707;
            color: var(--bg);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 45%;
        }
        
        .contact-info h2,
        .contact-form h2 {
            margin-top: 0;
            margin-bottom: 15px;
        }
        
        .contact-info p {
            margin: 20px 0;
            font-size: 1.4em;
        }
        
        .contact-form form {
            display: flex;
            flex-direction: column;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            margin-bottom: 5px;
            display: block;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--secon);
            border-radius: 5px;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--accent);
        }
        
        button {
            padding: 10px 20px;
            background-color: white;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            align-self: flex-start;
            border: solid var(--accent) 2px;
        }
        
        button:hover {
            background-color: rgb(175, 7, 7);
            color:black;
            border: solid var(--bg) 2px;
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
      
    </head>

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
                        <li class="nav-item">
                            <a href="products.php" class="nav-link">Products</a>
                        </li>
                        <li class="nav-item active">
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
                                <h1 class="header_title mb-0 mt-3">Contact Us 
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<section id="contact" class="contact-section">
    <div class="contact-container">
                <div class="contact-info">
                    <h2 class="ftco-animate">Contact Information</h2>
                    <p style="color:#dc3545;font-weight: bold; "><img width="40px" src="assets/images/phone.png" alt="phone logo"> +94 71 25 25 161</p>
                    <p style="color:#dc3545;font-weight: bold;"><img width="40px" src="assets/images/email.png" alt="email logo"> pkholdingsenterprises1@gmail.com</p>
                    <p style="color:#dc3545;font-weight: bold;"><img width="40px" src="assets/images/locat.png" alt="location logo">P&K Holdings Enterprises pvt.ltd No.73 Bulugahathannewathta,Yakgahapitiya,Kandy</p>
                </div>
                <div class="contact-form">
    <h2 style="color: black;">Contact Us</h2>
    <form id="contactForm" action="contact_handler.php" method="post">
        <div class="form-group">
            <label for="name" style="color: rgb(255, 255, 255);">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone" style="color: rgb(255, 255, 255);">Phone:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email" style="color: rgb(255, 255, 255);">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="subject" style="color: rgb(255, 255, 255);">Subject:</label>
            <input type="text" id="subject" name="subject" required>
        </div>
        <div class="form-group">
            <label for="message" style="color: rgb(255, 255, 255);">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit">Send Message</button>
    </form>
</div>

    </div>
</section>
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
                  <li><a href="products.php">Products</a></li>
                  <li><a href="contact.php">Contact Us</a></li>
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

<!-- Modal to display feedback messages -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="contactMessage">
                <!-- Message will be displayed here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Check URL parameters for contact status and message
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const message = urlParams.get('message');

    if (status && message) {
        // Display the message in the modal
        document.getElementById('contactModalLabel').innerText = status === 'success' ? 'Success' : 'Error';
        document.getElementById('contactMessage').innerText = decodeURIComponent(message);
        
        // Show modal
        $('#contactModal').modal('show');
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
    <!--End Footer-->
    </body>