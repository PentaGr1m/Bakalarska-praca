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

$sql=MySQLi_Query($spojenie,"SElECT dodavatel.nazov as nazov, dodavatel.telefonne_cislo as cislo, dodavatel.email as email, dodavatel.mesto as mesto, dodavatel.ulica, dodavatel.psc
                                    FROM dodavatel");



?>
<body>

<table width="1230" cellspacing="0" border = "1" cellpadding="0">
    <tr>
        <th width="70" scope="col">Názov dodávateľa</th>
        <th width="50" scope="col">Telefónne číslo</th>
        <th width="50" scope="col">E-mail</th>
        <th width="100" scope="col">Adresa</th>



    </tr>

    <?php
    while ($zaznam	= mysqli_fetch_assoc($sql)):
        ?>
        <tr>

            <td align="center"><?php echo $zaznam['nazov'];?></td>
            <td align="center"><?php echo $zaznam['cislo'];?></td>
            <td align="center"><?php echo $zaznam['email'];?></td>
            <td align="center"><?php echo $zaznam['mesto'].' '.$zaznam['ulica'].' '.$zaznam['psc'];?></td>



        </tr>
    <?php
    endwhile;
    ?>
</table>
</body>
</html>