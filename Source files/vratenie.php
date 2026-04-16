<?php
require "connect.php";

$id_vyp = $_GET['id_vyp'];

if (!$spojenie):
    echo "Spojenie s DB sa nepodarilo !";
else:
    $sql=MySQLi_Query($spojenie,"SELECT kopia.prirastkove_cislo as prir_cislo, vypozicka.prirastkove_cislo, vypozicka.id_vypozicky 
                                       FROM kopia, vypozicka
                                       WHERE kopia.prirastkove_cislo=vypozicka.prirastkove_cislo and vypozicka.id_vypozicky='$id_vyp'");
    $zaznam = mysqli_fetch_assoc($sql);
    $prir_cislo = $zaznam['prir_cislo'];
    $sql2=MySQLi_Query($spojenie,"Update vypozicka SET stav = 'Vrátená' WHERE id_vypozicky=$id_vyp");
    $sql3=MySQLi_Query($spojenie,"Update kopia SET stav = 'Vrátená' WHERE prirastkove_cislo=$prir_cislo");
    if (!$sql):
        echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
    else:
        ?>
        <meta http-equiv="refresh" content="0 search_vsetko.php">

    <?php

    endif;

endif;
?>