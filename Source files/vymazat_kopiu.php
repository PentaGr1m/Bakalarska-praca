<?php
require "connect.php";

$id_kop	= $_GET['id_kop'];

if (!$spojenie):
    echo "Spojenie s DB sa nepodarilo !";
else:
    $sql=MySQLi_Query($spojenie,"Update kopia SET stav = 'Vyradená' WHERE prirastkove_cislo=$id_kop");
    if (!$sql):
        echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
    else:
        ?>
        <meta http-equiv="refresh" content="0 search_vsetko.php">

    <?php

    endif;

endif;
?>