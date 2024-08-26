<?php 
include('conn.php');
$koneksi = new roles_permissions();


$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_data($_POST['kode_role'],$_POST['kode_perm']);
}
elseif($action=="delete")
{
	$kode_role = $_GET['kode_role'];
	$kode_perm = $_GET['kode_perm'];
	$koneksi->delete_data($kode_role, $kode_perm);
}
header('location:tampil.php');
?>