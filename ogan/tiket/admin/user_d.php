<?php 
include("koneksi.php");

if(isset($_GET['id_user'])){
$id_user = $_GET['id_user'];

$query ="DELETE  FROM user WHERE id_user = $id_user";
$hasil =mysqli_query($conn,$query);

if ($hasil) {
	# code...
 echo "BErhasil";
 header('location: user.php');
}else{
	echo "<script>alert('Hapus Reservasi Terlebih Dahulu');history.go(-1);</script>"; 	
}

}else{
	echo "<script>alert('Hapus Reservasi Terlebih Dahulu');history.go(-1);</script>";
}
 ?>
