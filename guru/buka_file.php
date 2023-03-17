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
    }
    
}

?>