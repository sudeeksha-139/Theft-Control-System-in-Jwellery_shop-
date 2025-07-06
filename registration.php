<?php
session_start();

require_once 'config/connection.php';

if (isset($_POST['register'])) {
    $name = $_POST['User_name'];
    $password = $_POST['Password'];
    $email = $_POST['Email'];
    $usertype = $_POST['Usertype'];
    $address = $_POST['Address'];
    $phone = $_POST['Phone'];
    if (mysqli_query($conn, "INSERT INTO registration (User_name, Password, Email, Usertype, Address, Phone) 
                             VALUES ('$name', '$password', '$email', '$usertype', '$address', '$phone')")) {
        echo "<script>alert('Registered successfully.');location.href='home.php';</script>";
    } else {
        echo "<script>alert('Unable to Register.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Jewellery</title>

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/log.jpg" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form class="row login_form" action="" method="POST">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="User_name" name="User_name" required placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="Password" class="form-control" id="Password" name="Password" required placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="email" class="form-control" id="Email" name="Email" required placeholder="Email Id" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="Address" name="Address" required placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="tel" class="form-control" id="Phone" name="Phone" required placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
                            <div class="col-md-12 form-group">
                                <select class="form-control" id="Usertype" name="Usertype" required placeholder="Password Strength">
                                    <option value="" disabled selected>Select User Type</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Seller">Staff</option>
                                    <option value="Buyer">Customer</option>
                                </select>
                            </div>

							<div class="col-md-12 form-group">
								<button type="submit" value="submit" name="register" class="primary-btn">Register</button>
								<a href="index.php">Already have an account? Login Now</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->


	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>