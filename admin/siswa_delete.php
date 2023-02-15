<?php
// validasi login user
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";

// membaca variabel kode pada url alamat browser
if (isset($_GET['Kode'])) {
    $Kode = $_GET['Kode'];

    // membaca data gambar/foto
    $mySql = "SELECT foto FROM siswa WHERE kd_siswa='$Kode'";
    $myQry = mysqli_query($mySql, $koneksidb) or die ("Query 1 salah : ".mysqli_error());
    $myData = mysqli_fetch_array($myQry);

    // Jika file foto yang lama dihapus
    $fileFoto = $myData['foto'];
    if (file_exists("../foto/".$fileFoto)) {
        unlink("../foto/".$fileFoto);
    }

    // Hapus data sesuai kode yang terbaca
    $mySql2 = "DELETE FROM siswa WHERE kd_siswa = '$Kode'";
    $myQry2 = mysqli_query($mySql2, $koneksidb) or die ("Error Hapus data".mysqli_error());
    if ($myQry2) {
        // Refresh halaman
        echo "<meta http-equiv='refresh'content='0;url=?open=Siswa-Data'>";
    }
}
else {
    // Jika tidak ada data Kode ditemukan di URL
    echo "<b>Data yang dihapus tidak ada !</b>";
}
?>