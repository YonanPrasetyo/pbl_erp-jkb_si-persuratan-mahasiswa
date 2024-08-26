<?php 
include('conn.php');
$koneksi = new pelapor();


$action = $_GET['action'];
if($action == "add")
{
    $ttd_pelapor = $_FILES['ttd_pelapor']['tmp_name'];
    $ttd_pelapor_blob = addslashes(file_get_contents($ttd_pelapor));
	$koneksi->tambah_data($_POST['id_user'],$_POST['nidn_pelapor'],$_POST['prodi_pelapor'],$ttd_pelapor_blob);
}
elseif($action=="update")
{
	if ($_FILES['ttd_pelapor']['tmp_name']) {
        $ttd_pelapor = $_FILES['ttd_pelapor']['tmp_name'];
        $ttd_pelapor_blob = file_get_contents($ttd_pelapor);
    }else {
        $ttd_pelapor = $koneksi->get_by_id($_POST['id_mhs']);
        $ttd_pelapor_blob = $ttd_pelapor['ttd_pelapor'];
    }
	$koneksi->update_data($_POST['id_pelapor'],$_POST['id_user'],$_POST['nidn_pelapor'],$_POST['prodi_pelapor'],$ttd_pelapor_blob);
}
elseif($action=="delete")
{
	$id = $_GET['id'];
	$koneksi->delete_data($id);
}
header('location:tampil.php');
?>