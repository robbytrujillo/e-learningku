<?php
#koneksi ke database
$myHost = "localhost";
$myUser = "root";
$myPass = "";
$myDbs = "elearning_db"; //nama database

#konek ke database
$koneksidb = mysqli_connect($myHost, $myUser, $myPass);
if (!$koneksidb) {
    echo "Koneksi MYSQL gagal, periksa (Host/User/Password)-nya !";
}

#Memilih database pada MySQL Server
mysqli_select_db($myDbs) or die("Database <b>$myDbs</b> tidak ditemukan !");
?>