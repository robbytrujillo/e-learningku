<?php
// Validasi Login User
include_once "../library/inc.seslogin.php";
// Koneksi ke database MySQL
include_once "../library/inc.connection.php";

// Membaca variabel Kode pada URL (alamat browser)
if (isset($_GET['Kode'])) {
    $kode = $_GET['Kode'];

    // Hapus data sesuai Kode yang terbaca. kecuali untuk User=Admin tidak boleh dihapus
    $mySql = "DELETE FROM user WHERE kd_user = '$Kode' AND username !='admin'";
    $myQry = mysqli_query($mySql, $koneksidb) or die ("Error hapus data" .mysqli_error());
    if ($myQry) {
        //Refresh Halaman
        echo "<meta http-equiv='refresh' content='0; url=?open=User-Data'>";
    }

} else {
    //Jika tidak ada data Kode ditemukan di URL
    echo "<b>Data yang dihapus tidak ada</b>";
}
?>