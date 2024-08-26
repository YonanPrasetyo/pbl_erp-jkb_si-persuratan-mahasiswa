<?php 
include_once('../koneksi.php');
class bagian_perpustakaan extends database{
    var $table = 'bagian_perpustakaan';

    function tambah_data($id_user, $nip_perpus, $ttd_perpus)
	{
		mysqli_query($this->koneksi,"INSERT INTO $this->table (id_user, nip_perpus, ttd_perpus) VALUES ('$id_user', '$nip_perpus', '$ttd_perpus')");
	}

    function get_by_id($id_bag_perpustakaan)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM $this->table WHERE id_bag_perpustakaan='$id_bag_perpustakaan'");
		return $query->fetch_array();
	}

    function update_data($id_bag_perpustakaan, $id_user, $nip_perpus, $ttd_perpus)
	{	
		$ttd_perpus = mysqli_real_escape_string($this->koneksi, $ttd_perpus);

		mysqli_query($this->koneksi,
		"UPDATE $this->table SET 
		id_user='$id_user',
		nip_perpus='$nip_perpus',
		ttd_perpus='$ttd_perpus'
		WHERE id_bag_perpustakaan='$id_bag_perpustakaan'");
	}

    function delete_data($id_bag_perpustakaan)
    {
        mysqli_query($this->koneksi,"DELETE FROM $this->table WHERE id_bag_perpustakaan='$id_bag_perpustakaan'");
    }
}

?>