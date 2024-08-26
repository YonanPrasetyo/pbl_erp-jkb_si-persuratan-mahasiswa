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
		<td>Kode Permission</td>
		<td>:</td>
		<td><input type="text" name="kode_perm"/></td>
	</tr>
	<tr>
		<td>Permission Desc</td>
		<td>:</td>
		<td><input type="text" name="perm_desc"/></td>
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