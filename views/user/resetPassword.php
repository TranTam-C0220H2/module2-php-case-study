<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Reset Password</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px">
                </div>
            </div>
            <div style="padding-top:30px" class="panel-body">
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form action="" method="post" class="form-horizontal" role="form">
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" name="password" value=""
                               placeholder="Password">
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" name="confirmPassword"
                               placeholder="Confirm Password">
                    </div>
                    <div class="col-md-9">
                        <?php
                        if (isset($_SESSION['checkPassword'])) {
                            echo '*Password has 8 character and over (at least 1 uppercase, 1 number and 1 special character "!@#$&*")';
                            unset($_SESSION['checkPassword']);
                        }
                        if (isset($_SESSION['checkConfirmPassword'])) {
                            echo '*ConfirmPassword have to be like Password';
                            unset($_SESSION['checkConfirmPassword']);
                        }
                        ?>
                    </div>
                    <!-- Button -->
                    <div style="margin-bottom: 25px" class="input-group">
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


