<html>

<head>
    <title>BayPlane | Mode Admin</title>
    <link rel="icon" href="../image/hey.png">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/materialize.min.js"></script>
</head>

<body>
    

    <div class="container">
        <div class="row">
            <div class="col s15">
                <br>
                <br>
                <div class="card-panel white-text blue">
                    <h5>Reservation</h5>
                    <table id="datatablesSimple">
                        <thead style="background-color: rgba(0, 0, 0, 0.25);" class="white-text">
                            <tr>
                                <th>Code Reservation</th>
                                <th>Reservation At</th>
                                <th>Reservation Date</th>
                                <th>Code Seat</th>
                                <th>Depart</th>
                                <th>Price</th>
                                <th>User</th>
                                <th>ID Customer</th>
                                <th>ID Rute</th>
                                <th> Bukti Pembayaran</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="white-text">
                            <?php include "koneksi.php";
                            $sql = mysqli_query($conn, 'select * from reserv ');
                            while($dtt = mysqli_fetch_array($sql) ) {
                            ?>
                            <tr>
                                
                                <td>
                                    <?=$dtt['reserv_code'];?>
                                </td>
                                <td>
                                    <?=$dtt['reserv_at'];?>
                                </td>
                                <td>
                                    <?=$dtt['reserv_date'];?>
                                </td>
                                <td>
                                    <?=$dtt['seat'];?>
                                </td>
                                <td>
                                    <?=$dtt['depart'];?>
                                </td>
                                <td>
                                    <?=$dtt['price'];?>
                                </td>
                                <td>
                                    <?php
                                include "koneksi.php";
                                $squ = mysqli_query($conn, 'select * from user where id_user="'.$dtt['id_user'].'" ');
                                while($quu = mysqli_fetch_array($squ)) {
                                ?>
                                        <b><?=$quu['username'];?></b>
                                        <?php } ?>
                                </td>
                                <td>
                                    <?=$dtt['id_customer'];?>
                                </td>
                                <td>
                                    <?=$dtt['id_rute'];?>
                                </td>
                                <td>
                                <img src="../image/<?php echo $dtt['pay']?>" width="50" height="60">
                                </td>
                                <td>
                                    <?php 
                                    if($dtt['status']=='Proses') {
                                    ?>
                                    <a href="terima.php?id_reserv=<?=$dtt['id_reserv'];?>" onclick="return confirm('Ingin Melanjutkan?');" class="white-text">
                                        <button class="btn waves-effect green"><?=$dtt['status'];?></button>
                                    </a>
                                    <?php 
                                    } else {
                                        echo $dtt['status'];
                                    }
                                    ?>
                                    <td>
                                    <a href="reserv_d.php?id_reserv=<?=$dtt['id_reserv'];?>" onclick="return confirm('Admin Yakin ingin menghapusnya?');"><button class="btn waves-effect red white-text"><i class="ion-android-delete"></i></button></a>
                                </td>

                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a style="" href="user.php"><button class="btn waves-effect blue">User</button></a>
        <a href="index.php" onclick="window.close();"><button class="btn waves-effect red"><i class="ion-close"></i></button></a>    
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/data-tables-simple.js"></script> -->
</body>

</html>
