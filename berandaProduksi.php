<?php
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tatitatu</title>
    <link href="css/main.css" rel="stylesheet" />
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
                    <span class="nav_logo-name">Produksi</span> 
                </a>
                <div class="nav_list"> 
                        <a  href="berandaProduksi.php" class="nav_link active"> 
                            <i class='bx bx-home nav_icon'></i> 
                            <span class="nav_name">Beranda</span> 
                        </a>
                        <a  href="produksi/barangIndex.php" class="nav_link"> 
                            <i class='bx bx-clipboard nav_icon'></i> 
                            <span class="nav_name">Produk</span> 
                        </a> 
                        <br><br><br>
                        <a href="login.php" class="nav_link" style="margin-top:270px;"> 
                            <i class='bx bx-log-out nav_icon'></i> 
                            <span class="nav_name">Log Out</span> 
                        </a>
                </div>
            </div> 
        </nav>
    </div>

    <div>
        <div class="col-12">
            <div class="card mb-4" style="border-radius: 10px; width:100%; margin-top:100px">
                <div class="card-body" style="
                box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);
                border-radius: 10px;" align="center" >
                <img class="img" style="width:20%; margin-left:20px;margin-top:20px;" src="images/tatitatu.png"/>
                </div>
            </div>
        </div>

        <h5 style="margin-top:25px;margin-bottom:15px;">Beranda</h5>
            <div class="row-inline">
                <div class="flex-container">
                    <div class="card mb-4" style="border-radius: 10px; width:40%; margin-left:70px;">
                    <div class="card-body" style="
                        box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);
                        border-radius: 10px;">
                        <div class="row align-items-start">
                            <div class="col" style="width: 20%; margin-left:10px">
                                <img class="img" style="width:30%; margin-left:50px;margin-top:20px;" src="images/info-circle.png"/>

                            </div>
                            <div class="col" style="width:60%; margin-right:10px;margin-top:15px; line-height:20px;">
                                <?php 
                                $query = "SELECT * FROM tabel_barang WHERE stok_tersedia <6";
                                $result = pg_query($conn, $query);
                                $jumlah = pg_num_rows($result); 
                                ?>
                                <h4 class="mt-1"><p ><?php echo $jumlah; ?></p></h4>
                                <p>Produk Restok</p>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="card mb-4" style="border-radius: 10px; width:40%;  margin-left:70px;">
                    <div class="card-body" style="
                        box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);
                        border-radius: 10px;">
                        <div class="row align-items-start">
                            <div class="col" style="width: 20%; margin-left:10px">
                                <img class="img" style="width:25%; margin-left:50px;margin-top:20px;" src="images/bag.png"/>

                            </div>
                            <div class="col" style="width:60%; margin-right:10px;margin-top:15px; line-height:20px;">
                                <?php 
                                $query = "SELECT * FROM tabel_barang";
                                $result = pg_query($conn, $query);
                                $jumlah = pg_num_rows($result); 
                                ?>
                                <h4 class="mt-1"><p ><?php echo $jumlah; ?></p></h4>
                                <p>Produk Kami</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="footer">
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