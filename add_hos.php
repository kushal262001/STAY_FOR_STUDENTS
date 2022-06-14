<?php
session_start();
if (isset($_SESSION['user'])) {
    include 'add_db.php';
    if (isset($_POST['hname'])) 
    {
        $hname = $_POST['hname'];
        $oname = $_POST['oname'];
        $hmail = $_POST['hmail'];
        $hphone = $_POST['hphone'];
        $hdristict = $_POST['hdristict'];
        $htaluka = $_POST['htaluka'];
        $hadd = $_POST['hadd'];
        $htaluka = $_POST['htaluka'];
        $hpin = $_POST['hpin'];
        $avs = $_POST['avs'];
        $ht = $_POST['ht'];
        $rent = $_POST['rent'];

        $p1name = $conn->real_escape_string($_FILES['upf1']['name']);
        $p1mime = $conn->real_escape_string($_FILES['upf1']['type']);
        $p1data = $conn->real_escape_string(file_get_contents($_FILES['upf1']['tmp_name']));
        $p1size = intval($_FILES['upf1']['size']);

        // echo $p1data;

        $p2name = $conn->real_escape_string($_FILES['upf2']['name']);
        $p2mime = $conn->real_escape_string($_FILES['upf2']['type']);
        $p2data = $conn->real_escape_string(file_get_contents($_FILES['upf2']['tmp_name']));
        $p2size = intval($_FILES['upf2']['size']);

        $p3name = $conn->real_escape_string($_FILES['upf3']['name']);
        $p3mime = $conn->real_escape_string($_FILES['upf3']['type']);
        $p3data = $conn->real_escape_string(file_get_contents($_FILES['upf3']['tmp_name']));
        $p3size = intval($_FILES['upf2']['size']);

        
        $zz = $_SESSION['user'];
        $message= "We are creating Your Account";
        $query = "select * from hostels where hname='$hname' and own_id='$zz';";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result)==0) 
        {
            $own_id = $_SESSION['user'];
            $query = "insert into hostels (own_name,own_mail,own_phone,own_id,tp,hstaddress,hstdist,hsttal,hstpin,slots,dataph1,mimeph1,sizeph1,dataph2,mimeph2,sizeph2,dataph3,mimeph3,sizeph3,adminvisited,approved,rejected,hname,rent) values ('$oname','$hmail','$hphone','$own_id','$ht','$hadd','$hdristict','$htaluka','$hpin','$avs','$p1data','$p1mime','$p1size','$p2data','$p2mime','$p2size','$p3data','$p3mime','$p3size',0,0,0,'$hname','$rent')";
            $result = mysqli_query($conn,$query);
            if($result)
            {
                $msg = "Hostel Added";
                echo '<script language="javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location="upld.php";';
                echo '</script>';
            }
            else
            {
                echo "Error : ".mysqli_error($conn);
            }
        }
        else
        {
            $msg = "Hostel Name already exists";
            echo '<script language="javascript">';
            echo 'alert("'.$msg.'");';
            echo 'window.location="upld.php";';
            echo '</script>';
        }
    }
    else
    {
        $message= "Fill out form first";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="upld.php";';
        echo '</script>';
    }
}
else{
    $message= "Login first";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="upld.php";';
        echo '</script>';
}

?>