<html>

<head>
    <title>BayPlane | Penyedia Tiket Pesawat</title>
    <link rel="icon" href="../image/hey.png">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/materialize.min.js"></script>
</head>

<body style="background-color: black;">
    <?php include "nav.php"; ?>
<div style="width: 100%; height:800px;">
    <div class="container">
        <div class="row">
            <br>
            <div class="col s4">
                <div class="card-panel white-text" style="height: 190px; background-color: teal;">
                    <?php include "koneksi.php";
                    $ss = mysqli_query($conn,'select * from user where username="'.$_SESSION['user'].'" ');
                    $ds = mysqli_fetch_array($ss);
                    ?>
                    <h5>Selamat datang,
                        <i><?=$ds['username'];?>.</i>
                    </h5>
                    
                    <div class="col s12">
                <b style="color: white;">Nb: </b><i style="color: white;">Sebelum mencari tiket, Pastikan anda sudah mengisi data diri anda</i><br><a href="pengaturan.php" title="Isi data diri"><button class="btn waves-effect blue"><i class="ion-ios-settings"></i></button></a>
            </div>
                </div>
            </div>
            <div class="col s8">
                <div class="card-panel white-text blue">
                    <h5><b>Book</b>ingan <i class="ion-ios-cart"></i></h5>
                    <a href="keranjang.php" class="white-text">Open</a>
                </div>
            </div>
        </div>
        <div class="row">
            <br>
            <br>
            <div class="col s12">
                <div class="card-panel default" style="background-color: black;">
                    <center>
                        <h1 style="color: white;">Cari Tiket</h1>
                    </center>
                    <form method="post" action="cari.php">
                        <div class="input-field">
                            <input type="text" name="cari" id="price">
                            <label for="price">Cari</label>
                        </div>
                        <button class="btn waves-effect blue"><i class="ion-search"></i> Cari</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <br>
    <br>
    <br>
    <?php include "footer.php";?>
</body>

</html>
