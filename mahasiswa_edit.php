<?php 	
include('mahasiswa_table.php');
$db = new mahasiswa();
$id_mhs = $_GET['id'];
if(! is_null($id_mhs))
{
	$data = $db->get_by_id($id_mhs);
}
else
{
	header('location:user_tampil_data.php');
}

include('user_table.php');
$user = new user();
$data_users = $user->tampil_data();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Update Data Barang</h3>
<hr/>
<form method="post" action="mahasiswa_proses.php?action=update" enctype="multipart/form-data">
<input type="hidden" name="id_mhs" value="<?php echo $data['id_mhs']; ?>"/>
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
		<td>Nim</td>
		<td>:</td>
		<td><input type="number" name="nim" value="<?php echo $data['nim'] ?>"></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td>:</td>
		<td><input type="text" name="kelas_mhs"value="<?php echo $data['kelas_mhs'] ?>"></td>
	</tr>
	<tr>
		<td>Prodi</td>
		<td>:</td>
		<td><input type="text" name="prodi_mhs" value="<?php echo $data['prodi_mhs'] ?>"></td>
	</tr>
	<tr>
		<td>ttd</td>
		<td>:</td>
		<td><input type="file" name="ttd_mhs"></td>
        <td><img src="data:image/png;base64,<?php echo base64_encode($data['ttd_mhs']); ?>" width="100px"></td>
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