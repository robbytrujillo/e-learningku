<?php
// validasi login
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";
?>

<h2> LAPORAN DATA PELAJARAN </h2>
<table class="table-list" width="600" border="0" cellspacing="1" cellpadding="3">
    <tr>
        <td width="5%" bgcolor="#CCCCCC"><strong>No</strong></td>
        <td width="9%" bgcolor="#CCCCCC"><strong>Kode</strong></td>
        <td width="86%" bgcolor="#CCCCCC"><strong>Nama Pelajaran</strong></td>
    </tr>
<?php
// skrip menampilkan data Pelajaran
$mySql = "SELECT * FROM pelajaran ORDER BY kd_pelajaran ASC";
$myQry = mysqli_query($mySql, $koneksidb) or die ("Query salah : ".mysqli_error());
$nomor = 0;
while ($myData = mysqli_fetch_array($myQry)) {
    $nomor++;
    ?>
    <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $myData['kd_pelajaran']; ?></td>
        <td><?php echo $myData['nm_pelajaran']; ?></td>
    </tr>
<?php } ?>    
</table>