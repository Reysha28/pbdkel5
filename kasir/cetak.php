<?php 
    include '../connect.php';

    $sql1 = pg_query($conn, "SELECT * from tabel_transaksi ORDER BY id_penjualan DESC LIMIT 1");
    $row1 = pg_fetch_array($sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tatitatu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    	<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- data tabel CSS -->
        <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
        <!-- data tabel CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
</head>
<body>
    <div class="header" style="padding : 10px 16px 0 16px">
        <h2 style="color:#3E5569">Cetak Data Penjualan</h2>
        <p style="padding-bottom:20px; color:#A1AAB2">silahkan anda cetak data dibawah</p>
        <hr>
        <br>
        <div class="row justify-content-between">
            <div class="col-md-8"><h6 class="card-title"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> List Penjualan</h6>
            </div>
            <div class="col-md-4">
                <a style="width:100%;height:40px;margin-right:20px;background-color:#36BEA6" href="faktur.php" target="blank" class="btn btn-success btn-block">
                    <i  class="mdi mdi-account-edit">
                    </i> Cetak Transaksi</a>
            </div>
            <h4>Nama Pelanggan : <?php echo $row1['pembeli']?></h4>
            <h6>Tanggal Transaksi : <?php echo $row1['tanggal_penjualan']?></h6>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Produk</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $kode = $row1['id_penjualan'];
                   
                    $sql2 = pg_query($conn,"SELECT * FROM tabel_detail_transaksi, tabel_barang WHERE tabel_detail_transaksi.id_barang = tabel_barang.id_barang AND id_penjualan='$kode'");
                    $x=1;
                    $total = 0;
                    while($row2=pg_fetch_array($sql2)){
                        $jumlah=$row2['total_harga'];
                        $total+=$jumlah;
                    ?>

                    <tr>
                        <th scope="row"><?php echo $x ?></th>
                        <td><?=$row2['id_barang']?></td>
                        <td><?=$row2['nama_barang']?></td>
                        <td><?=$row2['harga_barang']?></td>
                        <td><?=$row2['qty']?></td>
                        <td>Rp<?=number_format($row2['total_harga'],0,".",".")?></td>
                    </tr>
                    <?php
                    $x++;
                    }
                    ?> 
                </tbody>
            </table>
        </div>
        <div style="text-align:right">
            <div class="alert alert-success"><h5 class="text-right">Total : Rp<?=number_format($total,0,".",".")?></h5> </div>
        </div>
        <a href="penjualanIndex.php">Keluar</a>
    </div>
    
</body>
</html>