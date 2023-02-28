<?php
// Validasi login user
include_once "../library/inc.seslogin.php";
// Koneksi ke database MySQL
include_once "../library/inc.connection.php";

// untuk pembagian halaman data (Paging)
$baris = 50;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
$infoSql = "SELECT * FROM mengajar";
$infoQry= mysqli_query($infoSql, $koneksidb) or die ("error paging: ".mysqli_error());
$jumlah	= mysqli_num_rows($infoQry);
$maks	= ceil($jumlah/$baris);
$mulai	= $baris * ($hal-1);
?> 
<table width="700" border="0" cellpadding="2" cellspacing="1" class="table-border">
  <tr>
    <td colspan="2"><h1><b>DATA MENGAJAR  </b></h1></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><a href="?open=Mengajar-Add" target="_self"><img src="../images/btn_add_data.png" height="30" border="0"  /></a></td>
  </tr>
  <tr>
    <td colspan="2">
	<table class="table-list" width="100%" border="0" cellspacing="1" cellpadding="3">
      <tr>
        <td width="4%" bgcolor="#CCCCCC"><strong>No</strong></td>
        <td width="6%" bgcolor="#CCCCCC"><strong>Kode</strong></td>
        <td width="12%" bgcolor="#CCCCCC"><strong>Kelas</strong></td>
        <td width="19%" bgcolor="#CCCCCC"><strong>Pelajaran</strong></td>
        <td width="18%" bgcolor="#CCCCCC"><strong>Guru</strong></td>
        <td width="26%" bgcolor="#CCCCCC"><strong>Jadwal</strong></td>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>Tools</strong></td>
        </tr>
<?php
// Skrip menampilkan data Mengajar
$mySql 	= "SELECT mengajar.*, kelas.nm_kelas, pelajaran.nm_pelajaran, guru.nm_guru 
			FROM mengajar 
			LEFT JOIN pelajaran ON mengajar.kd_pelajaran = pelajaran.kd_pelajaran 
			LEFT JOIN kelas ON mengajar.kd_kelas = kelas.kd_kelas
			LEFT JOIN guru ON mengajar.kd_guru = guru.kd_guru
			ORDER BY mengajar.kd_mengajar ASC LIMIT $mulai, $baris";
$myQry 	= mysqli_query($mySql, $koneksidb)  or die ("Query  salah : ".mysqli_error());
$nomor  = $mulai; 
while ($myData = mysqli_fetch_array($myQry)) {
	$nomor++;
	$Kode = $myData['kd_mengajar'];
?>

      <tr>
        <td> <?php echo $nomor; ?> </td>
        <td> <?php echo $myData['kd_mengajar']; ?> </td>
        <td> <?php echo $myData['nm_kelas']; ?> </td>
        <td> <?php echo $myData['nm_pelajaran']; ?> </td>
        <td> <?php echo $myData['nm_guru']; ?> </td>
        <td> <?php echo $myData['hari'].", Ruang: ".$myData['ruang'].", Jam: ".$myData['jam']; ?> </td>
        <td width="8%"><a href="?open=Mengajar-Delete&Kode=<?php echo $Kode; ?>" target="_self">Delete</a></td>
        <td width="7%"><a href="?open=Mengajar-Edit&Kode=<?php echo $Kode; ?>" target="_self">Edit</a></td>
      </tr>
	  
<?php } ?>
    </table></td>
  </tr>
  <tr>
    <td width="495"><strong>Jumlah Data :</strong> <?php echo $jumlah; ?></td>
    <td width="194" align="right"><strong>Halaman Ke :</strong>
	<?php
	for ($h = 1; $h <= $maks; $h++) {
		echo " <a href='?open=Mengajar-Data&hal=$h'>$h</a> ";
	}
	?> </td>
  </tr>
</table>