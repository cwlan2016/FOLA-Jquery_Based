<?php
session_start();
$connect = mysqli_connect("localhost","root","","datalintas") or die("500: Internal Server Error");
if ($connect->connect_errno) {
    echo "Failed to connect to MySQL: (" . $connect->connect_errno . ") " . $connect->connect_error;
}
if($_SERVER['REQUEST_METHOD'] == "POST") {

$username = str_replace("'","",$_POST['username']);
$password = str_replace("'","",$_POST['password']);
$search = mysqli_query($connect, "SELECT * FROM anggota WHERE username = '$username' AND password = '$password'");
if(mysqli_num_rows($search) == 1) {
echo "success";
$_SESSION['username'] = $username;
} else {
echo "failed";
}
} else { ?>
what r u luking for ?
<?php } ?>
