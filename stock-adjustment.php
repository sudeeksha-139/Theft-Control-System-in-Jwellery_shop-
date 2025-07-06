<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <style>
    .form-control {
        width: 100%; /* Adjust width as needed */
    }
    </style>
</head>
<body>

<?php
session_start();
require_once 'config/connection.php';

if (empty($_SESSION['isLogin'])) {
    echo "<script>alert('Kindly login to proceed');location.href='index.php';</script>";
    exit; 
}

if (isset($_POST['add'])) {
    $Pname = $_POST['Pname'];
    $Quantity = $_POST['Quantity'];
    if (mysqli_query($conn, "UPDATE item_master SET Quantity= '$Quantity' WHERE Pname= '$Pname'")) {
        echo "<script>alert('Stock Add successfully.');location.href='stock-adjustment.php';</script>";
    } else {
        echo "<script>alert('Unable to Add Stock.');location.href='stock-adjustment.php';</script>";
    }
}
?>

<?php require_once 'include/header.php'; ?>

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Stock Adjustment</h1>
                <nav class="d-flex align-items-center">
                    <a href="home.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="stock-adjustment.php">Stock Adjustment</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="contact_area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8"><br>
                <h2 class="text-center font-weight-bold">Stock Adjustment</h2>
                <form method="POST" action="">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <select class="form-control" name="Pname">
                            <option value="" selected disabled>Select Product</option>
                            <?php
                            $res1 = mysqli_query($conn, "SELECT Pname FROM item_master");
                            if (mysqli_num_rows($res1) > 0) {
                                while ($row = mysqli_fetch_assoc($res1)) {
                                    echo "<option value='" . $row['Pname'] . "'>" . $row['Pname'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div><br></br>
                    <div class="form-group">
                        <label for="Quantity" style="display: block;">Quantity</label>
                        <input type="number" class="form-control" name="Quantity" placeholder="Enter Quantity">
                    </div>
                    <div style="text-align: center;">
                        <button type="submit" class="genric-btn primary circle arrow" name="add">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once 'include/footer.php'; ?>
</body>
</html>
