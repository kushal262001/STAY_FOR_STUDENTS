<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Hostel | Admin</title>
    <link rel="icon" href="Icons/fav.png" type="image/png" sizes="16x16">
</head>
<script>
    function t(str) {
        if (str == "") {
        return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // document.getElementById("txtHint").innerHTML = this.responseText;
                alert(this.responseText);
                alert("at least");
            }
            };
            xmlhttp.open("GET","adminapar.php?hid="+str,true);
            xmlhttp.send();
        }
    }
</script>
<body >
    <!-- Modal area starta -->

        <div id="myModal" class="modl" style="display: none;">
        
          <!-- Modal content -->
          <div class="modal-cont">
                <div class="modal-head">
                    <span id="clsp" style="display: block;margin-left: 99%;cursor:pointer;">&#10006;</span>
                    <h2>Hostel Images</h2>
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

    <!-- Modal area ends -->
    <?php
        include "nav.php";
        include "foter.php";
        include "add_db.php";
    ?>
    <style>
        .asrn,.ahid,.aapr,.arej {
            width: 10%;
            background-color: darkgoldenrod;
        }
        .adet {
            width: 60%;
            background-color: darkkhaki;
        }
        .aapr , .arej {
            text-align: center;
        }
        .bbr {
            border-bottom: 1px solid black;
        }
        .bapr , .brej {
            background-color: lightblue;
        }
    </style>
    <!-- This table will appear only when login type is of Admin -->

    <?php
    if (isset($_SESSION['user']) and (isset($_SESSION['admin']))) {
        echo '<div class="conatainer">
        <table style="width: 100%;">
            <tr class="bbr">
                <th class="asrn">Sr. No.</th>
                <th class="ahid">Hostel Id</th>
                <th class="adet">Details</th>
                <th class="aapr">Approve</th>
                <th class="arej">Reject</th>
            </tr>';

        $query = 'select id,own_name,own_mail,own_phone,own_id,tp,hstaddress,hsttal,hstdist,hstpin,slots,hname from hostels where (adminvisited=0)';
        $k = 1;
        $result = mysqli_query($conn,$query);
        if($result)
        {
            if(mysqli_num_rows($result)>=1)
            {
               while ($row= mysqli_fetch_assoc($result)) {
                   echo '<tr class="bbr" id=b'.$row['id'].' >
                   <td class="asrn">'.$k.'</td>
                   <td class="ahid">'.$row['id'].'</td>
                   <td class="adet">
                       Name : '.$row['hname'].' Hostel Type : '.$row['tp'].'<br>
                       Capacity : '.$row['slots'].' <br>
                       Owner Name : '.$row['own_id'].'<br>
                       Address : '.$row['hstaddress'].' <br>
                       Taluka : '.$row['hsttal'].' District : '.$row['hstdist'].' Pin : '.$row['hstpin'].' <br>
                       Email : '.$row['own_mail'].' <br>
                       Phone : '.$row['own_phone'].' <br>
                       <button class="btn btn-sm btn-primary" value="'.$row['id'].'" onclick="fn(this.value)">View Gallery</button> <br>
                   </td>
                   <td class="aapr"><button class="btn btn-sm bapr" value="'.$row['id'].'a" onclick="t(this.value)">Approve</button></td>
                   <td class="arej"><button class="btn btn-sm brej" value="'.$row['id'].'r" onclick="t(this.value)">Reject</button></td>
               </tr>';
               $k = $k + 1;
               }
            }
            else
            {
                $msg = "No Hostels adminvisied";
                echo '<script language="javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location="index.php";';
                echo '</script>';
            }
        }

        echo '</table>
        </div><div><h1>Hellow</h1></div> ';
    }else {
        $msg = "You are not Admin.";
        echo '<script language="javascript">';
        echo 'alert("'.$msg.'");';
        echo 'window.location="index.php";';
        echo '</script>';
    }
        
    ?>
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
    xmlhttp.open("GET","mdif.php?hid="+str,true);
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