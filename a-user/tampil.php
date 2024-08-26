<?php 	
include('conn.php');
$db = new user();
$data = $db->data('user');
?>
<!DOCTYPE html>
<html>
<head>
	<!-- <link href="../src/output.css" rel="stylesheet"> -->
	<title></title>
</head>
<body class="">
<a href="tambah.php">Tambah Data</a>
<table border="1">
		<tr>
			<th>No</th>
			<th>Role</th>
			<th>Username</th>
			<th>email</th>
			<th>Password</th>
			<th>Action</th>
		</tr>
		<?php
		if ($data) {
			$no = 1;
			foreach($data as $row){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row['kode_role']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['password']; ?></td>
					<td>
						<a href="edit.php?id=<?php echo $row['id_user']; ?>">Update</a>
						<a href="proses.php?action=delete&id=<?php echo $row['id_user']; ?>">Delete</a>
					</td>
				</tr>
				<?php 
			}
		}else {
			?>
			<tr>
				<td colspan="6">Data kosong</td>
			</tr>
			<?php
		}
		?>
	</table>
</body>
</html>