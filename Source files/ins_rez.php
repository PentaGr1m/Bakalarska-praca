<?php
session_start();
require "connect.php";

$datum_rez = date("Y-m-d");
$datum_konca = $_POST['datum_konca'];
$id_zam = $_SESSION['id_zam'];
$id_preukazu = $_POST['citatel'];
$titul = $_POST['tit'];

$sql=MySQLi_Query($spojenie,"INSERT INTO rezervacia VALUES(null,'Aktívna','$datum_rez','$datum_konca',$id_zam,$id_preukazu,'$titul')");


if (!$sql):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
endif;
?>
<meta http-equiv="refresh" content="0 workplace.php">