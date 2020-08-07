<?php 
	include('config.php');
	$koneksi = new database();
	 
	$action = $_GET['action'];
	if($action == "add")
	{
		$koneksi->tambah_dataMK($_POST['kd_matkul'],$_POST['nama_matkul'],$_POST['hari'],$_POST['nip']);
		header('location:tampil_dataMK.php');
	} 
	elseif($action=="update")
	{
		$koneksi->update_dataMK($_POST['nama_matkul'],$_POST['hari'],$_POST['nip'],$_POST['kd_matkul']);
		header('location:tampil_dataMK.php');
	}
	elseif($action=="delete")
	{
		$kd_matkul = $_GET['mk'];
		$koneksi->delete_matkul($kd_matkul);
		header('location:tampil_dataMK.php');
	}
?>
