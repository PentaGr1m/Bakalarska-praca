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

$sql=MySQLi_Query($spojenie,"SElECT rezervacia.id_rezervacie as id_rez, rezervacia.stav as stav, DATE_FORMAT(rezervacia.datum_rezervacie, '%d.%m.%y') as datum_rez, DATE_FORMAT(rezervacia.datum_konca_rezervacie, '%d.%m.%y') as datum_kon, rezervacia.isbn, rezervacia.id_zamestnanca,rezervacia.id_preukazu,
                                    citatelsky_preukaz.id_preukazu,citatelsky_preukaz.id_citatela,citatelsky_preukaz.id_kniznice,citatel.id_citatela, citatel.krstne_meno as meno, citatel.priezvisko as priezvisko,titul.isbn,titul.nazov_titulu as nazov,zamestnanec.id_zamestnanca,zamestnanec.krstne_meno as meno_zam,zamestnanec.priezvisko as priez_zam
                                    FROM rezervacia, citatelsky_preukaz, citatel, titul, zamestnanec
                                    WHERE rezervacia.isbn = titul.isbn and rezervacia.id_zamestnanca=zamestnanec.id_zamestnanca and rezervacia.id_preukazu=citatelsky_preukaz.id_preukazu and citatelsky_preukaz.id_citatela=citatel.id_citatela and citatelsky_preukaz.id_kniznice=$id_kniznice");



?>
<body>

<table width="1230" cellspacing="0" border = "1" cellpadding="0">
    <tr>
        <th width="50" scope="col"></th>
        <th width="70" scope="col">Rezervované pre</th>
        <th width="50" scope="col">Názov titulu</th>
        <th width="50" scope="col">Stav</th>
        <th width="100" scope="col">Dátum rezervácie</th>
        <th width="100" scope="col">Dátum konca rezervácie</th>
        <th width="70" scope="col">Rezerváciu spracoval</th>


    </tr>

    <?php
    while ($zaznam	= mysqli_fetch_assoc($sql)):
        ?>
        <tr>
            <td align="center"><a href=vymazat_rez.php?id_rez=<?php echo $zaznam['id_rez'];?>><img src="obrazky/vymazat.png" BORDER="0" title="Vymazať""></a></td>
            <td align="center"><?php echo $zaznam['meno'].' '.$zaznam['priezvisko'];?></td>
            <td align="center"><?php echo $zaznam['nazov'];?></td>
            <td align="center"><?php echo $zaznam['stav'];?></td>
            <td align="center"><?php echo $zaznam['datum_rez'];?></td>
            <td align="center"><?php echo $zaznam['datum_kon'];?></td>
            <td align="center"><?php echo $zaznam['meno_zam'].' '.$zaznam['priez_zam'];?></td>

        </tr>
    <?php
    endwhile;
    ?>
</table>
</body>
</html>

