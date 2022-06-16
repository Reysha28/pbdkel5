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
    <head>
        <div class="container" style=" display:flex; justify-content: center; margin-top: 20px">
            <img style="width:50%;"src="../images/tatitatu.png" alt="">
        </div>
        <div  style="text-align:center; font-size:9pt; margin-top : 10px">
            <p>Jl.Sudirman, Blk Gor <br> 081231231 </p>
        </div>
       

       

        <table class="table"style="border-style:hidden; font-size:7pt" >
      
        <tbody>
            <tr>
            <td>Pelangggan :  <?php echo $row1['pembeli']?></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <td width="35%">Nama Barang <br> harga</td>
            <td width="35%" align="center"> <br> Qty</td>
            <td width="35%"align="right"><br>total</td>
            </tr>
            <tr>
            <td colspan="2">Sub Total  <br> Bayar <br> Total <br>Kembalian</td>
            <td align="right">Sub total<br>RP,1<br>RP2<br>Rp3</td>
            </tr>
        </tbody>
        </table>
        <div style="font-size:7pt">
            <p>Petugas : siapaa <br> Tanggal : <?php echo $row1['tanggal_penjualan']?></p>
            <p align="center" >TERIMAKASIH SUDAH BERBELANJA DI<br>TATITATU </p>
        </div>

    </head>
    
    
</body>
</html>
<script>
    window.print()
</script>