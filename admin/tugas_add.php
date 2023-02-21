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

        
    }
}
?>