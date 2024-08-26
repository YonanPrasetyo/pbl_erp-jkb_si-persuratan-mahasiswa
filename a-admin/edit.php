<?php 	
include('conn.php');
$db = new admin();
$id = $_GET['id'];
if(! is_null($id))
{
	$data = $db->get_by_id($id);
	$id_user = $db->data('user');
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
<input type="hidden" name="id_admin" value="<?php echo $data['id_admin']; ?>"/>
<table>
	<tr>
		<td>User</td>
		<td>:</td>
		<td>
			<select name="id_user">
				<?php 
					foreach ($id_user as $user) {
						echo '<option value="' . $user['id_user'] . '"' . ($user['id_user'] == $data['id_user'] ? ' selected' : '') . '>' . $user['username'] . '</option>';
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>NIP</td>
		<td>:</td>
		<td><input type="number" name="nip_admin" value="<?php echo $data['nip_admin'] ?>"></td>
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