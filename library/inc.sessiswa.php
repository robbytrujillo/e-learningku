<?php
if (empty($_SESSION['SES_SISWA'])) {
    echo "<center>";
    echo "<br> <br> <b>Maaf Akses Anda Ditolak!</b> <br>
		  Silahkan Anda Login sebagai Siswa untuk bisa mengakses halaman ini.";
    echo "</center>";

    // Refresh
    echo "<meta http-equiv='refresh' content='3; url=../index.php'>";
    exit;
}
?>