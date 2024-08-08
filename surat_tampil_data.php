<?php 	
include('surat_table.php');
$db = new surat();
$data = $db->tampil_data();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="surat_tambah_data.php">Tambah Data</a>
<table border="1">
		<tr>
			<th>No</th>
			<th>id mhs</th>
			<th>id pelapor</th>
			<th>id bag perpus</th>
			<th>id bag keuangan</th>
			<th>id dosen</th>
			<th>id kajur</th>
			<th>nama_surat</th>
			<th>tgl surat</th>
			<th>no surat</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($data as $row){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row['id_mhs']; ?></td>
				<td><?php echo $row['id_pelapor']; ?></td>
				<td><?php echo $row['id_bag_perpustakaan']; ?></td>
				<td><?php echo $row['id_bag_keuangan']; ?></td>
				<td><?php echo $row['id_dosen']; ?></td>
				<td><?php echo $row['id_kajur']; ?></td>
				<td><?php echo $row['nama_surat']; ?></td>
				<td><?php echo $row['tgl_surat']; ?></td>
				<td><?php echo $row['no_surat']; ?></td>
				<td>
					<a href="surat_edit.php?id=<?php echo $row['id_surat']; ?>">Update</a>
					<a href="surat_proses.php?action=delete&id=<?php echo $row['id_surat']; ?>">Delete</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>