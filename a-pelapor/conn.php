<?php 
include_once('../koneksi.php');
class pelapor extends database{
    var $table = 'pelapor';

    function tambah_data($id_user, $nidn_pelapor, $prodi_pelapor, $ttd_pelapor)
	{
		mysqli_query($this->koneksi,"INSERT INTO $this->table (id_user, nidn_pelapor, prodi_pelapor, ttd_pelapor) VALUES ('$id_user', '$nidn_pelapor', '$prodi_pelapor', '$ttd_pelapor')");
	}

    function get_by_id($id_pelapor)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM $this->table WHERE id_pelapor='$id_pelapor'");
		return $query->fetch_array();
	}

    function update_data($id_pelapor, $id_user, $nidn_pelapor, $prodi_pelapor, $ttd_pelapor)
	{	
		$ttd_pelapor = mysqli_real_escape_string($this->koneksi, $ttd_pelapor);

		mysqli_query($this->koneksi,
		"UPDATE $this->table SET 
		id_user='$id_user',
		nidn_pelapor='$nidn_pelapor',
		prodi_pelapor='$prodi_pelapor',
		ttd_pelapor='$ttd_pelapor'
		WHERE id_pelapor='$id_pelapor'");
	}

    function delete_data($id_pelapor)
    {
        mysqli_query($this->koneksi,"DELETE FROM $this->table WHERE id_pelapor='$id_pelapor'");
    }
}

?>