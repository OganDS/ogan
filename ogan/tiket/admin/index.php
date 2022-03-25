<html>

<head>
    <title>BayPlane | Mode Admin</title>
    <link rel="icon" href="../image/hey.png">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/materialize.min.js"></script>
</head>

<body style="background-color: black;">
    <?php include "nav.php"; ?>

    <div class="container">
        <div class="row">
            
            <br>
            <div class="col s12">
                <div class="card-panel">
                    <?php include "koneksi.php";
                    $ss = mysqli_query($conn,'select * from admin where username="'.$_SESSION['admin'].'" ');
                    $ds = mysqli_fetch_array($ss);
                    ?>
                    <h5>Selamat datang,
                        <i><?=$ds['username'];?>.</i>
                    </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s4">
                <div class="card-panel white-text" style="background-color: blue;">
                   
                    <a href="type_trans.php" class="white-text">
                         <h5>Type Transportation</h5>
                    </a>
                </div>
            </div>
            <div class="col s8">
                <div class="card-panel white-text" style="background-color: red;">
                   
                    <a href="trans.php" class="white-text">
                         <h5>Transportation</h5>
                    </a>
                </div>
            </div>
            <div class="col s8">
                <div class="card-panel white-text" style="background-color: green;">
                    
                    <a href="rute.php" class="white-text">
                        <h5>Rute</h5>
                    </a>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel white-text" style="background-color: orange;">
                    <a href="reserv.php" class="white-text">
                        <h5>Reservation</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="card-panel">
                    <a href="user.php">
                        <h5 style="color: black;">User</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
