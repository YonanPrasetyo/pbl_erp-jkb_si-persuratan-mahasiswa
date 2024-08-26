<?php 
include_once('../koneksi.php');
class user extends database{
    var $table = 'user';

    function tambah_data($kode_role,$username,$email,$password)
	{
		mysqli_query($this->koneksi,"INSERT INTO $this->table (kode_role, username, email, password) VALUES ('$kode_role', '$username', '$email', '$password')");
	}

    function get_by_id($id_user)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM $this->table WHERE id_user='$id_user'");
		return $query->fetch_array();
	}

    function update_data($kode_role,$username,$email,$password,$id_user)
	{
		mysqli_query($this->koneksi,
		"UPDATE $this->table SET 
		kode_role='$kode_role',
		username='$username',
		email='$email',
		password='$password'
		WHERE id_user='$id_user'");
	}

    function delete_data($id_user)
    {
        mysqli_query($this->koneksi,"DELETE FROM $this->table WHERE id_user='$id_user'");
    }
}

?>