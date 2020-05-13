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
        <h4>Book List Search</h4>
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
            <?php foreach ($arraySearch as $item): ?>
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
                            href="index.php?pages=book&actions=delete&id=<?php echo $item->id ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <h6><?php echo count($arraySearch) == 0 ? '*No result search' : '*' . count($arraySearch) . ' result is found' ?></h6>
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
