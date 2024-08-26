<?php 	
include('conn.php');
$db = new bagian_perpustakaan();
$id_mhs = $_GET['id'];
if(! is_null($id_mhs))
{
	$data = $db->get_by_id($id_mhs);
	$data_users = $db->data('user');
}
else
{
	header('location:tampil.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Update Data Barang</h3>
<hr/>
<form method="post" action="proses.php?action=update" enctype="multipart/form-data">
<input type="hidden" name="id_bag_perpustakaan" value="<?php echo $data['id_bag_perpustakaan']; ?>"/>
<table>
	<tr>
		<td>User</td>
		<td>:</td>
        <td>
            <select name="id_user">
                <?php 
                foreach ($data_users as $data_user) {
                    echo '<option value="' . $data_user['id_user'] . '"' . ($data_user['id_user'] == $data['id_user'] ? ' selected' : '') . '>' . $data_user['username'] . '</option>';
                }
                ?>
            </select>
        </td>
	</tr>
	<tr>
		<td>nip perpus</td>
		<td>:</td>
		<td><input type="text" name="nip_perpus" value="<?php echo $data['nip_perpus'] ?>"></td>
	</tr>
	<tr>
		<td>ttd</td>
		<td>:</td>
		<td><input type="file" name="ttd_perpus"></td>
        <td><img src="data:image/png;base64,<?php echo base64_encode($data['ttd_perpus']); ?>" width="100px"></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="tombol" value="Update"/></td>
	</tr>
</table>
</form>
</body>
</html>