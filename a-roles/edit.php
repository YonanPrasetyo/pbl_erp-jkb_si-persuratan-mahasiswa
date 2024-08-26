<?php 	
include('conn.php');
$db = new roles();
$id_mhs = $_GET['id'];
if(! is_null($id_mhs))
{
	$data = $db->get_by_id($id_mhs);
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
<input type="hidden" name="kode_role" value="<?php echo $data['kode_role']; ?>"/>
<table>
	<tr>
		<td>nama role</td>
		<td>:</td>
		<td><input type="text" name="nama_role" value="<?php echo $data['nama_role'] ?>"></td>
	</tr>
	<tr>
		<td>role desc</td>
		<td>:</td>
		<td><input type="text" name="role_desc" value="<?php echo $data['role_desc'] ?>"></td>
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