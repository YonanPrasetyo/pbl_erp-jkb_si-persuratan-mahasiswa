<?php 
include('conn.php');
$koneksi = new permission();


$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_data($_POST['kode_perm'],$_POST['perm_desc']);
}
elseif($action=="update")
{
	$koneksi->update_data($_POST['kode_perm'],$_POST['perm_desc']);
}
elseif($action=="delete")
{
	$id = $_GET['id'];
	$koneksi->delete_data($id);
}
header('location:tampil.php');
?>