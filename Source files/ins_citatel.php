<?php

require "connect.php";

$meno	= $_POST['meno'];
$priezvisko= $_POST['priezvisko'];
$cislo	= $_POST['tel_cislo'];
$email	= $_POST['email'];
$mesto	= $_POST['mesto'];
$ulica	= $_POST['ulica'];
$psc	= $_POST['psc'];

$sql=MySQLi_Query($spojenie,"INSERT INTO citatel VALUES(null,'$meno','$priezvisko','$cislo','$email','$mesto','$ulica','$psc')");
if (!$sql):
echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
endif;

?>
<meta http-equiv="refresh" content="0 novy_preukaz.php">
