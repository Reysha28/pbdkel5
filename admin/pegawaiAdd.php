<?php 
    include '../connect.php';
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
                        <a href="pegawaiIndex.php"  class="nav_link active"> 
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
                        <a href="laporanAdmin.php" class="nav_link"> 
                            <i class='bx bx-book nav_icon'></i> 
                            <span class="nav_name">Laporan</span> 
                        </a>
                        <a href="../login.php" class="nav_link" href="{{url('/login')}}"> 
                            <i class='bx bx-log-out nav_icon'></i> 
                            <span class="nav_name">Log Out</span> 
                        </a>
                </div>
            </div> 
        </nav>
    </div>

    <div>
        <div class="row" >
            <nav aria-label="breadcrumb" style="margin-top:55px;">
                <ol class="breadcrumb">
                <li class="me-3">
                    <a href="" class="btn btn-sm" style="font-size: 17px;font-weight:600;color: #404444">Pegawai</a>
                </li>
                <li aria-current="page">
                    <a href="" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight:600;font-size: 17px; border-radius: 10px;">Create</a>
                </li>
                </ol>
            </nav>
        </div>

        <div class="row">
                <div  class="" style="border-radius:10px">
                    <div class="card-body" style="background-color:white; box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);border-radius: 10px;">
                    <div class="row align-items-start">

                    <div class="col">
                        <img class="img" src="../images/pegawai.png" style="width:50%; margin-left:140px; margin-top:240px;"/>
                    </div>
                    
                    <div class="col" style="padding:0 10px">
                    <div class="container-fluid">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <h5 align="center" style="margin-top:10px;margin-bottom:15px;">Form Create Pegawai</h5>
                                        
                                        <div class="form-group" style="margin-bottom:20px">
                                        <label for="id_pegawai" style="margin-bottom:10px">ID Pegawai</label>
                                        <input type="text" class="form-control" name="id_pegawai" required>
                                        </div>

                                        <div class="form-group" style="margin-bottom:20px">
                                            <label for="nama_pegawai" style="margin-bottom:10px">Nama Pegawai</label>
                                            <input type="text" class="form-control" name="nama_pegawai" required>
                                            </div>
                                        
                                        <div class="form-group" style="margin-bottom:20px">
                                        <label for="status_pegawai" style="margin-bottom:10px">Status</label>
                                        <select style="padding:5px 10px; width:100%;" class="chosen-select" data-placeholder="Pilih Status Pegawai" name="status_pegawai" required>
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="Admin"><?php echo "Admin";?> </option>;
                                        <option value="Pemilik"><?php echo "Pemilik";?> </option>;
                                        <option value="Karyawan"><?php echo "Karyawan";?> </option>;
                                        </select>
                                        </div>

                                        <div class="form-group" style="margin-bottom:20px">
                                            <label for="telepon" style="margin-bottom:10px">No Telp</label>
                                            <input type="text" class="form-control" name="telepon" required>
                                        </div>

                                        <div class="form-group" style="margin-bottom:20px">
                                            <label for="alamat" style="margin-bottom:10px">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" required>
                                        </div>

                                        <div class="form-group" style="margin-bottom:20px">
                                            <label for="username" style="margin-bottom:10px">Username</label>
                                            <input type="text" class="form-control" name="username" required>
                                        </div>

                                        <div class="form-group" style="margin-bottom:20px">
                                            <label for="password" style="margin-bottom:10px">Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>

                                        <div class="form-group" style="margin-bottom:20px">
                                            <label for="id_role" style="margin-bottom:10px">Role</label>
                                            <select style="padding:5px 10px; width:100%;" class="chosen-select" data-placeholder="Pilih Jenis Role" name="id_role" required>
                                            <option value="" disabled selected>Pilih Jenis Role</option>
                                            <?php 
                                            include '../connect.php';
                                            $role = pg_query($conn, "select * from tabel_role order by id_role ASC");
                                            while ($row = pg_fetch_assoc($role)) {
                                                echo "
                                                <option value='$row[id_role]'>$row[nama_role]</option>
                                                
                                                ";
                                            }
                                            ?>
                                            </select>
                                            </div>

                                        <div align="right" class="col-9">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <a class="btn btn-warning" style="margin-left:30px" href="pegawaiIndex.php">Cancel</a>
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
    $id_pegawai = $_POST['id_pegawai'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $status_pegawai= $_POST['status_pegawai'];
    $telepon= $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $username= $_POST['username'];
    $password= $_POST['password'];
    $id_role = $_POST['id_role'];
    $password = password_hash($password, PASSWORD_DEFAULT); 

    $sql = pg_query($conn, "insert into tabel_pegawai 
    (id_pegawai,nama_pegawai,status_pegawai,telepon,alamat,username, password, id_role) 
    values('$id_pegawai','$nama_pegawai','$status_pegawai','$telepon','$alamat','$username','$password','$id_role')");

    if ($sql) {
    ?>
        echo "<script>alert('Data berhasil ditambah');window.location='pegawaiIndex.php';</script>";
    <?php
    }
    }
    ?>

    <div class="footer" style="bottom:-120px">
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