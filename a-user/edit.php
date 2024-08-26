<?php 	
include('conn.php');
$db = new user();
$id_user = $_GET['id'];
if(! is_null($id_user))
{
	$data_barang = $db->get_by_id($id_user);
	$kode_role = $db->data("roles");
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
<form method="post" action="proses.php?action=update">
<input type="hidden" name="id_user" value="<?php echo $data_barang['id_user']; ?>"/>
<table>
	<tr>
		<td>Role</td>
		<td>:</td>
		<td>
			<select name="kode_role">
                <?php 
                foreach ($kode_role as $data) {
                    echo '<option value="' . $data['kode_role'] . '"' . ($data['kode_role'] == $data['kode_role'] ? ' selected' : '') . '>' . $data['nama_role'] . '</option>';
                }
                ?>
            </select>
		</td>
	</tr>
	<tr>
		<td>Usernamee</td>
		<td>:</td>
		<td><input type="text" name="username" value="<?php echo $data_barang['username']; ?>"/></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="email" name="email" value="<?php echo $data_barang['email']; ?>"/></td>
	</tr>
	<tr>
		<td>Password</td>
		<td>:</td>
		<td><input type="password" name="password" value="<?php echo $data_barang['password']; ?>"/></td>
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