<?php
//validasi login User
include_once "../library/inc.seslogin.php";
//koneksi ke database Mysql
include_once "../library/inc.connection.php";
//membaca file libraryi
include_once "../library/inc.library.php";

#skrip tombol tambah diklik
if (isset($_POST['btnTambah'])) {
    //baca data dari form input
    $cmbSiswa = $_POST['cmbSiswa'];

    //validasi form input
    $pesanError = array();
    if (trim($cmbSiswa)=="Kosong") {
        $pesanError[] = "Data <b>Siswa</b> belum ada yang dipilih !</b>";
    }

    
}
?>