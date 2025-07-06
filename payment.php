<?php

session_start();

require_once 'config/connection.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

?>
<style>
    .card {
            background-color: #ffffff;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .recepie_area {
            padding-top: 80px;
            padding-bottom: 70px;
        }
        .total p{
            font-size: 18px;
        }
        .heading {
            border-bottom: 1px solid #ddd; 
            padding: 10px 0;
        }
        .card-body b{
            color: black;
        }
</style>

<?php
    if(!empty($_SESSION['username'])){

        $name = $_SESSION['username'];
    }

    if (!empty($_SESSION['User_ID'])) {

        $User_ID = $_SESSION['User_ID'];
    }

    if(empty($_GET['source'])){
        echo "<script>alert('Unable to process your request!');location.href='index.php'</script>";
    } else{
        $total = $_GET['source'];
    }
									

    // $sql = "SELECT * from registration WHERE User_name = '$username'";
    // $res = mysqli_query($conn,$sql);

    // if(mysqli_num_rows($res)>0){
    //     $row = mysqli_fetch_array($res);
    //     $custname = $row['customer_name'];
    //     $contact = $row['contact_number'];
    //     $custadd1 = $row['customer_address'];
    //     $custadd2 = $row['customer_address2'];
    //     $custcity = $row['city'];
    //     $custpin = $row['pincode'];
    // }

    $OrderId = time(). strtoupper(uniqid());

    if (isset($_POST['proceed_payment'])) {
        $name = addslashes(trim($_POST['name']));
        $phone = addslashes(trim($_POST['phone']));
        $address1 = addslashes(trim($_POST['address1']));
        $address2 = addslashes(trim($_POST['address2']));
        $city = addslashes(trim($_POST['city']));
        $pincode = addslashes(trim($_POST['pincode']));
        $cardholder = addslashes(trim($_POST['cardholder']));
        $cardnumber = addslashes(trim($_POST['cardnumber']));
        $expmonth = addslashes(trim($_POST['expmonth']));
        $expyear = addslashes(trim($_POST['expyear']));
        $cvv = addslashes(trim($_POST['cvv']));
        $status = "Success";
        $type = "Card";
    
        $insertData = "INSERT INTO order_temp (order_numbar, Item_master_id, Quantity, price) VALUES";
        $i = 0;
    
        foreach ($_SESSION['cart_item'] as $item) {
            if ($i > 0) {
                $insertData .= ", ";
            }
            $insertData .= "('$OrderId', '$item[itemId]', '$item[itemQuantity]', '$item[itemPrice]')";
            $i++;
        }
    
        if (mysqli_query($conn, $insertData)) {
            if (mysqli_query($conn, "INSERT INTO payment (card_number, card_holder_name, card_expiry_month, card_expiry_year, payment_type, payment_status, date_paid, order_numbar, amount) VALUES ('$cardnumber', '$cardholder', '$expmonth', '$expyear', '$type', '$status', NOW(), '$OrderId', '$total')")) {
                if (mysqli_query($conn, "INSERT INTO orders (User_ID, order_numbar, order_status, order_date) VALUES ('$User_ID', '$OrderId', 'Order Placed', NOW())")) {
                    unset($_SESSION['cart_item']);
                    echo "<script>alert('Payment is Succesful');location.href='confirmation.php'</script>";
                } else {
                    echo "<script>alert('Unable to process your request!');location.href='payment.php'</script>";
                }
            } else {
                echo "<script>alert('Unable to process your request!');location.href='payment.php'</script>";
            }
        } else {
            echo "<script>alert('Unable to process your request!');location.href='payment.php'</script>";
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
					<h1>Payment page</h1>
					<nav class="d-flex align-items-center">
						<a href="home.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="payment.php">Payment</a>
					</nav>
				</div>
			</div>
		</div>
	</section><br>
    <div class="recepie_area">
        <div class="container">
            <form method="POST" class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <b>Personal Information:</b>
                            <div class="row" style=" padding-bottom: 15px">
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Name<span class="text-danger">*</span></label>
                                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="name">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Phone number<span class="text-danger">*</span></label>
                                    <input autocomplete='off' type="phone" class="form-control" maxlength="12"  required name="phone">
                                </div>
                            </div>
                            <b>Delivery Information:</b>
                            <div class="row" style=" padding-bottom: 15px">
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Address 1<span class="text-danger">*</span></label>
                                    <input autocomplete='off' type="address" class="form-control" maxlength="100" required name="address1">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Address 2<span class="text-danger"></span></label>
                                    <input autocomplete='off' type="address" class="form-control" maxlength="100" name="address2">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">City<span class="text-danger">*</span></label>
                                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="city">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Pincode<span class="text-danger">*</span></label>
                                    <input autocomplete='off' type="pincode" class="form-control" maxlength="6" required name="pincode">
                                </div>
                            </div>
                            <b>Payment Information:</b>
                            <div class="row">
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Card hodler name<span class="text-danger">*</span></label>
                                    <input autocomplete='off' type="text" class="form-control" maxlength="100" value="" required name="cardholder">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Card Number<span class="text-danger"></span></label>
                                    <input autocomplete='off' type="cardnumber" class="form-control" maxlength="16" value="" name="cardnumber">
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label">Exp month<span class="text-danger">*</span></label>
                                    <select class="form-control" name="expmonth">
                                        <option value="">Choose</option>
                                        <?php
                                        // Array of month names
                                        $months = [
                                            'January', 'February', 'March', 'April', 'May', 'June',
                                            'July', 'August', 'September', 'October', 'November', 'December'
                                        ];
                                        
                                        // Loop to generate options for each month
                                        foreach ($months as $index => $month) {
                                            // Add 1 to index because array index starts from 0
                                            $monthNumber = $index + 1;
                                            echo "<option value=\"$monthNumber\">$month</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label">Exp year<span class="text-danger">*</span></label>
                                    <select class="form-control" name="expyear">
                                        <option value="">Choose</option>
                                        <?php
                                        // Get the current year
                                        $currentYear = date('Y');
                                        // Specify the range of years (adjust as needed)
                                        $startYear = $currentYear;
                                        $endYear = $currentYear + 10; // Show 10 years into the future
                                        
                                        // Loop to generate options for each year in the range
                                        for ($year = $startYear; $year <= $endYear; $year++) {
                                            echo "<option value=\"$year\">$year</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">CVV<span class="text-danger">*</span></label>
                                    <input autocomplete='off' type="cvv" class="form-control" minlength="3" maxlength="3" value="" required name="cvv">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="heading">
                                <h3>Price details</h3>
                            </div>
                            <div class="total" style="display: flex; justify-content: space-between; padding-top: 30px;">
                                <p><strong>Total :</strong></p>
                                <p>₹<?php echo number_format($total, 2);?></p>
                            </div>
                            <div class="checkout-btn" style="margin-top: 20px; text-align: center;">
                                <button type="submit" name="proceed_payment" class="genric-btn primary circle">Proceed to checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
                

<?php

require_once 'include/footer.php';

?>