<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Issue Book</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
      <script type="text/javascript">
          function alertMsg(){
              alert("Book added successfully...");
              window.location.href = "../admin/admin_dashboard.php";
          }
      </script>
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
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
        <div class="container-fluid">
            
            <ul class="nav navbar-nav navbar-center">
              <li class="nav-item">
                <a class="nav-link" href="../admin/admin_dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown">Books </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../book/add_book.php">Add New Book</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../book/manage_book.php">Manage Books</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown">Category </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../book_catagory/add_cat.php">Add New Category</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../book_catagory/manage_cat.php">Manage Category</a>
                </div>
              </li>
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown">Authors</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="add_author.php">Add New Author</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="manage_author.php">Manage Author</a>
                </div>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="issue_book.php">Issue Book</a>
              </li>
            </ul>
        </div>
    </nav><br>
    <center><h4>Issue Book</h4><br></center>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="book_name">Book Name:</label>
                        <input type="text" name="book_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="book_author">Author ID:</label>
                        <select class="form-control" name="book_author">
                            <option>-Select author-</option>
                            <?php  
                                $connection = mysqli_connect("localhost","root","");
                                $db = mysqli_select_db($connection,"OwnLibrary");
                                $query = "select author_name from authors";
                                $query_run = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($query_run)){
                                    ?>
                                    <option><?php echo $row['author_name'];?></option>
                                    <?php
                                }
                            ?>
                        </select>
                        <!--<input type="text" name="book_author" class="form-control" required> -->
                    </div>
                    <div class="form-group">
                        <label for="book_no">Book Number:</label>
                        <input type="text" name="book_no" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="student_id">Student ID:</label>
                        <input type="text" name="student_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="issue_date">Issue Date:</label>
                        <input type="text" name="issue_date" class="form-control" value="<?php echo date("yy-m-d");?>" required>
                    </div>
                    <button type="submit" name="issue_book" class="btn btn-primary my-2">Issue Book</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>

<?php
    if(isset($_POST['issue_book']))
    {
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"OwnLibrary");
        $query = "insert into issued_books values(null,$_POST[book_no],'$_POST[book_name]','$_POST[book_author]',$_POST[student_id],1,'$_POST[issue_date]')";
        $query_run = mysqli_query($connection,$query);
        #header("Location:admin_dashboard.php");
    }
?>