<?php 
include('conn.php');
$koneksi = new ketua_jurusan();


$action = $_GET['action'];
if($action == "add")
{
    $ttd_kajur = $_FILES['ttd_kajur']['tmp_name'];
    $ttd_kajur_blob = addslashes(file_get_contents($ttd_kajur));
	$koneksi->tambah_data($_POST['id_user'],$_POST['nidn_kajur'],$ttd_kajur_blob);
}
elseif($action=="update")
{
    if ($_FILES['ttd_kajur']['tmp_name']) {
        $ttd_kajur = $_FILES['ttd_kajur']['tmp_name'];
        $ttd_kajur_blob = file_get_contents($ttd_kajur);
    }else {
        $ttd_kajur = $koneksi->get_by_id($_POST['id_kajur']);
        $ttd_kajur_blob = $ttd_kajur['ttd_kajur'];
    }
	$koneksi->update_data($_POST['id_kajur'],$_POST['id_user'],$_POST['nidn_kajur'],$ttd_kajur_blob);
}
elseif($action=="delete")
{
	$id = $_GET['id'];
	$koneksi->delete_data($id);
}
header('location:tampil.php');
?>