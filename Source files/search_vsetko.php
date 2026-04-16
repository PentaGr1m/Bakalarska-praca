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

$sql=MySQLi_Query($spojenie,"SELECT titul.isbn as isbn, titul.nazov_titulu as nazov, titul.rok_vydania as rok, titul.signatura as signatura, kopia.prirastkove_cislo as prir_cislo,
                    kopia.stav as stav, kopia.cena as cena, DATE_FORMAT(kopia.datum_nakupu, '%d.%m.%y') as datum, kopia.isbn, kopia.id_dodavatela, dodavatel.id_dodavatela, dodavatel.nazov as nazov_d, kopia.id_kniznice  
                    FROM titul, kopia, dodavatel  
                    WHERE titul.isbn = kopia.isbn && kopia.id_dodavatela = dodavatel.id_dodavatela && kopia.id_kniznice = '$id_kniznice' ");



?>
<body>

<table width="1230" cellspacing="0" border = "1" cellpadding="0">
    <tr>
        <th width="50" scope="col"></th>
        <th width="100" scope="col">ISBN</th>
        <th width="100" scope="col">Názov titulu</th>
        <th width="70" scope="col">Rok vydania</th>
        <th width="70" scope="col">Signatúra</th>
        <th width="50" scope="col">Stav</th>
        <th width="50" scope="col">Cena</th>
        <th width="100" scope="col">Dátum nákupu</th>
        <th width="160" scope="col">Dodávateľ</th>

    </tr>

    <?php
    while ($zaznam	= mysqli_fetch_assoc($sql)):
    ?>
    <tr>
        <td align="center"><a href=vymazat_kopiu.php?id_kop=<?php echo $zaznam['prir_cislo'];?>><img src="obrazky/vymazat.png" BORDER="0" title="Vymazať""></a></td>
        <td align="center"><?php echo $zaznam['isbn']?></td>
        <td align="center"><?php echo $zaznam['nazov'];?></td>
        <td align="center"><?php echo $zaznam['rok'];?></td>
        <td align="center"><?php echo $zaznam['signatura'];?></td>
        <td align="center"><?php echo $zaznam['stav'];?></td>
        <td align="center"><?php echo $zaznam['cena'];?></td>
        <td align="center"><?php echo $zaznam['datum'];?></td>
        <td align="center"><?php echo $zaznam['nazov_d'];?></td>
    </tr>
    <?php
    endwhile;
    ?>
    </table>
</body>
</html>
