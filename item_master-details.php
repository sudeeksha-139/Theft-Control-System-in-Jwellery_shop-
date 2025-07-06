<?php

    session_start();

    require_once 'config/connection.php';


    if (empty($_SESSION['isLogin'])) {

        echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
    }

    require_once 'include/header.php';

    if(!empty($_GET['Item_master_id'])) {

        $Item_master_id = $_GET['Item_master_id'];
    }
    $sql = "SELECT * FROM item_master where Item_master_id = '$Item_master_id'";
    $res = mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)>0) {
        $row = mysqli_fetch_array($res);

        $category_master = $row['Category_master_id'];
        $qry = "SELECT * FROM category_master WHERE Category_master_id = '$category_master'";
        $result = mysqli_query($conn, $qry);

        if ($result) { 
            if (mysqli_num_rows($result) > 0) {
                $row2 = mysqli_fetch_assoc($result);
                $category_master = $row2['Category'];
            }
        }
?>
<?php

    if (isset($_POST['add_to_cart'])) {

        $Item_master_id = $_POST['Item_master_id'];
        $Pname = $_POST['Pname'];
        $Price = $_POST['Price'];
        $Image1 = $_POST['Image1'];
        $Quantity = 1;

        $itemArray = array(
            $Item_master_id => array(
                'itemId' => $Item_master_id,
                'itemName' => $Pname,
                'itemPrice' => $Price,
                'itemImage' => $Image1,
                'itemQuantity' => $Quantity,
            )
        );

        if (empty($_SESSION["cart_item"])) {

            $_SESSION["cart_item"] = $itemArray;

            echo "<script>alert('item added to cart !');location.href='item_master-details.php?Item_master_id=$Item_master_id>'</script>";
        }  else {

            $_SESSION["cart_item"] += $itemArray;

            echo "<script>alert('item added to cart !');location.href='item_master-details.php?Item_master_id=$Item_master_id'</script>";
        }
    }
?>

<style>
    .recepies_thumb {
        width: 85%;
    }
    .single_customer {
        padding: 25px 25px;
    }
    .customer_meta {
        text-align: center;
    }
    .customer_feedback_area {
        padding-top: 50px;
        padding-bottom: 10px;
    }
    .recepies_thumb img {
        max-width: 100%; /* Set maximum width to prevent the image from exceeding its container */
        max-height: 400px; /* Set maximum height to control the size of the image */
        width: auto; /* Allow the image to adjust its width according to the aspect ratio */
        height: auto; /* Allow the image to adjust its height according to the aspect ratio */
    }

    /* Add other existing styles here */
</style>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php require_once 'include/header.php'; ?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="home.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Product Details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
    <!-- /bradcam_area  -->
    <div class="recepie_details_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="recepies_thumb">
                        <img src="images/<?php echo $row['Image1']; ?>" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="recepies_info">
                        <h3><?php echo $row['Pname']; ?></h3>
                        <p><?php echo $row['Description']; ?>.</p>

                        <div class="resepies_details">
                            <ul>
                                <li><p><strong>Price</strong> : ₹ <?php echo $row['Price']; ?> </p></li>
                                <li><p><strong>Category</strong> : <?php echo $category_master; ?> </p></li>
                            </ul>
                        </div>
                        <form method="post">
                            <div class="buy">
                            <input type="hidden" name="Item_master_id" value="<?php echo $row['Item_master_id']; ?>">
                            <input type="hidden" name="Pname" value="<?php echo $row['Pname']; ?>">
                            <input type="hidden" name="Image1" value="<?php echo $row['Image1']; ?>">
                            <input type="hidden" name="Price" value="<?php echo $row['Price']; ?>">
                                <button class="genric-btn warning circle" name="add_to_cart"><i class="bi bi-cart-check-fill"></i> Add to cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="recepies_text">
                        <p><?php echo $row['Description']; ?>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- customer_feedback_area -->
<!-- <div class="customer_feedback_area">
    <div class="container">
        <div class="row justify-content-center mb-50">
            <div class="col-xl-9">
                <div class="section_title text-center">
                    <h3>Users reviews</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="customer_active owl-carousel">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th>User Name</th>
                                <th>Comments</th>
                                <th>Date Posted</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $qry1 = "SELECT * FROM Feedback ORDER BY date_posted DESC LIMIT 5";

                            $resu = mysqli_query($conn, $qry1);

                            if (mysqli_num_rows($resu) > 0) {
                                $count = 1;
                                while ($row = mysqli_fetch_array($resu)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $row['User_name']; ?></td>
                                        <td><?php echo $row['comments']; ?></td>
                                        <td><?php echo date('M d, Y', strtotime($row['date_posted'])); ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- / customer_feedback_area -->



<?php
}

require_once 'include/footer.php';

?>