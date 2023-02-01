<?php
#KONTROL MENU PROGRAM
if (isset($_GET['open'])) {
    // Jika mendapatkan variable URL ?open 
    switch ($_GET['open']) {
        case '':
            if (!file_exists("info.php"))
                die("File tidak ada !");
            include "info.php";
            break;
        case 'Halaman Utama':
            if (!file_exists("info.php"))
                die("File tidak ada !");
            include "info.php";
            break;
        default:
            if (!file_exists("info.php"))
                die("File tidak ada !");
            include "info.php";
            break;
    }
} else {
    //Jika tidak mendapatkan variabel URL : ?open
    if (!file_exists("info.php"))
        die("File tidak ada !");
    include "info.php";
}
?>