<?php
// Validasi Login User
include_once "../library/inc.seslogin.php";
// Koneksi ke Database MySQL
include_once "../library/inc.seslogin.php";
// Membaca file library
include_once "../library/inc.library.php";

# Skrip Tombol Simpan DiKlik
if (isset($_POST['btnSimpan']) {
    // Baca Data dari Form Input
    $txtNama = $_POST['txtNama'];
    $cmbKelamin = $_POST['cmbKelamin'];
    $txtAlamat = $_POST['txtAlamat'];
    $txtNoTelepn = $_POST['txtNoTelepon'];
    $txtUsername = $_POST['txtUsername'];
    $txtPassword = $_POST['txtPassword'];

    // Validasi Form Inputs
    $pesanError = array();
    if ($trim(txNama)==)"") {
        $pesanError[] = "Data <b>Nama Kelas</b> tidak boleh kosong !";
    }
    if ($trim(cmbKelamin)==)"") {
        $pesanError[] = "Data <b>Kelaman</b> belum ada yang dipilih !";
    }
    if ($trim(txAlamat)==)"") {
        $pesanError[] = "Data <b>Alamat</b> tidak boleh kosong !";
    }
    if ($trim(txNoTelepon)==)"") {
        $pesanError[] = "Data <b>No. Telepon</b> tidak boleh kosong !";
    }
    if ($trim(txUsername)==)"") {
        $pesanError[] = "Data <b>Username</b> tidak boleh kosong !";
    }

    // 
})
?>