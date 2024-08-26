<?php 
include('conn.php');
$db = new bagian_perpustakaan();
$data_users = $db->data('user');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Tambah Data Mahsiswa</h3>
<hr/>
<form method="post" action="proses.php?action=add" enctype="multipart/form-data">
<table>
	<tr>
		<td>User</td>
		<td>:</td>
        <td>
            <select name="id_user">
                <option value="">Pilih User</option>
                <?php 
                foreach ($data_users as $data_user) {
                    echo '<option value="' . $data_user['id_user'] . '">' . $data_user['username'] . '</option>';
                }
                ?>
            </select>
        </td>
	</tr>
	<tr>
		<td>nip perpus</td>
		<td>:</td>
		<td><input type="number" name="nip_perpus"/></td>
	</tr>
	<tr>
		<td>ttd</td>
		<td>:</td>
		<td><input type="file" name="ttd_perpus"/></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="tombol" value="Simpan"/></td>
	</tr>
</table>
</form>
</body>
</html>