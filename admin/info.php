<?php
if (isset($_SESSION['SES_LOGIN'])) {
    echo "<h3>Selamat Datang di Aplikasi E-Learning IHBS Jakarta !</h3>";
    echo "<b>Anda Login Sebagai Admin";
    exit;
} else {
    echo "<h3>Selamat Datang di Aplikasi E-Learning IHBS Jakarta !</h3>";
    echo "<b>Anda belum Login, silahkan <a href='?open=Login' alt='Login>login </a>untuk mengakses sistem ini ";
}
?>