<?php

    session_start();

    unset($_SESSION['isLogin']);
    unset($_SESSION['username']);
    unset($_SESSION['usertype']);

    echo "<script>alert('You have logged out successfully');location.href='../index.php'</script>";

?>
