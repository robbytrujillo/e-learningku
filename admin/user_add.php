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
    if (trim(txtNama)=="") {
        $pesanError[] = "Data <b>Nama User</b> tidak boleh kosong !";
    }
    if (trim($txtUsername)=="") {
        $pesanError[] = "Data <b>Username</b> tidak boleh kosong !";
    }
    if (trim($txtPassword)=="") {
        $pesanError[] = "Data <b>Password</b> tidak boleh kosong !";
    }

    //Menampilkan Pesan Error dari Form
    if (count($pesanError)>=1 ) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'><br><hr>";
        $noPesan = 0;
        foreach ($pesanError as $index => $pesan_tampil) {
            $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";    
        }
        echo "</div> <br>";
    }else {
        //Skirp Simpan data ke Database
        $kodeBaru = buatKode("user", "U");
        $mySql = "INSERT INTO user (kd_user, nm_user, username, password) 
        VALUES ('$kodeBaru', '$txtNama', 'txtUsername', MD5('$txtPassword'))";
        $myQry = mysqli_query($mySql, $koneksidb) or die("Gagal query".mysqli_error());
        if ($myQry) {
            echo "<meta http-equiv='refresh' content='0'; url=?open=User-Data'>";
        }
        exit;
    }
}

// Membuat variabel isi ke form
$dataKode = buatKode("user", "U");
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : '';
$dataUsername = isset($_POST['txtUsername']) ? $_POST['txtUsername'] : '';
?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self" id="form1">
    <table class=""