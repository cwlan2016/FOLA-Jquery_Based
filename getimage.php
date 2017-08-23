<?php 
include 'core.php';
if(isset($_GET['id']) && $_GET['id'] !== "") {
$idsplit = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM splitter WHERE id='$idsplit'");
$cek = mysqli_num_rows($query);
if ($cek == 0) {
	return false;
} else {
	$fetch = mysqli_fetch_assoc($query);
	if ($fetch['gambar'] == "" || $fetch['gambar'] == "default.jpg") {
		echo "<img src='image/default.jpg' width='100%'>";
	} else {	
	echo "<img src='image/".$fetch['gambar']."' width='100%'>";
	}
}
} else { ?>
salah
<?php } ?>