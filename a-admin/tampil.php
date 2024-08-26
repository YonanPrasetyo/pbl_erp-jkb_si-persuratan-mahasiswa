<?php 	
include('conn.php');
$db = new admin();
$data = $db->data('admin');
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
			<th>User</th>
			<th>NIP</th>
			<th>aksi</th>
		</tr>
		<?php
		if ($data) {
			$no = 1;
			foreach($data as $row){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row['id_user']; ?></td>
					<td><?php echo $row['nip_admin']; ?></td>
					<td>
						<a href="edit.php?id=<?php echo $row['id_admin']; ?>">Update</a>
						<a href="proses.php?action=delete&id=<?php echo $row['id_admin']; ?>">Delete</a>
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