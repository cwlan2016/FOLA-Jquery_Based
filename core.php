<?php
ini_set('display_errors', '0');
session_start();
$connect = mysqli_connect("localhost","root","","datalintas") or die("500: Internal Server Error");
if(isset($_SESSION['username'])) {
$uname = $_SESSION['username'];
$query = mysqli_query($connect, "SELECT * FROM anggota WHERE username = '$uname'");
$data = mysqli_fetch_array($query);
if(mysqli_num_rows($query) == 0) {
session_destroy();
header("location: Auth/");
}
}
?>
