<?php 
include('conn.php');
$koneksi = new bagian_perpustakaan();


$action = $_GET['action'];
if($action == "add")
{
    $ttd_perpus = $_FILES['ttd_perpus']['tmp_name'];
    $ttd_perpus_blob = addslashes(file_get_contents($ttd_perpus));
	$koneksi->tambah_data($_POST['id_user'],$_POST['nip_perpus'],$ttd_perpus_blob);
}
elseif($action=="update")
{
    if ($_FILES['ttd_perpus']['tmp_name']) {
        $ttd_perpus = $_FILES['ttd_perpus']['tmp_name'];
        $ttd_perpus_blob = file_get_contents($ttd_perpus);
    }else {
        $ttd_perpus = $koneksi->get_by_id($_POST['id_bag_perpustakaan']);
        $ttd_perpus_blob = $ttd_perpus['ttd_perpus'];
    }
	$koneksi->update_data($_POST['id_bag_perpustakaan'],$_POST['id_user'],$_POST['nip_perpus'],$ttd_perpus_blob);
}
elseif($action=="delete")
{
	$id = $_GET['id'];
	$koneksi->delete_data($id);
}
header('location:tampil.php');
?>