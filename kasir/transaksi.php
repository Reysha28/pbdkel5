<?php 
    include '../connect.php';

    $query = pg_query($conn, "SELECT max(id_penjualan) as id_penjualan FROM tabel_transaksi");
    $row = pg_fetch_array($query);
    $kode = $row['id_penjualan'];
    $urutan = (int) substr($kode, 2, 2);
    $urutan=$urutan+1;
    $huruf = "E";
    $id = $huruf . sprintf("%03s", $urutan); 
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
                        <a  class="nav_link active" href="../berandaKasir.php" > 
                            <i class='bx bx-home nav_icon'></i> 
                            <span class="nav_name">Beranda</span> 
                        </a>
                        <a  class="nav_link" href="penjualanIndex.php"> 
                            <i class='bx bx-money nav_icon'></i> 
                            <span class="nav_name">Penjualan</span> 
                        </a> 
                        <a class="nav_link" href="../login.php"> 
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

                                        <h5 align="center" style="margin-top:10px;margin-bottom:15px;">Form Create Penjualan</h5> 
                                        <div class="col-md-6">
                                        <label for="id_penjualan">ID Penjualan</label>
                                        <input type="text"  class="form-control" name="id_penjualan" value="<?php echo $id?>" readonly required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                        <label for="tanggal_penjualan">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal_penjualan" required>
                                        </div>

                                        <div class="col-md-6">
                                        <label for="pembeli">Pembeli</label>
                                        <input type="text" class="form-control" name="pembeli" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="id_pegawai">ID Pegawai</label>
                                            <input type="text"  class="form-control" name="id_pegawai" required>
                                        </div>

                                        <input  class="btn btn-success" type="submit" name="tambah" value="Tambah" style="width:10%; margin-top:40px;background-color:#ff7f5c">
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
    if (isset($_POST['tambah'])) {
    $id_penjualan = $_POST['id_penjualan'];
    $pembeli = $_POST['pembeli'];
    $id_pegawai = $_POST['id_pegawai'];
    $tanggal_penjualan = $_POST['tanggal_penjualan'];

    $sql = pg_query($conn, "insert into tabel_transaksi (id_penjualan,id_pegawai,pembeli,tanggal_penjualan) values('$id_penjualan','$id_pegawai','$pembeli','$tanggal_penjualan')");

    if($sql){
        echo "<script>alert('Data berhasil ditambahkan');window.location='pembayaran.php';</script>";
        } else {
        echo pg_last_error($conn);
        }
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