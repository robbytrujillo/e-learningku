<?php
//validasi login User
include_once "../library/inc.seslogin.php";
//koneksi ke database Mysql
include_once "../library/inc.connection.php";
//membaca file libraryi
include_once "../library/inc.library.php";

#skrip tombol tambah diklik
if (isset($_POST['btnTambah'])) {
    //baca data dari form input
    $cmbSiswa = $_POST['cmbSiswa'];

    //validasi form input
    $pesanError = array();
    if (trim($cmbSiswa)=="Kosong") {
        $pesanError[] = "Data <b>Siswa</b> belum ada yang dipilih !</b>";
    }

    //menampilkan pesan error dari form
    if (count($pesanError)>=1) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'><br><hr>";
        $noPesan = 0;
        foreach ($pesanError as $index=>$pesan_tampil) {
            $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }
        echo "</div><br>";
    } else {
        //skrip Simpan data ke database
        $mySql = "INSERT INTO tmp_kelas (kd_siswa) VALUES('$cmbSiswa')";
        $myQry = mysqli_query($mySql, $koneksidb) or die("Gagal Query" . mysqli_error());
        if ($myQry) {
            echo "<meta http-equiv='refresh' content='0; url=?open=Kelas-Add'>";
        }
        exit;
    }
}

    #skrip tombol simpan diklik
    if (isset($_POST['btnSimpan'])) {
        //baca data dari form input
    $txtNama = $_POST['txtNama'];
    $cmbGuru = $_POST['cmbGuru'];

    // Validasi Form Inputs
	$pesanError = array();
	if (trim($txtNama)=="") {
		$pesanError[] = "Data <b>Nama Kelas</b> tidak boleh kosong !";		
	}
	if (trim($cmbGuru)=="Kosong") {
		$pesanError[] = "Data <b>Guru Wali</b> belum ada yang dipilih !";		
	}
	
	// Menampilkan Pesan Error dari Form
	if (count($pesanError)>=1 ){
		echo "<div class='mssgBox'>";
		echo "<img src='../images/attention.png'> <br><hr>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
	}
	else {
		// Skrip Simpan data ke Database
		$kodeBaru	= buatKode("kelas", "K");
		$mySql	= "INSERT INTO kelas (kd_kelas, nm_kelas, kd_guru) VALUES('$kodeBaru', '$txtNama', '$cmbGuru')";
		$myQry	= mysqli_query($mySql, $koneksidb) or die ("Gagal query 1 ".mysqli_error());
		if($myQry){
			
			// Memindahkan data Siswa dalam Kelas
			$bacaSql	= "SELECT * FROM tmp_kelas ORDER BY id";
			$bacaQry	= mysqli_query($bacaSql, $koneksidb) or die ("Gagal query tampil ".mysqli_error());
			while($bacaData = mysqli_fetch_array($bacaQry)) {
				$kodeSiswa	= $bacaData['kd_siswa'];
				$my2Sql		= "INSERT INTO kelas_siswa(kd_kelas, kd_siswa) VALUES('$kodeBaru', '$kodeSiswa')";
				mysqli_query($my2Sql, $koneksidb) or die ("Gagal query 2 ".mysqli_error());
			}
			
			// Menghapus data Siswa dalam TMP
			$hapusSql	= "DELETE FROM tmp_kelas";
			mysqli_query($hapusSql, $koneksidb) or die ("Gagal hapus tmp ".mysqli_error());
			
			echo "<meta http-equiv='refresh' content='0; url=?open=Kelas-Add'>";
		}
		exit;	
	}
		
}
 
// Membuat variabel isi ke form
$dataKode = buatKode("kelas", "K");
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : '';
$dataGuru = isset($_POST['cmbGuru']) ? $_POST['cmbGuru'] : '';
 
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self" id="form1">
  <table class="table-list" width="650" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td bgcolor="#CCCCCC"><strong>TAMBAH DATA KELAS </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="183"><strong>Kode</strong></td>
      <td width="6">:</td>
      <td width="439"><input name="textfield" type="text" value="<?php echo $dataKode; ?>" size="10" maxlength="4" /></td>
    </tr>
    <tr>
      <td><strong>Nama Kelas </strong></td>
      <td>:</td>
      <td><input name="txtNama" type="text" id="txtNama" value="<?php echo $dataNama; ?>" size="60" maxlength="100" /></td>
    </tr>
    <tr>
      <td><strong>Guru Wali </strong></td>
      <td>:</td>
      <td><select name="cmbGuru">
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
      <td><input name="btnSimpan" type="submit" id="btnSimpan" value="Simpan" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC"><strong>DATA SISWA </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>NIS Siswa </strong></td>
      <td>&nbsp;</td>
      <td><select name="cmbSiswa">
        <option value="Kosong">....</option>
        <?php
	// Skrip menampilkan data Siswa ke dalam List/Menu 
	$bacaSql = "SELECT * FROM siswa ORDER BY kd_siswa";
	$bacaQry = mysqli_query($bacaSql, $koneksidb) or die ("Gagal Query".mysqli_error());
	while ($bacaData = mysqli_fetch_array($bacaQry)) {
	if ($bacaData['kd_siswa'] == $dataSiswa) {
		$cek = " selected";
	} else { $cek=""; }
	
	echo "<option value='$bacaData[kd_siswa]' $cek> $bacaData[nis] | $bacaData[nm_siswa] </option>";
	}
	?>
      </select>
      <input name="btnTambah" type="submit" id="btnTambah" value="Tambah" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <table class="table-list" width="650" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td width="4%" bgcolor="#CCCCCC"><strong>No</strong></td>
      <td width="10%" bgcolor="#CCCCCC"><strong>Kode</strong></td>
      <td width="11%" bgcolor="#CCCCCC"><strong>NIS</strong></td>
      <td width="47%" bgcolor="#CCCCCC"><strong>Nama Siswa </strong></td>
      <td width="7%" bgcolor="#CCCCCC"><strong>L/P</strong></td>
      <td width="21%" bgcolor="#CCCCCC"><strong>Username</strong></td>
    </tr>
    <?php
// Skrip menampilkan data Siswa yang dimiili oleh Kelas
$tmpSql 	= "SELECT tmp_kelas.*, siswa.nis, siswa.nm_siswa, siswa.kelamin, siswa.username 
				FROM tmp_kelas LEFT JOIN  siswa ON tmp_kelas.kd_siswa = siswa.kd_siswa 
				GROUP BY siswa.kd_siswa ORDER BY  siswa.kd_siswa ASC";
$tmpQry 	= mysqli_query($tmpSql, $koneksidb)  or die ("Query  salah: ".mysqli_error());
$nomor  = 0; 
while ($tmpData = mysqli_fetch_array($tmpQry)) {
	$nomor++;
	$Kode = $tmpData['kd_siswa'];
?>
    <tr>
      <td><?php echo $nomor; ?> </td>
      <td><?php echo $tmpData['kd_siswa']; ?> </td>
      <td><?php echo $tmpData['nis']; ?> </td>
      <td><?php echo $tmpData['nm_siswa']; ?> </td>
      <td><?php echo $tmpData['kelamin']; ?> </td>
      <td><?php echo $tmpData['username']; ?> </td>
    </tr>
    <?php } ?>
  </table>
</form>
