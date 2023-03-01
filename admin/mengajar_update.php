<?php
// validasi Login User
include_once "../library/inc.seslogin.php";
// Koneksi ke database MySQL
include_once "../library/inc.connection.php";
// membaca File library
include_once "../library/inc.library.php";

# skrip tombol Simpan saat di klik
if (isset($_POST['btnSimpan'])) {
    // Baca data dari Form Input
    $cmbKelas = $_POST['cmbKelas'];
    $cmbPelajaran = $_POST['cmbPelajaran'];
    $cmbGuru = $_POST['cmbGuru'];
    $cmbHari = $_POST['cmbHari'];
    $txtJam = $_POST['txtJam'];
    $txtRuang = $_POST['txtRuang'];

    // Validasi Form Inputs
    $pesanError = array();
    if (trim($cmbKelas)=="Kosong") {
        $pesanError[] = "Data <b>Kelas</b> belum dipilih !";
    }
    if (trim($cmbPelajaran)=="Kosong") {
        $pesanError[] = "Data <b>Pelajaran</b> belum dipilih !";
    }
    if (trim($cmbGuru)=="Kosong") {
        $pesanError[] = "Data <b>Guru</b> belum dipilih !";
    }
    if (trim($cmbHari)=="Kosong") {
        $pesanError[] = "Data <b>Hari</b> belum dipilih !";
    }
    if (trim($txtJam)=="") {
        $pesanError[] = "Data <b>Jam</b> tidak boleh kosong !";
    }
    if (trim($txtRuang)=="") {
        $pesanError[] = "Data <b>ruang</b> tidak boleh kosong !";
    }

    // Menampilkan Pesan Error di Form
    if (count($pesanError)>=1 ) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'> <br>Mhr>";
        $noPesan = 0;
        foreach ($pesanError as $index=>$pesan_tampil) {
            $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }
        echo "</div> <br>";
    }
    else {
        // Skrip Simpan data ke Database

        // Membaca Kode
        $kodMengajar = $_POST['txtKode'];

        // Skrip simpan data ke database
        $mySql = "UPDATE mengajar SET kd_kelas='$cmbKelas', kd_pelajaran='$cmbPelajaran', 
        kd_guru='$cmbGuru', hari='$cmbHari', jam='$txtJam', ruang='txtRuang' WHERE 
        kd_mengajar='$kodeMengajar'";

        $myQry = mysqli_query($mySql, $koneksidb) or die ("Gagal query".mysqli_error());
        if($myQry) {
            echo "<meta http-equiv='refresh' content='0; url=?open=Mengajar-Data'>";
        }
        exit;
    }
}


?>