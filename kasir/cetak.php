<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tatitatu</title>
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
<body>
    <div class="header" style="padding : 10px 16px 0 16px">
        <h2 style="color:#3E5569">Cetak Data Penjualan</h2>
        <p style="padding-bottom:20px; color:#A1AAB2">silahkan anda cetak data dibawah</p>
        <hr>
        <br>
        <div class="row justify-content-between">
            <div class="col-md-8"><h6 class="card-title"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> List Penjualan</h6>
            </div>
            <div class="col-md-4">
                <a style="width:100%;height:40px;margin-right:20px;background-color:#36BEA6" href="#" class="btn btn-success btn-block">
                    <i  class="mdi mdi-account-edit">
                    </i> Cetak Transaksi</a>
            </div>
            <h4>Nama Pelanggan : Pelanggan</h4>
            <h6>Tanggal Transaksi : 09-06-2022</h6>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Produk</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>PRO-0012706</td>
                        <td>TUNIC KRC 1/2</td>
                        <td>135000</td>
                        <td>1</td>
                        <td>135000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="text-align:right">
            <div class="alert alert-success"><h5 class="text-right">Total : Rp.135.000</h5> </div>
            <div class="alert alert-info"><h5 class="text-right">Diskon : 0%</h5> </div>
            <div class="alert alert-warning"><h5 class="text-right">Total Bayar : Rp.135.000</h5> </div>
        </div>
        <a href="">Keluar</a>
    </div>
    
</body>
</html>