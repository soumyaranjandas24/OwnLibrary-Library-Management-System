<?php
session_start();
#fetch data from database
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "OwnLibrary");
$name = "";
$email = "";
$password = "";
$mobile = "";
$address = "";
$query = "select * from users";
?>
<!DOCTYPE html>
<html>

<head>
    <title>All Reg Users</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="admin_dashboard.php">OwnLibrary</a>
            </div>
            <font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
            <font style="color: white"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></font>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"type="button" data-bs-toggle="dropdown">My Profile </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">View Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="change_password.php">Change Password</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav><br>
    <span>
        <marquee>This is library mangement system. Library opens at 8:00 AM and close at 8:00 PM</marquee>
    </span><br><br>
    <center>
        <h4>Registered Users Detail</h4><br>
    </center>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-8">
            <form>
                <table class="table-bordered" width="900px" style="text-align: center">
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>

                    <?php
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        $name = $row['name'];
                        $email = $row['email'];
                        $mobile = $row['mobile'];
                        $address = $row['address'];
                    ?>
                        <tr>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $mobile; ?></td>
                            <td><?php echo $address; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>