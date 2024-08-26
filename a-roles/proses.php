<?php 
include('conn.php');
$koneksi = new roles();


$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_data($_POST['kode_role'],$_POST['nama_role'],$_POST['role_desc']);
}
elseif($action=="update")
{
	$koneksi->update_data($_POST['kode_role'],$_POST['nama_role'],$_POST['role_desc']);
}
elseif($action=="delete")
{
	$id = $_GET['id'];
	$koneksi->delete_data($id);
}
header('location:tampil.php');
?>