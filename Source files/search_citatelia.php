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

$sql=MySQLi_Query($spojenie,"SElECT citatel.id_citatela AS id_cit ,citatel.krstne_meno AS meno, citatel.priezvisko AS priezvisko, citatel.telefonne_cislo AS cislo, citatel.email AS email, citatelsky_preukaz.id_kniznice,citatelsky_preukaz.id_citatela 
                    FROM citatel,citatelsky_preukaz  
                    WHERE citatelsky_preukaz.id_kniznice = $id_kniznice && citatelsky_preukaz.id_citatela = citatel.id_citatela");



?>
<body>

<table width="1230" cellspacing="0" border = "1" cellpadding="0">
    <tr>
        <th width="50" scope="col"></th>
        <th width="50" scope="col"></th>
        <th width="100" scope="col">Krstné meno</th>
        <th width="100" scope="col">Priezvisko</th>
        <th width="70" scope="col">Tel. číslo</th>
        <th width="70" scope="col">E-mail</th>


    </tr>

    <?php
    while ($zaznam	= mysqli_fetch_assoc($sql)):
        ?>
        <tr>
            <td align="center"><a href=vymazat_citatela.php><img src="obrazky/vymazat.png" BORDER="0" title="Vymazať""></a></td>
            <td align="center"><form method =post action="detail_citatela.php"><input type=hidden id="id_cit" name="id_cit" value="<?php echo $zaznam['id_cit'];?>"><button onclick="self.location.href='detail_citatela.php';" type="submit">Info</button></form></td>
            <td align="center"><?php echo $zaznam['meno'];?></td>
            <td align="center"><?php echo $zaznam['priezvisko'];?></td>
            <td align="center"><?php echo $zaznam['cislo'];?></td>
            <td align="center"><?php echo $zaznam['email'];?></td>

        </tr>
    <?php
    endwhile;
    ?>
</table>
</body>
</html>
