<?php
session_start();
require "connect.php";

$datum_poz = date("Y-m-d");
$datum_vrat = $_POST['datum_vratenia'];
$id_zam = $_SESSION['id_zam'];
$id_preukazu = $_POST['citatel'];
$kopia = $_POST['kop'];

$sql=MySQLi_Query($spojenie,"INSERT INTO vypozicka VALUES(null,'Aktívna','$datum_poz','$datum_vrat',$id_zam,$id_preukazu,$kopia)");
$sql2=MySQLi_Query($spojenie,"UPDATE kopia SET stav = 'Požičaná' WHERE prirastkove_cislo = $kopia ");

if (!$sql):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
endif;
?>
<meta http-equiv="refresh" content="0 workplace.php">
