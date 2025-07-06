<?php
session_start();
require_once 'config/connection.php';

if (empty($_SESSION['isLogin'])) {
    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php require_once 'include/header.php'; ?>
<style>
    .image-container {
        width: 100%; /* Ensures the image takes full width of its container */
        height: 200px; /* Set the fixed height for the image container */
        overflow: hidden; /* Hide any overflow to prevent distortion */
    }

    .image-container img {
        width: 100%; /* Make the image fill the container width */
        height: auto; /* Maintain aspect ratio */
    }

    /* Define keyframes for the animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Apply animation to the recipe items */
    .single_recepie {
        animation: fadeInUp 0.5s ease forwards;
    }

    /* Add space between items in each row */
    .recepie_area .row > div {
        margin-bottom: 20px; /* Adjust the value to set the desired space */
    }
</style>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shop Jewellery page</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                    <a href="jewellery.php">Jewellery</a>
                </nav>
            </div>
        </div>
    </div>
</section><br></br>

<section class="about_section layout_padding2-top layout_padding-bottom">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="GET" class="d-flex justify-content-between align-items-end">
                <div class="form-group mb-0">
                    <select class="form-control" id="category" name="category">
                    <option value="" selected disabled>Select Category</option>
                        <?php
                        $sql_categories = "SELECT * FROM category_master";
                        $res_categories = mysqli_query($conn, $sql_categories);
                        while ($row_category = mysqli_fetch_assoc($res_categories)) {
                            echo "<option value='" . $row_category['Category_master_id'] . "'>" . $row_category['Category'] . "</option>";
                        }
                        ?>
                    </select><br></br>
                </div>
                <a href="jewellery.php" class="genric-btn danger circle arrow">Clear</span></a>
                <button type="submit" class="genric-btn primary circle arrow">Search</button>
            </form>
        </div>
    </div>
</div>


    <!-- recepie_area_start  -->
    <div class="recepie_area plus_padding">
        <div class="container">
            <div class="row">
            <?php
                // Handle form submission
                $where_clause = ""; // Initialize where clause
                if(isset($_GET['category']) && !empty($_GET['category'])) {
                    $category_id = $_GET['category'];
                    $where_clause .= "WHERE Category_master_id = '$category_id'";
                }

                $sql = "SELECT * FROM item_master $where_clause";
                $res = mysqli_query($conn, $sql);

                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_array($res)) {
                        $category_master = ""; // Initialize variable
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single_recepie text-center">
                                <div class="recepie_thumb">
                                    <div class="image-container">
                                        <img src="images/<?php echo $row['Image1']; ?>" alt="">
                                    </div>
                                </div>
                                <h3><?php echo $row['Pname']; ?></h3>
                                <?php
                                $catid = $row['Category_master_id'];
                                $qry = "SELECT * FROM category_master WHERE Category_master_id = '$catid'";
                                $result = mysqli_query($conn, $qry);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row2 = mysqli_fetch_assoc($result);
                                    $category_master = $row2['Category'];
                                }
                                ?>
                                <span><?php echo $category_master; ?></span>
                                <p>Price : ₹ <?php echo $row['Price']; ?></p>
                                <a href="item_master-details.php?Item_master_id=<?php echo $row['Item_master_id']; ?>" class="line_btn">View Details</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- /recepie_area_start  -->
</section>
<br></br>
<?php require_once 'include/footer.php'; ?>
</html>
</body>
