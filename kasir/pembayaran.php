<?php 
    include '../connect.php';
    $id_b = 0;
    if (isset($_POST['add'])){
        $id_b = $_POST['id_barang'];

    }

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
    <link href="../css/main.css" rel="stylesheet" />
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

<body id="body-pd" style="background-color: #F3F6F9;">
    <header class="header" id="header" style="background-color: white">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> 
        </div>
    </header>

    <div class="l-navbar" id="nav-bar" >
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> 
                    <i class='bx bx-grid-alt nav_logo-icon'></i> 
                    <span class="nav_logo-name">Kasir</span> 
                </a>
                <div class="nav_list"> 
                        <a  class="nav_link active"> 
                            <i class='bx bx-home nav_icon'></i> 
                            <span class="nav_name">Beranda</span> 
                        </a>
                        <a  class="nav_link"> 
                            <i class='bx bx-money nav_icon'></i> 
                            <span class="nav_name">Penjualan</span> 
                        </a> 
                        <br><br><br>
                        <a class="nav_link" href="{{url('/login')}}" style="margin-top:270px;"> 
                            <i class='bx bx-log-out nav_icon'></i> 
                            <span class="nav_name">Log Out</span> 
                        </a>
                </div>
            </div> 
        </nav>
    </div>

    <div>
        <div class="row" >
            <nav aria-label="breadcrumb" style="margin-top:75px;">
                <ol class="breadcrumb">
                <li class="me-3">
                    <a href="" class="btn btn-sm" style="font-size: 17px;font-weight:600;color: #404444">Penjualan</a>
                </li>
                <li aria-current="page">
                    <a href="" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight:600;font-size: 17px; border-radius: 10px;">Create</a>
                </li>
                </ol>
            </nav>
        </div>

        
        <div class="row">
            <div class="col-12">
                <div class="card mb-4" style="border-radius: 10px;">
                    <div class="card-body" style="box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);border-radius: 10px;">
                        <div class="container-fluid">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="row g-3">
                                    <div class="row">
                                        <h5 align="center" style="margin-top:10px;margin-bottom:15px;">Form Create Penjualan</h5> 
                                        <div class="col-md-3">
                                        <label for="tanggal_penjualan">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal_penjualan" value="<?php echo $row1['tanggal_penjualan']?>" readonly>
                                        </div>

                                        <div class="col-md-3">
                                        <label for="id_penjualan">ID Penjualan</label>
                                        <input type="text"  class="form-control" name="id_penjualan" value="<?php echo $row1['id_penjualan']?>" readonly>
                                        </div>

                                        <div class="col-md-3">
                                        <label for="pembeli">Pembeli</label>
                                        <input type="text" class="form-control" name="pembeli" value="<?php echo $row1['pembeli']?>"  readonly>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="id_pegawai">ID Pegawai</label>
                                            <input type="text"  class="form-control" name="id_pegawai" value="<?php echo $row1['id_pegawai']?>"  readonly>
                                        </div>
                                        <div>
                                            <hr>
                                        </div>

                                        <h5 align="left" style="margin-top:40px;margin-bottom:5px;">Add Items</h5>

                                        <div class="col-md-4">
                                        <label for="id_barang">Barang</label>
                                        <select style="padding:5px 10px; width:100%;" class="chosen-select" data-placeholder="Pilih Barang" name="id_barang" required>
                                        <option value="" disabled selected>Pilih Barang</option>
                                        <?php 
                                        $barang = pg_query($conn, "select * from tabel_barang order by id_barang ASC");
                                        while ($row = pg_fetch_assoc($barang)) {
                                            echo "
                                            <option value='$row[id_barang]'>$row[nama_barang]</option>
                                            ";
                                        }
                                        ?>
                                        </select>
                                        </div>

                                        <div class="col-md-4">
                                        <label for="qty">Qty</label>
                                        <input type="number" class="form-control" name="qty">
                                        </div>

                                        <?php
                                        if (isset($_POST['add'])){

                                        $detail = pg_query($conn, "SELECT harga_barang from tabel_barang where id_barang='$id_b'");
                                        $row3 = pg_fetch_array($detail);
                                        $harga = $row3['harga_barang'];
                                        $id_pegawai = $row1['id_pegawai'];

                                        $qty = $_POST['qty'];
                                        $total_harga = $harga * $qty;
                                        $id_penjualan = $_POST['id_penjualan'];
                                        $pembeli = $row1['pembeli'];


                                        pg_query($conn, "insert into tabel_detail_transaksi (id_penjualan,id_barang,qty,total_harga) values('$id_penjualan','$id_b','$qty','$total_harga')");

                                        }
                                        ?>
                    
                                        <input class="btn btn-success" type="submit" name="add" value="Add" style="width:10%; margin-top:20px; margin-bottom:20px; margin-left:30px;background-color:#ff7f5c">

                                        <table id="myTable" class="table table-hover" >
                                            <thead >
                                                <tr align="center" bgcolor='#F3F6F9'>
                                                    <th>ID Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Qty</th>
                                                    <th>Harga</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            <?php 
                                            $sql2 = pg_query($conn,"SELECT * FROM tabel_detail_transaksi, tabel_barang WHERE tabel_detail_transaksi.id_barang = tabel_barang.id_barang");
                                            while($row2=pg_fetch_array($sql2)){
                                            ?>  
                                            <tr align="center" style="color:grey; font-weight:100; width:100%;">
                                            <th><?=$row2['id_barang']?></th>
                                            <th><?=$row2['nama_barang']?></th>
                                            <th><?=$row2['qty']?></th>
                                            <th>Rp<?=number_format($row2['total_harga'],0,".",".")?></th>
                                            <th><a type="button" onclick="return confirm('Anda yakin menghapus data barang ini ?')" href="delete_beli.php?id_barang=<?= $row2['id_barang'] ?>"
                                                    class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></th>
                                            </tr>
                                            <?php
                                            }
                                            ?> 
                                            </tbody>
                                            
                                            <tfoot>
                                            <?php
                                            $total = 0;
                                            $jlh = pg_query($conn, "SELECT * FROM tabel_detail_transaksi");
                                            while ($data3 = pg_fetch_array($jlh)){
                                                $jumlah=$data3['total_harga'];
                                                $total+=$jumlah;
                                            }
                                            ?>
                                                <tr align="center" bgcolor='#F3F6F9'>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Total Harga</th>
                                                    <th>Rp<?=number_format($total,0,".",".")?></th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <h5><br>Pembayaran</h5> 
                                        <div class="row justify-content-between">
                                            <div class="col-md-5"  style="margin-bottom=30px>
                                            <label for="bayar">Bayar</label>
                                            <input type="number" id="bayar"  class="form-control" name="bayar" placeholder ="jumlah bayar">
                                            </div>

                                            <div class="col-md-5" style="margin-bottom=30px">
                                            <label for="kembalian">Kembalian</label>
                                            <input type="number" id="kembalian"  class="form-control" name="kembalian" placeholder ="kembalian" readonly>
                                            </div>
                                        </div>
                                        <div><br> <br></div>

                                        <script>
                                            let harga= "<?php echo $total ?>";
                                            let bayar = document.getElementById('bayar')
                                            let kembalian = document.getElementById('kembalian')
                                            
                                            bayar.addEventListener('keyup',(e)=> {
                                                kembalian.value = e.target.value ? e.target.value - harga : 0
                                            });                                            
                                        </script>
                                
                                        <div align="right" class="col-7" style="margin-bottom:30px">
                                            <a class="btn btn-primary">Reset</a>
                                            <a class="btn btn-warning" style="margin-left:30px"href="">Cancel</a>
                                            <input class="btn btn-success" type="submit" name="simpan" value="Submit" style="margin-left:30px">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
 if (isset($_POST['simpan'])) {
    $id_barang = $_POST['id_barang'];
    $id_katbarang = $_POST['id_katbarang'];
    $nama_barang = $_POST['nama_barang'];
    $warna_barang = $_POST['warna_barang'];
    $harga_barang = $_POST['harga_barang'];
    $stok_tersedia = $_POST['stok_tersedia'];

$sql =  pg_query($conn,"UPDATE tabel_barang SET id_katbarang='$id_katbarang', nama_barang='$nama_barang', warna_barang='$warna_barang' 
, harga_barang='$harga_barang' , stok_tersedia='$stok_tersedia' 
WHERE id_barang='$id_barang'");
}
?>
</body>
</html>
<script>
document.addEventListener("DOMContentLoaded", function(event) { 
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    // show navbar
    nav.classList.toggle('show')
    // change icon
    toggle.classList.toggle('bx-x')
    // add padding to body
    bodypd.classList.toggle('body-pd')
    // add padding to header
    headerpd.classList.toggle('body-pd')
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink)) 
});
</script>