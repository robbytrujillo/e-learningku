<?php
//validasi login user
include_once "../library/inc.seslogin.php";
//koneksi ke database Mysql
include_once "../library/inc.connection.php";
//membaca file library
include_once "../library/inc.library.php";

# Skrip tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
    //Baca data dari Form Input
    $txtNama = $_POST['txtNama'];

    //validasi form input
    $pesanError = array();
    if (trim($txtNama) == "") {
        $pesanError[] = "Data <b>Nama Pelajaran</b> tidak boleh kosong !";

    }

    //menampilkan pesan error dari form
    if (count($pesanError) >= 1) {
        echo "<div class='mssgBox'>";
        echo "<img src='../images/attention.png'><br><hr>";
        $noPesan = 0;
        foreach ($pesanError as $index => $pesan_tampil) {
            $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }
        echo "</div> <br>";
    } else {
        //skrip simpan data ke database
        $kodeBaru = buatKode("pelajaran", "P");
        $mySql = "INSERT INTO pelajaran (kd_pelajaran, nm_pelajaran) VALUES('$kodeBaru', '$txtNama')";
        $myQry = mysqli_query($mySql, $koneksidb) or die("Gagal Query" . mysqli_error());
        if ($myQry) {
            echo "<meya http=equiv='refresh' content='0; 
                url=?open=Pelajaran-Add'>";
        }
        exit;
    }

}

//Membuat variabel isi ke form
$dataKode = buatKode("pelajaran", "P");
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : '';
?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self" id="form1">
    <table class="table-list" width="650" border="0" cellspacing="1" cellpadding="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>TAMBAH PELAJARAN</strong></td>
            <td>$nbsp;</td>
            <td>$nbsp;</td>
        </tr>
        <tr>
            <td width="184">Kode</td>
            <td width="6">:</td>
            <td width="438"><input name="textfield" type="text" value="<?php echo $dataKode; ?>" size="10"
                    maxlength="4" /></td>
        </tr>
        <tr>
            <td width="184">Nama Pelajaran</td>
            <td>:</td>
            <td><input name="textNama" type="text" id="txtNama" value="<?php echo $dataNama; ?>" size="70"
                    maxlength="100" /></td>
        </tr>
        <tr>
            <td>&nbsp</td>
            <td>&nbsp</td>
            <td><input name="btnSimpan" type="submit" id="btnSimpan" value="Simoan" /></td>
        </tr>
    </table>
</form>