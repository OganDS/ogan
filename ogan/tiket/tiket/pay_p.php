<?php
include "koneksi.php";

$pay =$_POST['pay'];

$sql = "UPDATE reserv SET pay='$pay' WHERE id_reserv=$id_reserv";

if($sql) {
    echo "<script>window.alert('Akan Segera diproses, mohon tunggu!');window.location.href='keranjang.php';</script>";
} else {
    echo "<script>window.alert('Ups ada kesalahan');</script>";
}



// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['kirim'])){


    //ambil dari data dari formulir
    $id_reserv =$_POST['id_reserv'];


    //untuk fotonya
	$pay    = $_FILES['gambar']['name'];
	$tmp      = $_FILES['gambar']['tmp_name'];
	$fotobaru = $pay;
	$path     = "../image/".$fotobaru;
}

if (move_uploaded_file($tmp, $path)) {
    echo "Foto Berhasil di uploadd";
	
}


 // buat query update
 $sql = "UPDATE reserv SET  pay='$fotobaru' WHERE id_reserv=$id_reserv";

 var_dump($sql);

 $query = mysqli_query($db, $sql);

  // apakah query update berhasil?
if( $query ) {
    // kalau berhasil alihkan ke halaman keranjang.php
    header('Location: keranjang.php');
} else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
}
