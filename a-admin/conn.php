<?php 
include_once('../koneksi.php');
class admin extends database{
    var $table = 'admin';

    function tambah_data($id_user, $nip_admin)
	{
		mysqli_query($this->koneksi,"INSERT INTO $this->table (id_user, nip_admin) VALUES ('$id_user','$nip_admin')");
	}

    function get_by_id($id_admin)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM $this->table WHERE id_admin='$id_admin'");
		return $query->fetch_array();
	}

    function update_data($id_admin, $id_user, $nip_admin)
	{	
		mysqli_query($this->koneksi,
		"UPDATE $this->table SET 
		id_user='$id_user',
		nip_admin='$nip_admin'
		WHERE id_admin='$id_admin'");
	}

    function delete_data($id_admin)
    {
        mysqli_query($this->koneksi,"DELETE FROM $this->table WHERE id_admin='$id_admin'");
    }
}

?>