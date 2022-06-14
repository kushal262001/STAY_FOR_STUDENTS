<?php
    include "add_db.php";
    session_start();
    if(isset($_SESSION['user']) and isset($_GET['id']) and isset($_GET['inc'])){
        $id = intval($_GET['id']);
        $inc = intval($_GET['inc']);
        $query = "update hostels set slots = slots +'$inc' where id='$id' and approved=1";
        $result = mysqli_query($conn,$query);
        if ($result) {
            echo "Done";
        }else{
            echo "Failed";
        }
    }
    else {
        echo "Invalid Request";
    }
?>