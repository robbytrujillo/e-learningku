<?php
// Validasi login User
include_once "../library/inc.seslogin.php";
// Koneksi ke database MySQL
include_once "../library/inc.connection.php";
// Membaca file library
include_once "../library/inc.library.php";

# Skrip Tombol Simpan di Klik
if (isset($_POST['btnSimpan'])) {
    // Baca Data dari form Input
    $txtNama = $_POST['txtNama'];
    $txtNis = $_POST['txtNis'];
    $cmbKelamin = $_POST['cmbKelamin'];
    $cmbAgama = $_POST['cmbAgama'];
    $txtAlamat = $_POST['txtAlamat'];
    $txtNoTelepon = $_POST['txtNoTelepon'];
    $txtUsername = $_POST['txtUsername'];
    $txtPassword = $_POST['txtPassword'];
    $txtTempatLhr = $_POST['txtTempatLhr'];
    $cmbTanggalLhr = $_POST['cmbTanggalLhr'];
    $cmbBulanLhr = $_POST['cmbBulanLhr'];
    $cmbTahunLahir = $_POST['cmbTahunLahir'];

    // Validasi form input
    $pesanError = array();
    if (trim($txtNis)=="") {
        $pesanError[] = "Data <b>NIS</b> tidak boleh kosong !";
    }
    if (trim($txtNama)=="") {
        $pesanError[] = "Data <b>Nama Siswa</b> tidak boleh kosong !";
    }
    if (trim($cmbKelamin)=="Kosong") {
        $pesanError[] = "Data <b>Kelamin</b> belum ada yang dipilih !";
    }
    if (trim($cmbAgama)=="Kosong") {
        $pesanError[] = "Data <b>Agama</b> belum ada yang dipilih !";
    }
    if (trim($txtTempatLhr)=="") {
        $pesanError[] = "Data <b>Tempat Lahir</b> tidak boleh kosong !";
    }
    if (trim($cmbTanggalLhr)=="Kosong") {
        $pesanError[] = "Data <b>Tanggal. Lahir</b> belum ada yang dipilih !";
    }
    if (trim($cmbBulanLhr)=="Kosong") {
        $pesanError[] = "Data <b>Bulan. Lahir</b> belum ada yang dipilih !";
    }
    if (trim($cmbBulanLhr)=="Kosong") {
        $pesanError[] = "Data <b>NIS</b> belum ada yang dipilih !";
    }
    if (trim($txtNis)=="") {
        $pesanError[] = "Data <b>NIS</b> tidak boleh kosong !";
    }
    if (trim($txtNis)=="") {
        $pesanError[] = "Data <b>NIS</b> tidak boleh kosong !";
    }
}
?>