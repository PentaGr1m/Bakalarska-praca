<?php
require "connect.php";
$i1 = 1;
$i2 = 1;


$autori = array();
$priezviska = array();
while(isset($_POST['autor'.$i1])){
    $autori[$i1]=$_POST['autor'.$i1];
    $i1 = $i1 + 1;
}

while(isset($_POST['autor'.$i2.'_priez'])){
    $priezviska[$i2]=$_POST['autor'.$i2.'_priez'];
    $i2 = $i2 + 1;
}

for ($i3=1; $i3<=count($autori); $i3++) {
$sql=MySQLi_Query($spojenie,"INSERT INTO autor VALUES (null,'$autori[$i3]','$priezviska[$i3]')");

if (!$sql):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";


endif;
}
?>
<meta http-equiv="refresh" content="0 nova_kopia.php">
