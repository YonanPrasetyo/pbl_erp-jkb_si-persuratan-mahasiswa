<?php 	
include('surat_table.php');
$db = new surat();
$id_surat = $_GET['id'];
if(! is_null($id_surat))
{
	$data = $db->get_by_id($id_surat);
}
else
{
	header('location:surat_tampil_data.php');
}

include('mahasiswa_table.php');
$mahasiswa = new mahasiswa();
$data_mahasiswa = $mahasiswa->tampil_data();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Update Data Barang</h3>
<hr/>
<form method="post" action="surat_proses.php?action=update">
<input type="hidden" name="id_surat" value="<?php echo $data['id_surat']; ?>"/>
<table>
<tr>
		<td>Mahasiswa</td>
		<td>:</td>
        <td>
            <select name="id_mhs">
                <option value="">Pilih mahasiswa</option>
                <?php 
                foreach ($data_mahasiswa as $mahasiswa) {
                    echo '<option value="' . $mahasiswa['id_mhs'] . '"' . ($mahasiswa['id_mhs'] == $data['id_mhs'] ? ' selected' : '') . '>' . $mahasiswa['nim'] . '</option>';
                }
                ?>
            </select>
        </td>
	</tr>
	<tr>
		<td>Pelapor</td>
		<td>:</td>
		<td><input type="number" name="id_pelapor" value="<?php echo $data['id_pelapor']; ?>"/></td>
	</tr>
	<tr>
		<td>Bag Perpus</td>
		<td>:</td>
		<td><input type="number" name="id_bag_perpustakaan" value="<?php echo $data['id_bag_perpustakaan']; ?>"/></td>
	</tr>
	<tr>
		<td>Bag Keuangan</td>
		<td>:</td>
		<td><input type="number" name="id_bag_keuangan" value="<?php echo $data['id_bag_keuangan']; ?>"/></td>
	</tr>
	<tr>
		<td>Dosen</td>
		<td>:</td>
		<td><input type="number" name="id_dosen" value="<?php echo $data['id_dosen']; ?>"/></td>
	</tr>
	<tr>
		<td>Kajur</td>
		<td>:</td>
		<td><input type="number" name="id_kajur" value="<?php echo $data['id_kajur']; ?>"/></td>
	</tr>
	<tr>
		<td>Nama Surat</td>
		<td>:</td>
		<td><input type="text" name="nama_surat" value="<?php echo $data['nama_surat']; ?>"/></td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td><input type="date" name="tgl_surat" value="<?php echo $data['tgl_surat']; ?>"/></td>
	</tr>
	<tr>
		<td>No Surat</td>
		<td>:</td>
		<td><input type="number" name="no_surat" value="<?php echo $data['no_surat']; ?>"/></td>
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