<?php 
  session_start();
  if(isset($_SESSION['user_aktiv'])){
  extract($_GET);  
  include('config.php');
  $db = new database();
  $data_mk = $db->tampil_dataMK();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">

    <title>Data Akademik | Data Mata Kuliah</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <a class="navbar-brand" href="#">Selamat Datang Admin | UNIVERSITAS KUNINGAN</a>
      <form class="form-inline my-2 my-lg-0 ml-auto">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <div class="icon ml-4">
        <h5>
          <a href="logout.php" style="color: black;"><i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Sign Out"></i></a>
        </h5>
      </div>
    </div>
  </nav>

  <div class="row no-gutters mt-5"> 
      <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
        <ul class="nav flex-column ml-3 mb-5">
        <li class="nav-item">
          <a class="nav-link text-white" href="dashboard.php"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a> <hr class="bg-secondary"></hr>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="tampil_dataMHS.php"><i class="fas fa-user-graduate mr-2"></i> Data Mahasiswa</a><hr class="bg-secondary"></hr>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="tampil_dataDSN.php"><i class="fas fa-chalkboard-teacher mr-2"></i> Data Dosen</a><hr class="bg-secondary"></hr>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="tampil_dataMK.php"><i class="far fa-calendar-alt mr-2"></i> Data Mata Kuliah</a><hr class="bg-secondary"></hr>
        </li>
        </ul>
      </div>
      <div class="col-md-10 mt-3">
        <div id="content">
          <div class="container-fluid" style="padding-bottom: 450px;">
            <div class="alert alert-dark">
              <h1>Data Mata Kuliah</h1>
            </div>
            <hr class="bg-secondary"></hr>
              <a href="tambah_dataMK.php" class="btn-warning pr-3 pl-3" style="border-radius: 5px;">Tambah Data</a>
                  <table class="table">
            <thead>
              <tr class="btn-primary">
                <th>Kode Matkul</th>
                <th>Nama Matkul</th>
                <th>Hari</th>
                <th>Nama Dosen</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $no = 1;
                foreach($data_mk as $row){
              ?>
              <tr>
                <td><?php echo $row['kd_matkul']; ?></td>
                <td><?php echo $row['nama_matkul']; ?></td>
                <td><?php echo $row['hari']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td>
                  <a href="proses_mk.php?action=delete&mk=<?php echo $row['kd_matkul']; ?>" class="badge badge-danger" >Delete</a>
                  <a href="edit_mk.php?mk=<?php echo $row['kd_matkul']; ?>" class="badge badge-success">Edit</a>
                </td>
              </tr>

              <?php 
                }
                ?>  
            </tbody>
          </table>
          </div>
        </div>
<!--Footer-part-->
        <?php include 'footer.php'; ?>
      </div>
  </div>   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="admin.js"></script>
  </body>
</html>
<?PHP
}
else
{
  header('Location: index.php'); exit;
}
?>