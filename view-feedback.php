<?php

session_start();

require_once 'config/connection.php';

if (empty($_SESSION['isLogin'])) {
    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

// Fetch feedback data from the database
$feedbackQuery = "SELECT * FROM feedback";
$feedbackResult = mysqli_query($conn, $feedbackQuery);

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php require_once 'include/header.php'; ?>
<style>
    /* Add your CSS styles here */
</style>
<body>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>View Feedback</h1>
                    <nav class="d-flex align-items-center">
                        <a href="home.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="add-item.php">View Feedback</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Feedback Table Area -->
    <section class="feedback_table_area section_gap_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"><br>
                <h1 class="text-center mb-4">View Feedbacks!!</h1>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Feedback ID</th>
                                    <th>Name</th>
                                    <th>Feedback Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($feedbackResult)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['Feedback_id'] . "</td>";
                                    echo "<td>" . $row['Name'] . "</td>";
                                    echo "<td>" . $row['Feedback'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Feedback Table Area -->

    <?php require_once 'include/footer.php'; ?>
</body>
</html>

