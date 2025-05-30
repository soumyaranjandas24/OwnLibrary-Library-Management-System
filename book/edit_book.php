<?php
    session_start();
    #fetch data from database
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"OwnLibrary");
    $book_name = "";
    $book_no = "";
    $author_id = "";
    $cat_id = "";
    $book_price = "";
    $query = "select * from books where book_no = $_GET[bn]";
    $query_run = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($query_run)){
        $book_name = $row['book_name'];
        $book_no = $row['book_no'];
        $author_id = $row['author_id'];
        $cat_id = $row['cat_id'];
        $book_price = $row['book_price'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../admin/admin_dashboard.php">OwnLibrary</a>
            </div>
            <font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
            <font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font>
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown">My Profile </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="">View Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../admin/change_password.php">Change Password</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
              </li>
            </ul>
        </div>
    </nav><br>
    <center><h4>Edit Book</h4><br></center>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="mobile">Book Number:</label>
                        <input type="text" name="book_no" value="<?php echo $book_no;?>" class="form-control" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="email">Book Name:</label>
                        <input type="text" name="book_name" value="<?php echo $book_name;?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Author ID:</label>
                        <input type="text" name="author_id" value="<?php echo $author_id;?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Category ID:</label>
                        <input type="text" name="cat_id" value="<?php echo $cat_id;?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Book Price:</label>
                        <input type="text" name="book_price" value="<?php echo $book_price;?>" class="form-control" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary my-2">Update Book</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
<?php
    if(isset($_POST['update'])){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"OwnLibrary");
        $query = "update books set book_name = '$_POST[book_name]',author_id = $_POST[author_id],cat_id = $_POST[cat_id],book_price = $_POST[book_price] where book_no = $_GET[bn]";
        $query_run = mysqli_query($connection,$query);
        header("location:manage_book.php");
    }
?>