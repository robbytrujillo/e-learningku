<?php
// Validasi Login User
include_once "../library/inc.seslogin.php";
// Koneksi ke database MySQL
include_once "../library/inc.connection.php";

// Untuk pembagian halaman data (Paging)
$baris = 50;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
$infoSql = "SELECT * FROM materi_belajar";
$infoQry = mysqli_query($infoSql, $koneksidb) or die ("error paging: ".mysqli_error());
$jumlah = mysqli_num_rows($infoQry);
$maks = ceil($jumlah/$baris);
$mulai = $baris * ($hal-1);
?>

<table width="700" border="0" cellpadding="2" cellspacing="1" class="table-border">
    <tr>
        <td colspan="2">
            <h1><b>DATA MATERI</b></h1>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="right">
            <a href="?open=Materi-Add" target="_self"><img src="../images/btn_add_data.png" height="30" border="0" /></a>
        </td>
    </tr>
    
</table>