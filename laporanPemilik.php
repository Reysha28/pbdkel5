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
                    <span class="nav_logo-name">Admin</span> 
                </a>
                <div class="nav_list"> 
                        <a class="nav_link active"> 
                            <i class='bx bx-home nav_icon'></i> 
                            <span class="nav_name">Beranda</span> 
                        </a>
                        <a class="nav_link"> 
                            <i class='bx bx-book nav_icon'></i> 
                            <span class="nav_name">Laporan</span> 
                        </a>
                        <br><br><br>
                        <a class="nav_link" style="margin-top:270px;" href="{{url('/login')}}"> 
                            <i class='bx bx-log-out nav_icon'></i> 
                            <span class="nav_name">Log Out</span> 
                        </a>
                </div>
            </div> 
        </nav>
    </div>

    <div>
            <div class="row-inline" style="margin-top:90px;">
                <div class="flex-container">
                    <div class="card mb-4" style="border-radius: 10px; width:25%; margin-left:60px; background-color:#FFA63E">
                    <div class="card-body" style="
                        box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);
                        border-radius: 10px;">
                        <div class="row align-items-start" align="center" >
                            <div class="row">
                                <img class="img" style="width:30%; margin-left:95px;margin-top:10px;" src="images/book.png"/>
                            </div>
                            <div class="row" style="line-height:2px; color:white;">
                                <h5 class="mt-1"><p>Laporan Penjualan</p></h5>
                            </div>
                            <div class="row" style="width:40%; margin-left:80px;">
                                <button class="btn-laporan">Check</button>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="card mb-4" style="border-radius: 10px; width:25%;  margin-left:70px;  background-color:#6BCC92">
                    <div class="card-body" style="
                        box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);
                        border-radius: 10px;">
                        <div class="row align-items-start" align="center" >
                            <div class="row">
                                <img class="img" style="width:30%; margin-left:95px;margin-top:10px;" src="images/book.png"/>
                            </div>
                            <div class="row" style="line-height:2px; color:white; margin-left:4px">
                                <h5 class="mt-1"><p>Laporan Pendapatan</p></h5>
                            </div>
                            <div class="row" style="width:40%; margin-left:80px;">
                                <button class="btn-laporan">Check</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4" style="border-radius: 10px; width:25%;  margin-left:70px;  background-color:#E13535">
                    <div class="card-body" style="
                        box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);
                        border-radius: 10px;">
                        <div class="row align-items-start" align="center" >
                            <div class="row">
                                <img class="img" style="width:30%; margin-left:95px;margin-top:10px;" src="images/book.png"/>
                            </div>
                            <div class="row" style="line-height:2px; color:white; margin-left:1px;">
                                <h5 class="mt-1"><p>Laporan Pengeluaran</p></h5>
                            </div>
                            <div class="row" style="width:40%; margin-left:80px;">
                                <button class="btn-laporan">Check</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="footer" style="bottom:-320px">
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