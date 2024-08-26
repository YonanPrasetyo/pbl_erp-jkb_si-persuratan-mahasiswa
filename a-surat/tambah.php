<?php 
include('conn.php');
$db = new surat();
$data_mahasiswa = $db->data('mahasiswa');
$data_pelapor = $db->data('pelapor'); 
$data_bagian_perpustakaan = $db->data('bagian_perpustakaan'); 
$data_bagian_keuangan = $db->data('bagian_keuangan'); 
$data_dosen_wali = $db->data('dosen_wali'); 
$data_ketua_jurusan = $db->data('ketua_jurusan'); 
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Tambah Data Surat</h3>
<hr/>
<form method="post" action="proses.php?action=add">
<table>
    <tr>
		<td>Mahasiswa</td>
		<td>:</td>
        <td>
            <select name="id_mhs">
                <option value="">Pilih mahasiswa</option>
                <?php 
                foreach ($data_mahasiswa as $data) {
                    echo '<option value="' . $data['id_mhs'] . '">' . $data['nim'] . '</option>';
                }
                ?>
            </select>
        </td>
	</tr>
	<tr>
		<td>Pelapor</td>
		<td>:</td>
		<td>
			<select name="id_pelapor">
                <option value="">Pilih Pelapor</option>
                <?php 
                foreach ($data_pelapor as $data) {
                    echo '<option value="' . $data['id_pelapor'] . '">' . $data['nidn_pelapor'] . '</option>';
                }
                ?>
            </select>
		</td>
	</tr>
	<tr>
		<td>Bag Perpus</td>
		<td>:</td>
		<td>
			<select name="id_bag_perpustakaan">
                <option value="">Pilih bagian perpustakaan</option>
                <?php 
                foreach ($data_bagian_perpustakaan as $data) {
                    echo '<option value="' . $data['id_bag_perpustakaan'] . '">' . $data['nip_perpus'] . '</option>';
                }
                ?>
            </select>
		</td>
	</tr>
	<tr>
		<td>Bag Keuangan</td>
		<td>:</td>
		<td>
			<select name="id_bag_keuangan">
                <option value="">Pilih bagian keuangan</option>
                <?php 
                foreach ($data_bagian_keuangan as $data) {
                    echo '<option value="' . $data['id_bag_keuangan'] . '">' . $data['nip_keuangan'] . '</option>';
                }
                ?>
            </select>
		</td>
	</tr>
	<tr>
		<td>Dosen</td>
		<td>:</td>
		<td>
			<select name="id_dosen">
                <option value="">Pilih dosen wali</option>
                <?php 
                foreach ($data_dosen_wali as $data) {
                    echo '<option value="' . $data['id_dosen'] . '">' . $data['nidn_dsn_wali'] . '</option>';
                }
                ?>
            </select>
		</td>
	</tr>
	<tr>
		<td>Kajur</td>
		<td>:</td>
		<td>
			<select name="id_kajur">
                <option value="">Pilih kajur</option>
                <?php 
                foreach ($data_ketua_jurusan as $data) {
                    echo '<option value="' . $data['id_kajur'] . '">' . $data['nidn_kajur'] . '</option>';
                }
                ?>
            </select>
		</td>
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