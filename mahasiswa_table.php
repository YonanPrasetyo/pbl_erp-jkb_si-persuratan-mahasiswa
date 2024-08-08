<?php 
include_once('koneksi.php');
class mahasiswa extends database{
    var $table = 'mahasiswa';
    function tampil_data()
	{
		$data = mysqli_query($this->koneksi,"SELECT * FROM $this->table");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

    function tambah_data($id_user,$nim,$kelas_mhs,$prodi_mhs,$ttd_mhs)
	{
		mysqli_query($this->koneksi,"INSERT INTO $this->table (id_user, nim, kelas_mhs, prodi_mhs, ttd_mhs) VALUES ('$id_user', '$nim', '$kelas_mhs', '$prodi_mhs', '$ttd_mhs')");
	}

    function get_by_id($id_mhs)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM $this->table WHERE id_mhs='$id_mhs'");
		return $query->fetch_array();
	}

    function update_data($id_user,$nim,$kelas_mhs,$prodi_mhs,$ttd_mhs,$id_mhs)
	{
		
		$ttd_mhs = mysqli_real_escape_string($this->koneksi, $ttd_mhs);
		
		mysqli_query($this->koneksi,
		"UPDATE $this->table SET 
		id_user='$id_user',
		nim='$nim',
		kelas_mhs='$kelas_mhs',
		prodi_mhs='$prodi_mhs',
		ttd_mhs='$ttd_mhs'
		WHERE id_mhs='$id_mhs'");
		
		// $stmt = $this->koneksi->prepare("UPDATE $this->table SET 
        // id_user = ?, 
        // nim = ?, 
        // kelas_mhs = ?, 
        // prodi_mhs = ?, 
        // ttd_mhs = ? 
        // WHERE id_mhs = ?");
		
		// $stmt->bind_param("iisssi", $id_user, $nim, $kelas_mhs, $prodi_mhs, $ttd_mhs, $id_mhs);

		// $stmt->execute();
		// $stmt->close();
	}

    function delete_data($id_mhs)
    {
        mysqli_query($this->koneksi,"DELETE FROM $this->table WHERE id_mhs='$id_mhs'");
    }
}

?>