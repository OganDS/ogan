<?php 
include("koneksi.php");

if(isset($_GET['id_reserv'])){
$id_reserv = $_GET['id_reserv'];

$query ="DELETE  FROM reserv WHERE id_reserv = $id_reserv";
$hasil =mysqli_query($conn,$query);

if ($hasil) {
	# code...
 echo "Berhasil";
 header('location: reserv.php');
}else{
	die("akses dilarang"); 	
}

}else{
	die("akses dilarang");
}
 ?>
