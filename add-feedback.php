<?php
session_start();
require_once 'config/connection.php';

if (empty($_SESSION['isLogin'])) {
    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
    exit;
}

$name = "";

if (!empty($_SESSION['username'])) {
    $name = $_SESSION['username'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_feedback'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

    $sql_insert_feedback = "INSERT INTO feedback (Name, Feedback, Date) VALUES ('$name', '$feedback', NOW())";
    if (mysqli_query($conn, $sql_insert_feedback)) {
        echo "<script>alert('Feedback submitted successfully');</script>";
    } else {
        echo "<script>alert('Error submitting feedback');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php require_once 'include/header.php'; ?>

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Feedback</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="add-feedback.php">Feedback</a>
                </nav>
            </div>
        </div>
    </div>
</section><br></br>

<section class="contact_area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8"><br>
                <h2 class="text-center font-weight-bold">Give Feedback</h2>
                <form method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Your Name" value="<?php echo $name; ?>" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="feedback" placeholder="Your Feedback" required></textarea>
                    </div>
                    <button type="submit" class="genric-btn primary circle arrow" name="submit_feedback">Submit Feedback</button>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="feedback_section layout_padding2-top layout_padding-bottom">

</section>


<?php require_once 'include/footer.php'; ?>
</body>
</html>
