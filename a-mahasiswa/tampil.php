<?php 	
include('conn.php');
$db = new mahasiswa();
$data = $db->data('mahasiswa', 'user', 'id_user');
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
			<th>Nim</th>
			<th>kelas</th>
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
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['nim']; ?></td>
					<td><?php echo $row['kelas_mhs']; ?></td>
					<td><?php echo $row['prodi_mhs']; ?></td>
					<td><img src="data:image/png;base64,<?php echo base64_encode($row['ttd_mhs']); ?>" width="100px"></td>
					<td>
						<a href="edit.php?id=<?php echo $row['id_mhs']; ?>">Update</a>
						<a href="proses.php?action=delete&id=<?php echo $row['id_mhs']; ?>">Delete</a>
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