<?php 
include('conn.php');
$db = new admin();
$id_user = $db->data('user');
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
					foreach ($id_user as $data) {
						echo '<option value="' . $data['id_user'] . '">' . $data['username'] . '</option>';
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>NIP</td>
		<td>:</td>
		<td><input type="number" name="nip_admin"/></td>
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