<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bonus Test</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">    
                <div class="row">
                    <div class="col-lg-7" style="width:400; margin:0 auto;">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                            </div>
                            <form method="POST" >
                
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama" placeholder="Masukkan Nama Anda" class="form-control">
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="user" class="form-control form-control-user"
                    placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="pass" class="form-control"
                    placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input type="password" name="passcek" class="form-control"
                    placeholder="Konfirmasi Password">
                </div>
                <button type="submit" name="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>
                <a class="btn btn-danger" href="index.php">Kembali</a>

              </form>
                          </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <?php
      include('services/config.php');
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $passcek = $_POST['passcek'];
        $query="SELECT * from user where username = '$user'";
        $run = mysqli_query($conn,$query);
        $fetch = mysqli_fetch_assoc($run);
        $cek = $fetch['username'];

        if ($cek == $user){
            echo "<script>alert('User Telah Terdaftar, Silahkan Login');</script>"; 
            echo "<script>window.open('login.php','_self')</script>";  
        }
        elseif ($pass !== $passcek){
            echo "<script>alert('Password harus sama!');</script>"; 
        }
        else{
            $sql = "INSERT INTO user (username, password, nama_user) values ('$user','$pass','$nama') ";
            $insert = mysqli_query($conn,$sql);
            echo "<script>window.open('login.php','_self')</script>";  
        }


    }


    ?>

</body>

</html>