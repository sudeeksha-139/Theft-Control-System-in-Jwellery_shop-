<?php
session_start();
require_once '../config/connection.php';
if (empty($_SESSION['isLogin'])) {
    echo "<script>alert('Kindly login to proceed');location.href='index.php';</script>";
    exit; 
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'include/header.php'; ?>

            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Dashboard / View Cart</h2>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">View Cart</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Card number</th>
                                            <th scope="col">Card holder</th>
                                            <th scope="col">Exp month</th>
                                            <th scope="col">Exp year</th>
                                            <th scope="col">Order number</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        $sql = "SELECT * FROM payment";
                                        $res = mysqli_query($conn,$sql);

                                        if(mysqli_num_rows($res) > 0) {
                                            $i = 1;

                                            while($row = mysqli_fetch_array($res)) {
                                                echo "<tr>";
                                                echo "<td>$i</td>";
                                                echo "<td>$row[card_number]</td>";
                                                echo "<td>$row[card_holder_name]</td>";

                                                $monthNumber = $row['card_expiry_month'];
                                                $monthName = date('F', mktime(0, 0, 0, $monthNumber, 1));
                                                echo "<td>$monthName</td>";
                                                echo "<td>$row[card_expiry_year]</td>";
                                                echo "<td>$row[order_numbar]</td>";
                                                echo "<td>$username</td>";
                                                echo "<td>$row[payment_type]</td>";
                                                echo "<td>$row[payment_status]</td>";
                                                echo "<td>$row[amount]</td>";
                                                echo "<td>" . date('Y-m-d', strtotime($row['date_paid'])) . "</td>";
                                                echo "</tr>";
                                                $i++;
                                            }
                                        }


                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php require_once 'include/footer.php'; ?>
</body>

</html>
