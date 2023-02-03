<?php
//Validasi Login User
include_once "../library/inc.seslogin.php";
//Koneksi ke database MySql
include_once "../library/inc.connection.php";
//Membaca file library
include_once "../library/inc.library.php";

#Skrip Tombol Simpan Diklik
if (isset($_POST['btnSimpan'])) {
    //Baca Data dari Form input
    $txtNama = $_POST['txtNama'];

    //validasi form Input
    $pesanError = array();
    if (trim($txtNama) == "") {
        $pesanError[] = "Data <b>Nama Pelajaran</b> tidak boleh kosong !";
    }

    //Menampilkan Pesan Error dari Form
    if (count($pesanError) >= 1) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'> <br><hr>";
    }
}
?>