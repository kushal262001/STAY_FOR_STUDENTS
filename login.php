<?php
include 'add_db.php';
if (isset($_POST['uname']) and isset($_POST['pwd'])) 
{
    $uname = $_POST['uname'];

    $pwd = $_POST['pwd'];
    $query = "select name,pssd,gender from users where name='$uname' and pssd='$pwd';";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result)==1) 
    {
        session_start();
        $_SESSION['user'] = $uname;
        $row = mysqli_fetch_assoc($result);
        $_SESSION['gender'] = $row['gender'];
        // $c = $_SESSION['gender'];
        echo '<script language="javascript">';
        // echo 'alert("'.$c.'");';
        echo 'window.location="index.php";';
        echo '</script>';
    }
    else
    {
        $query = "select gender from admins where username='$uname' and password='$pwd';";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result)==1) {
            session_start();
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $uname;
            $_SESSION['admin'] = TRUE;
            $_SESSION['gender'] = $row['gender'];
            echo '<script language="javascript">';
            echo 'window.location="index.php";';
            echo '</script>';
        } else {
            $msg = "Invalid User";
            echo '<script language="javascript">';
            echo 'alert("'.$msg.'");';
            echo 'window.location="index.php";';
            echo '</script>';
        }
        
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