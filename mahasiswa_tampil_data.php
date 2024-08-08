<?php 	
include('mahasiswa_table.php');
$db = new mahasiswa();
$data = $db->tampil_data();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="mahasiswa_tambah_data.php">Tambah Data</a>
<table border="1">
		<tr>
			<th>No</th>
			<th>User</th>
			<th>Nim</th>
			<th>kelas</th>
			<th>prodi</th>
			<th>ttd</th>
		</tr>
		<?php 
		$no = 1;
		foreach($data as $row){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row['id_user']; ?></td>
				<td><?php echo $row['nim']; ?></td>
				<td><?php echo $row['kelas_mhs']; ?></td>
				<td><?php echo $row['prodi_mhs']; ?></td>
                <td><img src="data:image/png;base64,<?php echo base64_encode($row['ttd_mhs']); ?>" width="100px"></td>
				<td>
					<a href="mahasiswa_edit.php?id=<?php echo $row['id_mhs']; ?>">Update</a>
					<a href="mahasiswa_proses.php?action=delete&id=<?php echo $row['id_mhs']; ?>">Delete</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>