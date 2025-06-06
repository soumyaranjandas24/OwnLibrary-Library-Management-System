<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>OwnLibrary</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
      <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
      <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script> -->
</head>
<style type="text/css">
    #main_content {
        background: rgba(245, 245, 245, 0.7);
        padding: 50px;
        color: black;
        font-weight: 900;
    }

    #side_bar {
        background: rgba(245, 245, 245, 0.0);
        padding: 50px;
        color: white;
    }

    body {
        background: rgba(245, 245, 245, 0.0);
        background-image: url("https://img.freepik.com/free-photo/abundant-collection-antique-books-wooden-shelves-generated-by-ai_188544-29660.jpg?size=626&amp;ext=jpg&amp;ga=GA1.1.1546980028.1704240000&amp;semt=sph");
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">OwnLibrary</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">User Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/admin_login.php">Admin Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php"></span>Signup</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-5" id="side_bar">
            <h2>Today's Quote</h2>
            <h5>“There is more treasure in books than in all the pirate's loot on Treasure Island"</h5>
            <p>~ Walt Disney</p>
            <h2>Library Timing</h2>
            <ul>
                <li>Opening: 9:00 AM</li>
                <li>Closing: 12:00 PM</li>
            </ul>
            <h2>What We provide ?</h2>
            <ul>
                <li>AC Rooms</li>
                <li>Free Wi-fi</li>
                <li>Learning Environment</li>
                <li>Discussion Room</li>
                <li>Free Electricity</li>
            </ul>
        </div>
        <div class="col-md-6 my-4 mx-2 rounded-4" id="main_content">
            <center>
                <h3>User Login Form</h3>
            </center>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email ID:</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary my-2">Login</button> |
                <a href="signup.php"> Signup now !!</a>
            </form>
            <?php
            if (isset($_POST['login'])) {
                $connection = mysqli_connect("localhost", "root", "");
                $db = mysqli_select_db($connection, "OwnLibrary");
                $query = "select * from users where email = '$_POST[email]'";
                $query_run = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                    if ($row['email'] == $_POST['email']) {
                        if ($row['password'] == $_POST['password']) {
                            $_SESSION['name'] =  $row['name'];
                            $_SESSION['email'] =  $row['email'];
                            $_SESSION['id'] =  $row['id'];
                            header("Location: user_dashboard.php");
                        } else {
            ?>
                            <br><br>
                            <center><span class="alert-danger">Wrong Password !!</span></center>
            <?php
                        }
                    }
                }
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>