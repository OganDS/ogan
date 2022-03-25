<html>

<head>
    <title>BayPlane | Penyedia Tiket terlucu</title>
    <link rel="icon" href="../image/hey.png">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/materialize.min.js"></script>
    <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 7px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  bottom: 24px;
  right: 28px;
  width: 78px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  left: 500px;
  z-index: 9;
  height: 450px;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: blue;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 75%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>

<body>
    <?php include "nav.php"; ?>
    <?php
    include "koneksi.php";
    $s = mysqli_query($conn, 'select * from user where username="'.$_SESSION['user'].'" ');
    $q = mysqli_fetch_array($s);
    $id_user = $q['id_user'];
    ?>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card-panel default">
                        <center>
                            <h1><i class="ion-android-cart"></i> Keranjang Anda</h1>
                            <p>Mohon tunggu Notifikasi dari Admin</p>
                            <b>Nb:</b> <i>sebelum cetak tiket, anda harus mengisi data diri anda.</i><a href="pengaturan.php"> <button class="btn waves-effect black"><i class="ion-ios-settings"></i></button></a>
                        </center>
                    </div>
                </div>
                <div class="col s4">
                    <?php
                include "koneksi.php";
                $sql = mysqli_query($conn, 'select * from reserv where id_user="'.$id_user.'" ');
                while($query = mysqli_fetch_array($sql)) {
                ?>
                        <div class="card-panel green">
                            <b class="white-text">Code Booking</b>
                            <p>
                                <?=$query['reserv_code'];?>
                            </p>
                            <b class="white-text">Status</b>
                            <p>
                                <?php
                                if($query['status'] == 'Proses') {
                                    echo "Proses";
                                } else {
                                ?>
                                    <a href="cetak.php?id_reserv=<?=$query['id_reserv'];?>" target="_blank"><button class="btn waves-effect blue"><i class="ion-android-print"></i></button></a>
                                    <?php
                                }
                                ?>
                                <br>
                                <button class="open-button" title="Kirim Bukti Pembayaran" onclick="openForm()"></button>

                                <div class="form-popup" id="myForm">
                                  <form action="/action_page.php" class="form-container">
                                    <h1>Login</h1>

                                    <label for="email"><b>Bukti pembayaran</b></label>
                                    <input type="file" name="pay" required>
                                <br><br>

                                    <button type="submit" class="btn">Login</button>
                                    <button type="button" class="btn cancel" onclick="closeForm()">X</button>
                                  </form>
                                </div>
                                <script>
                                function openForm() {
                                  document.getElementById("myForm").style.display = "block";
                                }

                                function closeForm() {
                                  document.getElementById("myForm").style.display = "none";
                                }
                                </script>
                            </p>
                        </div>
                        <?php } ?>
                </div>
            </div>
        </div>
        <?php include "footer.php";?>
</body>

</html>
