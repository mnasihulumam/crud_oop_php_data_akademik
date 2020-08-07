<?php
          include "konek.php";
          
          EXTRACT($_GET);
          
          if(isset($mk))
          {
            $qry  = mysqli_query($koneksi,"SELECT * FROM matkul WHERE kd_matkul='$mk'");
            $data_matkul  = mysqli_fetch_array($qry);
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

  <div class="row no-gutters mt-3"> 
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
          <a class="nav-link active" href="tampil_dataMK.php"><i class="fas fa-chalkboard-teacher mr-2"></i> Data Mata Kuliah</a><hr class="bg-secondary"></hr>
        </li>
        </ul>
      </div>
      <div class="col-md-10 mt-5">
        <div id="content">
  <div class="container-fluid" style="padding-bottom: 450px;">
     <div class="alert alert-dark">
              <h1>Edit Data Mata Kuliah</h1>
            </div>
            <hr class="bg-secondary"></hr>
          <form method="post" action="proses_mk.php?action=update">
            <div class="form-group">
               <label for="">Kode Mata Kuliah</label>
               <input type="text" name="kd_matkul" readonly class="form-control" value="<?php echo $data_matkul['kd_matkul']; ?>"/>
            </div>
            <div class="form-group">
                <label for="">Nama Mata Kuliah</label>
                <input type="text" name="nama_matkul" value="<?php echo $data_matkul['nama_matkul']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Hari</label><br>
              <select name="hari" class="form-control">
                <option value="Senin" <?php if($data_matkul['hari']=='Senin') echo 'selected' ?>>Senin</option>
                <option value="Selasa" <?php if($data_matkul['hari']=='Selasa') echo 'selected' ?>>Selasa</option>
                <option value="Rabu" <?php if($data_matkul['hari']=='Rabu') echo 'selected' ?>>Rabu</option>
                <option value="Kamis" <?php if($data_matkul['hari']=='Kamis') echo 'selected' ?>>Kamis</option>
                <option value="Jumat" <?php if($data_matkul['hari']=='Jumat') echo 'selected' ?>>Jumat</option>
                <option value="Sabtu" <?php if($data_matkul['hari']=='Sabtu') echo 'selected' ?>>Sabtu</option>
                <option value="Minggu" <?php if($data_matkul['hari']=='Minggu') echo 'selected' ?>>Minggu</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Nama Dosen</label><br>
              <select name=nip class="form-control">
                <option disabled selected>Pilih</option>
                <?php
                  $q_ag = mysqli_query($koneksi,"SELECT * FROM dosen");
                  while($dt_ag = mysqli_fetch_array($q_ag))
                  {
                    echo "<option value=$dt_ag[nip]>$dt_ag[nip] - $dt_ag[nama]</option>";
                  }
                ?>
              </select>
              <p style="color: red; font-size: 13px; font-style: italic; " >* Mohon Pilih Ulang Kembali Nama Dosennnya</p>
            </div>
            <div class="form-group">
              <button type="submit" name="tombol" class="btn btn-primary">Update</button> <button class="btn btn-warning"><a href="tampil_dataMK.php" style="text-decoration: none;">Kembali</a></button>
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