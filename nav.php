<style>
    .cnt {
        text-align: center;
    }
</style>

<?php
include "add_db.php";
session_start();
if (isset($_SESSION['user'])) 
{
    echo '<!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">History</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="nv-modal">
            <table style="width:100%">
                <tr style="background-color: #86ff40;border-bottom: 1px solid black;">
                    <th class="cnt">Sr. No.</th>
                    <th class="cnt">Req. Id.</th>
                    <th class="cnt">Hostel Name</th>
                    <th class="cnt">Approved</th>
                </tr>';
            $k = $_SESSION['user'];
            $query = "select reqid,hid,approved from requests where userid = '$k'";
            $result = mysqli_query($conn,$query);
            if ($result) {
                $ind = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr style="background-color: #86ff40;border-bottom: 1px solid black;">';
                    $kp = $row['reqid'];
                    echo '<td class="cnt">'.$ind.'</td>';
                    echo '<td class="cnt">'.$kp.'</td>';
                    
                    $kp = $row['hid'];
                    $q2 = "select hname from hostels where id='$kp'";
                    $r2 = mysqli_query($conn,$q2);
                    $rw2 = mysqli_fetch_assoc($r2);
                    $kp = $rw2['hname'];
                    echo '<td class="cnt">'.$kp.'</td>';
                    $kp = $row['approved'];
                    echo '<td class="cnt">'.$kp.'</td>';
                    echo "</tr>";
                    $ind = $ind + 1;
                }
            }
            else { echo "failed"; }
            
            echo '</table>
          </div>
          
        </div>
      </div>
    </div>';
}
// else
// {
//     echo "hey dear";
// }
?>
<style>
              
        body {
            font-family: 'Varela Round', sans-serif;
        }
        .form-control {
            box-shadow: none;		
            font-weight: normal;
            font-size: 13px;
        }
        .navbar {
            background: #fff;
            padding-left: 16px;
            padding-right: 16px;
            border-bottom: 1px solid #dfe3e8;
            border-radius: 0;
        }
        .nav-link img {
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin: -8px 0;
            float: left;
            margin-right: 10px;
        }
        .navbar .navbar-brand {
            padding-left: 0;
            font-size: 20px;
            padding-right: 50px;
        }
        .navbar .navbar-brand b {
            color: #33cabb;		
        }
        .navbar .form-inline {
            display: inline-block;
        }
        .navbar a {
            color: #888;
            font-size: 15px;
        }
        .search-box {
            position: relative;
        }	
        .search-box input {
            padding-right: 35px;
            border-color: #dfe3e8;
            border-radius: 4px !important;
            box-shadow: none
        }
        .search-box .input-group-text {
            min-width: 35px;
            border: none;
            background: transparent;
            position: absolute;
            right: 0;
            z-index: 9;
            padding: 7px;
            height: 100%;
        }
        .search-box i {
            color: #a0a5b1;
            font-size: 19px;
        }
        .navbar .sign-up-btn {
            min-width: 110px;
            max-height: 36px;
        }
        .navbar .dropdown-menu {
            color: #999;
            font-weight: normal;
            border-radius: 1px;
            border-color: #e5e5e5;
            box-shadow: 0 2px 8px rgba(0,0,0,.05);
        }
        .navbar a, .navbar a:active {
            color: #888;
            padding: 8px 20px;
            background: transparent;
            line-height: normal;
        }
        .navbar .navbar-form {
            border: none;
        }
        .navbar .action-form {
            width: 280px;
            padding: 20px;
            left: auto;
            right: 0;
            font-size: 14px;
        }
        .navbar .action-form a {		
            color: #33cabb;
            padding: 0 !important;
            font-size: 14px;
        }
        .navbar .action-form .hint-text {
            text-align: center;
            margin-bottom: 15px;
            font-size: 13px;
        }
        .navbar .btn-primary, .navbar .btn-primary:active {
            color: #fff;
            background: #33cabb !important;
            border: none;
        }	
        .navbar .btn-primary:hover, .navbar .btn-primary:focus {		
            color: #fff;
            background: #31bfb1 !important;
        }
        .navbar .social-btn .btn, .navbar .social-btn .btn:hover {
            color: #fff;
            margin: 0;
            padding: 0 !important;
            font-size: 13px;
            border: none;
            transition: all 0.4s;
            text-align: center;
            line-height: 34px;
            width: 47%;
            text-decoration: none;
        }
        .navbar .social-btn .facebook-btn {
            background: #507cc0;
        }
        .navbar .social-btn .facebook-btn:hover {
            background: #4676bd;
        }
        .navbar .social-btn .twitter-btn {
            background: #64ccf1;
        }
        .navbar .social-btn .twitter-btn:hover {
            background: #4ec7ef;
        }
        .navbar .social-btn .btn i {
            margin-right: 5px;
            font-size: 16px;
            position: relative;
            top: 2px;
        }
        .or-seperator {
            margin-top: 32px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
        }
        .or-seperator b {
            color: #666;
            padding: 0 8px;
            width: 30px;
            height: 30px;
            font-size: 13px;
            text-align: center;
            line-height: 26px;
            background: #fff;
            display: inline-block;
            border: 1px solid #e0e0e0;
            border-radius: 50%;
            position: relative;
            top: -15px;
            z-index: 1;
        }
        .navbar .action-buttons .dropdown-toggle::after {
            display: none;
        }
        .form-check-label input {
            position: relative;
            top: 1px;
        }
        @media (min-width: 1200px){
            .form-inline .input-group {
                width: 300px;
                margin-left: 30px;
            }
           
        }
        @media (max-width: 768px){
            .navbar .dropdown-menu.action-form {
                width: 100%;
                padding: 10px 15px;
                background: transparent;
                border: none;
            }
            .navbar .form-inline {
                display: block;
            }
            .navbar .input-group {
                width: 100%;
            }
        }
        .container
        {
            margin-top: 1%;
            margin-left: 0.3%;
        }
        
        </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand">My<b>Hostel</b></a>  		
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav">
                <!-- <a href="../index.php" class="nav-item nav-link active">Home</a> -->
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="upld.php" class="nav-item nav-link active">Upload Your Hostel</a>
                <a href="notifications.php" class="nav-item nav-link active" target="_self">Notifications</a>			
                			
                <a href="admin.php" class="nav-item nav-link active">Admin</a>
                <a href="#" class="nav-item nav-link active">Contact</a>
                <a href="#" class="nav-item nav-link active">About Us</a>
            </div>
            
        <?php 
        $htcont = '<div class="navbar-nav ml-auto action-buttons" >';
        if(isset($_SESSION['user']))
        {
            $htcont = $htcont.'
            <div class="nav-item dropdown" style="margin-right:2%">
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hello '.$_SESSION['user'].'
                    </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Account</a>
                            <a type="button" class="dropdown-item btn" data-toggle="modal" data-target="#exampleModalCenter">My Applications</a>
                            <!-- <a class="dropdown-item" href="#">Change Password</a> -->
                        </div>
                </div>

            </div>

            <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Logout</button>
            
            <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header"><h4>Logout <i class="fa fa-lock"></i></h4></div>
                  <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
                  <div class="modal-footer"><a href="logout.php" class="btn btn-primary btn-block">Logout</a></div>
                </div>
              </div>
            </div>';
        }
        else
        {
            $htcont = $htcont.'<div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle mr-4" style="color:white;">Login</a>
                    <div class="dropdown-menu action-form">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <input type="text" name="uname" class="form-control" placeholder="Username" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" name="pwd" class="form-control" placeholder="Password" required="required">
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="Login">
                        </form>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle sign-up-btn">Sign up</a>
                    <div class="dropdown-menu action-form">
                        <form action="signup.php" method="post" enctype="multipart/form-data">
                            <p class="hint-text">Fill in this form to create your account!</p>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="uname" required="required">
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Phone Number" name="uphone" required="required">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email Id" name="umail" required="required">
                            </div>

                            <div class="form-group">
                                <label for="ug">Your Gender</label>
                                <input type="radio" id="ugb" name="ug" value="B">
                                <label for="ugb">B</label>
                                <input type="radio" id="ugg" name="ug" value="G">
                                <label for="ugg">G</label>                                
                            </div>

                            <div class="form-group">
                                <label for="ucer1">Certificate 1</label>
                                <input type="file" class="form-control" id="ucer1" name="ucer1" required="required">                                
                            </div>

                            <div class="form-group">
                                <label for="ucer2">Certificate 2</label>
                                <input type="file" class="form-control" id="ucer2" name="ucer2" required="required">
                            </div>
                            

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Address" name="uaddress" required="required">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="pwd" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="cpwd" required="required">
                            </div>
                            <div class="form-group">
                                <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms &amp; Conditions</a></label>
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="Sign up">
                        </form>
                    </div>
                </div>';
        }
         $htcont = $htcont."</div>"; 
         echo $htcont;  
        ?>
                
       
                
            
        </div>
    </nav>
    