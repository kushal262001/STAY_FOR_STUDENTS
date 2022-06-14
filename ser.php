<?php
    include "add_db.php";
    //session_start();
?>
<style>
    .brd {
        border-bottom: 1px solid black;
    }
</style>

<script>
    function sentrq(str) {
        if(str===""){
            alert("empty request");
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // document.getElementById("testing").innerHTML = this.responseText;
                    alert(this.responseText);
                }
            };
            xmlhttp.open("GET","create_request.php?hid="+str,true);
            xmlhttp.send();
        }
    }

    function getTal(str) {
        if(str===""){
            return;
        }else{
                // alert(str);
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // alert(this.responseText);
                    document.getElementById("sst").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","gettal.php?hstdist="+str,true);
            xmlhttp.send();
        }
    }
    function getHs(str) {
        // alert(str);
        if(str===""){return;}
        else{
                // alert(str);
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // alert(this.responseText);
                    document.getElementById("hsrs").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","gethstls.php?hsttal="+str,true);
            xmlhttp.send();
        }
    }
    function getHspin(str) {
        // alert(str);
        if(str===""){return;}
        else{
                // alert(str);
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // alert(this.responseText);
                    document.getElementById("hsrs").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","gethstls.php?hstpin="+str,true);
            xmlhttp.send();
        }
    }
</script>

<!-- Modal Area Starts -->
<div id="myModal" class="modl">
        
    <!-- Modal content -->
    <div class="modal-cont">
      <div class="modal-head">
        <span id="cls" style="display: block;cursor: pointer;margin-left: 99%;" id="mspn">&#10006;</span>
        <h2>Hostel Insights</h2>
      </div>
      <div class="modal-bod" id="mbd">
        <p>Some text in the Modal Body</p>
        <p>Some other text...</p>
      </div>
      <div class="modal-foter">
        <h3>Images and information is verified. Feel free to apply if you want</h3>
      </div>
    </div>
  
  </div>
  

<!-- Modal Area Ends -->

<div class="container" style="background-color: tomato;" id="testing">
    <h1 style="text-align: center; margin-bottom: 0%;padding-bottom: 0%;font-family: 'Acme', sans-serif;font-size: 50px;">Search Your Destination Hostel</h1>
    <br>
    <h2 style="text-align: center;margin-top: 0%;padding-top: 0%;">Login to Apply for any Hostel in India</h2>
    <br>
    <div style="text-align: center;">
        <div style="text-align: center;">
            <button class="btn-primary" onclick="fna()">Search by City</button>
            <button class="btn-primary" style="margin-left: 20px;" onclick="fnb()">Search by Pin</button>
            <br>
            <div>
                <div style="visibility: visible;" id="fna">
                    <select onchange="getTal(this.value)"> 
                        <option selected>Open this select menu</option>
                        <?php
                            $query = "select distinct hstdist from hostels where approved=1";
                            $result = mysqli_query($conn,$query);
                            if($result){
                                while ($row=mysqli_fetch_assoc($result)) {
                                    echo '<option value="'.$row['hstdist'].'">'.$row['hstdist'].'</option>';
                                }
                            }else{
                                echo mysqli_error();
                            }
                        ?>
                    </select>
                    <br>
                    <select id="sst" onchange="getHs(this.value)">
                        <option selected>Open this select menu</option>
                    </select>
                </div>
                <div style="visibility: hidden;" id="fnb">
                    <select onchange="getHspin(this.value)">
                        <option selected>Open this select menu</option>
                        <?php
                        $query = "";
                            if (isset($_SESSION['gender'])) {
                                $gen = $_SESSION['gender'];
                                $query = "select distinct hstpin from hostels where tp='$gen' and approved=1;";
                            } else {
                                $query = "select distinct hstpin from hostels where approved=1;";                                
                            }
                            
                            $result = mysqli_query($conn,$query);
                            if ($result) {
                                while ($row= mysqli_fetch_assoc($result)) {
                                echo '<option value="'.$row['hstpin'].'">'.$row['hstpin'].'</option>';
                                }
                            }
                            else{
                                echo mysqli_error();
                            }
                        ?>
                </select>
                </div>
            </div>
            <div style="background-color: chartreuse;" id="hsrs">
                <style>
                    .sno,.typ,.bk,.slt{
                        width: 10%;
                        background-color: burlywood;
                    }
                    .det{
                        width: 50%;
                    }
                </style>
                
            </div>
            
        </div>
    </div>
    <h1><p>hellow world</p></h1>
    
    <script>
        function fna(){
            // alert("hello fna");
            document.getElementById("fnb").style.visibility = "hidden";
            document.getElementById("fna").style.visibility = "visible";
        }
        function fnb(){
            // alert("hello fnb");
            document.getElementById("fna").style.visibility = "hidden";
            document.getElementById("fnb").style.visibility = "visible";
        }
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementById("cls");
        
        // When the user clicks the button, open the modal 
        function fn(str) {
          modal.style.display = "block";
          span.style.display = "block";
          var mbd = document.getElementById("mbd");
          if (str==="") {return;}
          else{
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("mbd").innerHTML = this.responseText;
                    // alert(this.responseText);
                }
            };
            xmlhttp.open("GET","mdif.php?hid="+str,true);
            xmlhttp.send();
          }mbd.innerHTML = s;
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>
    
</div>