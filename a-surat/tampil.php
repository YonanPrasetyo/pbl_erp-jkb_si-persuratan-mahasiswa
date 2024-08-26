<?php 	
include('conn.php');
$db = new surat();
$data = $db->data('surat');
?>
<!DOCTYPE html>
<html>
<head>
	<link href="../src/output.css" rel="stylesheet">
	<title></title>
</head>
<body class="bg-gray-900">
<a href="tambah.php">Tambah Data</a>
<table class="border border-green-800 border-collapse table">
	<thead>
		<tr>
			<th class="border border-green-800">No</th>
			<th class="border border-green-800">id mhs</th>
			<th class="border border-green-800">id pelapor</th>
			<th class="border border-green-800">id bag perpus</th>
			<th class="border border-green-800">id bag keuangan</th>
			<th class="border border-green-800">id dosen</th>
			<th class="border border-green-800">id kajur</th>
			<th class="border border-green-800">nama_surat</th>
			<th class="border border-green-800">tgl surat</th>
			<th class="border border-green-800">no surat</th>
			<th class="border border-green-800">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if ($data) {
			$no = 1;
			foreach($data as $row){
				?>
				<tr>
					<td class="border border-green-800"><?php echo $no++; ?></td>
					<td class="border border-green-800"><?php echo $row['id_mhs']; ?></td>
					<td class="border border-green-800"><?php echo $row['id_pelapor']; ?></td>
					<td class="border border-green-800"><?php echo $row['id_bag_perpustakaan']; ?></td>
					<td class="border border-green-800"><?php echo $row['id_bag_keuangan']; ?></td>
					<td class="border border-green-800"><?php echo $row['id_dosen']; ?></td>
					<td class="border border-green-800"><?php echo $row['id_kajur']; ?></td>
					<td class="border border-green-800"><?php echo $row['nama_surat']; ?></td>
					<td class="border border-green-800"><?php echo $row['tgl_surat']; ?></td>
					<td class="border border-green-800"><?php echo $row['no_surat']; ?></td>
					<td class="border border-green-800">
						<a href="edit.php?id=<?php echo $row['id_surat']; ?>">Update</a>
						<a href="proses.php?action=delete&id=<?php echo $row['id_surat']; ?>">Delete</a>
					</td>
				</tr>
				<?php 
			}
		}else {
			?>
			<tr>
				<td colspan="11" class="border border-green-800">Data kosong</td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
</body>
</html>