<?php
require "connect.php";

$isbn	= $_POST['isbn'];
$nazov_titulu= $_POST['nazov_titulu'];
$rok_vydania	= $_POST['rok_vydania'];
$Signatura	= $_POST['Signatura'];


$sql=MySQLi_Query($spojenie,"INSERT INTO titul VALUES ('$isbn','$nazov_titulu','$rok_vydania','$Signatura')");
if (!$sql):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:

    $autori = array();
    $i1 = 1;
    while(isset($_POST['a'.$i1])){
        $autori[$i1]=$_POST['a'.$i1];
        $i1 = $i1 + 1;
    }

    for ($i2=1; $i2<=count($autori); $i2++) {

        $sql=MySQLi_Query($spojenie,"INSERT INTO napisal VALUES ($autori[$i2],'$isbn','$i2')");
    }

endif;

?>
<meta http-equiv="refresh" content="0 nova_kopia.php">