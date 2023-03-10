<?php
// validasi Login
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";

# MEMBUAT SQL FILTER DATA
// Baca variabel URL browser
$kodePelajaran = isset($_GET['kodePelajar']) ? $_GET['kodePelajaran'] : 'Semua';
// Baca variabel dari Form setelah di Post
$kodePelajaran = isset($_POST['cmbPelajaran']) ? $_POST['cmbPelajaran'] : $kodPelajaran;


?>