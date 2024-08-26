<?php 
include_once('../koneksi.php');
class permission extends database{
    var $table = 'permission';

    function tambah_data($kode_perm, $perm_desc)
	{
		mysqli_query($this->koneksi,"INSERT INTO $this->table (kode_perm, perm_desc) VALUES ('$kode_perm', '$perm_desc')");
	}

    function get_by_id($kode_perm)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM $this->table WHERE kode_perm='$kode_perm'");
		return $query->fetch_array();
	}

    function update_data($kode_perm, $perm_desc)
	{	
		mysqli_query($this->koneksi,
		"UPDATE $this->table SET 
		perm_desc='$perm_desc'
		WHERE kode_perm='$kode_perm'");
	}

    function delete_data($kode_perm)
    {
        mysqli_query($this->koneksi,"DELETE FROM $this->table WHERE kode_perm='$kode_perm'");
    }
}

?>