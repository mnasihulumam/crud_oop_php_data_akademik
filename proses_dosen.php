<?php 
	include('config.php');
	$koneksi = new database();
	 
	$action = $_GET['action'];
	if($action == "add")
	{
		$koneksi->tambah_dataDSN($_POST['nip'],$_POST['nama'],$_POST['jk'],$_POST['agama'],$_POST['alamat']);
		header('location:tampil_dataDSN.php');
	} 
	elseif($action=="update")
	{
		$koneksi->update_dataDSN($_POST['nama'],$_POST['jk'],$_POST['agama'],$_POST['alamat'],$_POST['nip']);
		header('location:tampil_dataDSN.php');
	}
	elseif($action=="delete")
	{
		$nip = $_GET['kd'];
		$koneksi->delete_dataDSN($nip);
		header('location:tampil_dataDSN.php');
	}
?>
