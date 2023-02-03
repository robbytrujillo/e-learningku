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

        # Kontrol Program login
        case 'Login':
            if (!file_exists("login.php"))
                die("File tidak ada !");
            include "login.php";
            break;

        case 'Login-Validasi':
            if (!file_exists("login_validasi.php"))
                die("File tidak ada !");
            include "login_validasi.php";
            break;

        case 'Logout':
            if (!file_exists("logout.php"))
                die("File tidak ada !");
            include "logout.php";
            break;


        # Kontrol Program Manajemen Data Pelajaran
        case 'Pelajaran-Data':
            if (!file_exists("pelajaran_data.php"))
                die("File tidak ada !");
            include "pelajaran_data.php";
            break;

        case 'Pelajaran-Add':
            if (!file_exists("pelajaran_add.php"))
                die("File tidak ada !");
            include "pelajaran_add.php";
            break;

        case 'Pelajaran-Delete':
            if (!file_exists("pelajaran_delete.php"))
                die("File tidak ada !");
            include "pelajaran_delete.php";
            break;

        case 'Pelajaran-Edit':
            if (!file_exists("pelajaran_edit.php"))
                die("File tidak ada !");
            include "pelajaran_edit.php";
            break;

        # Kontrol Program Manajemen Data Kelas
        case 'Kelas-Data':
            if (!file_exists("kelas_data.php"))
                die("File tidak ada !");
            include "kelas_data.php";
            break;

        case 'Kelas-Add':
            if (!file_exists("kelas_add.php"))
                die("File tidak ada !");
            include "kelas_add.php";
            break;

        case 'Kelas-Delete':
            if (!file_exists("kelas_delete.php"))
                die("File tidak ada !");
            include "kelas_delete.php";
            break;

        case 'Kelas-Edit':
            if (!file_exists("kelas_edit.php"))
                die("File tidak ada !");
            include "kelas_edit.php";
            break;

        # Data USER
        case 'User-Data':
            if (!file_exists("user_data.php"))
                die("File tidak ada !");
            include "user_data.php";
            break;

        case 'User-Add':
            if (!file_exists("user_add.php"))
                die("File tidak ada !");
            include "user_add.php";
            break;

        case 'User-Delete':
            if (!file_exists("user_delete.php"))
                die("File tidak ada !");
            include "user_delete.php";
            break;

        case 'User-Edit':
            if (!file_exists("user_edit.php"))
                die("File tidak ada !");
            include "user_edit.php";
            break;

        # Data GURU
        case 'Guru-Data':
            if (!file_exists("guru_data.php"))
                die("File tidak ada !");
            include "guru_data.php";
            break;

        case 'Guru-Add':
            if (!file_exists("guru_add.php"))
                die("File tidak ada !");
            include "guru_add.php";
            break;

        case 'Guru-Delete':
            if (!file_exists("guru_delete.php"))
                die("File tidak ada !");
            include "guru_delete.php";
            break;

        case 'Guru-Edit':
            if (!file_exists("guru_edit.php"))
                die("File tidak ada !");
            include "guru_edit.php";
            break;

        # Data SISWA
        case 'Siswa-Data':
            if (!file_exists("siswa_data.php"))
                die("File tidak ada !");
            include "siswa_data.php";
            break;

        case 'Siswa-Add':
            if (!file_exists("siswa_add.php"))
                die("File tidak ada !");
            include "siswa_add.php";
            break;

        case 'Siswa-Delete':
            if (!file_exists("siswa_delete.php"))
                die("File tidak ada !");
            include "siswa_delete.php";
            break;

        case 'Siswa-Edit':
            if (!file_exists("siswa_edit.php"))
                die("File tidak ada !");
            include "siswa_edit.php";
            break;

        # Data Materi Belajar
        case 'Materi-Data':
            if (!file_exists("materi_data.php"))
                die("File tidak ada !");
            include "materi_data.php";
            break;

        case 'Materi-Add':
            if (!file_exists("materi_add.php"))
                die("File tidak ada !");
            include "materi_add.php";
            break;

        case 'Materi-Delete':
            if (!file_exists("materi_delete.php"))
                die("File tidak ada !");
            include "materi_delete.php";
            break;

        case 'Materi-Edit':
            if (!file_exists("materi_edit.php"))
                die("File tidak ada !");
            include "materi_edit.php";
            break;

        # Data Tugas Belajar
        case 'Tugas-Data':
            if (!file_exists("tugas_data.php"))
                die("File tidak ada !");
            include "tugas_data.php";
            break;

        case 'Tugas-Add':
            if (!file_exists("tugas_add.php"))
                die("File tidak ada !");
            include "tugas_add.php";
            break;

        case 'Tugas-Delete':
            if (!file_exists("tugas_delete.php"))
                die("File tidak ada !");
            include "tugas_delete.php";
            break;

        case 'Tugas-Edit':
            if (!file_exists("tugas_edit.php"))
                die("File tidak ada !");
            include "tugas_edit.php";
            break;
        
        # Data Mengajar
        case 'Mengajar-Data':
            if (!file_exists("mengajar_data.php"))
                die("File tidak ada !");
            include "mengajar_data.php";
            break;

        case 'Mengajar-Add':
            if (!file_exists("mengajar_add.php"))
                die("File tidak ada !");
            include "mengajar_add.php";
            break;

        case 'Mengajar-Delete':
            if (!file_exists("mengajar_delete.php"))
                die("File tidak ada !");
            include "mengajar_delete.php";
            break;

        case 'Mengajar-Edit':
            if (!file_exists("mengajar_edit.php"))
                die("File tidak ada !");
            include "mengajar_edit.php";
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