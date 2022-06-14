<div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle sign-up-btn">Sign up</a>
                    <div class="dropdown-menu action-form">
                        <form action="signup.php" method="post">
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
                                <input type="file" class="form-control" id="ucer1" name="bb" required="required">
                            </div>

                            <div class="form-group">
                                <label for="ucer2">Certificate 2</label>
                                <input type="file" class="form-control" id="ucer2" name="bb" required="required">
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