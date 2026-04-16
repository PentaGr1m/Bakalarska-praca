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

$sql=MySQLi_Query($spojenie,"SElECT vypozicka.stav as stav, DATE_FORMAT(vypozicka.datum_pozicania, '%d.%m.%y') as datum_poz, DATE_FORMAT(vypozicka.datum_konca_vypozicky, '%d.%m.%y') as datum_vrat, vypozicka.id_vypozicky as id_vyp, vypozicka.prirastkove_cislo, vypozicka.id_preukazu, vypozicka.id_zamestnanca,
                                          citatelsky_preukaz.id_preukazu, citatelsky_preukaz.id_citatela, citatel.id_citatela, citatel.krstne_meno as meno, citatel.priezvisko as priezvisko, zamestnanec.id_zamestnanca, zamestnanec.krstne_meno as zam_meno, zamestnanec.priezvisko as zam_priez,
                                          kopia.prirastkove_cislo,kopia.isbn, titul.isbn, titul.nazov_titulu as nazov_tit
                    FROM vypozicka,citatelsky_preukaz, citatel, zamestnanec, kopia, titul   
                    WHERE vypozicka.id_zamestnanca = zamestnanec.id_zamestnanca AND citatelsky_preukaz.id_preukazu = vypozicka.id_preukazu AND citatelsky_preukaz.id_citatela = citatel.id_citatela AND vypozicka.prirastkove_cislo=kopia.prirastkove_cislo AND kopia.isbn = titul.isbn");



?>
<body>

<table width="1230" cellspacing="0" border = "1" cellpadding="0">
    <tr>

        <th width="50" scope="col"></th>
        <th width="100" scope="col">Čitateľ</th>
        <th width="100" scope="col">Názov titulu</th>
        <th width="70" scope="col">Stav</th>
        <th width="70" scope="col">Dátum požičania</th>
        <th width="70" scope="col">Dátum vrátenia</th>
        <th width="70" scope="col">Výpožičku spracoval</th>


    </tr>

    <?php
    while ($zaznam	= mysqli_fetch_assoc($sql)):
        ?>
        <tr>

            <td align="center"><a href="vratenie.php?id_vyp=<?php echo $zaznam['id_vyp'] ?>">Vrátenie</a></td>
            <td align="center"><?php echo $zaznam['meno'].' '.$zaznam['priezvisko'];?></td>
            <td align="center"><?php echo $zaznam['nazov_tit'];?></td>
            <td align="center"><?php echo $zaznam['stav'];?></td>
            <td align="center"><?php echo $zaznam['datum_poz'];?></td>
            <td align="center"><?php echo $zaznam['datum_vrat'];?></td>
            <td align="center"><?php echo $zaznam['zam_meno'].' '.$zaznam['zam_priez'];?></td>

        </tr>
    <?php
    endwhile;
    ?>
</table>
</body>
</html>

