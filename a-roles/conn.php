<?php 
include_once('../koneksi.php');
class roles extends database{
    var $table = 'roles';

    function tambah_data($kode_role, $nama_role, $role_desc)
	{
		mysqli_query($this->koneksi,"INSERT INTO $this->table (kode_role, nama_role, role_desc) VALUES ('$kode_role', '$nama_role', '$role_desc')");
	}

    function get_by_id($kode_role)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM $this->table WHERE kode_role='$kode_role'");
		return $query->fetch_array();
	}

    function update_data($kode_role, $nama_role, $role_desc)
	{	
		mysqli_query($this->koneksi,
		"UPDATE $this->table SET 
		nama_role='$nama_role',
		role_desc='$role_desc'
		WHERE kode_role='$kode_role'");
	}

    function delete_data($kode_role)
    {
        mysqli_query($this->koneksi,"DELETE FROM $this->table WHERE kode_role='$kode_role'");
    }
}

?>