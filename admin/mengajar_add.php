<?php
// validasi Login User
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";
// membaca file library
include_once "../library/inc.library.php";

# SKRIP TOMBOL SIMPAN SAAT DIKLIK
if(isset($_POST['btnSimpan'])) {
    // Baca Data dari Form Input
    $cmbKelas = $_POST['cmbKelas'];
    $cmbPelajaran = $_POST['cmbPelajaran'];
    $cmbGuru = $_POST['cmbGuru'];
    $cmbHari = $_POST['cmbHari'];
    $txtJam = $_POST['txtJam'];
    $txtRuang = $_POST['txtRuang'];

    // validasi Form Inputs
    $pesanError = array();
    if (trim($cmbKelas)=="Kosong") {
        $pesanError[] = "Data <b>Kelas</b> belum dipilih!";
    }
    if (trim($cmbPelajaran)=="Kosong") {
        $pesanError[] = "Data <b>Pelajaran</b> belum dipilih!";
    }
    if (trim($cmbGuru)=="Kosong") {
        $pesanError[] = "Data <b>Guru</b> belum dipilih!";
    }
    if (trim($cmbHari)=="Kosong") {
        $pesanError[] = "Data <b>Hari</b> belum dipilih !";
    }
    if (trim($txtJam)=="Kosong") {
        $pesanError[] = "Data <b>Jam Belajar</b> tidak boleh kosong!";
    }
    if (trim($txtRuang)=="") {
        $pesanError[] = "Data <b>Ruang</b> tidak boleh kosong!";
    }

    
}
?>