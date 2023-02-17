<?php
// Validasi Login User
include_once "../library/inc.seslogin.php";
// Koneksi ke database MySQL
include_once "../library/inc.connection.php";
// Membaca file Library 
include_once "../library/inc.library.php";

# SKRIP TOMBOL SIMPAN SAAT DIKLIK
if (isset($_POST['btnSimpan'])) {
    // membaca data dari form input 
    $txtNama = $_POST['txtNama'];
    $txtKeterangan = $_POST['txtKeterangan'];
    $cmbPelajaran = $_POST['cmbPelajaran'];
    $cmbGuru = $_POST['cmbGuru'];

}
?>