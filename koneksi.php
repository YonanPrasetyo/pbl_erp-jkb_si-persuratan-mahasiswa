<?php 
class database{

	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "pbl";
	var $koneksi = "";
	var $query = [];
	

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}

		$this->create_database();
	}

	function create_database(){

		/* 
		1. permission DONE
		2. roles DONE
		3. roles_permissions DONE
		4. user DONE
		5. admin DONE
		6. mahasiswa DONE
		7. pelapor DONE
		8. bagian_perpustakaan DONE
		9. bagian_keuangan DONE
		10. dosen_wali 
		11. ketua_jurusan
		12. surat
		*/

		$this->query = 
		["CREATE TABLE IF NOT EXISTS `Permission`(
			`kode_perm` varchar(25) NOT NULL,
			`perm_desc` varchar(255) NOT NULL,
			PRIMARY KEY (`kode_perm`)
		)",
		"CREATE TABLE IF NOT EXISTS `Roles`(
			`kode_role` varchar(25) NOT NULL,
			`nama_role` varchar(255) NOT NULL,
			`role_desc` varchar(255) NOT NULL,
			PRIMARY KEY (`kode_role`)
		)",
		"CREATE TABLE IF NOT EXISTS `Roles_Permissions`(
			`kode_role` varchar(25) NOT NULL,
			`kode_perm` varchar(25) NOT NULL,
			FOREIGN KEY (`kode_role`) REFERENCES `Roles`(`kode_role`),
			FOREIGN KEY (`kode_perm`) REFERENCES `Permission`(`kode_perm`)
		)",
		"CREATE TABLE IF NOT EXISTS `User`(
			`id_user` int NOT NULL AUTO_INCREMENT,
			`kode_role` varchar(25) NOT NULL,
			`username` varchar(225) NOT NULL,
			`email` varchar(255) NOT NULL,
			`password` varchar(255) NOT NULL,
			PRIMARY KEY (`id_user`),
			FOREIGN KEY (`kode_role`) REFERENCES `Roles`(`kode_role`)
		)",
		"CREATE TABLE IF NOT EXISTS `Admin`(
			`id_admin` int NOT NULL AUTO_INCREMENT,
			`id_user` int NOT NULL,
			`nip_admin` int NOT NULL,
			PRIMARY KEY (`id_admin`),
			FOREIGN KEY (`id_user`) REFERENCES `User`(`id_user`)
		)",
		"CREATE TABLE IF NOT EXISTS `Mahasiswa`(
			`id_mhs` int NOT NULL AUTO_INCREMENT,
			`id_user` int NOT NULL,
			`nim` int NOT NULL,
			`kelas_mhs` varchar(225) NOT NULL,
			`prodi_mhs` varchar(255) NOT NULL,
			`ttd_mhs` blob NOT NULL,
			PRIMARY KEY (`id_mhs`),
			FOREIGN KEY (`id_user`) REFERENCES `User`(`id_user`)
		)",
		"CREATE TABLE IF NOT EXISTS `Pelapor`(
			`id_pelapor` int NOT NULL AUTO_INCREMENT,
			`id_user` int NOT NULL,
			`nidn_pelapor` int NOT NULL,
			`prodi_pelapor` varchar(225) NOT NULL,
			`ttd_pelapor` blob NOT NULL,
			PRIMARY KEY (`id_pelapor`),
			FOREIGN KEY (`id_user`) REFERENCES `User`(`id_user`)
		)",
		"CREATE TABLE IF NOT EXISTS `Bagian_Perpustakaan`(
			`id_bag_perpustakaan` int NOT NULL AUTO_INCREMENT,
			`id_user` int NOT NULL,
			`nip_perpus` int NOT NULL,
			`ttd_perpus` blob NOT NULL,
			PRIMARY KEY (`id_bag_perpustakaan`),
			FOREIGN KEY (`id_user`) REFERENCES `User`(`id_user`)
		)",
		"CREATE TABLE IF NOT EXISTS `Bagian_Keuangan`(
			`id_bag_keuangan` int NOT NULL AUTO_INCREMENT,
			`id_user` int NOT NULL,
			`nip_keuangan` int NOT NULL,
			`ttd_keuangan` blob NOT NULL,
			PRIMARY KEY (`id_bag_keuangan`),
			FOREIGN KEY (`id_user`) REFERENCES `User`(`id_user`)
		)",
		"CREATE TABLE IF NOT EXISTS `Dosen_Wali`(
			`id_dosen` int NOT NULL AUTO_INCREMENT,
			`id_user` int NOT NULL,
			`nidn_dsn_wali` int NOT NULL,
			`prodi_dsn_wali` varchar(225) NOT NULL,
			`kelas_wali` varchar(255) NOT NULL,
			`ttd_dsn_wali` blob NOT NULL,
			PRIMARY KEY (`id_dosen`),
			FOREIGN KEY (`id_user`) REFERENCES `User`(`id_user`)
		)",
		"CREATE TABLE IF NOT EXISTS `Ketua_Jurusan`(
			`id_kajur` int NOT NULL AUTO_INCREMENT,
			`id_user` int NOT NULL,
			`nidn_kajur` int NOT NULL,
			`ttd_kajur` blob NOT NULL,
			PRIMARY KEY (`id_kajur`),
			FOREIGN KEY (`id_user`) REFERENCES `User`(`id_user`)
		)",
		"CREATE TABLE IF NOT EXISTS `Surat`(
			`id_surat` int NOT NULL AUTO_INCREMENT,
			`id_mhs` int NOT NULL,
			`id_pelapor` int NOT NULL,
			`id_bag_perpustakaan` int NOT NULL,
			`id_bag_keuangan` int NOT NULL,
			`id_dosen` int NOT NULL,
			`id_kajur` int NOT NULL,
			`nama_surat` varchar(225) NOT NULL,
			`tgl_surat` varchar(255) NOT NULL,
			`no_surat` int NOT NULL,
			PRIMARY KEY (`id_surat`),
			FOREIGN KEY (`id_mhs`) REFERENCES `Mahasiswa`(`id_mhs`),
			FOREIGN KEY (`id_pelapor`) REFERENCES `Pelapor`(`id_pelapor`),
			FOREIGN KEY (`id_bag_perpustakaan`) REFERENCES `Bagian_Perpustakaan`(`id_bag_perpustakaan`),
			FOREIGN KEY (`id_bag_keuangan`) REFERENCES `Bagian_Keuangan`(`id_bag_keuangan`),
			FOREIGN KEY (`id_dosen`) REFERENCES `Dosen_Wali`(`id_dosen`),
			FOREIGN KEY (`id_kajur`) REFERENCES `Ketua_Jurusan`(`id_kajur`)
		)"];

		foreach ($this->query as $table) {
			if (!mysqli_query($this->koneksi, $table)) {
				echo "Error creating table: " . mysqli_error($this->koneksi);
			}
		}
	}

	function data($table, $join_table = null, $primary = null)
	{
		$isi = false;
		$query = "SELECT * FROM $table ";

		if ($join_table && $primary) {
			$query .= "INNER JOIN $join_table on $table.$primary=$join_table.$primary";
		}

		$data = mysqli_query($this->koneksi, $query);
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
			$isi = true;
		}
		if ($isi) {
			return $hasil;
		}
	}
}
?>