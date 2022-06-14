<?php
$server = "localhost:3307";
$user = "root";
$password = "";
$db = "hstlprj";
// $conn = new mysqli($server, $user, $password, $db);
$conn = mysqli_connect($server,$user,$password,$db);
if(!$conn)
{
    // echo "Connected";
    echo "Error".mysqli_connect_error();
}
else
{
 $user = $user;   
}
?>