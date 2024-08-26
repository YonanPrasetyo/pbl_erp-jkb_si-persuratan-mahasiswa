<?php 	
include('conn.php');
$db = new pelapor();
$data = $db->data('pelapor');
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
			<th>Nidn</th>
			<th>prodi</th>
			<th>ttd</th>
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
					<td><?php echo $row['nidn_pelapor']; ?></td>
					<td><?php echo $row['prodi_pelapor']; ?></td>
					<td><img src="data:image/png;base64,<?php echo base64_encode($row['ttd_pelapor']); ?>" width="100px"></td>
					<td>
						<a href="edit.php?id=<?php echo $row['id_pelapor']; ?>">Update</a>
						<a href="proses.php?action=delete&id=<?php echo $row['id_pelapor']; ?>">Delete</a>
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