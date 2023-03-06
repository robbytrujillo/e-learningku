<?php
// validasi Login
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";

# Membuat SQL Filter Data
// Baca variabel URL browser
$kodeKelas = isset($_GET['kodeKelas']) ? $_GET['kodeKelas'] : 'Semua';
// Baca variabel dari Form setelah di Post
$kodeKelas = isset($_POST['cmbKelas']) ? $_POST['cmbKelas'] : $kodeKelas;

// Membuat filter SQL
if ($kodeKelas=="Semua") {
    // Query #1 (semua data)
    $filterSQL = "";
} else {
    // Query #1 (semua data)
    $filterSQL = "WHERE tb.kd_kelas = '$KodeKelas'";
}


?>