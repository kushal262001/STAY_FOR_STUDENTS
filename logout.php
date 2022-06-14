<?php
session_start();
session_unset();
// $msg = "User Created";
echo '<script language="javascript">';
// echo 'alert("'.$msg.'");';
echo 'window.location="index.php";';
echo '</script>';
?>