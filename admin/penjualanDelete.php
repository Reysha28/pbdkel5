<?php
include '../connect.php'; 

$kode = $_GET['id_penjualan'];
$sql = "DELETE FROM tabel_detail_transaksi WHERE id_penjualan='$kode'";
$sql2 = "DELETE FROM tabel_transaksi WHERE id_penjualan='$kode'";

$result = pg_query($conn, $sql);
$result2 = pg_query($conn, $sql2);

if ($result) {
    if($result2){
        ?>
            echo "<script>alert('Data berhasil dihapus');window.location='penjualanIndex.php';</script>";
        <?php
    }
}
?>