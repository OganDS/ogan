<?php
include "koneksi.php";

$res_code = $_POST['res_code'];
$res_at = $_POST['res_a'];
$res_date = $_POST['res_d'];
$seat = $_POST['seat'];
$depart = $_POST['depart'];
$price = $_POST['price'];
$id_user = $_POST['id_user'];
$id_customer = $_POST['id_customer'];
$id_rute = $_POST['id_rute'];
$status = $_POST['status'];

    //untuk bukti pembayaran
    $rand = rand();
    $ekstensi = array ('png','jpg','jpeg','gif');
	$filename    = $_FILES['pay']['name'];
	$ukuran     = $_FILES['pay']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$ekstensi)){
        header("location:booking.php?alert=gagal_ekstensi");
    }else{
        if($ukuran <109080){
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['pay']['tmp_name'], '../image/'.$rand.'_'.$filename);
            mysqli_query($conn, "INSERT INTO reserv VALUES(NULL,'$res_code', '$res_at', '$res_date', '$seat','$depart', '$price', '$id_user','$id_customer', '$id_rute', '$status', '$xx')");
            header("location:keranjang.php?alert=berhasil");
        }else{
            header("location:keranjang.php?alert=gagal_ukuran");
        }
    }

// if (move_uploaded_file($tmp, $path)) {
//     echo "Foto Berhasil di uploadd";
	
// }

// $sql = mysqli_query($conn, 'INSERT INTO reserv (reserv_code, reserv_at, reserv_date, seat, depart, price, id_user, id_customer, id_rute, status, pay) VALUES ("'.$res_code.'", "'.$res_at.'", "'.$res_date.'", "'.$seat.'", "'.$depart.'", "'.$price.'", "'.$id_user.'", "'.$id_customer.'", "'.$id_rute.'", "'.$status.'", "'.$pay.'") ');
// if($sql) {
//     echo "<script>window.alert('Sedang dalam Proses, mohon tunggu!');window.location.href='keranjang.php';</script>";
// } else {
//     echo "<script>window.alert('Gagal');window.location.href='index.php';</script>";
// }
?>
