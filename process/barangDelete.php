<?php
include '../connect.php'; 

$kode = $_GET['id_barang'];
$sql = "DELETE FROM tabel_barang WHERE id_barang='$kode'";

$result = pg_query($conn, $sql);
if($result){
  echo "<script>alert('Data berhasil dihapus');window.location='barangIndex.php';</script>";
} else {
  echo pg_last_error($conn);
}
?>