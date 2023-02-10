<?php
// Validasi Login User
include_once "../library/inc.seslogin.php";
// Koneksi ke database MySQL
include_once "../library/inc.connection.php";

# untuk paging (pembagian halaman)
$baris = 50;
$hal =  isset($_GET['hal']) ? $_GET['hal'] : 1;
$infoSql = "SELECT * FROM guru";
$infoQry = mysqli_query($infoSql, $koneksidb) or die ("error pagging: ".mysqli_error());
$jumlah = mysqli_num_rows($infoQry);
$maks = ceil($jumlah/$baris);
$mulai = $baris * ($hal-1);
?>
<table width="650" border="0" cellpadding="2" cellspacing="1" class="table-border">
    <tr>
        <td colspan="2"><h1><b>DATA GURU </b></h1></td>
    </tr>
    <tr>
        <td colspan="2" align="right"><a href="?open=Guru-Add" target="_self"><img src="../images/btn_add_data.png" height="30" border="0" /></a></td>
    </tr>
    <tr>
        <td colspan="2">  
    <table class="table-list" width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
        <td width="5%" bgcolor="#CCCCCC"><strong>No</strong></td>
        <td width="8%" bgcolor="#CCCCCC"><strong>Kode</strong></td>
        <td width="28%" bgcolor="#CCCCCC"><strong>Nama Guru</strong></td>
        <td width="5%" bgcolor="#CCCCCC"><strong>L/P</strong></td>
        <td width="38%" bgcolor="#CCCCCC"><strong>Alamat</strong></td>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>Tools</strong></td>
    </tr>
    <?php
    //skrip menampilkan data Guru
    
    ?>
    </table>
    
    
    
    
    </td>    
    </tr>
</table>
