<?php
include '../connect.php'; 

$kode = $_GET['id_restok'];
$sql1 = "DELETE FROM tabel_restok WHERE id_restok='$kode'";
$sql2 = "DELETE FROM tabel_detail_restok WHERE id_restok='$kode'";

$result = pg_query($conn, $sql1);
$result2 = pg_query($conn, $sql2);
if($result){
  echo "<script>alert('Data berhasil dihapus');window.location='restokIndex.php';</script>";
} else {
  echo pg_last_error($conn);
}
?>