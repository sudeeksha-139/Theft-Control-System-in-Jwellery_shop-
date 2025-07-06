<?php
session_start();
require_once 'config/connection.php';

if (empty($_SESSION['isLogin'])) {
    echo "<script>alert('Kindly login to proceed');location.href='index.php';</script>";
    exit; 
}

if(!empty($_SESSION['username'])){

    $name = $_SESSION['username'];
}

if (!empty($_SESSION['User_ID'])) {

    $User_ID = $_SESSION['User_ID'];
}

$orderQuery = "SELECT * FROM orders WHERE User_ID = '$User_ID' ORDER BY order_date DESC LIMIT 1";
$orderResult = mysqli_query($conn, $orderQuery);
$order = mysqli_fetch_assoc($orderResult);

$paymentQuery = "SELECT * FROM payment WHERE order_numbar = '{$order['order_numbar']}'";
$paymentResult = mysqli_query($conn, $paymentQuery);
$payment = mysqli_fetch_assoc($paymentResult);
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php require_once 'include/header.php'; ?>

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Confirmation</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Confirmation</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="order_details section_gap">
    <div class="container">
        <h3 class="title_confirmation">Thank you. Your order has been received.</h3>
        <div class="row order_d_inner">
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Order Info</h4>
                    <ul class="list">
                        <li><span>Order number</span> : <?php echo $order['order_numbar']; ?></li>
                        <li><span>Date</span> : <?php echo $order['order_date']; ?></li>
                        <li><span>Total</span> : <?php echo '$' . $payment['amount']; ?></li>
                        <li><span>Payment method</span> : <?php echo $payment['payment_type']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Order Details</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $orderItemsQuery = "SELECT * FROM order_temp WHERE order_numbar = '{$order['order_numbar']}'";
                        $orderItemsResult = mysqli_query($conn, $orderItemsQuery);
                        while ($row = mysqli_fetch_assoc($orderItemsResult)) {
                            ?>
                            <tr>
                                <td><?php echo $row['Item_master_id']; ?></td>
                                <td><?php echo $row['Quantity']; ?></td>
                                <td><?php echo '$' . $row['price']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="button-group-area mt-10 text-center">
        <a href="checkout.php" class="genric-btn primary circle arrow">Okay!!<span class="lnr lnr-arrow-right"></span></a>
</div>

    </div>
</section>
<!--================End Order Details Area =================-->

<?php require_once 'include/footer.php'; ?>

</body>
</html>
