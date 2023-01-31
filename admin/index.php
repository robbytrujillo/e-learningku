<?php
session_start();
include_once "../library/inc.connection.php";
include_once "../library/inc.library.php";
include_once "../library/inc.pilihan.php";
include_once "../library/inc.tanggal.php";

//baca jam komputer
date_default_timezone_set("Asia/Jakarta")
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="../style/style.css">
    <link type="text/css" rel="stylesheet" href="../plugins/tigra_calendar/tcal.css">
    <script type="text/javascript" src="../plugins/tigra_calendar/tcal.js">
    </script>
</head>

<body>
    <?php include "menu.php" ?>
    <?php include "buka_file.php" ?>

</body>

</html>