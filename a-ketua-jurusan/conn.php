<?php 
include_once('../koneksi.php');
class ketua_jurusan extends database{
    var $table = 'ketua_jurusan';

    function tambah_data($id_user, $nidn_kajur, $ttd_kajur)
	{
		mysqli_query($this->koneksi,"INSERT INTO $this->table (id_user, nidn_kajur, ttd_kajur) VALUES ('$id_user', '$nidn_kajur', '$ttd_kajur')");
	}

    function get_by_id($id_kajur)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM $this->table WHERE id_kajur='$id_kajur'");
		return $query->fetch_array();
	}

    function update_data($id_kajur, $id_user, $nidn_kajur, $ttd_kajur)
	{	
		$ttd_kajur = mysqli_real_escape_string($this->koneksi, $ttd_kajur);

		mysqli_query($this->koneksi,
		"UPDATE $this->table SET 
		id_user='$id_user',
		nidn_kajur='$nidn_kajur',
		ttd_kajur='$ttd_kajur'
		WHERE id_kajur='$id_kajur'");
	}

    function delete_data($id_kajur)
    {
        mysqli_query($this->koneksi,"DELETE FROM $this->table WHERE id_kajur='$id_kajur'");
    }
}

?>