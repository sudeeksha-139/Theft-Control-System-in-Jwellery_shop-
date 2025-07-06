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
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="home.php"><img src="img/fav.png" alt=""> Jewellery</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="home.php">Home</a></li>
							<?php if (isset($_SESSION['type'])): ?>
                				<?php if ($_SESSION['type'] === 'Seller'): ?>
                            <li class="nav-item"><a class="nav-link" href="add-item.php">Add Item</a></li>
                            <li class="nav-item"><a class="nav-link" href="stock-adjustment.php">Stock Adjustment</a></li>
							<li class="nav-item"><a class="nav-link" href="view-feedback.php">View Feedback</a></li>

							<?php elseif ($_SESSION['type'] === 'Buyer'): ?>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="jewellery.php">Shop Jewellery</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.php">Shopping Cart</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="add-feedback.php">Feedback</a></li>
							<?php endif; ?>
            <?php endif; ?>
							
							<li class="nav-item"><a class="nav-link" href="change-password.php">Change Password</a></li>
                            <li class="nav-item"><a class="nav-link" href="include/logout.php">Logout</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
						<?php
                            if ($_SESSION['type'] == 'Buyer') {
                        ?>
							<li class="nav-item"><a href="checkout.php" class="cart"><span class="ti-bag"></span></a></li>
							<?php
                                }
                            ?>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->