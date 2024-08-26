<?php 
include('conn.php');
$koneksi = new bagian_keuangan();


$action = $_GET['action'];
if($action == "add")
{
    $ttd_keuangan = $_FILES['ttd_keuangan']['tmp_name'];
    $ttd_keuangan_blob = addslashes(file_get_contents($ttd_keuangan));
	$koneksi->tambah_data($_POST['id_user'],$_POST['nip_keuangan'],$ttd_keuangan_blob);
}
elseif($action=="update")
{
    if ($_FILES['ttd_keuangan']['tmp_name']) {
        $ttd_keuangan = $_FILES['ttd_keuangan']['tmp_name'];
        $ttd_keuangan_blob = file_get_contents($ttd_keuangan);
    }else {
        $ttd_keuangan = $koneksi->get_by_id($_POST['id_bag_keuangan']);
        $ttd_keuangan_blob = $ttd_keuangan['ttd_keuangan'];
    }
	$koneksi->update_data($_POST['id_bag_keuangan'],$_POST['id_user'],$_POST['nip_keuangan'],$ttd_keuangan_blob);
}
elseif($action=="delete")
{
	$id = $_GET['id'];
	$koneksi->delete_data($id);
}
header('location:tampil.php');
?>