<?php
// Validasi Login User
include_once "../library/inc.seslogin.php";
// Koneksi ke database MySQL
include_once "../library/inc.connection.php";
// Membaca file Library 
include_once "../library/inc.library.php";

# SKRIP TOMBOL SIMPAN SAAT DIKLIK
if (isset($_POST['btnSimpan'])) {
    // membaca data dari form input 
    $txtNama = $_POST['txtNama'];
    $txtKeterangan = $_POST['txtKeterangan'];
    $cmbPelajaran = $_POST['cmbPelajaran'];
    $cmbGuru = $_POST['cmbGuru'];

    // Validasi form input
    $pesanError = array();
    if (trim($txtNama)=="") {
        $pesanError[] = "Data <b>Nama Materi</b> tidak boleh kosong!";
    }
    if (trim($txtKeterangan)=="") {
        $pesanError[] = "Data <b>Keterangan</b> tidak boleh kosong!";
    }
    if (trim($cmbPelajaran)=="Kosong") {
        $pesanError[] = "Data <b>Pelajaran</b> belum dipilih!";
    }
    if (trim($cmbGuru)=="Kosong") {
        $pesanError[] = "Data <b>Guru</b> tidak boleh kosong!";
    }

    // menampilkan pesan error dari form
    if (count($pesanError)>=1) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'><br><hr>";
        $noPesan = 0;
        foreach ($pesanError as $index=>$pesan_tampil) {
        $noPesan++;
        echo "&nbsp; $noPesan. $pesan_tampil<br>";
    }
    echo "</div> </br>";
} else {
    // skrip simpan data ke databse

    // membuat kode otomatis
    $kodeBaru = buatKode("materi_belajar", "M");

    # Skrip Upload file materi
    if (! empty($_FILES['txtNamaFile']['tmp_name'])) {
        // Jika file materi tidak kosong (ada materi yang dipilih)
        $nama_file = $_FILES['txtNamaFile']['name'];
        $nama_file = stripslashes($nama_file);
        $nama_file = str_replace("''","",$nama_file);

        // proses copy materi (menyimpan) ke folder
        $nama_file = $kodeBaru.".".$nama_file;
        copy($_FILES['xtxNamaFile']['tmp_name'],"../materi/ ".$nama_file);

    }
    else {
        // Jika file materi tidak dipilih, maka simpan data kosong
        $nama_file = "";
    }

    // skrip simpan data ke database
    $mySql = "INSERT INTO materi_belajar (kd_materi, nm_materi, keterangan, 
    file_materi, kd_pelajaran, kd_guru) VALUES ('$kodeBaru', '$txtNama', 
    '$txtKeterangan', '$nama_file', '$cmbPelajaran', '$cmbGuru')";

    $myQry = mysqli_query($mySql, $koneksidb) or die ("Gagal query".mysqli_error());
    if($myQry) {
        echo "<meta http-equiv='refresh'content='0;url=?open=Materi-Add'>";
    }
    exit;
}
}

// Membuat variabel isi ke Form
$dataKode = buatKode("materi_belajar", "M");
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : '';
$dataKeterangan = isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : '';
$dataPelajaran = isset($_POST['cmbPelajaran']) ? $_POST['cmbPelajaran'] : '';
$dataGuru = isset($_POST['cmbGuru']) ? $_POST['cmbGuru'] : '';
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" 
name="form1" target="_self" id="form1">
    <table class="table-list" width="700" border="0" cellspacing="1" cellpadding="3">
        <tr>
            <td width="209" bgcolor="#CCCCCC">
                <strong>TAMBAH DATA MATERI</strong>
            </td>
            <td width="6">&nbsp;</td>
            <td width="463">&nbsp;</td>
        </tr>
        <tr>
            <td>
                <strong>Kode</strong>
            </td>
            <td>:</td>
            <td><input name="textfield" type="text" value="<?php echo $dataKode; ?>" size="10" 
            maxlength="4" /></td>
        </tr>
        <tr>
            <td>
                <strong>Nama Materi</strong>
            </td>
            <td>:</td>
            <td><input name="txtNama" type="text" id="txtNama" value="<?php echo $dataNama; ?>" size="70" 
            maxlength="100" /></td>
        </tr>
        <tr>
            <td>
                <strong>Keterangan</strong>
            </td>
            <td>:</td>
            <td><input name="txtKeterangan" type="text" id="txtKeterangan" value="<?php echo $dataKeterangan; ?>" 
            size="70" maxlength="200" /></td>
        </tr>
        <tr>
      <td><strong>Pelajaran</strong></td>
      <td>:</td>
<td><select name="cmbPelajaran">
<option value="Kosong">....</option>
<?php
// Skrip menampilkan data Pelajaran ke dalam List/Menu 
$bacaSql = "SELECT * FROM pelajaran ORDER BY kd_pelajaran";
$bacaQry = mysqli_query($bacaSql, $koneksidb) or die ("Gagal Query".mysqli_error());
while ($bacaData = mysqli_fetch_array($bacaQry)) {
	if ($bacaData['kd_pelajaran'] == $dataPelajaran) {
		$cek = " selected";
	} else { $cek=""; }
	
	echo "<option value='$bacaData[kd_pelajaran]' $cek> $bacaData[nm_pelajaran] </option>";
}
?>
</select>	</td>
    </tr>
    <tr>
      <td><strong>Guru</strong></td>
      <td>:</td>
      <td><select name="cmbGuru" id="cmbGuru">
        <option value="Kosong">....</option>
	<?php
	// Skrip menampilkan data Guru ke dalam List/Menu 
	$bacaSql = "SELECT * FROM guru ORDER BY kd_guru";
	$bacaQry = mysqli_query($bacaSql, $koneksidb) or die ("Gagal Query".mysqli_error());
	while ($bacaData = mysqli_fetch_array($bacaQry)) {
	if ($bacaData['kd_guru'] == $dataGuru) {
		$cek = " selected";
	} else { $cek=""; }
	
	echo "<option value='$bacaData[kd_guru]' $cek> $bacaData[nm_guru] </option>";
	}
	?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnSimpan" value=" SIMPAN " style="cursor:pointer;" /></td>
    </tr>
  </table>
</form>