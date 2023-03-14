<?php
session_start();
include_once "../library/inc.connection.php";
include_once "../library/inc.library.php";
include_once "../library/inc.pilihan.php";
include_once "../library/inc.tanggal.php";

// Baca Jam pada Sistem Komputer
date_default_timezone_set("Asia/Jakarta");
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> :: Halaman Guru</title>
    <link type="txt/css" rel="stylesheet" href="../styles/style.css">
    
    <link type="txt/css" rel="stylesheet" href="../plugins/tigra_calendar/tcal.css"/>

    <script type="txt/javascript" src="../plugins/tigra_calendar/tcal.js"></script>
</head>
<div id="wrap"></div>
<body>
    <table width="100%" class="table-main">
        <tr>
            <td height="103" colspan="2">
                <div id="header"><a href="?open"><img src="../images/logo.png" border="0" /></a></div>
            </td>
        </tr>
        <tr valign="top">
            <td width="15%" style="border-right:5px solid #DDDDDD;">
            <div style="margin:5px; padding:5px;">
        <?php include "menu.php"; ?>
        </div>
        </td>
        <td width="69%" height="550"></div style="margin:5px; padding:5px;">
        
        <?php include "buka_file.php"; ?> </div>
        </td>
        </tr>
    </table>
</body>
</div>
</html>
