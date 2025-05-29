<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "OwnLibrary");
if ($password == $_POST['password']) {
    $query = "update users set password = '$_POST[new_password]' where id = '$_SESSION[id]'";
    $query_run = mysqli_query($connection, $query);
?>
    <script type="text/javascript">
        alert("Updated successfully...");
        window.location.href = "user_dashboard.php";
    </script>
<?php
} else {
?>
    <script type="text/javascript">
        alert("Wrong User Password...");
        window.location.href = "change_password.php";
    </script>
<?php
}
?>