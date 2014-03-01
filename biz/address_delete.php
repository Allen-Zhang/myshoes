
<!-- For editing delivery address -->
<?php
    session_start();

    require_once('db.mysql.php');

    $aid = $_GET['aid'];
    $page = $_GET['page'];

    if (isset($aid)) {

        mysql_query("DELETE FROM addresses WHERE aid = '$aid'", $conn) or die(mysql_error());

        if($page == "address") {

            header('Location: ../address.php');  // Delivery address delete successfully, redirect to address page

        } else {

            $_SESSION['msg'] = "Delivery address delete successfully!";

            header('Location: ../account_info.php');  // Delivery address delete successfully, redirect to account info page

        }

    } else {

        $_SESSION['msg'] = "Delivery address delete failed.";

        header('Location: ../account_info.php');  // Delivery address delete failed, redirect to account info page

    }

?>