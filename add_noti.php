<?php
    include "add_db.php";
    if (isset($_GET['uname']) and isset($_GET['reqid'])) {
        $temp = $_GET['uname'];

        $reqid = intval($_GET['reqid']);

        $op = substr($temp, strlen($temp)-1);
        $a = strlen($temp);
        $a = $a-2;
        $uname = substr($temp,0,$a);
        
        $query = "select hid from requests where reqid='$reqid'";
        $result = mysqli_query($conn,$query);

        $row = mysqli_fetch_assoc($result);
        $hid = $row['hid'];

        $query = "select own_phone,hname from hostels where id='$hid'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $hname = $row['hname'];
        $phone = $row['own_phone'];
        $noti = "";
        if ($op=="2") {
            $noti = $hname.' Approved your Application. Kindly Contact on this number '.$phone.' for funther procedure.';
        }
        elseif ($op=="3") {
            $noti = $hname.' Rejected you Application. Please try at other near hostels';
        }
        $query = "insert into notifications (name,ntxt) values ('$uname','$noti')";
        $result = mysqli_query($conn,$query);
        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }
    else {
        echo "uname or reqid not set in GET";
    }
?>