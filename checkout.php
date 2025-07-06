<?php
session_start();
require_once 'config/connection.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

?>

    <?php
        $total = 0;

        if(isset($_POST['delete_cart_item'])){

            $prodId = $_POST['fid'];
            unset($_SESSION['cart_item'][$prodId]);

            echo '<script>swal("Success", "Item removed successfully !", "success");</script>';
        }

        if(isset($_POST['add_cart_item'])) {

            foreach ($_SESSION["cart_item"] as $k => $v) {
    
                if($_POST['fid'] == $k) {
        
                    if(empty($_SESSION["cart_item"][$k]["itemQuantity"])) {
        
                        $_SESSION["cart_item"][$k]["itemQuantity"] = 1;
                    }
                    
                    $_SESSION["cart_item"][$k]["itemQuantity"] += 1;
                    
                    echo '<script>swal("Success", "Item updated successfully !", "success");</script>';
                }
            }
        }
    
        if(isset($_POST['remove_cart_item'])){
    
            foreach ($_SESSION["cart_item"] as $k => $v) {
    
                if($_POST['fid'] == $k) {
        
                    if(empty($_SESSION["cart_item"][$k]["itemQuantity"])) {
        
                        $_SESSION["cart_item"][$k]["itemQuantity"] = 0;
                    }
                    else if ($_SESSION["cart_item"][$k]["itemQuantity"] > 1) {
                      $_SESSION["cart_item"][$k]["itemQuantity"] -= 1;
                    }
    
                    echo '<script>swal("Success", "Food updated successfully !", "success");</script>';
                }
            }
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
        .cart-product {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            padding-top: 15px;
        }

        .product-image {
            width: 100px;
            height: 100px;
            border-radius: 3px;
            margin-right: 10px;
        }

        .product-details {
            flex: 1;
        }

        .product-details p {
            font-size: 18px;
            color: black;
        }

        .product-price {
            font-weight: bold;
        }

        .quantity-control {
            display: flex;
            align-items: center;
        }

        .quantity-input {
            width: 40px;
            text-align: center;
            margin: 0 10px;
        }

        .btn.primary-border.circle {
            border-radius: 50%;
            width: 30px;
            height: 30px;
            background-color: transparent;
            border: 1px solid #007bff;
            color: #007bff;
            font-size: 16px;
            line-height: 1;
        }

        .btn.primary-border.circle:hover {
            background-color: #007bff;
            color: #fff;
        }

        .btn.primary-border.circle:focus {
            outline: none;
        }

        .card-body > div {
            border-bottom: 1px solid #ddd; 
            padding: 10px 0;
        }

        .card-body > div:last-child {
            border-bottom: none;
        }

</style>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php require_once 'include/header.php'; ?>

	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shopping Cart page</h1>
					<nav class="d-flex align-items-center">
						<a href="home.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="checkout.php">Cart</a>
					</nav>
				</div>
			</div>
		</div>
	</section><br>
    <section>
    <div class="recepie_details_area">
    <h2 class="text-center font-weight-bold">Shopping Cart</h2>
        <div class="container">
            <div class="row">
                <?php
                 if(!empty($_SESSION['cart_item'])){ 
                    ?>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <?php                                    
                                    foreach ($_SESSION['cart_item'] as $item) {
                                        $total += ($item['itemPrice'] * $item['itemQuantity']);
                                        $amount = ($item['itemPrice'] * $item['itemQuantity']);
                            ?>
                            
                            <form method="post" class="cart-product">
                                <img src="images/<?php echo $item['itemImage'];?>" alt="Product 1" class="product-image">
                                <div class="product-details">
                                    <p class="product-name"><?php echo $item['itemName'];?></p>
                                    <p class="product-price">₹<?php echo number_format($amount, 2);?></p>
                                </div>
                                <div class="quantity-control">
                                    <button type="submit" class="btn btn-sm primary-border circle decrease" name="remove_cart_item">-</button>
                                    <input type="text" class="quantity-input form-control" value="<?php echo $item['itemQuantity'];?>" name="quantity">
                                    <button type="submit" class="btn btn-sm primary-border circle increase" name="add_cart_item">+</button>
                                </div>
                                <div class="remove" style="margin-left: 20px;">
                                    <input type="hidden" name="fid" value="<?php echo $item['itemId'];?>">
                                    <button type="submit" name="delete_cart_item" class="btn btn-danger shadow btn-xs sharp"><i class='bi bi-trash'></i></button>
                                </div>
                            </form>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="heading">
                                <h3>Price details</h3>
                            </div>
                            <div class="middle">
                                <div style="display: flex; justify-content: space-between;">
                                    <p>Price(1 items) </p>
                                    <p> ₹<?php echo number_format($total, 2);?></p>
                                </div>
                                <div style="display: flex; justify-content: space-between;">
                                    <p>Delivery charges</p>
                                    <p> Free</p>
                                </div>
                            </div>
                            <div class="total" style="display: flex; justify-content: space-between;">
                                <p><strong>Total</strong></p>
                                <p>₹<?php echo number_format($total, 2);?></p>
                            </div>
                            <div class="checkout-btn" style="margin-top: 20px; text-align: center;">
                                <a href="payment.php?source=<?php echo $total;?>" class="genric-btn primary circle">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                 } else {
                    ?>
                    <div class="col-12 text-center pb-5">
                        <h3>Your shop cart is empty</h3>
                    </div>
                    <?php
                 }
                 ?>
            </div>
        </div>
    </div>

                </section>
                <!-- Bootstrap Icons CSS via CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">

<?php

require_once 'include/footer.php';

?>