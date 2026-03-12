<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PK PARTS</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        .scroll_down {
            text-align: center; 
            width: 100%; 
        }

        .scroll_down a {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px; 
            color: white;
            text-decoration: none;
            justify-content: center; 
        }
        
        .scroll_down a span{
            font-size:20px;
        }

        .scroll_down a:hover {
            color: #810707; 
        }
        .home-bg {
             background-image: url(assets/images/bg.jpeg);
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

        <!-- Popup for Success Message -->
    <div class="popup-overlay"></div>
    <div class="popup" id="logoutSuccessPopup">
        <h4>Logout Successful</h4>
        <button onclick="closePopup()">Close</button>
    </div>

        <section class="home-bg section h-100vh" id="home">
            <div class="bg-overlay"></div>
                <div class="container z-index">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="text-white text-center">
                                <h4>Welcome PK Website</h4>
                                <h1 class="header_title mb-0 mt-3">We Are #1 Quality Products Making Company</h1>
                                <div class="header_btn">
                                    <a href="about.php" class="btn btn-outline-custom btn-rounded mt-4">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="scroll_down">
                    <a href="#product-range" class="scroll">
                        <span> Find Our Products</span>
                        <i class="fas fa-arrow-down text-white"></i>

                    </a>
                </div>

        </section>
        <br>
        <br>
            <h2 class="topic element fw-bold">Why Chose Us</h2>
          <!--chose us area start-->
          <div class="choseus_area" data-bgimg="assets/img/about/about-us-policy-bg.jpg">
            <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <img src="assets/img/about/About_icon1.png" alt="">
                            </div>
                            <div class="chose_content">
                                <h3>Qulity and durability</h3>
                                <p style="font-weight: bolder;"> we pride ourselves on delivering high-quality and durable bush and rubber components designed to withstand the toughest conditions. Our expertly crafted products ensure superior performance, reliability, and longevity, keeping your vehicles and machinery running smoothly.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <img src="assets/img/about/About_icon2.png" alt="">
                            </div>
                            <div class="chose_content">
                                <h3>Valuable For Money</h3>
                                <p style="font-weight: bolder;">PK Parts offers a budget-friendly product range without compromising on quality. Our components are designed to provide exceptional value for money, making them the perfect choice for those seeking reliable and affordable solutions in bush and rubber material parts.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <img src="assets/img/about/About_icon3.png" alt="">
                            </div>
                            <div class="chose_content">
                                <h3>Easy Find our Agents 24/7</h3>
                                <p style="font-weight: bolder;">Finding PK Parts agents has never been easier. With 24/7 access to our agent network, you can quickly locate a representative near you, ensuring that our reliable products are always within your reach whenever you need them.</p>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
<!---->
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-6 d-flex">
                        <div class="img img-2 w-100 mr-md-2" style="background-image: url(assets/images/3.jpg);"></div>
                    </div>
                    <div class="col-md-6 ftco-animate makereservation p-4 p-md-5">
                        <div class="heading-section ftco-animate mb-5">
                            
                            <h2 class="mb-4" style="color: darkred; font-weight: bolder;">Products Quality</h2>
                            <p style="font-weight: bolder;">PK Parts is a trusted, independent manufacturer of high-quality bushings for brands like Land Rover, Toyota, and Mitsubishi, serving both government agencies and retailers across Sri Lanka. Known for competitive pricing and excellent quality, PK Parts has built a reputation worldwide.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="gallery">
	<section class="ftco-section bg-light">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<h2 class="mb-4" style="color: darkred; font-weight: bolder;">Gallery</h2>
				</div>
			</div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <img src="assets/images/1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <img src="assets/images/2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <img src="assets/images/3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <img src="assets/images/4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <img src="assets/images/5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <img src="assets/images/6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <img src="assets/images/7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <img src="assets/images/8.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div>
		  

        </div>
      </div>
    </section><!-- End Gallery Section -->
    <br>
    <!--Home Product Section-->
    <section class="vehicle-parts-section">
        <div class="container">
            <h2 class="section-title" style="color: darkred; font-weight: bolder;">Our Product Range</h2>
            <div class="card-wrapper">
                <!-- Card 1 -->
                <div class="card">
                    <img src="assets/images/11.jpg" alt="Vehicle Part 1" class="card-img">
                    <div class="card-content">
                        <h3>Rubber Bush Items</h3>
                        <p>The PK Parts logo has become a recognizable and respected brand; it epitomizes excellence in this field, both in terms of quality and commitment to meeting customer needs</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="card">
                    <img src="assets/images/44.jpg" alt="Vehicle Part 2" class="card-img">
                    <div class="card-content">
                        <h3>Vehicle Lights</h3>
                        <p>PK Parts provide a wide range of Vehicle Lights for  Toyota, Mitsubishi,Suzuki and other vehicles.</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="card">
                    <img src="assets/images/22.jpg" alt="Vehicle Part 3" class="card-img">
                    <div class="card-content">
                        <h3>Oil Seals</h3>
                        <p>Oil seals prevent engine leaks, lubricant leaks, and contaminants from entering rotating shafts. They ensure smooth operation, reduce friction, and extend engine and drivetrain component lifespan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Home Product Section END-->
    <section class="custom-section" id="product-range">
    <div class="container py-5">
        <div class="row py-2">
            <div class="col-md-12 text-center">
                <h2>Find Our Product Range</h2>
                <a href="products.php" class="btn custom-btn">Order Now</a>
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
                  <li><a href="about.php">About Us</a></li>
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