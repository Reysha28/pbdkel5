<?php
include '../connect.php'; 

$kode = $_GET['id_pegawai'];
$sql = "DELETE FROM tabel_pegawai WHERE id_pegawai='$kode'";

$result = pg_query($conn, $sql);
if($result){
  echo "<script>alert('Data berhasil dihapus');window.location='pegawaiIndex.php';</script>";
} else {
  echo pg_last_error($conn);
}
?>