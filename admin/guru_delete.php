<?php
// Validasi Login User
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";

// Membaca variabel kode pada URL (alamat browser)
if (isset($_GET['Kode'])) {
    $Kode = $_GET['Kode'];

    // Hapus data sesuai Kode yang terbaca
    $mySql = "DELETE FROM guru WHERE kd_guru = '$Kode'";
    $myQry = mysqli_query($mySql, $koneksidb) or die ("Error hapus data".mysqli_error());
    if ($myQry) {
        //Refresh halaman
        echo "<meta http-equiv='refresh' content='0;url-?open=Guru-Data'>";
    }
}
else {
    // Jika tidak ada data Kode ditemukan di URL
    echo "<b>Data yang dihapus tidak ada</b>";
}

?>