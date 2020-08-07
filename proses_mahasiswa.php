<?php 
	include('config.php');
	$koneksi = new database();
	 
	$action = $_GET['action'];
	if($action == "add")
	{
		$koneksi->tambah_dataMHS($_POST['nim'],$_POST['nama'],$_POST['jk'],$_POST['alamat']);
		header('location:tampil_dataMHS.php');
	}
	elseif($action=="update")
	{
		$koneksi->update_dataMHS($_POST['nama'],$_POST['jk'],$_POST['alamat'],$_POST['nim']);
		header('location:tampil_dataMHS.php');
	}
	elseif($action=="delete")
	{
		$nim = $_GET['id'];
		$koneksi->delete_dataMHS($nim);
		header('location:tampil_dataMHS.php');
	}
?>