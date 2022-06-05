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
                    <span class="nav_logo-name">Admin</span> 
                </a>
                <div class="nav_list"> 
                <a href="../berandaAdmin.php" class="nav_link"> 
                            <i class='bx bx-home nav_icon'></i> 
                            <span class="nav_name">Beranda</span> 
                        </a>
                        <a href="pegawaiIndex.php"  class="nav_link"> 
                            <i class='bx bx-user nav_icon'></i> 
                            <span class="nav_name">Pegawai</span> 
                        </a> 
                        <a href="barangIndex.php" class="nav_link"> 
                            <i class='bx bx-clipboard nav_icon'></i> 
                            <span class="nav_name">Produk</span> 
                        </a> 
                        <a href="penjualanIndex.php" class="nav_link"> 
                            <i class='bx bx-money nav_icon'></i> 
                            <span class="nav_name">Penjualan</span> 
                        </a> 
                        <a href="pengeluaranIndex.php" class="nav_link"> 
                            <i class='bx bx-id-card nav_icon'></i> 
                            <span class="nav_name">Pengeluaran</span> 
                        </a> 
                        <a href="laporanAdmin.php" class="nav_link active"> 
                            <i class='bx bx-book nav_icon'></i> 
                            <span class="nav_name">Laporan</span> 
                        </a>
                        <br><br><br>
                        <a href="../login.php" class="nav_link" style="margin-top:20px;"> 
                            <i class='bx bx-log-out nav_icon'></i> 
                            <span class="nav_name">Log Out</span> 
                        </a>
                </div>
            </div> 
        </nav>
    </div>

    <div>
        <h5 style="margin-top:80px;margin-bottom:15px;">Laporan Pengeluaran</h5>
        <div class="col-12">
            <div class="card mb-4" style="border-radius: 10px; width:100%">
                <div class="card-body" style=" box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);
                border-radius: 10px; padding-left:30px; padding-right:30px">
                <h5 style="color:grey">Input Data</h5>
                <p>Silahkan  isikan data dibawah ini dengan benar</p>
                <hr>
                <p>Silahkan anda pilih dari tanggal dan sampai tanggal untuk menampilkan hasil penjualan pada toko anda</p>
                <hr>
                <div class="flex container" style="margin-bottom:0px;">
                    <div class="row align-items-start">
                        <div class="col">
                        <p align="right">Bulan<p>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                            <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text"><i class='bx bx-calendar nav_icon'></i></span>
                            </div>
                        </div>
                    </div>
                <div class="row align-items-start">
                    <div class="col">
                    <p align="right">Tahun<p>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text"><i class='bx bx-calendar nav_icon'></i></span>
                        </div>
                    </div>
                </div>
                <div align="right">
                <button class="btn-search" name="back" type="submit">Cari Data</button>  
                </div> 
            </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['back'])) {
        $tgl1 = $_POST['tgl1'];
        $tgl2 = $_POST['tgl2'];

        $data = $conn->query("SELECT count(tabel_detail_pengeluaran.id_pengeluaran) as id FROM tabel_detail_pengeluaran join tabel_pengeluaran on
        tabel_pengeluaran.id_pengeluaran=tabel_detail_pengeluaran.id_pengeluaran 
        WHERE tgl1(tanggal_pengeluaran)='$tgl1' and 
        tgl2(tanggal_pengeluaran)='$tgl2'");
        while ($row1 = $data->fetch_assoc()) {
            $brag = $row1['id'];
        }

        if ($brag == 0) {
            $pesan_gagal = "Tidak ada transaksi!";
        } else {
            header("location:print_laporanPengeluaran.php?tgl1=$tgl1&&tgl2=$tgl1");
        }
    }
    ?>        

    <div class="footer" style="bottom:-160px">
        <p>Copyright &copy 2022 Tatitatu. All Rights Reserved.</p>
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