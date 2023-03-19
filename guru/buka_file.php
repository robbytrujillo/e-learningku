<?php
# KONTROL MENU PROGRAM
if (isset($_GET['open'])) {
    // Jika mendapatkan variabel URL ?open
    switch($_GET['open']) {
        case '' :
            if(!file_exists ("info.php")) die ("File tidak ada !");
            include "info.php"; break;
            
        case 'Halaman-Utama' :
            if(!file_exists ("info.php")) die ("File tidak ada !");
            include "info.php"; break;

        # KONTROL PROGRAM LOGIN
        case 'Login' :
            if(!file_exists("info.php")) die ("File tidak ada !");
            include "info.php"; break;

        case 'Login-Validasi' :
            if(!file_exists("login_validasi.php")) die ("File tidak ada !");
            include "login_validasi.php"; break;

        case 'Logout' :
            if(!file_exists("logout.php")) die ("File tidak ada !");
            include "logout.php"; break;

        case 'Jadwal-Tampil' :
            if(!file_exists("jadwal_tampil.php")) die ("File tidak ada !");
            include "jadwal_tampil.php"; break;
    }
    
}

?>