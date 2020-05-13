<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Library Manager</title>
</head>
<body>
<div class="card">
    <?php include 'views/layout/header.php' ?>
    <div class="card-body">
        <h3>Update category</h3>
        <form action="" method="post">
            <div class="form-group">
                <label>*Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo isset($name) ? $name : '' ?>">
            </div>
            <div class="col-sm-9 col-sm-offset-3">
            <?php
            if (isset($_SESSION['name'])) {
                echo 'Name already exist';
                unset($_SESSION['name']);
            }
            ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3">
                <span class="help-block">*Required fields</span>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-primary" href="index.php?pages=category">Cancel</a>
        </form>
    </div>
    <?php include 'views/layout/footer.php' ?>
</div>
<?php unset($_SESSION['idOfUpdate']) ?>
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


