<?php 
include_once('../koneksi.php');
class dosen_wali extends database{
    var $table = 'dosen_wali';

    function tambah_data($id_user,$nidn_dsn_wali,$prodi_dsn_wali,$kelas_wali,$ttd_dsn_wali)
	{
		mysqli_query($this->koneksi,"INSERT INTO $this->table (id_user, nidn_dsn_wali, prodi_dsn_wali, kelas_wali, ttd_dsn_wali) VALUES ('$id_user', '$nidn_dsn_wali', '$prodi_dsn_wali', '$kelas_wali', '$ttd_dsn_wali')");
	}

    function get_by_id($id_dosen)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM $this->table WHERE id_dosen='$id_dosen'");
		return $query->fetch_array();
	}

    function update_data($id_dosen, $id_user,$nidn_dsn_wali,$prodi_dsn_wali,$kelas_wali,$ttd_dsn_wali)
	{
		
		$ttd_dsn_wali = mysqli_real_escape_string($this->koneksi, $ttd_dsn_wali);
		
		mysqli_query($this->koneksi,
		"UPDATE $this->table SET 
		id_user='$id_user',
		nidn_dsn_wali='$nidn_dsn_wali',
		prodi_dsn_wali='$prodi_dsn_wali',
		kelas_wali='$kelas_wali',
		ttd_dsn_wali='$ttd_dsn_wali'
		WHERE id_dosen='$id_dosen'");
	}

    function delete_data($id_dosen)
    {
        mysqli_query($this->koneksi,"DELETE FROM $this->table WHERE id_dosen='$id_dosen'");
    }
}

?>