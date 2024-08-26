<?php 
include_once('../koneksi.php');
class roles_permissions extends database{
    var $table = 'roles_permissions';

    function tambah_data($kode_role, $kode_perm)
	{
		mysqli_query($this->koneksi,"INSERT INTO $this->table (kode_role, kode_perm) VALUES ('$kode_role', '$kode_perm')");
    }

    function delete_data($kode_role, $kode_perm)
    {
        mysqli_query($this->koneksi,"DELETE FROM $this->table WHERE kode_role='$kode_role' AND kode_perm='$kode_perm'");
    }
}

?>