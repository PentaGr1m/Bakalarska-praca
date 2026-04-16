<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>

</head>
<?php
require "connect.php";

$id_cit=$_POST['id_cit'];

$sql = MySQLi_Query($spojenie,"SELECT citatel.id_citatela, citatel.krstne_meno AS meno, citatel.priezvisko AS priezvisko, citatel.telefonne_cislo AS cislo, citatel.email AS email, citatel.mesto AS mesto, citatel.ulica AS ulica, citatel.psc AS psc, 
                                     citatelsky_preukaz.id_preukazu, citatelsky_preukaz.id_citatela, DATE_FORMAT(citatelsky_preukaz.platnost_do, '%d.%m.%y') AS platnost, DATE_FORMAT(citatelsky_preukaz.datum_zhotovenia, '%d.%m.%y') AS datum
                                     FROM citatel,citatelsky_preukaz 
                                     WHERE citatelsky_preukaz.id_citatela = $id_cit and citatel.id_citatela = $id_cit ");

$sql2 = MySQLi_Query($spojenie,"SELECT DATE_FORMAT(vypozicka.datum_pozicania , '%d.%m.%y') as datum_poz, DATE_FORMAT(vypozicka.datum_konca_vypozicky, '%d.%m.%y') as datum_vrat,vypozicka.prirastkove_cislo,vypozicka.id_zamestnanca,kopia.prirastkove_cislo,kopia.isbn,titul.isbn,titul.nazov_titulu as nazov, zamestnanec.id_zamestnanca, zamestnanec.krstne_meno as meno,
                                             zamestnanec.priezvisko as priezvisko,citatelsky_preukaz.id_citatela ,citatelsky_preukaz.id_preukazu,vypozicka.id_preukazu, vypozicka.stav
                                      FROM vypozicka,titul,kopia,zamestnanec,citatelsky_preukaz
                                      WHERE vypozicka.stav='Aktívna' and vypozicka.prirastkove_cislo=kopia.prirastkove_cislo and kopia.isbn=titul.isbn and citatelsky_preukaz.id_preukazu = vypozicka.id_preukazu and citatelsky_preukaz.id_citatela=$id_cit and zamestnanec.id_zamestnanca=vypozicka.id_zamestnanca");

if(!$sql):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:
    $zaznam	= mysqli_fetch_assoc($sql)
    ?>
    <body style="background-color: wheat">
    <div align="center">
        <UL style="padding-left: 0">
            Čitateľ:
            <LI>Krstné meno: <?php echo $zaznam['meno'];?> </LI>
            <LI>Priezvisko: <?php echo $zaznam['priezvisko'];?></LI>
            <LI>Telefónne číslo: <?php echo $zaznam['cislo'];?></LI>
            <LI>E-mail: <?php echo $zaznam['email'];?></LI>
            <LI>Mesto: <?php echo $zaznam['mesto'];?> </LI>
            <LI>Ulica: <?php echo $zaznam['ulica'];?> </LI>
            <LI>PSČ: <?php echo $zaznam['psc'];?></LI>
            <br>
            Preukaz:
            <LI>Dátum zhotovenia: <?php echo $zaznam['datum'];?></LI>
            <LI>Platnosť do: <?php echo $zaznam['platnost'];?> </LI>

        </UL>
    </div>

    <table width="500" cellspacing="0" border="1" cellpadding="0">
    <tr>
        <th width="50" scope="col">Dátum požičania</th>
        <th width="50" scope="col">Dátum vrátenia</th>
        <th width="100" scope="col">Názov titulu</th>
        <th width="100" scope="col">Výpožičku spracoval</th>

    </tr>
    <?php
    while ($zaznam2	= mysqli_fetch_assoc($sql2)):
    ?>
    <tr>
        <td align="center"><?php echo $zaznam2['datum_poz'];?></td>
        <td align="center"><?php echo $zaznam2['datum_vrat'];?></td>
        <td align="center"><?php echo $zaznam2['nazov'];?></td>
        <td align="center"><?php echo $zaznam2['meno'].' '.$zaznam2['priezvisko'];?></td>
    </tr>
    <?php
    endwhile;
    ?>
    </table>
    </body>
<?php endif; ?>
</html>