
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Add new borrow</title>
</head>
<body>
<div class="card">
    <?php include 'views/layout/header.php'?>
    <div class="card-body">
        <h4>Add Id Book</h4>
        <form action="index.php?pages=borrow&actions=addBook&numberOfBooks=<?php echo isset($_SESSION['numberOfBooks']) ? $_SESSION['numberOfBooks'] : ''; ?> "
              method="post" enctype="multipart/form-data">
            <?php for ($i = 1; $i <= (isset($_SESSION['numberOfBooks']) ? $_SESSION['numberOfBooks'] : 0); $i++): ?>
                <div class="form-group">
                    <label>Book Id <?php echo $i ?></label>
                    <input type="number" class="form-control" name="bookId<?php echo $i ?>"
                           value="<?php echo isset($_SESSION["bookId'$i'"]) ? $_SESSION["bookId'$i'"] : '' ?>">
                    <?php
                    if (isset($_SESSION["bookId'$i'"])) {
                        unset($_SESSION["bookId'$i'"]);
                    }
                    ?>
                </div>
            <?php endfor; ?>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <span class="help-block">*Book exist obligatory</span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
<?php include 'views/layout/footer.php'?>
<?php unset($_SESSION['numberOfBooks'])?>
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

