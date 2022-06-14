<?php
    include "add_db.php";
    session_start();
    if (isset($_GET['hid']) && isset($_SESSION['user'])) 
    {
        $uid = $_SESSION['user'];
        $hid = intval($_GET['hid']);

        $query = "select reqid from requests where userid='$uid' and hid='$hid' and visited=0";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result)==0) 
        {
            $query = "insert into requests (userid,hid,visited,approved,rejected) values ('$uid','$hid',0,0,0);";
            $result = mysqli_query($conn,$query);
            if ($result) {
                echo "Request created successfully";
            }
            else{
                echo 'failed';
            }
            $query = "select hid from reqcount where hid='$hid';";
            $result = mysqli_query($conn,$query);
            if($result) {
                if (mysqli_num_rows($result)==0) {
                    $query = "insert into reqcount (hid,totreq,appreq,rejreq) values('$hid',1,0,0);";
                    $result1 = mysqli_query($conn,$query);
                    if($result){echo "sub successful";}else {echo "sub failed";}
                }
                else {
                    $query = "update reqcount set totreq=totreq+1 where hid='$hid'";
                    $result1 = mysqli_query($conn,$query);
                    if($result){echo "sub dddddddddddd successful";}else {echo "sub dddddddddddddd failed";}
                }
                echo "hostel registered for reqcount";
                
            }
            else{
                echo "2nd query failed";
            }
            
        }
        else
        {
            $msg = "Request already sent";
            echo $msg;
        }
    }
    else
    {
        echo "Login first";
    }
?>