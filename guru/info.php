<?php
if(isset($_SESSION['SES_GURU'])) {
    echo "<h3>Selamat datang di Aplikasi E-Learning Ibnu Hajar Boarding School</h3>";
    echo "<b>Anda Login Sebagai Guru!</b>";
} else {
    echo "<h3>Selamat datang di Aplikasi E-Learning Ibnu Hajar Boarding School</h3>";
    echo "<b>Anda Belum Login, silahkan <a href='?open=Login' alt='Login'>login </a> sebagai Guru untuk mengakses sistem ini";
}
?>