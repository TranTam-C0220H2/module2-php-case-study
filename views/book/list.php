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
    <?php include 'views/layout/header.php'?>
    <div class="card-body">
        <form method="get" class="card card-sm">
            <input type="hidden" name="pages" value="book">
            <input type="hidden" name="actions" value="search">
            <div class="card-body row no-gutters align-items-center">
                <div class="col-auto">
                    <select id="inputState" name="choose" class="form-control form-control-lg form-control-borderless">
                        <option selected>Choose...</option>
                        <option>ID</option>
                        <option>Name</option>
                        <option>Author</option>
                        <option>Price</option>
                        <option>Category</option>
                        <option>Status</option>
                    </select>
                </div>
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" type="search"
                           placeholder="Search by choose" name="keyword">
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-lg btn-success" type="submit">Search</button>
                </div>
                <!--end of col-->
            </div>
        </form>
    </div>
    <div class="card-body"><a href="index.php?pages=book&actions=add">Add new book</a></div>
    <div class="card-body">
        <h5 class="card-title">Book List</h5>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($arrayBook as $item): ?>
                <tr>
                    <th scope="row"><?php echo $item->id ?></th>
                    <td><img height="140" width="100" src="images/<?php echo $item->image ?>"</td>
                    <td><?php echo $item->name ?></td>
                    <td><?php echo $item->author ?></td>
                    <td><?php echo $item->price ?></td>
                    <td><?php echo $item->nameCategory ?></td>
                    <td class="<?php echo $item->status == 'Exist' ? 'text-success' : 'text-danger' ?>"><?php echo $item->status ?></td>
                    <td><a href="index.php?pages=book&actions=update&id=<?php echo $item->id ?>">Update</a>|<a
                            onclick="return confirm('Delete?')"
                            href="index.php?pages=book&actions=delete.php?id=<?php echo $item->id ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
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
</div>
</body>
</html>
