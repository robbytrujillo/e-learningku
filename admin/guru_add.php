<?php
// Validasi Login User
include_once "../library/inc.seslogin.php";
// Koneksi ke Database MySQL
include_once "../library/inc.seslogin.php";
// Membaca file library
include_once "../library/inc.library.php";

# Skrip Tombol Simpan DiKlik
if (isset($_POST['btnSimpan'])) {
    // Baca Data dari Form Input
    $txtNama = $_POST['txtNama'];
    $cmbKelamin = $_POST['cmbKelamin'];
    $txtAlamat = $_POST['txtAlamat'];
    $txtNoTelepn = $_POST['txtNoTelepon'];
    $txtUsername = $_POST['txtUsername'];
    $txtPassword = $_POST['txtPassword'];

    // Validasi Form Inputs
    $pesanError = array();
    if ($trim($txNama)=="") {
        $pesanError[] = "Data <b>Nama Kelas</b> tidak boleh kosong !";
    }
    if ($trim($cmbKelamin)=="") {
        $pesanError[] = "Data <b>Kelaman</b> belum ada yang dipilih !";
    }
    if ($trim($txAlamat)=="") {
        $pesanError[] = "Data <b>Alamat</b> tidak boleh kosong !";
    }
    if ($trim($txNoTelepon)=="") {
        $pesanError[] = "Data <b>No. Telepon</b> tidak boleh kosong !";
    }
    if ($trim($txUsername)=="") {
        $pesanError[] = "Data <b>Username</b> tidak boleh kosong !";
    }

    // Menampilkan Pesan Error dari Form
    if (count($pesanError)>=1 ) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'> <br><hr>";
        $noPesan = 0;
        foreach ($pesanError as $indeks=>$pesan_tampil) {
        $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }
        echo "</div> <br>";
    }
    else {
        // Skrip simpan data ke Database
        $kodeBaru = buatKode("guru", "G");
        $mySql = "INSERT INTO guru (kd_guru, nm_guru, kelamin, alamat, no_telepon, username, password) 
        VALUES ('$kodeBaru', '$txtNama', '$cmbKelamin', '$txtAlamat', '$txtNoTelepom',
        '$txtUsername', MD5('$txtPassword') )";
        $myQry = mysqli_query($mySql, $koneksidb) or die ("Gagal query".mysqli_error());
        if($myQry) {
            echo "<meta http-equiv='refresh' content='0;url=?open=Guru-Add'>";
        }
        exit;
    }
}

// Membuat variabel isi ke form
$dataKode = buatKode("guru", "G");
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : '';
$dataKelamin = isset($_POST['cmbKelamin']) ? $_POST['cmbKelamin'] : '';
$dataAlamat = isset($_POST['txtAlamat']) ? $_POST['txtAlamat'] : '';
$dataNoTelepon = isset($_POST['txtNoTelepon']) ? $_POST['txtNoTelepon'] : '';
$dataUsername = isset($_POST['txtUsername']) ? $_POST['txtUsername'] : '';
$dataPassword = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : '';

?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self" id="form1">
    <table class="table-list" width="650" border="0" cellspacing="1" cellpadding="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>TAMBAH DATA GURU</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width="185">Kode</td>
            <td width="6">:</td>
            <td width="437"><input name="textfield" type="text" value="<?php echo $dataKode; ?>" 
            size="10" maxlength="4" /></td>
        </tr>
        <tr>
            <td>Nama Guru</td>
            <td>:</td>
            <td><input name="txtNama" type="text" value="<?php echo $dataNama; ?>" 
            size="60" maxlength="100" /></td>
        </tr>
        <tr>
            <td>Kelamin</td>
            <td>:</td>
            <td><select name="cmbKelamin"><option value="Kosong">....</option>
            <?php
            $pilihan = array("L"=> "Laki-laki (L)", "P" => "Perempuan (P)");
            foreach ($pilihan as $index => $nilai) {
                if ($dataKelamin == $index) {
                    $cek = " selected";
                } else {
                    $cek = ""; }
                    echo "<option value='$index' $cek>$nilai</option>";
                }
                ?>
                </select></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input name="txtAlamat" type="text" id="txtAlamat" 
            value="<?php echo $dataAlamat; ?>" size="70" maxlength="100" /></td>
        </tr>
        <tr>
            <td>No. Telepon</td>
            <td>:</td>
            <td><input name="txtNoTelepon" type="text" id="txtNoTelepon" 
            value="<?php echo $dataNoTelepon; ?>" size="30" maxlength="20" /></td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td><input name="txtUsername" type="text" id="txtUsername" 
            value="<?php echo $dataUsername; ?>" size="20" maxlength="20" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input name="txtPassword" type="password" id="txtPassword" 
            size="20" maxlength="20" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input name="btnSimpan" type="submit" id="btnSimpan" value="Simpan" /></td>
        </tr>
    </table>
</form>
