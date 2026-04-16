<?php
session_start();
require "connect.php";

if(!isset($_SESSION['id_zam']))
{
    header("location:login.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>





    <style>
        th{background-color: white}
        tr{background-color:white}
    </style>

</head>
<?php

$id_kniznice= $_SESSION['id_kniz'];

$sql=MySQLi_Query($spojenie,"SElECT pokuta.id_pokuty, pokuta.druh_pokuty as druh, pokuta.vyska_pokuty as vyska,DATE_FORMAT(pokuta.datum_udelenia_pokuty, '%d.%m.%y') as datum,pokuta.id_zamestnanca, pokuta.id_preukazu,
                                            zamestnanec.id_zamestnanca, zamestnanec.krstne_meno as meno_zam, zamestnanec.priezvisko as priez_zam, zamestnanec.id_kniznice,
                                            citatelsky_preukaz.id_preukazu, citatelsky_preukaz.id_citatela, citatel.id_citatela, citatel.krstne_meno as cit_meno, citatel.priezvisko as cit_priezvisko  
                                    FROM pokuta, zamestnanec, citatelsky_preukaz, citatel
                                    WHERE pokuta.id_zamestnanca = zamestnanec.id_zamestnanca and pokuta.id_preukazu = citatelsky_preukaz.id_preukazu and citatelsky_preukaz.id_citatela = citatel.id_citatela and zamestnanec.id_kniznice = $id_kniznice");



?>
<body>

<table width="1230" cellspacing="0" border = "1" cellpadding="0">
    <tr>
        <th width="70" scope="col">Druh pokuty</th>
        <th width="50" scope="col">Výška pokuty</th>
        <th width="50" scope="col">Dátum udelenia pokuty</th>
        <th width="100" scope="col">Čitateľ</th>
        <th width="100" scope="col">Zamestnanec</th>



    </tr>

    <?php
    while ($zaznam	= mysqli_fetch_assoc($sql)):
        ?>
        <tr>

            <td align="center"><?php echo $zaznam['druh'];?></td>
            <td align="center"><?php echo $zaznam['vyska'];?></td>
            <td align="center"><?php echo $zaznam['datum'];?></td>
            <td align="center"><?php echo $zaznam['cit_meno'].' '.$zaznam['cit_priezvisko'];?></td>
            <td align="center"><?php echo $zaznam['meno_zam'].' '.$zaznam['priez_zam'];?></td>



        </tr>
    <?php
    endwhile;
    ?>
</table>
</body>
</html>