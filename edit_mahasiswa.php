<?php   
include('config.php');
$db = new database();
$nim = $_GET['id'];
if(! is_null($nim))
{
  $data_mahasiswa = $db->get_by_id($nim);
}
else
{
  header('location:tampil_dataMHS.php');
}
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

    <title>Data Akademik | Data Mahasiswa</title>
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

  <div class="row no-gutters mt-3"> 
      <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
        <ul class="nav flex-column ml-3 mb-5">
        <li class="nav-item">
          <a class="nav-link text-white" href="dashboard.php"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a> <hr class="bg-secondary"></hr>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-blue" href="tampil_dataMHS.php"><i class="fas fa-user-graduate mr-2"></i> Data Mahasiswa</a><hr class="bg-secondary"></hr>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="tampil_dataDSN.php"><i class="fas fa-chalkboard-teacher mr-2"></i> Data Dosen</a><hr class="bg-secondary"></hr>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="tampil_dataMK.php"><i class="far fa-calendar-alt mr-2"></i> Data Mata Kuliah</a><hr class="bg-secondary"></hr>
        </li>
        </ul>
      </div>
      <div class="col-md-10 mt-5">
        <div id="content">
  <div class="container-fluid" style="padding-bottom: 450px;">
    <div class="alert alert-dark">
              <h1>Edit Data Mahasiswa</h1>
            </div>
            <hr class="bg-secondary"></hr>
          <form method="post" action="proses_mahasiswa.php?action=update">
            <div class="form-group">
              <label for="">NIM</label>
               <input type="text" name="nim" readonly class="form-control" value="<?php echo $data_mahasiswa['nim']; ?>"/>
                </div>
                <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" name="nama" value="<?php echo $data_mahasiswa['nama']; ?>" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Jenis Kelamin</label>
                  <label><input type="radio" name="jk" value="L" <?php if($data_mahasiswa['jk']=='L') echo 'checked'  ?>>L</label>
                  <label><input type="radio" name="jk" value="P" <?php if($data_mahasiswa['jk']=='P') echo 'checked'  ?>>P</label>
                </div>
                <div class="form-group">
                  <label for="">Alamat</label>
                  <textarea name="alamat" id="" cols="" rows="3" class="form-control"><?php echo $data_mahasiswa['alamat']; ?></textarea>
                </div>
                <div class="form-group">
                <button type="submit" name="tombol" class="btn btn-primary">Update</button> <button class="btn btn-warning"><a href="tampil_dataMHS.php" style="text-decoration: none;">Kembali</a></button>
              </div>
           </form>   
        </div>
        </div>
      </div>
  </div>  
  <?php include 'footer.php'; ?> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="admin.js"></script>
  </body>
</html>