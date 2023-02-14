<?php
// Validasi Login User
include_once "../library/inc.seslogin.php";
// Koneksi ke database MySQL
include_once "../libraryinc.connection.php";
// Membaca file library
include_once "../library/inc.library.php";

# Skrip tombol simpan saat diklik
if (isset($_POST['btnSimpan'])) {
    // Baca Data dari Form Input
    $txtNama = $_POST['txtNama'];
    $txtNis = $_POST['txtNis'];
    $cmbKelamin = $_POST['cmbKelamin'];
    $cmbAgama = $_POST['cmbAgama'];
    $txtAlamat = $_POST['txtAlamat'];
    $txtNoTelepon = $_POST['txtNoTelepon'];
    $txtUsername = $_POST['txtUsername'];
    $txtPassword = $_POST['txtPassword'];
    $txtTempatLhr = $_POST['txtTempatLhr'];
    $cmbTanggalLhr = $_POST['cmbTanggalLhr'];
    $cmbBulanLhr = $_POST['cmbBulamLhr'];
    $cmbTahunLhr = $_POST['cmbTahunLhr'];

    // Validasi Form Input
    $pesanError = array();
    if (trim($txtNis)=="") {
        $pesanError[] = "Data <b>Nis</b> tidak boleh kosong !";
    }
    if (trim($txtNama)=="") {
        $pesanError[] = "Data <b>nama Siswa</b> tidak boleh kosong !";
    }
    if (trim($cmbKelamin)=="") {
        $pesanError[] = "Data <b>Kelamin</b> tidak boleh kosong !";
    }
    if (trim($cmbAgama)=="") {
        $pesanError[] = "Data <b>Agama</b> tidak boleh kosong !";
    }
    if (trim($txtTempatLhr)=="") {
        $pesanError[] = "Data <b>Tempat Lahir</b> tidak boleh kosong !";
    }
    if (trim($cmbTanggalLhr)=="") {
        $pesanError[] = "Data <b>Tanggal Lahir</b> tidak boleh kosong !";
    }
    if (trim($cmbBulanLhr)=="") {
        $pesanError[] = "Data <b>Bulan Lahir</b> tidak boleh kosong !";
    }
    if (trim($cmbTahunLhr)=="") {
        $pesanError[] = "Data <b>Tahun Lahir</b> tidak boleh kosong !";
    }
    if (trim($txtAlamat)=="") {
        $pesanError[] = "Data <b>Alamat</b> tidak boleh kosong !";
    }
    if (trim($txtUsername)=="") {
        $pesanError[] = "Data <b>Username</b> tidak boleh kosong !";
    }
    if (trim($txtPassword)=="") {
        $pesanError[] = "Data <b>Password</b> tidak boleh kosong !";
    }

    // Menampilkan Pesan Error dari Form
    if (count($pesanError)>=1 ) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'> <br><hr>";
            $noPesan = 0;
            foreach ($pesanError as $index=>$pesan_tampil) {
                $noPesan++;
                    echo "&nbsp; $noPesan. $pesan_tampil<br>";
            }
        echo "</div> <br>";
    }
    else {
        // Skrip Simpan data ke Database
        $kodeBaru = buatKode("siswa", "S");

        // Menyusun Tanggal (Y-m-d)
        $tanggalLahir = $cmbTahunLhr."-".$cmbBulanLhr."-".$cmbTanggalLhr;

        # Skrip Upload file gambar
        if (!empty($_FILES['txtNamafile']['tmp_name'])) {
            // jika file foto tidak kosong (terdapat foto yang dipilih)
            $nama_file = $_FILES['txtNamaFile']['name'];
            $nama_file = stripslashes($nama_file);
            $nama_file = str_replace("'","",$nama_file);

            // Proses Copy Foto (menyimpan) ke folder
            $nama_file = $kodeBaru.".".$nama_file;
            copy($_FILES['txtNamaFile']['tmp_name'],"../foto/ ".$nama_file);
        } else {
            // Jika file foto tidak dipilih, maka simpan data kosong
            $nama_file = "";
        }

        // Skrip simpan data ke database
        $mySql = "INSERt INTO siswa (kd_siswa, nm_siswa, nis, kelamin, agama,
                  tempat_lahir, tanggal_lahir, alamat, no_telepon, foto, 
                  username, password) 
                  VALUES ('$kodeBaru', '$txtNama', '$txtNis', '$cmbKelamin', 
                  '$cmbAgama', '$txtTempatLhr', '$tanggalLahir, '$txtAlamat',
                  '$txtNoTelepon', '$nama_file', '$txtUsername', MD5('$txtPassword'))";

                  $myQry = mysqli_query($mySql, $koneksidb) or die ("Gagal query".mysqli_error());
                  if($myQry) {
                    echo "<meta http-equiv='refresh' content='0;url=?open=Siswa-Add'>";
                  }
        exit;
    }
}

// Membuat variabel isi ke form
$dataKode = buatKode("siswa", "S");
$dataNis = isset($_POST['txtNis']) ? $_POST['txtNis'] : '';
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : '';
$dataKelamin = isset($_POST['cmbKelamin']) ? $_POST['cmbKelamin'] : '';
$dataAgama = isset($_POST['cmbAgama']) ? $_POST['cmbAgama'] : '';
$dataTempatLhr = isset($_POST['txtTempatLhr']) ? $_POST['txtTempatLhr'] : '';
$dataTanggalLhr = isset($_POST['cmbTanggalLhr']) ? $_POST['cmbTanggalLhr'] : '';
$dataBulanLhr = isset($_POST['cmbBulanLhr']) ? $_POST['cmbBulanLhr'] : '';
$dataTahunLhr = isset($_POST['cmbTahunLhr']) ? $_POST['cmbTahunLhr'] : '';
$dataAlamat = isset($_POST['txtAlamat']) ? $_POST['txtAlamat'] : '';
$dataNoTelepon = isset($_POST['txtNoTelepon']) ? $_POST['txtNoTelepon'] : '';
$dataUsername = isset($_POST['txtUsername']) ? $_POST['txtUsername'] : '';
$dataPassword = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : '';
?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" 
name="form1" target="_self" id="form1">
    <table class="table-list" width="700" border="0" cellspacing="1" cellpadding="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>TAMBAH DATA SISWA </strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width="182"><strong>Kode</strong></td>
            <td width="8"><strong>:</strong></td>
            <td width="488"><input name="textfield" type="text" value="<?php echo $dataKode; ?>"
             size="10" maxlength="4" /></td>
        </tr>
        <tr>
            <td><strong>Nama Siswa </strong></td>
            <td><strong>:</strong></td>
            <td><input name="txtNama" type="text" id="txtNama" value="<?php echo $dataNama; ?>" 
            size="60" maxlength="100" /></td>
        </tr>
        <tr>
            <td><strong>Kelamin </strong></td>
            <td><strong>:</strong></td>
            <td><select name="cmbKelamin" <option value="Kosong">....</option>
            <?php
            $pilihan = array("L"=> "Laki-laki(L)", "P" => "Perempuan(P)");
            foreach ($pilihan as $index => $nilai) {
                if ($dataKelamin == $index) {
                    $cek=" selected";
                } else {
                    $cek = "";
                }
             echo "<option value='$indeks' $cek>$nilai</option>";
             }
            ?>
            </select> </td>
            </tr>
            <tr>
                <td><strong>Agama</strong></td>
                <td><strong>:</strong></td>
                <td><select name="cmbAgama">
                <option value="Kosong">....</option>
                <?php
                for ($tanggal = 1;$tanggal <= 31;$tanggal++) {
                // Skrip membuat angka 2 digit (1-9)
                if ($tanggal < 10) {
                    $tggl = "0".$tanggal;
                } else {
                    $tggl = $tanggal;
                }

                // Skrip tanggal terpilih
                if ($tggl == $dataTanggalLhr) {
                    $cek =" selected";
                } else {
                    $cek = "";
                }
                echo "<option value='$tggl' $cek> $tggl </option>";
                }
                ?>    
                </select> 1
                <select name="cmbBulanLhr">
                <option value="Kosong">....</option>
                <?php
                    for ($bukan = 1; $bulan <= 12; $bulan++) {
                        //skrip membuat angka 2 digit (1-9)
                        if ($bulan < 10) {
                            $bln = "0".$bulan;
                        } else {
                            $bln = $bulan;
                        }

                        if ($bln == $dataBulanLhr) {
                            $cek = "selected";
                        } else {
                            $cek = ""; 
                        } 
                        echo "<option value='$bln' $cek> $listBulan[$bln]</option>";
                    }
                ?>
                </select>
                - 
                <select name="cmbTahunLhr">
                    <option value="Kosong">....</option>
                    <?php
                    $thmuda = date('Y') -25;
                    $thtua  = date('Y') -10;
                    for ($tahun = $thmuda; $tahun <= $thtua; $tahun++) {
                        // Skrip tahun terpilih
                        if ($tahun == $dataTahunLhr) {
                            $cek ="selected"; 
                        } else {
                            $cek = "";
                        }
                        echo "<option value='$tahun' $cek> $tahun </option>";
                    }
                    ?>
                </select>
            </td>
            </tr>
            <tr>
                <td><strong>Alamat</strong></td>
                <td><strong>:</strong></td>
                <td><input name="txtAlamat" type="text" id="txtAlamat" 
                value="<?php echo $dataAlamat; ?>" size="70" maxlength="100" />
            </td>
            </tr>
            <tr>
                <td><strong>No. Telepon</strong></td>
                <td><strong>:</strong></td>
                <td><input name="txtNoTelepon" type="text" id="txtNoTelepon" 
                value="<?php echo $dataNoTelepon; ?>" size="25" maxlength="20" />
            </td>
            </tr>
            <tr>
                <td><strong>Foto</strong></td>
                <td><strong>:</strong></td>
                <td><input name="txtNamaFile" type="file" id="txtNamaFile" 
                size="40" maxlength="200" />
            </td>
            </tr>
            <tr>
                <td><strong>Username</strong></td>
                <td><strong>:</strong></td>
                <td><input name="txtUsername" type="text" id="txtUsername" 
                value="<?php echo $dataUsername; ?>" size="20" maxlength="20" />
            </td>
            </tr>
            <tr>
                <td><strong>Password</strong></td>
                <td><strong>:</strong></td>
                <td><input name="txtPassword" type="password" id="txtPassword" 
                size="20" maxlength="20" />
            </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input name="btnSimpan" type="submit" id="btnSimpan" 
                value="Simpan" />
            </td>
            </tr>
    </table>
</form>