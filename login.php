<?php
    include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tatitatu</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body style="background-color:#102456; background-size:cover;">
    <div class="container" style="width:380px; margin: auto;">
        <div class="header" class="input center search">
            <div class="form-box" style="display:inline-block; margin-top:120px; color:white;">
                <h2 align="center">Tatitatu</h2>
                <p align="center">Login and start managing your store!</p>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="username" name="username" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" >
                    </div>
                    <br>
                    <center><button type="submit" name="submit" class="btn-login" style="width:100%;height:45px;padding:10px 20px; color:white;background-color:#1BC5BD;text-decoration:none;border-radius:10px; border:white 1px solid">Login</button></center>   
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];  
        $password = pg_escape_string($_POST["password"]); 

        $query = pg_query($conn, "SELECT * FROM tabel_pegawai WHERE username = '$username'");  
       
        $result = pg_fetch_assoc($query);      
        
        if(password_verify($password, $result["password"]))  
        {
            if($result['id_role']=="1")
            {
                $_SESSION['username'] = $username;
                $_SESSION['id_role'] = "1";
                echo "<script>alert('Login Berhasil');window.location='berandaAdmin.php';</script>";
            }
            else if($result['id_role']=="2")
            {
                $_SESSION['username'] = $username;
                $_SESSION['id_role'] = "2";
                echo "<script>alert('Login Berhasil');window.location='berandaPemilik.php';</script>";
            }
            else if($result['id_role']=="3")
            {
                $_SESSION['username'] = $username;
                $_SESSION['id_role'] = "3";
                echo "<script>alert('Login Berhasil');window.location='berandaKasir.php';</script>";
            }
            else if($result['id_role']=="4")
            {
                $_SESSION['username'] = $username;
                $_SESSION['id_role'] = "4";
                echo "<script>alert('Login Berhasil');window.location='berandaProduksi.php';</script>";
            }
        }
    }   
    ?>
    <div class="gelombang">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#2083DF" fill-opacity="0.1" d="M0,96L48,85.3C96,75,192,53,288,64C384,75,480,117,576,138.7C672,160,768,160,864,154.7C960,149,1056,139,1152,138.7C1248,139,1344,149,1392,154.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#E5E5E5" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,170.7C384,181,480,171,576,144C672,117,768,75,864,53.3C960,32,1056,32,1152,58.7C1248,85,1344,139,1392,165.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    
</div>

</body>
</html>