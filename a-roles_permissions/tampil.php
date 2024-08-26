<?php 	
include('conn.php');
$db = new roles_permissions();
$data = $db->data('roles_permissions');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="tambah.php">Tambah Data</a>
<table border="1">
		<tr>
			<th>No</th>
			<th>Kode Role</th>
			<th>Kode Perm</th>
			<th>aksi</th>
		</tr>
		<?php
		if ($data) {
			$no = 1;
			foreach($data as $row){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row['kode_role']; ?></td>
					<td><?php echo $row['kode_perm']; ?></td>
					<td>
						<a href="edit.php?id=<?php echo $row['kode_role']; ?>">Update</a>
						<a href="proses.php?action=delete&kode_role=<?php echo $row['kode_role']; ?>&kode_perm=<?php echo $row['kode_perm']; ?>">Delete</a>
					</td>
				</tr>	
			<?php 
			}
		}else {
			?>
			<tr>
				<td colspan="7">Data kosong</td>
			</tr>
			<?php
		}
		?>
	</table>
</body>
</html>