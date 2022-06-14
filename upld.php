<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Hostel : Upload</title>
    <link rel="icon" href="Icons/fav.png" type="image/png" sizes="16x16">
</head>
<body style="background-color: black;">
    <script>
        function incr(str) {
            if(str===""){
                return;
            }
            var a = prompt("Enter No. of empty slots","10");
            if(a!==null){
                a = parseInt(a);
                if(isNaN(a)) {return;}
                else {
                    
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                    }
                    };
                    xmlhttp.open("GET","inc_slots.php?id="+str+"&inc="+a,true);
                    xmlhttp.send();
                }
            }
        }
    </script>
    <?php
        include "nav.php";
        include "add_db.php";
    ?>
    <style>
        .srnup {
            width: 15%;
            background-color: darkorange;
        }

        .ownup {
            width: 55%;
            background-color: darkseagreen;
        }
        .totup {
            width: 15%;
            background-color: fuchsia;
        }
        .inc {
            width: 15%;
            background-color: darkorange;
        }
        .srnup,.ownup,.totup {
            text-align: center;
            border: 1px solid black;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
    <div class="container-fluid" style="width: 100%;">
        <div style="width: 65%;background-color: chartreuse;float:left;">
            <div style="margin-left: 10%; margin-right: 10%;margin-top: 15px;margin-bottom: 50px;width: 80%;border: 2px;
            border-radius: 5px;">
                <form action="add_hos.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="hname" class="form-label">Hostel Name</label>
                            <input type="text" class="form-control" id="hname" name="hname" required>
                    </div>
                    <div class="mb-3">
                        <label for="oname" class="form-label">Hostel Owner Name</label>
                            <input type="text" class="form-control" id="oname" name="oname" required>
                    </div>
                    <div class="mb-3">
                        <label for="hphone" class="form-label">Hostel Official Phone </label>
                            <input type="number" class="form-control" id="hphone" name="hphone" required>
                        <label for="hmail" class="form-label">Hostel Official Mail Id</label>
                            <input type="email" class="form-control" id="hmail" name="hmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="hdristict" class="form-label">Hostel District</label>
                            <input type="text" id="hdristict" name="hdristict" required>
                        <label for="htaluka" class="form-label">Hostel Taluka</label>
                            <input type="text" id="htaluka" name="htaluka" required>
                    </div>
                    <div class="mb-3">
                        <label for="hadd" class="form-label">Hostel Address</label>
                        <input type="text" class="form-control" id="hadd" name="hadd" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="hpin">Hostel Pin</label>
                        <input type="number" name="hpin" id="hpin" required>
                        <label class="form-label" for="avs">Avilable Slots</label>
                        <input type="number" name="avs" id="avs" required>
                    </div>

                    <div class="mb-3">
                        <label for="rent" class="form-label">Hostel Rent</label>
                        <input type="number" name="rent" id="rent" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hostel Type</label><br>
                        <input type="radio" id="uphtypeB" name="ht" value="B" required>
                        <label for="uphtypeB">B</label>
                        <input type="radio" id="uphtypeG" name="ht" value="G"  required>
                        <label for="uphtypeG">G</label>
                    </div>
                    
                    <div class="mb-3" style="clear: both;">
                        <label class="form-label">Upload 3 Photos of your Hostel</label><br>
                        <input type="file" name="upf1" required>
                        <input type="file" name="upf2" required> 
                        <input type="file" name="upf3" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="upchk" required>
                        <label class="form-check-label" for="upchk">By checking this I agree with Terms and Conditions of BookMyHostel</label>
                    </div>
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> 
                </form>
            </div>
        </div>
        <div style="float: left;background-color: cyan;width: 35%;">
            <?php
                if(isset($_SESSION['user']))
                {
                    $temp = $_SESSION['user'];
                    $query = "select hname,approved,id from hostels where own_id='$temp';";
                    echo '<div style="text-align: center;"><b>Your Hostels</b></div>
                    <table style="width: 100%;">
                        <tr>
                            <th class="srnup">ID</th>
                            <th class="ownup">Name</th>
                            <th class="totup">Ver Stat</th>
                            <th class="inc">Inc</th>
                        </tr>';
                    $result = mysqli_query($conn,$query);
                    if ($result) {
                        while ($row= mysqli_fetch_assoc($result)) {
                            echo '<tr>
                            <td class="srnup">'.$row['id'].'</td>
                            <td class="ownup">'.$row['hname'].'</td>
                            <td class="totup">'.$row['approved'].'</td>
                            <td class="totup"><button class="btn btn-primary btn-sm" value="'.$row['id'].'" onclick="incr(this.value)">increment seats</button></td>
                        </tr>';
                        }
                    }else{ 
                        echo mysqli_error();
                    }
                    echo '</table>';
                }   
            ?>    
        </div>
    </div>

    <?php
        include "foter.php";
    ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>

