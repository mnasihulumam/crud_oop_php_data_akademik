<?php 
	class database{
	 
		var $host = "localhost";
		var $username = "root";
		var $password = "";
		var $database = "data_akademik";
		var $koneksi = "";
		function __construct(){
			$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
			if (mysqli_connect_errno()){
				echo "Koneksi database gagal : " . mysqli_connect_error();
			}
		}
	 	//Data Mahasiswa
		function tampil_dataMHS()
		{
			$data = mysqli_query($this->koneksi,"select * from mahasiswa");
			while($row = mysqli_fetch_array($data)){
				$hasil[] = $row;
			}
			return $hasil;
		}
		function tambah_dataMHS($nim,$nama,$jk,$alamat)
		{
			mysqli_query($this->koneksi,"INSERT INTO mahasiswa values ('$nim','$nama','$jk','$alamat')");
		}
		function get_by_id($nim)
		{
			$query = mysqli_query($this->koneksi,"SELECT * FROM mahasiswa WHERE nim=$nim");
			return $query->fetch_array();
		}
		function update_dataMHS($nama,$jk,$alamat,$nim)
		{
			$query = mysqli_query($this->koneksi,"UPDATE mahasiswa SET nama='$nama', jk='$jk',alamat='$alamat' WHERE nim='$nim'");
		}
		function delete_dataMHS($nim)
		{
			$query = mysqli_query($this->koneksi,"DELETE FROM mahasiswa WHERE nim=$nim");
		}
		//Data Dosen 
		function tampil_dataDSN()
		{
			$data = mysqli_query($this->koneksi,"select * from dosen");
			while($row = mysqli_fetch_array($data)){
				$hasil[] = $row;
			}
			return $hasil;
		}
		function tambah_dataDSN($nip,$nama,$jk,$agama,$alamat)	
		{
			mysqli_query($this->koneksi,"INSERT INTO dosen values ('$nip','$nama','$jk','$agama','$alamat')");
		}
		function get_by_kd($nip)
		{
			$query = mysqli_query($this->koneksi,"SELECT * FROM dosen WHERE nip=$nip");
			return $query->fetch_array();
		}
		function update_dataDSN($nama,$jk,$agama,$alamat,$nip)
		{
			$query = mysqli_query($this->koneksi,"UPDATE dosen SET nama='$nama', jk='$jk',agama='$agama', alamat='$alamat' WHERE nip='$nip'");
		}
		function delete_dataDSN($nip)
		{
			$query = mysqli_query($this->koneksi,"DELETE FROM dosen WHERE nip=$nip");
			if (!$query) {
				die(
				"
					<script>
					alert('Data Dosen Gagal Dihapus, Karena Dosen yang Anda Pilih Masih Memiliki Jadwal Mata Kuliah');
					history.go(-1);
					</script>
				");
 			}
		}
		//Data Matkul
		function tampil_dataMK(){
			$data = mysqli_query($this->koneksi,"SELECT * FROM dosen, matkul WHERE dosen.nip = matkul.nip");
			while($row = mysqli_fetch_array($data)){
				$hasil[] = $row;
			}
			return $hasil;
		}
		function tambah_dataMK($kd_matkul,$nama_matkul,$hari,$nip)
		{
			mysqli_query($this->koneksi,"INSERT INTO matkul values ('$kd_matkul','$nama_matkul','$hari','$nip')");
		}
		function update_dataMK($nama_matkul,$hari,$nip,$kd_matkul)
		{
			$query = mysqli_query($this->koneksi,"UPDATE matkul SET nama_matkul='$nama_matkul', hari='$hari',nip='$nip' WHERE kd_matkul='$kd_matkul'");
		}
		function delete_matkul($kd_matkul)
		{
			$query = mysqli_query($this->koneksi,'DELETE FROM matkul WHERE kd_matkul="'.$kd_matkul.'"');
		}
		function login(){
			$password = md5($password);
			$result = mysqli_query($this->koneksi,"SELECT id from user WHERE username = '$username' and password = '$password'");
			$user_data = mysqli_num_rows($result);
			if ($no_rows == 1) {
				$_SESSION['login'] = true;
				$_SESSION['id'] = $user_data['id'];
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	}
?>