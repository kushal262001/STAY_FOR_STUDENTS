<?php
    include "add_db.php";
    session_start();
    if (isset($_GET['reqid']) and isset($_SESSION['user'])) {
        $temp = $_GET['reqid'];
        $op = substr($temp, strlen($temp)-1);
        $reqid = intval(substr($temp,0,strlen($temp)-1));
        $query = "select hid from requests where reqid='$reqid'";
        $result = mysqli_query($conn,$query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($op=="a") {
                $query = "select userid,hid from requests where reqid='$reqid'";
                $result = mysqli_query($conn,$query);
                // $row = mysqli_fetch_assoc($result);
                $hid = intval($row['hid']);
                // echo $hid;
                $query = "select slots from hostels where id='$hid'";
                // echo $query;
                $result = mysqli_query($conn,$query);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $slts =  $row['slots'];
                    if ($slts==0) {
                        echo "1";
                    }else{
                        $query = "update requests set visited = 1, approved=1 where reqid='$reqid'";
                        $result = mysqli_query($conn,$query);
                        

                        $query = "update hostels set slots = slots - 1 where id='$hid'";
                        $result = mysqli_query($conn,$query);
                        
                        $query = "update reqcount set appreq = appreq + 1 where hid='$hid'";
                        $result = mysqli_query($conn,$query);

                        echo "2";
                    }

                }else{
                    echo "failed iiiiiiiiiiiiiiiiii";
                }
                
            } else if ($op=="r") {
                $query = "select userid,hid from requests where reqid='$reqid'";
                $result = mysqli_query($conn,$query);
                $row = mysqli_fetch_assoc($result);
                $hid = $row['hid'];
                $query = "update requests set visited = 1, rejected=1 where reqid='$reqid'";

                $result = mysqli_query($conn,$query);
                $query = "update reqcount set rejreq = rejreq + 1 where hid='$hid'";
                $result = mysqli_query($conn,$query);
                if ($result) {
                    echo "3";
                }
            } else {
                echo "undefined operation";
            }
        }else {
         echo mysqli_error();   
        }
    } else {
        echo "invalid user or something went wronng";
    }
?>