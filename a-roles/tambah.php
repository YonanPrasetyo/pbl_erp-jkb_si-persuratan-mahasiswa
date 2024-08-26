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
		<td>Kode Role</td>
		<td>:</td>
		<td><input type="text" name="kode_role"/></td>
	</tr>
	<tr>
		<td>Nama Role</td>
		<td>:</td>
		<td><input type="text" name="nama_role"/></td>
	</tr>
	<tr>
		<td>Role Desc</td>
		<td>:</td>
		<td><input type="text" name="role_desc"/></td>
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