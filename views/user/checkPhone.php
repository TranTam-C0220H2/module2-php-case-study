<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Password Retrieval</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px">
                </div>
            </div>
            <div style="padding-top:30px" class="panel-body">
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form action="" method="post" class="form-horizontal" role="form">
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="username" value=""
                               placeholder="Email">
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="text" class="form-control" name="phoneNumber"
                               placeholder="Phone Number">
                    </div>
                    <!-- Button -->
                    <div style="margin-bottom: 25px" class="input-group">
                        <button type="submit" class="btn btn-primary">Password Retrieval</button>
                        <span>&nbsp;</span>
                        <a class="btn btn-primary" href="index.php?pages=user">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


