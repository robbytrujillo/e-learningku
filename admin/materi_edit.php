<?php
// validasi login User
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";
// Membaca file library
include_once "../library/inc.library.php";

# Skrip tombol simpan diklik
if(isset($_POST['btnSimpan'])) {
    // Baca Data dari Form Input
    $txtNama = $_POST['txtNama'];
    $txtKeterangan = $_POST['txtKeterangan'];
    $cmbPelajaran = $_POST['cmbPelajaran'];
    $cmbGuru = $_POST['cmbGuru'];

    // Validasi form inputs
    $pesanError = array();
    if (trim($txtNama)=="") {
        $pesanError[] = "Data <b>Nama Materi</b> tidak boleh kosong !";
    }
    if (trim($txtKeterangan)=="") {
        $pesanError[] = "Data <b>Keterangan</b> tidak boleh kosong !";
    }
    if (trim($cmbPelajaran)=="Kosong") {
        $pesanError[] = "Data <b>Pelajaran</b> belum dipilih !";
    }
    if (trim($cmbGuru)=="Kosong") {
        $pesanError[] = "Data <b>Guru</b> belum dipilih !";
    }
}
?>