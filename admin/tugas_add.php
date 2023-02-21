<?php
// validasi Login User
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";
// membaca file Library
include_once "../library/inc.library.php";

# Skrip tombol Simpan diklik
if (isset($_POST['btnSimpan'])) {
    // Baca Data dari Form input
    $txtNama = $_POST['txtNama'];
    $txtKeterangan = $_POST['txtNama'];
    $cmbPelajaran = $_POST['cmbPelajaran'];
    $cmbKelas = $_POST['cmbKelas'];
    $cmbGuru = $_POST['cmbGuru'];

    // validasi form Inputs
    $pesanError = array();
    if (trim($txtNama)=="") {
        $pesanError[] = "data <b>Nama Tugas</b> tidak boleh kosong!";
    }
    if (trim($txtKeterangan)=="") {
        $pesanError[] = "data <b>Keterangan</b> tidak boleh kosong!";
    }
    if (trim($cmbPelajaran)=="Kosong") {
        $pesanError[] = "data <b>Pelajaran</b> tidak boleh kosong!";
    }
    if (trim($cmbKelas)=="Kelas") {
        $pesanError[] = "data <b>Kelas</b> tidak boleh kosong!";
    }
    if (trim($cmbGuru)=="Kosong") {
        $pesanError[] = "data <b>Guru</b> tidak boleh kosong!";
    }

    // menampilkan Pesan Error dari Form
    if (count($pesanError)>=1 ) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'> <br><hr>";
        $noPesan = 0;
        foreach ($pesanError as $indeks=>$pesan_tampil) {
            $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }
        echo "</div> <br>";
    } else {
        // Skrip Simpan data ke Database

        // Membuat kode Otomatis
        $kodeBaru = buatKode("tugas_belajar", "T");

        # Skrip Upload file tugas
        if (! empty($_FILES['txtNamaFile']['tmp_name'])) {
        
        // Jika file tugas tidak kosong (ada tugas yang dipilih)
        $nama_file = $_FILES['txtNamaFile']['name'];
        $nama_file = stripcslashes($nama_file);
        $nama_file = str_replace("'", "", $nama_file);

        // Proses kopi tugas (menyimpan) ke folder
        $nama_file = $kodeBaru.".".$nama_file;
        copy($_FILES['txtNamaFile']['tmp_name'], "../tugas/ ".$nama_file);
        } else {
            // Jika file tugas tidak dipilih, maka simpan data kosong
            $nama_file = "";
        }

        // Skrip simpan data ke database
        $mySql = "INSERT INTO tugas_belajar (kd_tugas, nm_tugas, keterangan, 
        file_tugas, kd_pelajaran, kd_kelas, kd_guru) VALUES ('$kodeBaru', 
        '$txtNama', '$txtKeterangan', '$nama_file', '$cmbPelajaran', '$cmbKelas', 
        '$cmbGuru')";

        

    }
}
?>