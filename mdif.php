<link rel="stylesheet" href="modal.css">
<?php
    include "add_db.php";

    if (isset($_GET['hid'])) {
        $temp = intval($_GET['hid']);
        $query = "select dataph1,mimeph1,dataph2,mimeph2,dataph3,mimeph3 from hostels where id='$temp'";
        $result = mysqli_query($conn,$query);
        
        if ($result) {
            $kp = "";
            $row = mysqli_fetch_assoc($result);

            $kp = base64_encode($row['dataph1']);

            echo '<img src="data:'.$row['mimeph1'].';base64,'.$kp.'" style="width: 75%;height: 75%;border: 2px solid black;"  />';

            $kp = base64_encode($row['dataph2']);

            echo '<img src="data:'.$row['mimeph2'].';base64,'.$kp.'" style="width: 75%;height: 75%;border: 2px solid black;" />';



            $kp = base64_encode($row['dataph3']);

            echo '<img src="data:'.$row['mimeph3'].';base64,'.$kp.'" style="width:75%;height: 75%;border: 2px solid black;" />';

        }else{
            echo "error while fetching data";
        }

    } else if (isset($_GET['uname'])) {
        $uname = $_GET['uname'];
        $query = "select datacer1,mimecer1,datacer2,mimecer2 from users where name='$uname'";
        $result = mysqli_query($conn,$query);
        if ($result) {
            // echo $uname;
            // echo mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
            $kp = base64_encode($row['datacer1']);

            echo '<img src="data:'.$row['mimecer1'].';base64,'.$kp.'" style="width: 75%;height: 75%;border: 2px solid black;"  />';

            $kp = base64_encode($row['datacer2']);

            echo '<img src="data:'.$row['mimecer2'].';base64,'.$kp.'" style="width: 75%;height: 75%;border: 2px solid black;" />';
        }
        else {
            echo "photo failed";
        }
    }
    else{
        echo "id not set";
    }
?>