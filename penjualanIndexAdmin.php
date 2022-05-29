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
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

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
                    <span class="nav_logo-name">Admin</span> 
                </a>
                <div class="nav_list"> 
                        <a  class="nav_link"> 
                            <i class='bx bx-home nav_icon'></i> 
                            <span class="nav_name">Beranda</span> 
                        </a>
                        <a  class="nav_link"> 
                            <i class='bx bx-user nav_icon'></i> 
                            <span class="nav_name">Pegawai</span> 
                        </a> 
                        <a class="nav_link"> 
                            <i class='bx bx-clipboard nav_icon'></i> 
                            <span class="nav_name">Produk</span> 
                        </a> 
                        <a  class="nav_link active"> 
                            <i class='bx bx-money nav_icon'></i> 
                            <span class="nav_name">Penjualan</span> 
                        </a> 
                        <a class="nav_link"> 
                            <i class='bx bx-money nav_icon'></i> 
                            <span class="nav_name">Pengeluaran</span> 
                        </a> 
                        <a  class="nav_link"> 
                            <i class='bx bx-book nav_icon'></i> 
                            <span class="nav_name">Laporan</span> 
                        </a>
                        <br><br><br>
                        <a href="" class="nav_link" style="margin-top:20px;" href="{{url('/login')}}"> 
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
                                        <div align="right">
                                        <input class="btn btn-success" type="submit" name="add" value="New Report" style="width:10%;margin-left:40px;background-color:#3699FF">
                                        <input class="btn btn-success" type="submit" name="add" value="Create" style="width:10%;margin-left:20px;background-color:#F64E60">
                                        </div>
                                        <table id="myTable" class="table table-hover" >
                                            <thead >
                                                <tr align="center" bgcolor='#F3F6F9'>
                                                    <th>Tanggal</th>
                                                    <th>ID Penjualan</th>
                                                    <th>Pembeli</th>
                                                    <th>ID Barang</th>
                                                    <th>Qty</th>
                                                    <th>Harga</th>
                                                    <th>Action</th>
                                                    <th>Struk</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr align="center" style="color:grey; font-weight:100; width:100%;">
                                                <th>01/02/2022</th>
                                                <th>P001</th>
                                                <th>Customer 1</th>
                                                <th>B001</th>
                                                <th>2</th>
                                                <th>Rp.20.000</th>
                                                <th>
                                                    <button type="button" class="btn btn-primary" style="background-color: #3734A9;"><i class="fas fa-search"></i></button>
                                                    <button type="button" class="btn btn-warning" style="background-color: #E15B29;"><i class="fa fa-pencil" style="color: white;"></i></button>
                                                    <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                </th>
                                                <th>
                                                    <button type="button" class="btn btn-primary" style="background-color: #C9F7F5; color:#1BC5BD">Print</button>
                                                    
                                                </th>
                                            </tr>
                                            <tr align="center" style="color:grey; font-weight:100; width:100%;">
                                                <th>02/02/2022</th>
                                                <th>P002</th>
                                                <th>Customer 2</th>
                                                <th>B002</th>
                                                <th>1</th>
                                                <th>Rp.30.000</th>
                                                <th>
                                                    <button type="button" class="btn btn-primary" style="background-color: #3734A9;"><i class="fas fa-search"></i></button>
                                                    <button type="button" class="btn btn-warning" style="background-color: #E15B29;"><i class="fa fa-pencil" style="color: white;"></i></button>
                                                    <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                </th>
                                                <th>
                                                    <button type="button" class="btn btn-primary" style="background-color: #C9F7F5; color:#1BC5BD;">Print</button>
                                                    
                                                </th>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr align="center" bgcolor='#F3F6F9'>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Total Penjualan</th>
                                                    <th>Rp.50.000</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer" style="bottom:-130px">
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