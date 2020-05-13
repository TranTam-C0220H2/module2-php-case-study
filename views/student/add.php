<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Add new book</title>
</head>
<body>
<div class="card">
    <?php include 'views/layout/header.php' ?>
    <div class="card-body">
        <h4>Add new student</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>*Image</label>
                <input type="file" class="form-control" name="image"
                       value="<?php echo isset($_SESSION['imageName']) ? $_SESSION['imageName'] : '' ?>">
                <div class="col-md-9">
                    <?php
                    if (isset($_SESSION['checkImage']) && $_SESSION['checkImage'] != 'Upload file thành công') {
                        echo $_SESSION['checkImage'];
                        unset($_SESSION['checkImage']);
                        unset($_SESSION['imageName']);
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label>*Name</label>
                <input type="text" class="form-control" name="name"
                       value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>">
                <?php
                if (isset($_SESSION['name'])) {
                    unset($_SESSION['name']);
                }
                ?>
            </div>
            <div class="form-group">
                <label>*Email</label>
                <input type="email" class="form-control" name="email"
                       value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>">
                <?php
                if (isset($_SESSION['email'])) {
                    unset($_SESSION['email']);
                }
                ?>
            </div>
            <div class="form-group">
                <label>*Phone</label>
                <input type="text" class="form-control" name="phone"
                       value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : '' ?>">
                <?php
                if (isset($_SESSION['phone'])) {
                    unset($_SESSION['phone']);
                }
                ?>
            </div>
            <div class="form-group">
                <label>Birth Day</label>
                <input type="date" class="form-control" name="birthDay"
                       value="<?php echo isset($_SESSION['birthDay']) ? $_SESSION['birthDay'] : '' ?>">
                <div class="col-md-9">
                    <?php
                    if (isset($_SESSION['birthDay'])) {
                        unset($_SESSION['birthDay']);
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address"
                       value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : '' ?>">
                <div class="col-md-9">
                    <?php
                    if (isset($_SESSION['address'])) {
                        unset($_SESSION['address']);
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label>*Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="Clean" checked>
                    <label class="form-check-label">
                        Clean
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="Borrow">
                    <label class="form-check-label">
                        Borrow
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="In Debt">
                    <label class="form-check-label">
                        In Debt
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>Note</label>
                <input type="text" class="form-control" name="note"
                       value="<?php echo isset($_SESSION['note']) ? $_SESSION['note'] : '' ?>">
                <div class="col-md-9">
                    <?php
                    if (isset($_SESSION['note'])) {
                        unset($_SESSION['note']);
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <span class="help-block">*Required fields</span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            <a class="btn btn-primary" href="index.php?pages=student">Cancel</a>
        </form>
    </div>
    <?php include 'views/layout/footer.php' ?>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>

