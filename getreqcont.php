<?php
    include "add_db.php";
    session_start();
    if (isset($_GET['hid']) and isset($_SESSION['user'])) 
    {
        $temp = $_GET['hid'];
        $op = substr($temp, strlen($temp)-1);
        $id = intval(substr($temp,0,strlen($temp)-1));
        if ($op=="t") {
            $query = "select reqid,userid,approved,rejected from requests where hid='$id'";
            $result = mysqli_query($conn,$query);
            if (mysqli_num_rows($result)) {
                echo '<table style="width: 100%;">';
                echo '<tr class="bb">
                        <th>Req Id</th>
                        <th>Stud Id</th>
                        <th>Stud Details</th>
                        <th>Approved</th>
                        <th>Rejected</th>
                    </tr>';
                while ($row=mysqli_fetch_assoc($result)) {
                    $uname = $row['userid'];
                    $q2 = "select mail,phone from users where name = '$uname'";
                    $r2 = mysqli_query($conn,$q2);
                    $rw2 = mysqli_fetch_assoc($r2);
                    echo '<tr class="bb">
                        <td>'.$row['reqid'].'</td>
                        <td>'.$row['userid'].'</td>
                        <td>
                            Name : Jon Doe <br>
                            Phone No :'. $rw2['phone'] .'<br>
                            Email :'.$rw2['mail'].' <br>
                            Certificates : <button class="btn btn-sm btn-primary" value="'.$row['userid'].'" onclick="fn(this.value)">view</button> <br>
                        </td>
                        <td>'.$row['approved'].'</td>
                        <td>'.$row['rejected'].'</td>
                    </tr>';
                }
                echo "</table>";
            }
        }else if ($op=="a") {
            $query = "select reqid,userid from requests where hid='$id' and approved=1";
            $result = mysqli_query($conn,$query);
            if ($result) {
                if (mysqli_num_rows($result)) {
                    echo '<table style="width: 100%;">';
                    echo '<tr class="bb">
                            <th>Sr. No.</th>
                            <th>Stud Id</th>
                            <th>Stud Details</th>
                        </tr>';
                    while ($row=mysqli_fetch_assoc($result)) {
                        $uname = $row['userid'];
                        $q2 = "select mail,phone from users where name = '$uname'";
                        $r2 = mysqli_query($conn,$q2);
                        $rw2 = mysqli_fetch_assoc($r2);
                        echo '<tr class="bb">
                            <td>'.$row['reqid'].'</td>
                            <td>'.$row['userid'].'</td>
                            <td>
                                Phone No :'. $rw2['phone'] .'<br>
                                Email :'.$rw2['mail'].' <br>
                                Certificates : <button class="btn btn-primary btn-sm" value="'.$row['userid'].'" onclick="fn(this.value)">view</button> <br>
                            </td>
                        </tr>';
                    }
                    echo "</table>";
                }
            }
            else {
                echo mysqli_error();
            }
            
        }else if ($op=="p") {
            $query = "select reqid,userid from requests where hid='$id' and visited=0";
            $result = mysqli_query($conn,$query);
            if ($result) {
                if (mysqli_num_rows($result)) {
                    echo '<table style="width: 100%;">';
                    echo '<tr class="bb">
                            <th>Sr. No.</th>
                            <th>Stud Id</th>
                            <th>Stud Details</th>
                            <th>Approve</th>
                            <th>Reject</th>
                        </tr>';
                    while ($row=mysqli_fetch_assoc($result)) {
                        $uname = $row['userid'];
                        $q2 = "select mail,phone from users where name = '$uname'";
                        $r2 = mysqli_query($conn,$q2);
                        $rw2 = mysqli_fetch_assoc($r2);
                        echo '<tr class="bb">
                            <td>'.$row['reqid'].'</td>
                            <td>'.$row['userid'].'</td>
                            <td>
                                Phone No :'. $rw2['phone'] .'<br>
                                Email :'.$rw2['mail'].' <br>
                                Certificates : <button class="btn btn-sm btn-primary" value="'.$row['userid'].'" onclick="fn(this.value)">view</button> <br>
                            </td>
                            <td><button class="btn btn-primary btn-sm" value="'.$row['reqid'].'|'.$uname.'a" onclick="actn(this.value)">Approve</button></td>
                            <td><button class="btn btn-primary btn-sm" value="'.$row['reqid'].'|'.$uname.'r" onclick="actn(this.value)">Reject</button></td>
                        </tr>';
                    }
                    echo "</table>";
                }
            }
            else {
                echo mysqli_error();
            }
            
        }else if ($op=="r") {
            $query = "select reqid,userid from requests where hid='$id' and rejected=1";
            $result = mysqli_query($conn,$query);
            if ($result) {
                if (mysqli_num_rows($result)) {
                    echo '<table style="width: 100%;">';
                    echo '<tr class="bb">
                            <th>Sr. No.</th>
                            <th>Stud Id</th>
                            <th>Stud Details</th>
                        </tr>';
                    while ($row=mysqli_fetch_assoc($result)) {
                        $uname = $row['userid'];
                        $q2 = "select mail,phone from users where name = '$uname'";
                        $r2 = mysqli_query($conn,$q2);
                        $rw2 = mysqli_fetch_assoc($r2);
                        echo '<tr class="bb">
                            <td>'.$row['reqid'].'</td>
                            <td>'.$row['userid'].'</td>
                            <td>
                                Phone No :'. $rw2['phone'] .'<br>
                                Email :'.$rw2['mail'].' <br>
                                Certificates : <button class="btn btn-sm btn-primary" value="'.$row['userid'].'" onclick="fn(this.value)">view</button> <br>
                            </td>
                        </tr>';
                    }
                    echo "</table>";
                }
            }
            else {
                echo mysqli_error();
            }
            
        } 
    }
    else {
        $F= 4;
    }
?>