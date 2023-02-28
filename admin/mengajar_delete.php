<?php
// validasi Login user
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";

// Membaca variabel Kode pada URL (alamat browser)
if(isset($_GET['Kode'])) {
    $Kode = $_GET['Kode'];

    // Hapus data sesuai Kode yang terbaca
    $my2Sql = "DELETE FROM mengajar WHERE kd_mengajar='$Kode'";
    $my2Qry = mysqli_query($my2Sql, $koneksidb) or die ("Error hapus data".mysqli_error());
    if($my2Qry) {
        // Refresh halaman
        echo "<meta http-equiv='refresh' content='0; url=?open=Mengajar-Data'>";
    }

    } else {
        // Jika tidak ada data Kode ditemukan di URL
        echo "<b>Data yang dihapus tidak ada</b>";
    }


?>