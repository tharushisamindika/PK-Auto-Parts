<?php
 session_start();

// Include the database connection
include('db_connection.php'); 

// Query to get the latest 3 feedback entries
$query = "SELECT feedback.rating, feedback.feedback_text, feedback.created_at, users.username 
          FROM feedback 
          JOIN users ON feedback.user_id = users.user_id 
          ORDER BY feedback.created_at DESC 
          LIMIT 3";
$result = $conn->query($query);
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css">
        <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Open Sans', sans-serif;
    background-color: #f4f4f9;
    color: #333;
    line-height: 1.6;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

/* About Us Section */
.about-us {
    padding: 50px 0;
    background-color: #ffffff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.about-us h1 {
    text-align: center;
    color: #990a0a;
    font-size: 36px;
    margin-bottom: 20px;
}

.about-us .intro-text {
    text-align: center;
    font-size: 18px;
    color: #555;
    margin-bottom: 50px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

/* Mission and Vision */
.mission-vision {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-bottom: 50px;
}

.mission, .vision {
    width: 45%;
    margin-bottom: 20px;
}

.mission h2, .vision h2 {
    font-size: 28px;
    color: #990a0a;
    margin-bottom: 10px;
}

.mission p, .vision p {
    font-size: 16px;
    color: #555;
    line-height: 1.8;
}


/* Team Section */
.team {
    margin-bottom: 50px;
    text-align: center;
}

.team h2 {
    font-size: 28px;
    color: #990a0a;
    margin-bottom: 20px;
}

.team-members {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.member {
    width: 30%;
    text-align: center;
    margin-bottom: 20px;
}

.member img {
    width: 100%;
    height: auto;
    border-radius: 10px; 
    margin-bottom: 10px;}


.member h3 {
    font-size: 20px;
    color: #333;
    margin-bottom: 5px;
}

.member p {
    font-size: 16px;
    color: #777;
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    .mission, .vision {
        width: 100%;
    }

    .team-members {
        flex-direction: column;
    }

    .member {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .about-us h1 {
        font-size: 28px;
    }

    .mission h2, .vision h2, .history h2, .team h2 {
        font-size: 24px;
    }
}
.img-single {
    background-size: cover;
    background-position: center;
    height: 100%;
    min-height: 400px; /* Adjust the height as needed */
    border-radius: 10px; /* Adds a rounded corner for a cleaner look */
    margin: 0 auto; /* Centers the image within the column */
}

.ftco-section {
    padding: 3em 0; /* Controls the section's padding */
}

.heading-section {
    text-align: left;
}

    .feedback-section {
        background-color: #ffffff;
        padding: 40px 20px;
        margin-top: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .feedback-form .form-group {
        margin-bottom: 20px;
    }

    .star-rating {
        font-size: 24px;
        color: #990a0a;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        cursor: pointer;
        margin: 0 3px;
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label,
    .star-rating input:checked ~ label {
        color: #ffca08;
    }

    .feedback-section {
    margin: 20px 0;
}

.feedback-cards {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    justify-content: space-between;
}

.feedback-card {
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 15px;
    width: 100%;
    max-width: 32%; /* Show 3 cards horizontally */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.2s ease-in-out;
}

.feedback-card:hover {
    transform: translateY(-5px);
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    font-size: 1rem;
    color: #333;
}

.card-rating i {
    color: #FFD700; /* Gold color for stars */
    font-size: 1.2rem;
}

.card-feedback {
    font-size: 0.95rem;
    color: #555;
    line-height: 1.4;
}

@media (max-width: 768px) {
    .feedback-cards {
        flex-direction: column;
    }
    .feedback-card {
        max-width: 100%;
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
                        <li class="nav-item ">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="about.php" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="products.php" class="nav-link">Products</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php" class="nav-link">Contact</a>
                        </li>
                        <?php
                    session_start();
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
                                <h1 class="header_title mb-0 mt-3">About Us 
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<br>
<!-- About Us Section -->
<section class="about-us">
    <div class="container">
        <h1>About PK PARTS</h1>
        <p class="intro-text" style="font-weight: bolder;">P&K Holdings Enterprises is a leading manufacturer specializing in high-quality vehicle bushes, oil seals, and a wide range of rubber-related vehicle parts. With a commitment
             to excellence and innovation, we have established ourselves as a trusted partner in the automotive industry. Our dedication to precision engineering and superior materials ensures that our products meet the highest 
             standards of performance and durability. From passenger vehicles to heavy-duty machinery, we cater to diverse needs, providing solutions that keep vehicles running smoothly and efficiently</p>
        
        <div class="content">
            <div class="mission-vision">
                <div class="mission">
                    <h2>Our Mission</h2>
                    <p style="font-weight: bolder;">At P&K Holdings Enterprises, our mission is to deliver exceptional automotive components that enhance the reliability and safety of vehicles around the world. We strive to push
                         the boundaries of technology and craftsmanship, fostering continuous improvement and customer satisfaction through our high-quality products and comprehensive support</p>
                </div>
                <div class="vision">
                    <h2>Our Vision</h2>
                    <p style="font-weight: bolder;">Our vision is to become a globally recognized leader in the automotive parts manufacturing industry. We aim to drive progress by setting new standards in innovation, sustainability,
                         and quality, ensuring that our products contribute to a better, safer driving experience for everyone</p>
                </div>
            </div>
            <!---->
            <section class="ftco-section ftco-no-pt ftco-no-pb">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-md-6 d-flex">
                            <div class="img img-single w-100" style="background-image: url(assets/images/ous.webp);"></div>
                        </div>
                        <div class="col-md-6 ftco-animate makereservation p-4 p-md-5">
                            <div class="heading-section ftco-animate mb-5">
                                <h2 class="mb-4" style="color: darkred; font-weight: bolder;">Our Story</h2>
                                <p style="font-weight: bolder;">P&K Holdings Enterprises was founded in 2021 with a simple yet ambitious goal: 
                                    to produce high-quality vehicle parts that meet the rigorous demands of the automotive industry. Starting with 
                                    a vision rooted in precision, durability, and innovation, we embarked on a journey to build a company that prioritizes 
                                    both craftsmanship and customer trust. Over the years, our dedication to quality and relentless pursuit of excellence has
                                     allowed us to grow and serve a diverse range of clients, from individual vehicle owners to large-scale industrial operations. 
                                     Today, P&K Holdings Enterprises stands as a testament to our commitment to engineering excellence and our passion for keeping 
                                     vehicles running smoothly, safely, and efficiently</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <br>

            <div class="team">
                <h2>Meet the Team</h2>
                <div class="team-members">
                    <div class="member">
                        <img src="assets/images/user1.jpg" alt="">
                        <h3>Pradeep Hewage</h3>
                        <p>CEO</p>
                        <p>Leading with vision and passion, our CEO is dedicated to steering P&K Holdings Enterprises toward excellence and innovation in the automotive parts industry</p>
                    </div>
                    <div class="member">
                        <img src="assets/images/user1.jpg" alt="Manager Image">
                        <h3>Indunil</h3>
                        <p>Sales Rep</p>
                        <p>Driven by customer focus and industry expertise, our Sales Representative ensures seamless communication and top-tier service to meet all client needs</p>
                    </div>
                    <div class="member">
                        <img src="assets/images/user1.jpg" alt="Artist Image">
                        <h3>Kavindu</h3>
                        <p>Supervisor</p>
                        <p>Our Supervisor oversees production with meticulous attention to detail, ensuring that every product meets the highest standards of quality and performance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feedback Form Section -->
<section class="feedback-section">
    <div class="container py-5">
        <h2 style="text-align: center; color: darkred; font-weight: bolder;">We Value Your Feedback</h2>
        <p style="text-align: center; font-weight: bolder;">Please let us know about your experience with PK Auto Parts.</p>
        
        <form action="submit_feedback.php" method="POST" class="feedback-form">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="comments">Your Feedback</label>
                <textarea class="form-control" id="comments" name="feedback_text" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="rating">Rate Us</label>
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5"><label for="star5" title="5 stars"><i class="mdi mdi-star"></i></label>
                    <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="4 stars"><i class="mdi mdi-star"></i></label>
                    <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="3 stars"><i class="mdi mdi-star"></i></label>
                    <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="2 stars"><i class="mdi mdi-star"></i></label>
                    <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="1 star"><i class="mdi mdi-star"></i></label>
                </div>
            </div>

            <button type="submit" class="btn custom-btn mt-3">Submit Feedback</button>
        </form>
    </div>
</section>

<!-- Modal to display feedback messages -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedbackModalLabel">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="feedbackMessage">
                <!-- Message will be displayed here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="feedback-section">
    <h2>Latest Feedback</h2>
    <div class="feedback-cards">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='feedback-card'>";
                echo "<div class='card-header'>";
                echo "<strong>" . htmlspecialchars($row['username']) . "</strong>";
                echo "<span>" . date('F j, Y', strtotime($row['created_at'])) . "</span>";
                echo "</div>";
                
                // Display stars based on rating
                echo "<div class='card-rating'>";
                for ($i = 1; $i <= 5; $i++) {
                    echo $i <= $row['rating'] ? "<i class='mdi mdi-star'></i>" : "<i class='mdi mdi-star-outline'></i>";
                }
                echo "</div>";
                
                echo "<p class='card-feedback'>" . htmlspecialchars($row['feedback_text']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No feedback available yet.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>

<section class=" custom-section">
    <div class="container py-5">
        <div class="row py-2">
            <div class="col-md-12 text-center">
                <h2>Order Now</h2>
                <a href="login.php" class="btn custom-btn">Create Acount</a>
            </div>
        </div>
    </div>
</section>
<br>
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
                      <li><a href="products.php">Products</a></li>
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