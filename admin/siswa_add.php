<?php
// Validasi Login User
include_once "../library/inc.seslogin.php";
// Koneksi ke database MySQL
include_once "../libraryinc.connection.php";
// Membaca file library
include_once "../library/inc.library.php";

# Skrip tombol simpan saat diklik
if (isset($_POST['btnSimpan'])) {
    // Baca Data dari Form Input
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
    $cmbBulanLhr = $_POST['cmbBulamLhr'];
    $cmbTahunLhr = $_POST['cmbTahunLhr'];

    // Validasi Form Input
    $pesanError = array();
    if (trim($txtNis)=="") {
        $pesanError[] = "Data <b>Nis</b> tidak boleh kosong !";
    }
    if (trim($txtNama)=="") {
        $pesanError[] = "Data <b>nama Siswa</b> tidak boleh kosong !";
    }
    if (trim($cmbKelamin)=="") {
        $pesanError[] = "Data <b>Kelamin</b> tidak boleh kosong !";
    }
    if (trim($cmbAgama)=="") {
        $pesanError[] = "Data <b>Agama</b> tidak boleh kosong !";
    }
    if (trim($txtTempatLhr)=="") {
        $pesanError[] = "Data <b>Tempat Lahir</b> tidak boleh kosong !";
    }
    if (trim($cmbTanggalLhr)=="") {
        $pesanError[] = "Data <b>Tanggal Lahir</b> tidak boleh kosong !";
    }
    if (trim($cmbBulanLhr)=="") {
        $pesanError[] = "Data <b>Bulan Lahir</b> tidak boleh kosong !";
    }
    if (trim($cmbTahunLhr)=="") {
        $pesanError[] = "Data <b>Tahun Lahir</b> tidak boleh kosong !";
    }
    if (trim($txtAlamat)=="") {
        $pesanError[] = "Data <b>Alamat</b> tidak boleh kosong !";
    }
    if (trim($txtUsername)=="") {
        $pesanError[] = "Data <b>Username</b> tidak boleh kosong !";
    }
    if (trim($txtPassword)=="") {
        $pesanError[] = "Data <b>Password</b> tidak boleh kosong !";
    }

    // Menampilkan Pesan Error dari Form
    if (count($pesanError)>=1 ) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'> <br><hr>";
            $noPesan = 0;
            foreach ($pesanError as $index=>$pesan_tampil) {
                $noPesan++;
                    echo "&nbsp; $noPesan. $pesan_tampil<br>";
            }
        echo "</div> <br>";
    }
    else {
        // Skrip Simpan data ke Database
        $kodeBaru = buatKode("siswa", "S");

        // Menyusun Tanggal (Y-m-d)
        $tanggalLahir = $cmbTahunLhr."-".$cmbBulanLhr."-".$cmbTanggalLhr;

        # Skrip Upload file gambar
        if (!empty($_FILES['txtNamafile']['tmp_name'])) {
            // jika file foto tidak kosong (terdapat foto yang dipilih)
            $nama_file = $_FILES['txtNamaFile']['name'];
            $nama_file = stripslashes($nama_file);
            $nama_file = str_replace("'","",$nama_file);

            // Proses Copy Foto (menyimpan) ke folder
            $nama_file = $kodeBaru.".".$nama_file;
            copy($_FILES['txtNamaFile']['tmp_name'],"../foto/ ".$nama_file);
        } else {
            // Jika file foto tidak dipilih, maka simpan data kosong
            $nama_file = "";
        }

        // Skrip simpan data ke database
        $mySql = "INSERt INTO siswa (kd_siswa, nm_siswa, nis, kelamin, agama,
                  tempat_lahir, tanggal_lahir, alamat, no_telepon, foto, 
                  username, password) 
                  VALUES ('$kodeBaru', '$txtNama', '$txtNis', '$cmbKelamin', 
                  '$cmbAgama', '$txtAgama', ";
    }
}
?>