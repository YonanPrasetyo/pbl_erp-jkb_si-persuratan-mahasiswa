<?php 	
include('conn.php');
$db = new permission();
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
<input type="hidden" name="kode_perm" value="<?php echo $data['kode_perm']; ?>"/>
<table>
	<tr>
		<td>permission desc</td>
		<td>:</td>
		<td><input type="text" name="perm_desc" value="<?php echo $data['perm_desc'] ?>"></td>
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