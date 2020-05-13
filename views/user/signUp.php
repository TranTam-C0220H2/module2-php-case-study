<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Registration</title>
</head>
<body>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Sign Up</div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="../../index.php">Sign In</a></div>
        </div>
        <div class="panel-body" >
            <form action="" method="post" class="form-horizontal" role="form">
                <div style="display:none" class="alert alert-danger">
                    <p>Error:</p>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">*Email</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo isset($_SESSION['email'])?$_SESSION['email']:''; ?>">
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <?php
                        if (!isset($_SESSION['email'])) {
                            echo '*Email is "xxx@xxx.xxx"';
                        } else {
                            if ($_SESSION['email'] == '') {
                                echo '*Email already exist';
                            }
                            unset($_SESSION['email']);
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-md-3 control-label">*Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo isset($_SESSION['name'])?$_SESSION['name']:''; ?>">
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <?php
                        if (!isset($_SESSION['name'])) {
                            echo '*FirstName is "Xxx"';
                        } else {
                            unset($_SESSION['name']);
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">*Password</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo isset($_SESSION['password'])?$_SESSION['password']:''; ?>">
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <?php
                        if (!isset($_SESSION['password'])) {
                            echo '*Password has 8 character and over (at least 1 uppercase, 1 number and 1 special character "!@#$&*")';
                        }  else {
                            unset($_SESSION['password']);
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">*Confirm Password</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" value="<?php echo isset($_SESSION['confirmPassword'])?$_SESSION['confirmPassword']:''; ?>">
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <?php
                        if (!isset($_SESSION['confirmPassword'])) {
                            echo '*ConfirmPassword have to be like Password';
                        }  else {
                            unset($_SESSION['confirmPassword']);
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-md-3 control-label">*Phone Number</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number" value="<?php echo isset($_SESSION['phoneNumber'])?$_SESSION['phoneNumber']:''; ?>">
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <?php
                        if (!isset($_SESSION['phoneNumber'])) {
                            echo '*Phone number is 1 of 3 company "Viettel", "Mobi", "Vina"';
                        } else {
                            unset($_SESSION['phoneNumber']);
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="icode" class="col-md-3 control-label">*Code</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="code" placeholder="" value="<?php echo isset($_SESSION['code'])?$_SESSION['code']:''; ?>">
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <?php
                        if (isset($_SESSION['code'])&&$_SESSION['code'] == false) {
                            echo '*Code is invalid!';
                            unset($_SESSION['code']);
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="help-block">*Required fields</span>
                        <span class="help-block">Your Information won't be disclosed anywhere </span>
                    </div>
                </div>
                <div class="form-group">
                    <!-- Button -->
                    <div class="col-md-offset-3 col-md-9">
                        <input id="btn-signup" type="submit" class="btn btn-info" value="Sign Up">
                        <a class="btn btn-info" href="index.php?pages=user">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

