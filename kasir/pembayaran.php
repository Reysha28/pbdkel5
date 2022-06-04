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
                                            <option value='$row[id_barang], $row[harga_barang]' >$row[nama_barang]</option>
                                            ";
                                        }
                                        ?>
                                        </select>
                                        </div>

                                        <div class="col-md-4">
                                        <label for="qty">Qty</label>
                                        <input type="number" class="form-control" name="qty">
                                        </div>
                      

                                        <input class="btn btn-success" type="submit" name="add" value="Add" style="width:10%; margin-top:40px;margin-left:30px;background-color:#ff7f5c">

                                        <?php
                                        if (isset($_POST['add'])) {
                                        $kode = $_POST['id_barang'];
<<<<<<< HEAD
                                        $sql = pg_query($conn, "SELECT harga_barang from tabel_barang where id_barang='$kode'");
                                        $row = pg_fetch_array($sql);
                                        $harga = $row['harga_barang'];
                                        $id_pegawai = $row1['id_pegawai'];

=======
                                        $sql = pg_query($conn, "SELECT * from tabel_barang where id_barang=$kode");
                                        $row = pg_fetch_array($sql);
                                        $harga_barang = $row['harga_barang'];
>>>>>>> a9ca4872925c4889f02bd2bde038dcf4c71e6842
                                        $qty = $_POST['qty'];
                                        $total_harga = $harga * $qty;
                                        $id_penjualan = $_POST['id_penjualan'];
                                        $pembeli = $row1['pembeli'];

<<<<<<< HEAD
                                        pg_query($conn, "insert into tabel_detail_transaksi (id_penjualan,id_barang,qty,total_harga) values('$id_penjualan','$kode','$qty','$total')");
=======

                                        pg_query($conn, "insert into tabel_detail_transaksi (id_penjualan,id_barang,qty,total_harga) values('$id_penjualan','$id_barang','$qty','$total_harga')");
>>>>>>> a9ca4872925c4889f02bd2bde038dcf4c71e6842

                                        }
                                        ?>
                                        

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
<<<<<<< HEAD
=======
                                            <tr align="center" style="color:grey; font-weight:100; width:100%;">
                                                <th></th>
                                                <th></th>
                                                <th><th>
                                                <th>
                                                    <a type="button" class="btn btn-warning" style="background-color: #FFA63E;" href="restokAdd.php?id_barang=<?= $row['id_barang'] ?>"><i class="fa fa-add" style="color: white;"></i></a>
                                                    <a type="button" class="btn btn-warning" style="background-color: #E15B29;" href="barangEdit.php?id_barang=<?= $row['id_barang'] ?>"><i class="fa fa-pencil" style="color: white;"></i></a>
                                                    <a type="button" onclick="return confirm('Anda yakin menghapus data barang ini ?')" href="barangDelete.php?id_barang=<?= $row['id_barang'] ?>"
                                                    class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                </th>
                                            </tr>

>>>>>>> a9ca4872925c4889f02bd2bde038dcf4c71e6842
                                            <?php 
                                            $sql2 = pg_query($conn,"SELECT * FROM tabel_detail_transaksi, tabel_barang WHERE tabel_detail_transaksi.id_barang = tabel_barang.id_barang");
                                            while($row2=pg_fetch_array($sql2)){
                                            ?>  
<<<<<<< HEAD
                                            <tr align="center" style="color:grey; font-weight:100; width:100%;">
                                            <th><?=$row2['id_barang']?></th>
                                            <th><?=$row2['nama_barang']?></th>
                                            <th><?=$row2['qty']?></th>
                                            <th>Rp<?=number_format($row2['harga_barang'],0,".",".")?></th>
                                            <th><a type="button" onclick="return confirm('Anda yakin menghapus data barang ini ?')" href="delete_beli.php?id_barang=<?= $row2['id_barang'] ?>"
                                                    class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></th>
                                            </tr>
=======
                                            
>>>>>>> a9ca4872925c4889f02bd2bde038dcf4c71e6842
                                            <?php
                                            }
                                            ?> 
                                            </tbody>
                                            
                                            <tfoot>
                                            <?php
                                            $total = pg_query($conn, "SELECT SUM(total_harga) FROM tabel_detail_transaksi");
                                            while ($data3 = pg_fetch_array($total)){
                                            ?>
                                                <tr align="center" bgcolor='#F3F6F9'>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Total Harga</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tfoot>
                                        </table>
                                 

                                        <div align="right" class="col-8" style="margin-bottom:30px">
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