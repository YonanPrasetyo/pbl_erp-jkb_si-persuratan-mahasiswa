<?php 
include('conn.php');
$koneksi = new admin();


$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_data($_POST['id_user'],$_POST['nip_admin']);
}
elseif($action=="update")
{
	$koneksi->update_data($_POST['id_admin'],$_POST['id_user'],$_POST['nip_admin']);
}
elseif($action=="delete")
{
	$id = $_GET['id'];
	$koneksi->delete_data($id);
}
header('location:tampil.php');
?>