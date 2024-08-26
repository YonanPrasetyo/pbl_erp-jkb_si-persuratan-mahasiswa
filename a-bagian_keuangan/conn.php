<?php 
include_once('../koneksi.php');
class bagian_keuangan extends database{
    var $table = 'bagian_keuangan';

    function tambah_data($id_user, $nip_keuangan, $ttd_keuangan)
	{
		mysqli_query($this->koneksi,"INSERT INTO $this->table (id_user, nip_keuangan, ttd_keuangan) VALUES ('$id_user', '$nip_keuangan', '$ttd_keuangan')");
	}

    function get_by_id($id_bag_keuangan)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM $this->table WHERE id_bag_keuangan='$id_bag_keuangan'");
		return $query->fetch_array();
	}

    function update_data($id_bag_keuangan, $id_user, $nip_keuangan, $ttd_keuangan)
	{	
		$ttd_keuangan = mysqli_real_escape_string($this->koneksi, $ttd_keuangan);

		mysqli_query($this->koneksi,
		"UPDATE $this->table SET 
		id_user='$id_user',
		nip_keuangan='$nip_keuangan',
		ttd_keuangan='$ttd_keuangan'
		WHERE id_bag_keuangan='$id_bag_keuangan'");
	}

    function delete_data($id_bag_keuangan)
    {
        mysqli_query($this->koneksi,"DELETE FROM $this->table WHERE id_bag_keuangan='$id_bag_keuangan'");
    }
}

?>