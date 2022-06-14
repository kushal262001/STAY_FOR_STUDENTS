<?php
    include "add_db.php";
    if (isset($_GET['hstdist'])) {
        session_start();
        $td = $_GET['hstdist'];
        $query = "";
        if (isset($_SESSION['gender'])) {
            $gd = $_SESSION['gender'];            
            $query = "select distinct hsttal from hostels where hstdist='$td' and tp='$gd' and approved=1";
        } else {
            $query = "select distinct hsttal from hostels where hstdist='$td' and approved=1";
        }
        
        $result = mysqli_query($conn,$query);
        if ($result) {
            echo "<option selected>Open this select menu</option>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row['hsttal'].'">'.$row['hsttal'].'</option>';
                // $gd = $_SESSION['gender'];
                // echo '<option>'.$gd.'</option>';
            }
        }else{
            echo mysqli_error();
        }
    }else{
        echo "District not set";
    }
?>
                        