<?php
// validasi Login User
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";

// Membaca variabel kode pada URL (alamat browser)
if(isset($_GET['Kode'])) {
    $Kode = $_GET['Kode'];

    // membaca data file tugas
    $mySql = "SELECT file_tugas FROM tugas_belajar WHERE kd_tugas='$Kode'";
    $myQry = mysqli_query($mySql, $koneksidb) or die ("Query 1 salah : ".mysqli_error());
    $myData = mysqli_fetch_array($myQry);

    // Jika file tugas lama ada , dan akan dihapus
    $fileTugas = $myData['file_tugas'];
    if(file_exists("../tugas/".$fileTugas)) {
        unlink("../tugas/.$fileTugas");
    }

    // Hapus data sesuai Kode yang terbaca
    $my2Sql = "DELETE FROM tugas_belajar WHERE kd_tugas='$Kode'";
    $my2Qry = mysqli_query($my2Sql, $koneksidb) or die ("Error hapus data".mysqli_error());
    if ($my2Qry) {
        // Refresh halaman
        echo "<meta http-equiv='refresh'content='0;url=?open=Tugas-Data'>";
    }
}
else {
    // Jika tidak ada data kode ditemukan di URL
    echo "<b>Data yang dihapus tidak ada</b>";
}
?>