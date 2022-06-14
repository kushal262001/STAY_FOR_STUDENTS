<?php
    include "add_db.php";
    session_start();
    if ( isset($_SESSION['user']) and isset($_GET['ind'])) {
        $ind = intval($_GET['ind']);
        echo $ind;
        $query = "update notifications set attempted = 1 where ind='$ind'";
        $result = mysqli_query($conn,$query);
        if ($result) {
            echo "Done";
        } else {
            echo "failed";
        }
    } else {
        echo "Something not set";
    }
?>