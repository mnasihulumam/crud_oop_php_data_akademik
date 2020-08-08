<?php 
	include('config.php');
	$koneksi = new database();
		session_start();
		$_SESSION['user_aktiv'] = NULL;
		extract($_POST);
		include "konek.php";
					$password=md5($password);
					$qry	= mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");
					$jum	= mysqli_num_rows($qry);

					if ($jum == 1)
					{
						$data_admin	= mysqli_fetch_array($qry);
						$_SESSION['user_aktiv'] = $data_admin['username'];
						
						echo "<script>alert('Anda berhasil Log In');</script>";
						echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
					}
					else
					{
						echo "<meta http-equiv='refresh' content='0; url=index.php'>";
						echo "<script>alert('Anda Gagal Log In');</script>";
					}
?>
