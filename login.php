<?php
session_start();
$error_message = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
unset($_SESSION['login_error']);
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
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
	width:100%;
	margin:auto;
	max-width:525px;
	min-height:700px;
	position:relative;
    background-color: darkred
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:90px 70px 50px 70px;
	background:darkred     
}
.login-html .sign-in-htm,
.login-html .sign-up-htm{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	transform:rotateY(180deg);
	backface-visibility:hidden;
	transition:all .4s linear;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
	display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
}
.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
	color:#fff;
	border-color:#000000;
}
.login-form{
	min-height:345px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
}
.login-form .group{
	margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
}
.login-form .group .input,
.login-form .group .button{
	border:none;
	padding:15px 20px;
	border-radius:25px;
	background:rgba(255,255,255,.1);
}
.login-form .group input[data-type="password"]{
	text-security:circle;
	-webkit-text-security:circle;
}
.login-form .group .label{
	color:#aaa;
	font-size:12px;
}
.login-form .group .button{
	background:black
}
.login-form .group label .icon{
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
	content:'';
	width:10px;
	height:2px;
	background:#fff;
	position:absolute;
	transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
	left:3px;
	width:5px;
	bottom:6px;
	transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
	top:6px;
	right:0;
	transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
	color:#fff;
}
.login-form .group .check:checked + label .icon{
	background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
	transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
	transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
	transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
	transform:rotate(0);
}

.hr{
	height:2px;
	margin:60px 0 50px 0;
	background:rgba(255,255,255,.2);
}
.foot-lnk{
	text-align:center;
}
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
            margin-bottom: 15px;
        }

        .popup.success h4 {
            color: green;
        }

        .popup.error h4 {
            color: red;
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
                        <li class="nav-item  active">
                            <a href="login.php" class="nav-link">Login</a>
                        </li>
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
                                <h1 class="header_title mb-0 mt-3">Login Page
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
<br>
<!-- Popup for Success or Error Messages -->
<div class="popup-overlay"></div>
    <div class="popup" id="messagePopup">
        <h4 id="popupMessage"></h4>
        <button onclick="closePopup()">Close</button>
    </div>

<!-- Popup -->
<div class="popup-overlay"></div>
    <div class="popup error" id="errorPopup">
        <h4>Invalid Username or Password</h4>
        <button onclick="closePopup()">Close</button>
</div>

<!--start Form-->
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
            <div class="sign-in-htm">
            <form action="login/login_handler.php" method="POST">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" name="username" type="text" class="input" required>
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" name="password" type="password" class="input" data-type="password" required>
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Sign In">
                </div>
            </form>
            </div>
            <div class="sign-up-htm">
            <form method="POST" action="login/register_handler.php">
            <div class="group">
                <label for="user" class="label">Username</label>
                <input id="user" type="text" name="username" class="input">
            </div>
            <div class="group">
                <label for="pass" class="label">Password</label>
                <input id="pass" type="password" name="password" class="input" data-type="password">
            </div>
            <div class="group">
                <label for="pass" class="label">Repeat Password</label>
                <input id="repeat-pass" type="password" name="repeat_password" class="input" data-type="password">
            </div>
    <div class="group">
        <label for="email" class="label">Email Address</label>
        <input id="email" type="text" name="email" class="input">
    </div>
                <div class="group">
                    <input type="submit" class="button" value="Sign Up">
                </div>
                <div class="hr"></div>
            </form>
                <div class="foot-lnk">
                    <label for="tab-1">Already Member?</a>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--End Form-->
    <br>
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
    
        <!--End Footer-->
</body>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>

<script>
    function showPopup(message, type) {
        const popup = document.getElementById("messagePopup");
        const overlay = document.querySelector(".popup-overlay");
        const messageElement = document.getElementById("popupMessage");

        messageElement.innerText = message;
        popup.classList.add(type); // Adds 'success' or 'error' class based on type
        popup.style.display = "block";
        overlay.style.display = "block";
    }

    function closePopup() {
        const popup = document.getElementById("messagePopup");
        const overlay = document.querySelector(".popup-overlay");

        popup.style.display = "none";
        overlay.style.display = "none";
        popup.classList.remove("success", "error"); // Reset classes
    }

    // Check URL parameters for messages
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
        showPopup(urlParams.get('success'), 'success');
    } else if (urlParams.has('error')) {
        const errorType = urlParams.get('error');
        if (errorType === 'invalid') {
            showPopup("Invalid username or password.", 'error');
        } else {
            showPopup(errorType, 'error');
        }
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
