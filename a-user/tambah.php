<?php 
include('conn.php');
$db = new user();
$kode_role = $db->data("roles");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Tambah Data User</h3>
<hr/>
<form method="post" action="proses.php?action=add">
<table>
	<tr>
		<td>Role</td>
		<td>:</td>
		<td>
			<select name="kode_role">
				<option value="">Pilih Role</option>
				<?php 
				foreach ($kode_role as $data) {
					echo '<option value="' . $data['kode_role'] . '">' . $data['kode_role'] . '</option>';
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Username</td>
		<td>:</td>
		<td><input type="text" name="username"/></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="email" name="email"/></td>
	</tr>
	<tr>
		<td>Password</td>
		<td>:</td>
		<td><input type="password" name="password"/></td>
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