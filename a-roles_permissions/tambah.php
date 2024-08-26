<?php 
include('conn.php');
$db = new roles_permissions();
$kode_role = $db->data('roles');
$kode_perm = $db->data('permission');
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
		<td>Kode_role</td>
		<td>:</td>
        <td>
            <select name="kode_role">
                <option value="">Pilih data</option>
                <?php 
                foreach ($kode_role as $data) {
                    echo '<option value="' . $data['kode_role'] . '">' . $data['kode_role'] . '</option>';
                }
                ?>
            </select>
        </td>
	</tr>
	<tr>
		<td>Kode_perm</td>
		<td>:</td>
        <td>
            <select name="kode_perm">
                <option value="">Pilih data</option>
                <?php 
                foreach ($kode_perm as $data) {
                    echo '<option value="' . $data['kode_perm'] . '">' . $data['kode_perm'] . '</option>';
                }
                ?>
            </select>
        </td>
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