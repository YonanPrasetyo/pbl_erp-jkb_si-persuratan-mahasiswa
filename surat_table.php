<?php 
include_once('koneksi.php');
class surat extends database{
    var $table = 'surat';
    function tampil_data()
	{
		$data = mysqli_query($this->koneksi,"SELECT * FROM $this->table");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

    function tambah_data($id_mhs,$id_pelapor,$id_bag_perpustakaan,$id_bag_keuangan,$id_dosen,$id_kajur,$nama_surat,$tgl_surat,$no_surat)
	{
		mysqli_query($this->koneksi,
        "INSERT INTO $this->table 
        (id_mhs, 
        id_pelapor, 
        id_bag_perpustakaan, 
        id_bag_keuangan, 
        id_dosen, 
        id_kajur, 
        nama_surat, 
        tgl_surat, 
        no_surat) 
        VALUES 
        ('$id_mhs', 
        '$id_pelapor', 
        '$id_bag_perpustakaan', 
        '$id_bag_keuangan', 
        '$id_dosen', 
        '$id_kajur', 
        '$nama_surat', 
        '$tgl_surat', 
        '$no_surat')");
	}

    function get_by_id($id_surat)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM $this->table WHERE id_surat='$id_surat'");
		return $query->fetch_array();
	}

    function update_data($id_mhs,$id_pelapor,$id_bag_perpustakaan,$id_bag_keuangan,$id_dosen,$id_kajur,$nama_surat,$tgl_surat,$no_surat,$id_surat)
	{
		mysqli_query($this->koneksi,
		"UPDATE $this->table SET 
		id_mhs = '$id_mhs', 
        id_pelapor = '$id_pelapor', 
        id_bag_perpustakaan = '$id_bag_perpustakaan', 
        id_bag_keuangan = '$id_bag_keuangan', 
        id_dosen = '$id_dosen', 
        id_kajur = '$id_kajur', 
        nama_surat = '$nama_surat', 
        tgl_surat = '$tgl_surat', 
        no_surat = '$no_surat'
		WHERE id_surat='$id_surat'");
	}

    function delete_data($id_surat)
    {
        mysqli_query($this->koneksi,"DELETE FROM $this->table WHERE id_surat='$id_surat'");
    }
}

?>