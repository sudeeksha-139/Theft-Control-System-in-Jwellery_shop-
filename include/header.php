<head>
    <meta charset="utf-8">
    <title>Admin/Jewellery</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">

        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="home.php" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fas fa-gem me-2"></i>Jewelry Shop</h3>
            </a>
            <div class="navbar-nav w-100">
            <a href="home.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="category.php" class="nav-item nav-link"><i class="fas fa-chart-line me-2"></i>Category</a>
                    <a href="register-seller.php" class="nav-item nav-link"><i class="fas fa-user-plus me-2"></i>Register Seller</a>
                    <a href="remove-users.php" class="nav-item nav-link"><i class="fas fa-users me-2"></i>View Users</a>
                    <a href="view-cart.php" class="nav-item nav-link"><i class="fas fa-chart-pie me-2"></i>View Payments</a>
                    <a href="view-feedback.php" class="nav-item nav-link"><i class="fas fa-comment-alt me-2"></i>View Feedbacks</a>
                    <a href="change-password.php" class="nav-item nav-link"><i class="fas fa-key me-2"></i>Change Password</a>
                    <a href="http://127.0.0.1:8000/" class="nav-item nav-link"><i class="fas fa-video me-2"></i>CCTV Monitor</a>
                    <a href="include/logout.php" class="nav-item nav-link"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                </div>
        </div>


        <div class="content">
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="home.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['User_name']; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="change-password.php" class="dropdown-item">Settings</a>
                            <a href="../include/logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div>