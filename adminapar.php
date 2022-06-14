<?php
    include "add_db.php";
    if(isset($_GET['hid'])) {
        $temp = $_GET['hid'];
        $op = substr($temp, strlen($temp)-1);
        $id = intval(substr($temp,0,strlen($temp)-1));
        echo $id;
        if ($op=="a") {
            //accpet operation for hostel
            $query = "update hostels set adminvisited = 1, approved = 1 where id='$id'";
            $result = mysqli_query($conn,$query);
            if($result){
                echo "approved";
                
            }else {echo "falied";}
        }
        elseif($op=="r"){
            //reject operation for hostel
            $query = "update hostels set adminvisited = 1, rejected = 1 where id='$id'";
            $result = mysqli_query($conn,$query);
            if($result){
                echo "rejected";
            }else {echo "rej failed";}
        }
    }
    else {
        echo "invalid Admin";
    }
?>