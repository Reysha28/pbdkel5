<?php
include '../connect.php'; 
include 'pembayaran.php';

$kode = $_GET['id_barang'];
$detail = pg_query($conn, "SELECT stok_tersedia from tabel_barang where id_barang='$kode'");
$row3 = pg_fetch_array($detail);
$details = pg_query($conn, "SELECT qty from tabel_detail_transaksi where id_barang='$kode'");
$row2 = pg_fetch_array($details);
$stok_tersedia = $row3['stok_tersedia']+$row2['qty'];

$sql = "DELETE FROM tabel_detail_transaksi WHERE id_barang='$kode'";
$sql2 = "UPDATE tabel_barang SET stok_tersedia='$stok_tersedia' WHERE id_barang='$kode'";
$result = pg_query($conn, $sql);
$result2 = pg_query($conn, $sql2);
if($result){
  if($result2){
  echo "<script>alert('Data berhasil dihapus');window.location='pembayaran.php';</script>";
}} else {
  echo pg_last_error($conn);
}
?>