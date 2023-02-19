<?php
// validasi login User
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";

// Membaca variabel Kode pada URL (alamat browser)
if (isset($_GET['Kode'])) {
    $Kode = $_GET['Kode'];

    // Membaca data file Materi
    $mySql = "SELECT file_materi FROM materi_belajar WHERE kd_materi='$Kode'";
    $myQry = mysqli_query($mySqli, $koneksidb) or die ("Query 1 salah : ".mysqli_error());
    $myData = mysqli_fetch_array($myQry);

    // jika file materi lama ada, dan akan dihapus
    $fileMateri = $myData['file_materi'];
    if(file_exists("../materi/".$fileMateri)) {
        unlink("../materi/".$fileMateri);
    }

    // Hapus data sesuai Kode yang terbaca
    $my2Sql = "DELETE FROM materi_belajar WHERE kd_materi='$Kode'";
    $my2Qry = mysqli_query($my2Sql, $koneksidb) or die ("Error hapus data".mysqli_error());
    if ($my2Qry) {
        // Refresh halaman
        echo "<meta http-equiv='refresh'content='0;url=?open=Materi-Data'>";
    }
}
else {
    // Jika tidak ada data Kode ditemukan di URL
    echo "<b>Data yang dihapus tidak ada!</b>";
}
?>