<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Hostel | Notifications</title>
    <link rel="icon" href="Icons/fav.png" type="image/png">
    <link rel="stylesheet" href="modal.css">
</head>
<script>
    function delnotf(str) {
        if (str == "") {
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
                location.reload();
            }
            };
            xmlhttp.open("GET","del_notf.php?ind="+str,true);
            xmlhttp.send();
        }
    }



    function sendnofication(str,reqid) {
        alert("at least they called me");
        if (str==="" || reqid==="") {
            alert("Empty String");
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET","add_noti.php?uname="+str+"&reqid="+reqid,true);
            xmlhttp.send();
        }
    }


    function gtstreq(str) {
        if (str == "") {
            document.getElementById("reqcont").innerHTML = "";
            return;
        } else {
            alert(str);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("reqcont").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET","getreqcont.php?hid="+str,true);
            xmlhttp.send();
        }
    }
    function actn(str) {
        alert(str);
        var k = "";
        var b = "";
        var lc = str[str.length-1];
        var flag = false;
        for (let i = 0; i < str.length; i++) {
            if (str[i]==="|") {
                flag = true;
                continue;
            }
            if (flag===false) {
                k += str[i];
            }
            else {
                b += str[i];
            }
        }

        str=k+lc;
        if (str==="") {
            return;
        }else {
            var xmlhttp = new XMLHttpRequest();
            alert(str);
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText[0]==="1") {
                    alert("Slots are Empty. Cannot admit anymore");
                    location.reload();
                }else if(this.responseText[0]==="2"){
                    alert("Approved");
                    var kp = b+"2";
                    sendnofication(kp,k);
                    location.reload();
                }else if(this.responseText[0]==="3")
                {
                    alert("Rejected");
                    var kp = b+"3";
                    sendnofication(kp,k);
                    location.reload();
                }
                else {
                    alert("failed somewhere in first function only");
                    alert(this.responseText);
                }
                // alert(this.responseText);
            }
            };
            xmlhttp.open("GET","own_act.php?reqid="+str,true);
            xmlhttp.send();
        }
    }
</script>



<body style="background-color: black;">
    <?php
        include "nav.php";
        include "foter.php";
    ?>
</head>
<body>
        
        <!-- <h2>Animated Modal with Header and Footer</h2> -->
        
        <!-- Trigger/Open The Modal -->
        <!-- <button id="myBtn">Open Modal</button> -->
        
        <!-- The Modal -->
        <div id="myModal" class="modl">
        
          <!-- Modal content -->
          <div class="modal-cont">
            <div class="modal-head">
              <span id="clsp" style="display: block;margin-left: 99%;cursor:pointer;">&#10006;</span>
              <h2>Applicant Certificates</h2>
            </div>
            <div class="modal-bod" id="mbd">
              <p>Some text in the Modal Body</p>
              <p>Some other text...</p>
            </div>
            <div class="modal-foter">
              <h4>Please Verify these Documets when Applicant approaches your hostel</h4>
            </div>
          </div>
        
        </div>
        



    <!-- =============================================================================================================== -->

    <?php
    if(isset($_SESSION['user'])){
            include "add_db.php";
            $user = $_SESSION['user'];
            $query = "select ind,ntxt from notifications where name = '$user' and attempted=0";
            $result = mysqli_query($conn,$query);
            if ($result) {
                while ($row=mysqli_fetch_assoc($result)) {
                    echo '<div class="container" style="background-color: lightgreen;color: black;padding-bottom: 4px;font-weight: bold;">';
                    $k = $row['ind'];
                    echo $row['ntxt'].'<span style="float:right;cursor:pointer;" ><button value="'.$k.'" onclick="delnotf(this.value)">⛔</button> </span>';
                    echo "</div>";
                }
                // echo '<div style="clear:both;"></div>';
            } else {echo "failed";}

        }
    ?>

     <div class="container" style="background-color: darkgrey;">
    <?php
    if (isset($_SESSION['user'])) {
        
        



       
        echo '<table style="width: 100%;" >
            <tr class="bb">
                <th>Hostel Id</th>
                <th>Hostel Name</th>
                <th>Avilable Slots</th>
                <th colspan="2">Requests</th>
                <th colspan="2">Approved</th>
                <th colspan="2">Pending</th>
                <th colspan="2">Rejected</th>
            </tr>';
        $temp = $_SESSION['user'];

        $query = "select hname,id,slots from hostels where own_id='$temp';";
        $result = mysqli_query($conn,$query);

        if ($result) {
                while ($row= mysqli_fetch_assoc($result)) {
                    $a = $row['id'];
                    
                    $q2 = "select totreq,appreq,rejreq from reqcount where hid='$a'";
                    $r2 = mysqli_query($conn,$q2);
                    if ($r2 and (mysqli_num_rows($r2)!=0)) {
                        echo '<tr class="bb"><td>'.$a.'</td><td>'.$row['hname'].'</td>';
                        $rw2 = mysqli_fetch_assoc($r2);
                        echo  '<td>'.$row['slots'].'</td><td>'.$rw2['totreq'].'</td>';

                        $pend = $rw2['totreq'] - ($rw2['appreq'] + $rw2['rejreq']);
                    
                        echo '<td><span><button class="btn btn-primary btn-sm" onclick="gtstreq(this.value)" value="'.$a.'t">view</button></span></td>
                            <td>'.$rw2['appreq'].'</td>
                            <td><span><button class="btn btn-primary btn-sm" onclick="gtstreq(this.value)" value="'.$a.'a">view</button></span></td>
                            <td>'.$pend.'</td>
                            <td><span><button class="btn btn-primary btn-sm" value="'.$a.'p" onclick="gtstreq(this.value)">view</button></span></td>
                            <td>'.$rw2['rejreq'].'</td>
                            <td><span><button class="btn btn-primary btn-sm" value="'.$a.'r" onclick="gtstreq(this.value)">view</button></span></td>
                        </tr>';
                    } else if ($r2) {
                        echo '<tr class="bb"><td>'.$a.'</td><td>'.$row['hname'].'</td>';
                        echo  '<td>'.$row['slots'].'</td><td>0</td>';
                    
                        echo '<td><span><button class="btn btn-primary btn-sm" onclick="gtstreq(this.value)" value="'.$a.'t">view</button></span></td>
                            <td>0</td>
                            <td><span><button class="btn btn-primary btn-sm" onclick="gtstreq(this.value)" value="'.$a.'a">view</button></span></td>
                            <td>0</td>
                            <td><span><button class="btn btn-primary btn-sm" value="'.$a.'p" onclick="gtstreq(this.value)">view</button></span></td>
                            <td>0</td>
                            <td><span><button class="btn btn-primary btn-sm" value="'.$a.'r" onclick="gtstreq(this.value)">view</button></span></td>
                        </tr>';
                    }
                    else {echo "failed";}
                } 
            }
            echo "</table>";
            }
        else{
            echo "Login To view you Notifications";
        }
    ?>
        
        
    </div>
    <style>
        .bb {
            border-bottom: 1px solid black;
            width: 100%;;
        }
    </style>
    <div class="container" style="background-color: darkkhaki;" id="reqcont">

    </div>
    
</body>
<script>
       // Get the <span> element that closes the modal
    
    var span = document.getElementById("clsp");
    // When the user clicks the button, open the modal 
    function fn(str) {
      var modal = document.getElementById("myModal");
      modal.style.display = "block";
      var mbd = document.getElementById("mbd");
      alert(str);

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        mbd.innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","mdif.php?uname="+str,true);
    xmlhttp.send();
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        // alert("span clicked");
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
      }
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>