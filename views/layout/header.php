<div class="card-header">
    <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
            <a class="nav-link <?php echo (isset($_REQUEST['pages']) && $_REQUEST['pages'] == 'home') ? 'active' : '' ?>"
               href="index.php?pages=home">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo isset($_REQUEST['pages']) && $_REQUEST['pages'] == 'category' ? 'active' : '' ?>"
               href="index.php?pages=category">Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo isset($_REQUEST['pages']) && $_REQUEST['pages'] == 'book' ? 'active' : '' ?>"
               href="index.php?pages=book">Books</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo isset($_REQUEST['pages']) && $_REQUEST['pages'] == 'student' ? 'active' : '' ?>"
               href="index.php?pages=student">Students</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo isset($_REQUEST['pages']) && $_REQUEST['pages'] == 'borrow' ? 'active' : '' ?>"
               href="index.php?pages=borrow">Borrows</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?pages=user&actions=logout">Logout</a>
        </li>
    </ul>
</div>