<?php
// Validasi Login User
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";
// Membaca file Library
include_once "../library/inc.library.php";

#Skrip Tombol Simpan Diklik
if (isset($_POST['btnSimpan'])) {
    //Baca data dari Form Input
    $txtNama = $_POST['txtNama'];
    $txtUsername = $_POST['txtUsername'];
    $txtPassword = $_POST['txtPassword'];

    // Validasi Form Inputs
    $pesanError = array();
    if (trim($txtNama)=="") {
        $pesanError[] = "Data <b>Nama User</b> tidak boleh kosong !";
    }
    if (trim($txtUsername)=="") {
        $pesanError[] = "Data <b>Username</b> tidak boleh kosong !";
    }

    // Menampilkan Pesan Error dari Form
    if (count($pesanError) >=1 ) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'> <br><hr>";
        $noPesan = 0;
        foreach ($pesanError as $index=>$pesan_tampil) {
            $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }
        
    }
        echo "</div> <br>";
    }else {


        
        }


?>