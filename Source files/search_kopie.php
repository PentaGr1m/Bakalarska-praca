<?php
session_start();
require 'connect.php';

$vyhladavane = $_GET['vyhladavane'];

 $_SESSION["vyhladane"]="SELECT titul.isbn as isbn,titul.nazov_titulu as nazov, titul.rok_vydania as rok, kopia.isbn,kopia.stav as stav, kopia.id_kniznice,kniznica.id_kniznice,kniznica.nazov_kniznice as nazov_kniz 
                                    FROM titul,kopia,kniznica
                                    WHERE titul.isbn = kopia.isbn and kopia.id_kniznice=kniznica.id_kniznice and titul.nazov_titulu LIKE '%$vyhladavane%'";



?>
<meta http-equiv="refresh" content="0 verejny_search.php">
