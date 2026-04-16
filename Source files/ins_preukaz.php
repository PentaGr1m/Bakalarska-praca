<?php
session_start();
require "connect.php";
$id_kniz = $_SESSION['id_kniz'];
$id_citatela	= $_POST['citatel'];
$platnost = $_POST['platnost'];
$datum_zhotovenia = date("Y-m-d");

$sql=MySQLi_Query($spojenie,"INSERT INTO citatelsky_preukaz VALUES(null,'$datum_zhotovenia','$platnost',$id_citatela,$id_kniz)");
if (!$sql):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
endif;

?>
<meta http-equiv="refresh" content="0 workplace.php">