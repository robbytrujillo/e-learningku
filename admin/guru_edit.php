<?php
// Validasi Login User
include_once "../library/inc.seslogin.php";
// Koneksi ke Database MySQL
include_once "../library/inc.seslogin.php";
// Membaca file library
include_once "../library/inc.library.php";

# Skrip Tombol Simpan DiKlik
if (isset($_POST['btnSimpan'])) {
    // Baca Data dari Form Input
    $txtNama = $_POST['txtNama'];
    $cmbKelamin = $_POST['cmbKelamin'];
    $txtAlamat = $_POST['txtAlamat'];
    $txtNoTelepn = $_POST['txtNoTelepon'];
    $txtUsername = $_POST['txtUsername'];
    $txtPassword = $_POST['txtPassword'];

    // Validasi Form Inputs
    $pesanError = array();
    if ($trim(txNama)=="") {
        $pesanError[] = "Data <b>Nama Kelas</b> tidak boleh kosong !";
    }
    if ($trim(cmbKelamin)=="") {
        $pesanError[] = "Data <b>Kelaman</b> belum ada yang dipilih !";
    }
    if ($trim(txAlamat)=="") {
        $pesanError[] = "Data <b>Alamat</b> tidak boleh kosong !";
    }
    if ($trim(txNoTelepon)=="") {
        $pesanError[] = "Data <b>No. Telepon</b> tidak boleh kosong !";
    }
    if ($trim(txUsername)=="") {
        $pesanError[] = "Data <b>Username</b> tidak boleh kosong !";
    }

    // Menampilkan Pesan Error dari Form
    if (count($pesanError)>=1 ) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'> <br><hr>";
        $noPesan = 0;
        foreach ($pesanError as $indeks=>$pesan_tampil) {
        $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }
        echo "</div> <br>";
    }
    else {
        // Skrip simpan data ke Database
        $kodeBaru = buatKode("guru", "G");
        $mySql = "INSERT INTO guru (kd_guru, nm_guru, kelamin, alamat, no_telepon, username, password) 
        VALUES ('$kodeBaru', '$txtNama', '$cmbKelamin', '$txtAlamat', '$txtNoTelepom',
        '$txtUsername', MD5('$txtPassword') )";
        $myQry = mysqli_query($mySql, $koneksidb) or die ("Gagal query".mysqli_error());
        if($myQry) {
            echo "<meta http-equiv='refresh' content='0;url=?open=Guru-Add'>";
        }
        exit;
    }
}

// Membuat variabel isi ke form
$dataKode = buatKode ("guru", "G");
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : '';
$dataKelamin = isset($_POST['cmbKelamin']) ? $_POST['cmbKelamin'] : '';
$dataKelamin = isset($_POST['txtAlamat']) ? $_POST['txtAlamat'] : '';
$dataKelamin = isset($_POST['txtNoTelepon']) ? $_POST['txtNoTelepon'] : '';
$dataKelamin = isset($_POST['txtUsername']) ? $_POST['txtUsername'] : '';
$dataKelamin = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : '';
?>

