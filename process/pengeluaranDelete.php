<?php
include '../connect.php'; 

$kode = $_GET['id_pengeluaran'];
$sql = "DELETE FROM tabel_pengeluaran WHERE id_pengeluaran='$kode'";

$result = pg_query($conn, $sql);
if($result){
  echo "<script>alert('Data berhasil dihapus');window.location='pengeluaranIndex.php';</script>";
} else {
  echo pg_last_error($conn);
}
?>