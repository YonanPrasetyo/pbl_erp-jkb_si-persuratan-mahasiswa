<?php 
include('user_table.php');
$koneksi = new user();


$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_data($_POST['kode_role'],$_POST['username'],$_POST['email'],$_POST['password']);
}
elseif($action=="update")
{
	$koneksi->update_data($_POST['kode_role'],$_POST['username'],$_POST['email'],$_POST['password'],$_POST['id_user']);
}
elseif($action=="delete")
{
	$id = $_GET['id'];
	$koneksi->delete_data($id);
}
header('location:user_tampil_data.php');
?>