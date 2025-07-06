<?php
    session_start();
    require_once 'config/connection.php';
    
    if (empty($_SESSION['isLogin'])) {
        echo "<script>alert('Kindly login to proceed');location.href='index.php';</script>";
        exit; 
    }
  
if (isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];
    $name = $_SESSION['User_name'];


    if ($new_password !== $confirm_new_password) {
        echo "<script>alert('New password and confirm new password do not match');</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php require_once 'include/header.php'; ?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Add Item</h1>
					<nav class="d-flex align-items-center">
						<a href="home.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="add-item.php">Add Item</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Contact Area =================-->
    <section class="about_section layout_padding2-top layout_padding-bottom">
    <div class="container">
        <div class="row justify-content-center"> <!-- Center the content horizontally -->
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container" style="margin-bottom: 20px;">
                        <h2 class="text-center font-weight-bold">CHANGE PASSWORD</h2>
                    </div>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirm_new_password" placeholder="Confirm New Password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="change_password" class="genric-btn primary circle arrow">Change Password</button>
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

	<!--================Contact Area =================-->

    <?php require_once 'include/footer.php'; ?>
</body>

</html>