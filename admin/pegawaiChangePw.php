<?php
include '../connect.php'; 

$kode = $_GET['id_pegawai'];
$sql = pg_query($conn, "SELECT * from tabel_pegawai where id_pegawai='$kode'");
$row = pg_fetch_array($sql);

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                        <br><br><br>
                        <a href="../login.php" class="nav_link" style="margin-top:20px;" href="{{url('/login')}}"> 
                            <i class='bx bx-log-out nav_icon'></i> 
                            <span class="nav_name">Log Out</span> 
                        </a>
                </div>
            </div> 
        </nav>
    </div>

    <div>
        <div class="row" >
            <nav aria-label="breadcrumb" style="margin-top:75px">
                <ol class="breadcrumb" style="background-color: #F3F6F9">
                <li class="me-3">
                    <a href="" class="btn btn-sm" style="font-size: 17px;font-weight:600;color: #404444">Pegawai</a>
                </li>
                <li aria-current="page">
                    <a href="" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight:600;font-size: 17px; border-radius: 10px;">Change Password</a>
                </li>
                </ol>
            </nav>
        </div>

        <div class="row">  
        <?php 
    if (isset($_POST['submit'])) {
        $id_pegawai = $_POST['id_pegawai'];
        $username= $_POST['username'];
        $password= $_POST['password'];
        $password2= $_POST['password2'];
    
    if(($_POST['password'])!=($_POST['password2']))
    {
        ?>
        <div class="alert alert-warning alert-dismissible fade show ml-2" role="alert" style="width: 98%">
        <strong>Warning!</strong> Password tidak sama
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php
    }
    else{
    $password = password_hash($password, PASSWORD_DEFAULT); 

    $sql =  pg_query($conn,"UPDATE tabel_pegawai SET username='$username' , password='$password' WHERE id_pegawai='$id_pegawai'");

    if($sql){
    echo "<script>window.location='pegawaiIndex.php';alert('Password berhasil diubah');</script>";
    } else {
    echo pg_last_error($conn);
    }
    }
    }
    ?>
    </div>

        <div class="row">
                <div  class="" style="border-radius:10px">
                    <div class="card-body" style="background-color:white; box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);border-radius: 10px;">
                    <div class="row align-items-start">

                    <div class="col">
                        <img class="img" src="../images/pegawai.png" style="width:50%; margin-left:140px; margin-top:80px;"/>
                    </div>
                    
                    <div class="col" style="padding:0 10px">
                    <div class="container-fluid">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <h5 align="center" style="margin-top:10px;margin-bottom:15px;">Form Change Password Pegawai</h5>
                                        
                                        <div class="form-group" style="margin-bottom:20px">
                                        <label for="id_pegawai" style="margin-bottom:10px">ID Pegawai</label>
                                        <input type="text" class="form-control" value="<?php echo $row['id_pegawai']?>" readonly name="id_pegawai" required>
                                        </div>

                                        <div class="form-group" style="margin-bottom:20px">
                                            <label for="username" style="margin-bottom:10px">Username</label>
                                            <input type="text" class="form-control" value="<?php echo $row['username']?>" name="username" required>
                                        </div>

                                        <div class="form-group" style="margin-bottom:20px">
                                            <label for="password" style="margin-bottom:10px">Password Baru</label>
                                            <input type="password" class="form-control"  value="" name="password" required>
                                        </div>

                                        <div class="form-group" style="margin-bottom:20px">
                                            <label for="password" style="margin-bottom:10px">Konfirmasi Password</label>
                                            <input type="password" class="form-control"  value="" name="password2" required>
                                        </div>

                                        <div align="right" class="col-9">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <a class="btn btn-warning" style="margin-left:30px"href="">Cancel</a>
                                            <input class="btn btn-success" type="submit" name="submit" value="Submit" style="margin-left:30px">
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