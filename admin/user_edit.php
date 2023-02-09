<?php
// Validasi Login User
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";
// Membaca file Library
include_once "../library/inc.library.php";

#Skrip Tombol Simpan Diklik
if (isset($_POST['btnSimpan'])) {
    //Baca data dari Form Input
    $txtNama = $_POST['txtNama'];
    $txtUsername = $_POST['txtUsername'];
    $txtPassword = $_POST['txtPassword'];

    // Validasi Form Inputs
    $pesanError = array();
    if (trim($txtNama)=="") {
        $pesanError[] = "Data <b>Nama User</b> tidak boleh kosong !";
    }
    if (trim($txtUsername)=="") {
        $pesanError[] = "Data <b>Username</b> tidak boleh kosong !";
    }

    // Menampilkan Pesan Error dari Form
    if (count($pesanError) >=1 ) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'> <br><hr>";
        $noPesan = 0;
        foreach ($pesanError as $index=>$pesan_tampil) {
            $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        
        
    }
        echo "</div> <br>";
    }else {

        // Memperbaharui password jika ada perubahan
        if (trim($txtPassword)=="") {
            $txtPassLama = $_POST['txtPassLama'];
            $passwordSQL = ", password='$txtPassLama'";
        }
        else {
            $passwordSQL = ", password =MD5('$txtPassword')";
        }

        // Skrip simpan data ke database
        $Kode = $_POST['txtKode'];
        $mySql = "UPDATE user SET nm_user = '$txtNama', username = '$txtUsername' $passwordSQL WHERE kd_user = '$Kode'";
        $myQry = mysqli_query($mySql, $koneksidb) or die ("Gagal query ".mysqli_error());
        if ($myQry) {
            echo "<meta http-equiv = 'refresh' content='0; url=?open = User-Data'>";
        }
        exit;
        }
}

# Membaca Data dari Database Untuk Diedit
$Kode = $_GET['Kode'];
$mySql = "SELECT * FROM user WHERE kd_user = '$Kode";
$myQry = mysqli_fetch_array($myQry);

// Membuat variabel isi ke form
$dataKode = $myData['kd_user'];
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : $myData['nm_user'];
$dataUsername = isset($_POST['txtUsername']) ? $_POST['txtUsername'] : $myData['username'];
?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self" id="form1">
    <table class="table-list" width="650" border="0" cellspacing="1" cellpadding="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>UBAH DATA USER</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width="184"><strong>Kode</strong></td>
            <td width="6">:</td>
            <td width="438"><input name="textfield" type="text" valuer="<?php echo $datakode; ?>" size="10" maxlength="4" />
            <input name="txtKode" type="hidden" id="txtKode" value="<?php echo $dataKode; ?>" /></td>
        </tr>
        <tr>
      <td><strong>Username</strong></td>
      <td>:</td>
      <td><input name="txtUsername" type="text" id="txtUsername" value="<?php echo $dataUsername; ?>" size="20" maxlength="20" /></td>
    </tr>
    <tr>
      <td><strong>Password</strong></td>
      <td>:</td>
      <td><input name="txtPassword" type="password" id="txtPassword" size="20" maxlength="20" />
      <input name="txtPassLama" type="hidden" id="txtPassLama" value="<?php echo $myData['password']; ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="btnSimpan" type="submit" id="btnSimpan" value="Simpan" /></td>
    </tr>

    </table>
</form>