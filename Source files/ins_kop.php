<?php
require "connect.php";

$titul	= $_POST['tit'];
$id_kniz= $_POST['kniznica'];
$cena	= $_POST['cena'];
$datum	= $_POST['datum'];
$id_dod	= $_POST['dodavatel'];

$sql=MySQLi_Query($spojenie,"INSERT INTO kopia VALUES (null,'Vrátená','$id_kniz','$titul',$cena,'$datum','$id_dod')");
if (!$sql):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:

    endif;
?>
<meta http-equiv="refresh" content="0 workplace.php">