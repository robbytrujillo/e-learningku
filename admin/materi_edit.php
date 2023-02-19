<?php
// validasi login User
include_once "../library/inc.seslogin.php";
// koneksi ke database MySQL
include_once "../library/inc.connection.php";
// Membaca file library
include_once "../library/inc.library.php";

# Skrip tombol simpan diklik
if(isset($_POST['btnSimpan'])) {
    // Baca Data dari Form Input
    $txtNama = $_POST['txtNama'];
    $txtKeterangan = $_POST['txtKeterangan'];
    $cmbPelajaran = $_POST['cmbPelajaran'];
    $cmbGuru = $_POST['cmbGuru'];

    // Validasi form inputs
    $pesanError = array();
    if (trim($txtNama)=="") {
        $pesanError[] = "Data <b>Nama Materi</b> tidak boleh kosong !";
    }
    if (trim($txtKeterangan)=="") {
        $pesanError[] = "Data <b>Keterangan</b> tidak boleh kosong !";
    }
    if (trim($cmbPelajaran)=="Kosong") {
        $pesanError[] = "Data <b>Pelajaran</b> belum dipilih !";
    }
    if (trim($cmbGuru)=="Kosong") {
        $pesanError[] = "Data <b>Guru</b> belum dipilih !";
    }

    // Menampilkan Pesan Error dari Form
    if (count($pesanError)>=1 ) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'> <br><hr>";
        $noPesan = 0;
        foreach ($pesanError as $index=>$spesan_tampil) {
            $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }
        echo "</div> <br>";
    }
    else {
        // Skrip Simpan data ke Database

        // Membaca Kode
        $kodeMateri = $_POST['txtKode'];

        # Skrip Upload file Materi
        if (empty($_FILES['txtNamaFile']['tmp_name'])) {
            // jika tidak ada file Materi baru, maka baca Materi Lama
            $nama_file = $_POST['txtFileLama'];
        }
        else {
            // jika file Materi lama ada, akan dihapus
            $txtFileLama = $_POST['txtFileLama'];
            if (file_exists("../materi/".$txtFileLama)) {
                unlink("../materi/".$txtFileLama);
            }

            // Membaca file Materi baru
            $nama_file = $_FILES['txtNamaFile']['name'];
            $nama_file = stripslashes($nama_file);
            $nama_file = str_replace("'","",$nama_file);

            // Mengkopi file Materi baru ke folder
            $nama_file = $kodeMateri.".".$nama_file;
            copy($_FILES['txtNamaFile']['tmp_name'],"../materi/".$nama_file);
        }

        // Skrip simpan data ke database
        $mySql = "UPDATE materi_belajar SET nm_materi='$txtNama', keterangan = '$txtKeterangan', 
        file_materi='$nama_file', kd_pelajar='$cmbPelajaran', kd_guru = '$cmbGuru' 
        WHERE kd_materi-'$kodeMateri'";

        $myQry = mysqli_query($mySql, $koneksidb) or die ("Gagal query".mysqli_error());
        if ($myQry) {
            echo "<meta http-equiv='refresh'content='0;url=?open=Materi-Data'>";
        }
        exit;
    }
}

# MEMBACA DATA DARI DATABASE UNTUK DIEDIT
$Kode = $_GET['Kode'];
$mySql = "SELECT * FROM materi_belajar WHERE kd_materi='$Kode'";
$myQry = mysqli_query($mySql, $koneksidb) or die ("Query salah : ".mysqli_error());
$myData = mysqli_fetch_array($myQry);

// Membuat variabel isi ke form
$dataKode = $myData['kd-materi'];
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : $myData['nm_materi'];
$dataKeterangan = isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : $myData['txtKeterangan'];
$dataPelajaran = isset($_POST['cmbPelajaran']) ? $_POST['cmbPelajaran'] : $myData['kd_pelajaran'];
$dataGuru = isset($_POST['cmbGuru']) ? $_POST['cmbGuru'] : $myData['kd_guru'];
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="form1" target="_self" id="form1">
<table class="table-list" width="700" border="0" cellspacing="1" cellpadding="3">
<tr>
    <td width="209" bgcolor="#CCCCCC">
        <strong>UBAH DATA MATERI</strong>
    </td>
    <td width="6">$nbsp;</td>
    <td width="463">$nbsp;</td>
</tr>
<tr>
    <td><strong>Kode</strong></td>
    <td>:</td>
    <td><input name="textfield" type="text" value="<?php echo $dataKode; ?>" size="10" maxlength="4" />
    <input name="textKode" type="hidden" id="txtKode" value="<?php echo $dataKode; ?>" />
</td>
</tr>
<tr>
    <td><strong>Nama Materi</strong></td>
    <td>:</td>
    <td><input name="txtNama" type="text" id="txtNama" value="<?php echo $dataNama; ?>" size="70" maxlength="100" />
</td>
</tr>
<tr>
    <td><strong>Keterangan</strong></td>
    <td>:</td>
    <td><input name="txtKeterangan" type="text" id="txtKeterangan" value="<?php echo $dataKeterangan; ?>" size="70" maxlength="200" />
    </td>
</tr>
<tr>
    <td>
        <strong>File Materi (Zip/PDF/Doc)</strong></td>
        <td>:</td>
        <td><input name="txtNamaFile" type="file" id="txtNamaFile" size="40" maxlength="200" />
        <input name="txtFileLama" type="hidden" id="txtFileLama" value="<?php echo $myData['file_materi']; ?>" />
    </td>
</tr>
<tr>
    <td><strong>Pelajaran</strong></td>
    <td>:</td>
    <td><select name="cmbPelajaran">
        <option value="Kosong">....</option>
        <?php
        // Skrip menampilkan data pelajaran ke dalam List/menu
        $bacaSql = "SELECT *FROM pelajaran ORDER BY kd_pelajaran";
        $bacaQry = mysqli_query($bacaSql, $koneksidb) or die ("Gagal Query".mysqli_error());
        while ($bacaData = mysqli_fetch_array($bacaQry)) {
            if ($bacaData['kd_pelajaran']== $dataPelajaran) {
                $cek = "selected";
            } else {
                $cek = "";
            }   
            echo "<option value='$bacaData[kd_pelajaran]' $cek> $bacaData[nm_pelajaran] </option>";
        }
        ?>
    </select></td>
</tr>
<tr>
    <td>
        <strong>Guru</strong></strong>
    </td>
    <td>:</td>
    <td><select name="cmbGuru" id="cmbGuru">
    <option value="Kosong">....</option>
        <?php
        // Skrip menampilkan data Guru ke dalam List/menu
        $bacaSql = "SELECT *FROM guru ORDER BY kd_pelajaran";
        $bacaQry = mysqli_query($bacaSql, $koneksidb) or die ("Gagal Query".mysqli_error());
        while ($bacaData = mysqli_fetch_array($bacaQry)) {
            if ($bacaData['kd_guru']== $dataGuru) {
                $cek = "selected";
            } else {
                $cek = "";
            }   
            echo "<option value='$bacaData[kd_guru]' $cek> $bacaData[nm_guru] </option>";
        }
        ?>
    </select></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="btnSimpan" value="SIMPAN" style="cursor:pointer;" /></td>
</tr>
</table>
</form>