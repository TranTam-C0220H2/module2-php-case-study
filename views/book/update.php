<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">

    <title>Add new book</title>
</head>
<body>
<div class="card">
    <?php include 'views/layout/header.php'?>
    <h3>Update book</h3>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>*Name</label>
            <input type="text" class="form-control" name="name"
                   value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : $name ?>">
            <div class="col-md-9">
                <?php
                if (isset($_SESSION['name'])) {
                    unset($_SESSION['name']);
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <label>*Author</label>
            <input type="text" class="form-control" name="author"
                   value="<?php echo isset($_SESSION['author']) ? $_SESSION['author'] : $author ?>">
            <?php
            if (isset($_SESSION['author'])) {
                unset($_SESSION['author']);
            }
            ?>
        </div>
        <div class="form-group">
            <label>*Price</label>
            <input type="text" class="form-control" name="price"
                   value="<?php echo isset($_SESSION['price']) ? $_SESSION['price'] : $price ?>">
            <?php
            if (isset($_SESSION['price'])) {
                unset($_SESSION['price']);
            }
            ?>
        </div>
        <div class="form-group">
            <label>CategoryID</label>
            <input type="number" class="form-control" name="categoryId"
                   value="<?php echo isset($_SESSION['categoryId']) ? $_SESSION['categoryId'] : $categoryId ?>">
            <div class="col-md-9">
                <?php
                if (!isset($_SESSION['categoryId'])) {
                    echo 'CategoryID is already exist or empty';
                } else {
                    unset($_SESSION['categoryId']);
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <label>*Image</label>
            <input type="file" class="form-control" name="image">
            <div class="col-md-9">
                <?php
                if (isset($_SESSION['checkImage']) && isset($_SESSION['imageName']) && isset($_SESSION['imageById']) && $_SESSION['checkImage'] != "Lỗi: Image is empty" && ($_SESSION['checkImage'] != 'Upload file thành công' && ($_SESSION['checkImage'] != 'Lỗi : File đã tồn tại.' || $_SESSION['imageName'] != $_SESSION['imageById']))) {
                    echo $_SESSION['checkImage'];
                    unset($_SESSION['checkImage']);
                    unset($_SESSION['imageName']);
                } else
                ?>
            </div>
        </div>
        <div class="form-group">
            <label>Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="Exist" checked>
                <label class="form-check-label">
                    Exist
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="Empty">
                <label class="form-check-label">
                    Empty
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <span class="help-block">*Required fields</span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php include 'views/layout/footer.php'?>
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

