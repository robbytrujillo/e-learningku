<?php
//Validasi Login User
include_once "../library/inc.seslogin.php";
//Koneksi ke database MySQL
include_once "../library/inc.connection.php";

//Membaca variabel kode pada URL (alamat browser)
if (isset($_GET['Kode'])) {
    $Kode = $_GET['Kode'];

    //Hapus data sesuai Kode yang terbaca
    $mySql = "DELETE FROM pelajaran WHERE kd_pelajaran='$Kode'";
    $myQry = mysqli_query($mySql, $koneksidb) or die("Error hapus data" . mysqli_error());
    if ($myQry) {
        //Refresh halaman
        echo "<meta http-equiv='refresh' content='0; url=?open=Pelajaran-Data'>";

    }
} else {
    //Jika tidak ada data kode ditemukan di URL
    echo "<b>Data yang dihapus tidak ada</b>";
}
?>