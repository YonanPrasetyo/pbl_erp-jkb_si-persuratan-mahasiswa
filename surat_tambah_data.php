<?php 
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
<h3>Tambah Data Surat</h3>
<hr/>
<form method="post" action="surat_proses.php?action=add">
<table>
    <tr>
		<td>Mahasiswa</td>
		<td>:</td>
        <td>
            <select name="id_mhs">
                <option value="">Pilih mahasiswa</option>
                <?php 
                foreach ($data_mahasiswa as $mahasiswa) {
                    echo '<option value="' . $mahasiswa['id_mhs'] . '">' . $mahasiswa['nim'] . '</option>';
                }
                ?>
            </select>
        </td>
	</tr>
	<tr>
		<td>Pelapor</td>
		<td>:</td>
		<td><input type="number" name="id_pelapor"/></td>
	</tr>
	<tr>
		<td>Bag Perpus</td>
		<td>:</td>
		<td><input type="number" name="id_bag_perpustakaan"/></td>
	</tr>
	<tr>
		<td>Bag Keuangan</td>
		<td>:</td>
		<td><input type="number" name="id_bag_keuangan"/></td>
	</tr>
	<tr>
		<td>Dosen</td>
		<td>:</td>
		<td><input type="number" name="id_dosen"/></td>
	</tr>
	<tr>
		<td>Kajur</td>
		<td>:</td>
		<td><input type="number" name="id_kajur"/></td>
	</tr>
	<tr>
		<td>Nama Surat</td>
		<td>:</td>
		<td><input type="text" name="nama_surat"/></td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td><input type="date" name="tgl_surat"/></td>
	</tr>
	<tr>
		<td>No Surat</td>
		<td>:</td>
		<td><input type="number" name="no_surat"/></td>
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