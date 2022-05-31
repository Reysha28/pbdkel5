<?php
include 'connect.php';
    
if (isset($_GET['id'])) {
    $query = "DELETE FROM tabel_pengeluaran WHERE id_pengeluaran='$id_pengeluaran' ";
    $hasil_query = pg_query($koneksi, $query);

    if(!$hasil_query) 
    {
        echo "<script>alert('Data gagal dihapus');window.location='pengeluaranIndex.php';</script>";
    } 
    else 
    {
        echo "<script>alert('Data berhasil dihapus');window.location='pengeluaranIndex.php';</script>";
    }
}