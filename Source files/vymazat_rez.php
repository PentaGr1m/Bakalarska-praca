<?php
require "connect.php";

$id_rez	= $_GET['id_rez'];

if (!$spojenie):
    echo "Spojenie s DB sa nepodarilo !";
else:
    $sql=MySQLi_Query($spojenie,"Update rezervacia SET stav = 'Ukončená' WHERE id_rezervacie=$id_rez");
    if (!$sql):
        echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
    else:
        ?>
        <meta http-equiv="refresh" content="0 search_rezervacie.php">

    <?php

    endif;

endif;
?>
