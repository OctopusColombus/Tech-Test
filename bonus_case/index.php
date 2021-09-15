<?php  
session_start();  
  
if(!$_SESSION['username'])  
{  
  
    header("Location: login.php");//redirect to the login page to secure the welcome page without login access.  
}  
  
?> 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Referensi > Instansi</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<style>
.center {
    margin: auto;
    width: 60%;
    padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.hideform {
    display: none;
}
table tr {
  counter-increment: row-num;
}
table tr td:first-child::before {
    content: counter(row-num) " ";
}
}
</style>
<body id="page-top">

    <!-- Page Wrapper -->
     <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                </nav>
        <!-- End of Content Wrapper -->
 <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Referensi > Instansi</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#jurusan">
                                        <span class="text">Tambah Data</span></a>
                            <a class="btn-lg btn-danger btn-icon-split nav-link text-right" href="logout.php" >
                          Logout</a>
                        </div>
<!-- Modal -->
<div class="modal fade" id="jurusan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <span>Tambah Data Pekerjaan</span>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
              <div class="modal-body">
                <form method="POST" id="reset" >
                          <div class="form-group">
                          <label>Instansi</label>
                          <input type="text" name="instansi" class="form-control">     
                          </div>
                          <div class="form-group">
                          <label>Deskripsi</label>
                          <textarea class="form-control"  name="deskripsi"></textarea>                  
                          </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                              </div>
                      </form>
                      <?php
                    include('services\config.php');
                    if(isset($_POST['submit'])){
                        $instansi=$_POST['instansi'];
                        $deskripsi=$_POST['deskripsi'];
                        $insert="SELECT nama from instansi where nama='$instansi'";
                        $run=mysqli_query($conn,$insert);
                        $a=mysqli_fetch_assoc($run);
                        $cek=$a['nama'];                      
                        if($cek !== $instansi){
                            $insert="insert into instansi(nama,deskripsi) values ('$instansi','$deskripsi')";
                            $ins=mysqli_query($conn,$insert);
                            echo '<script>alert("Data Berhasil Ditambahkan")</script>';
                        }
                        else{
                            echo '<script>alert("Data Gagal Ditambahkan")</script>';

                        }

                                                                                                                 }
                        ?>
                    </div>
                              
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Instansi</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      include('services\config.php');
                                      $sql="SELECT * from instansi";
                                      $query = mysqli_query($conn, $sql);
                                      while($row = mysqli_fetch_array($query)){

                                  ?>    
                                   <tr>
                                        <td></td>
                                        <td><a href="hapus.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Anda yakin mau menghapus data ini ?')"><i class="fas fa-trash"></i></a>
                                        </td>
                                        <td><?php echo $row['nama'] ?></td>
                                        <td><?php echo $row['deskripsi'] ?></td>
                                        
                                        
                                   </tr>
                                   <?php 
                               }
                                   ?>
                             </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
        <!-- End of Sidebar -->
                <!-- Begin Page Content -->
               

       <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script type="text/javascript">
    $('#jurusan').on('hidden.bs.modal', function () {
    $('#jurusan form')[0].reset();
    });
    </script>
</body>

</html>