<?php 
include('conn.php');
$koneksi = new dosen_wali();


$action = $_GET['action'];
if($action == "add")
{
    $ttd_dsn_wali = $_FILES['ttd_dsn_wali']['tmp_name'];
    $ttd_dsn_wali_blob = addslashes(file_get_contents($ttd_dsn_wali));
	$koneksi->tambah_data($_POST['id_user'],$_POST['nidn_dsn_wali'],$_POST['prodi_dsn_wali'],$_POST['kelas_wali'],$ttd_dsn_wali_blob);
}
elseif($action=="update")
{
    if ($_FILES['ttd_dsn_wali']['tmp_name']) {
        $ttd_dsn_wali = $_FILES['ttd_dsn_wali']['tmp_name'];
        $ttd_dsn_wali_blob = file_get_contents($ttd_dsn_wali);
    }else {
        $ttd_dsn_wali = $koneksi->get_by_id($_POST['id_dosen']);
        $ttd_dsn_wali_blob = $ttd_dsn_wali['ttd_dsn_wali'];
    }
	$koneksi->update_data($_POST['id_dosen'],$_POST['id_user'],$_POST['nidn_dsn_wali'],$_POST['prodi_dsn_wali'],$_POST['kelas_wali'],$ttd_dsn_wali_blob);
}
elseif($action=="delete")
{
	$id = $_GET['id'];
	$koneksi->delete_data($id);
}
header('location:tampil.php');
?>