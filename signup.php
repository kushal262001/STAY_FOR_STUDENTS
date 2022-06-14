<?php
include 'add_db.php';
if (isset($_POST['uname'])) 
{
    $uname = $_POST['uname'];
    echo $uname;
    $uphone = $_POST['uphone'];
    $umail = $_POST['umail'];
    $ugender = $_POST['ug']; //for gender
    $uaddress = $_POST['uaddress']; //for address
    $pssd = $_POST['pwd'];

    $c1name = $conn->real_escape_string($_FILES['ucer1']['name']);
    $c1mime = $conn->real_escape_string($_FILES['ucer1']['type']);
    $c1data = $conn->real_escape_string(file_get_contents($_FILES['ucer1']['tmp_name']));
    $c1size = intval($_FILES['ucer1']['size']);

    $c2name = $conn->real_escape_string($_FILES['ucer2']['name']);
    $c2mime = $conn->real_escape_string($_FILES['ucer2']['type']);
    $c2data = $conn->real_escape_string(file_get_contents($_FILES  ['ucer2']['tmp_name']));
    $c2size = intval($_FILES['ucer2']['size']);

    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];
    // $msg =  $uname." ".$pwd." ".$cpwd;
    $message= "We are creating Your Account";
    $query = "select id from users where name='$uname';";
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result)==0) 
    {
        $q2 = "select id from admins where username='$uname'";
        $r2 = mysqli_query($conn,$q2);
        if (mysqli_num_rows($r2)==0) {
            $query = "insert into users (name,mail,phone,gender,address,datacer1,mimecer1,sizecer1,datacer2,mimecer2,sizecer2,pssd) values ('$uname','$umail','$uphone','$ugender','$uaddress','$c1data','$c1mime','$c1size','$c2data','$c2mime','$c2size','$pssd')";
            $result = mysqli_query($conn,$query);
            if($result)
            {
                session_start();
                $_SESSION['user'] = $uname;
                $msg = "User Created";
                echo '<script language="javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location="index.php";';
                echo '</script>';
            }
            else
            {
                echo "Error : ".mysqli_error($conn);
            }

        }
        else {
            $msg = "Username already exists";
            echo '<script language="javascript">';
            echo 'alert("'.$msg.'");';
            echo 'window.location="index.php";';
            echo '</script>';
        }
        
    }
    else
    {
        $msg = "Username already exists";
        echo '<script language="javascript">';
        echo 'alert("'.$msg.'");';
        echo 'window.location="index.php";';
        echo '</script>';
    }
    

    
}
else
{
    $message= "Fill out form first";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="tp1dp.php";';
    echo '</script>';
}
?>