<?php
include "koneksi.php";
include "session.php";

$name       = $_POST['name'];
$address    = $_POST['address'];
$phone      = $_POST['phone'];
$gender     = $_POST['gender'];
$username   = $_POST['username'];

$sql = mysqli_query($conn, 'insert into customer (name, address, phone, gender, username) values("'.$name.'", "'.$address.'", "'.$phone.'", "'.$gender.'", "'.$username.'") ');
if($sql) {
    echo "<script>window.alert('Mulai Proses?');window.location.href='pengaturan.php';</script>";
} else {
    echo "<script>window.alert('Gagal!');window.location.href='pengaturan.php';</script>";
}
?>
