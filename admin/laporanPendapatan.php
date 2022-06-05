<?php
include_once('../connect.php');
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
        <h5 style="margin-top:80px;margin-bottom:15px;">Laporan Pendapatan</h5>
        <div class="col-12">
            <div class="card mb-4" style="border-radius: 10px; width:100%">
                <div class="card-body" style=" box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);
                border-radius: 10px; padding-left:30px; padding-right:30px">
                <h5 style="color:grey">Input Data</h5>
                <p>Silahkan  isikan data dibawah ini dengan benar</p>
                <hr>
                <p>Silahkan anda pilih dari tanggal dan sampai tanggal untuk menampilkan hasil penjualan pada toko anda</p>
                <hr>
                <form action="" method="post">
                <div class="flex container" style="margin-bottom:0px;">
                    <div class="row align-items-start">
                        <div class="col">
                        <p align="right">Dari Tanggal<p>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                            <input type="date" class="form-control" name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>"">
                            </div>
                        </div>
                    </div>
                <div class="row align-items-start">
                    <div class="col">
                    <p align="right">Sampai Tanggal<p>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                        <input type="date" class="form-control" name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>">
                        </div>
                    </div>
                </div>
                <div align="right">
                <button class="btn-search" name="back" type="submit">Cari Data</button>  
                </div>
            </form>
            </div>
            </div>
        </div>

        <div class="table-responsive">	
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>Penjualan</th>
						<th>Pendapatan</th>
						<th>Keuntungan</th>
					</tr>
				</thead>
				<tbody>
                <?php
                $date1=0;
                $date2=0;
                if (isset($_POST['back'])) {
                    $date1 = date("Y-m-d", strtotime($_POST['date1']));
                    $date2 = date("Y-m-d", strtotime($_POST['date2']));
                    $result = pg_query($conn,"SELECT * FROM tabel_pengeluaran WHERE date(tanggal_pengeluaran) BETWEEN '$date1' AND '$date2'");
                    $total=0;
                    while($row=pg_fetch_array($result)){
                        $jumlah=$row['harga'];
                        $total+=$jumlah;
                    }

                    $result2 = pg_query($conn,"SELECT * FROM tabel_detail_transaksi JOIN tabel_transaksi on tabel_transaksi.id_penjualan=tabel_detail_transaksi.id_penjualan WHERE date(tanggal_penjualan) BETWEEN '$date1' AND '$date2'");
                    $total2=0;
                    while($row2=pg_fetch_array($result2)){
                        $jumlah2=$row2['total_harga'];
                        $total2+=$jumlah2;
                    }
                    $total3=$total2-$total;
                    ?>
                        <tr>
                            <th>Rp<?=number_format($total,0,".",".")?></th>
                            <th>Rp<?=number_format($total2,0,".",".")?></th>
                            <th>Rp<?=number_format($total3,0,".",".")?></th>
                        </tr>
                    <?php
                }
                ?>	
				</tbody>
			</table>
		</div>	 
                
    </div>
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