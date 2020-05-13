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
        <h4>Add new borrow</h4>
        <form action="index.php?pages=borrow&actions=addBook" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>ID Student</label>
                <input type="number" class="form-control" name="idStudent"
                       value="<?php echo isset($_SESSION['idStudent']) ? $_SESSION['idStudent'] : '' ?>">
                <div class="col-md-9">
                    <?php
                    if (!isset($_SESSION['idStudent'])) {
                        echo 'CategoryID is already exist';
                    } else {
                        unset($_SESSION['idStudent']);
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label>Return Date</label>
                <input type="date" class="form-control" name="returnDate">
                <div class="col-md-9">
                    <?php
                    if (isset($_SESSION['returnDate'])) {
                        unset($_SESSION['returnDate']);
                    }
                    if (isset($_SESSION['differentDate'])) {
                        echo 'Return Date is invalid';
                        unset($_SESSION['differentDate']);
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label>Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="Slacking" checked>
                    <label class="form-check-label">
                        Slacking
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="Done">
                    <label class="form-check-label">
                        Done
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="Warning">
                    <label class="form-check-label">
                        Warning
                    </label>
                </div>
                <?php
                if (isset($_SESSION['status'])) {
                    unset($_SESSION['status']);
                }
                ?>
            </div>
            <div class="form-group">
                <label>Number of books</label>
                <input type="number" class="form-control" name="numberOfBooks"
                       value="<?php echo isset($_SESSION['numberOfBooks']) ? $_SESSION['numberOfBooks'] : '' ?>">
                <?php
                if (isset($_SESSION['numberOfBooks'])) {
                    unset($_SESSION['numberOfBooks']);
                }
                ?>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <span class="help-block">*Can't empty information</span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
    <?php include 'views/layout/footer.php'?>
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

