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
    <title>Pridanie</title>



</head>
<body style="background-color:wheat">
<div align="right" style="margin:auto ">
    Prihlásený používateľ:  <?php echo $_SESSION['meno'].' '.$_SESSION['priezvisko'];  ?>
    <br>
    <a href = "logout.php">Odhlásenie</a>
</div>

<form method="post" action="ins_citatel.php">
    <label for="meno">Krstné meno:</label><br>
    <input type="text" id="meno" name="meno" size="20">
    <br><br>
    <label for="priezvisko">Priezvisko:</label><br>
    <input type="text" id="priezvisko" name="priezvisko" size="20">
    <br><br>
    <label for="tel_cislo">Telefónne číslo</label><br>
    <input type="text" id="tel_cislo" name="tel_cislo" size="15">
    <br><br>
    <label for="email">E-mail</label><br>
    <input type="text" id="email" name="email"size="20">
    <br><br>
    <label for="mesto">Mesto bydliska:</label><br>
    <input type="text" id="mesto" name="mesto" size="30">
    <br><br>
    <label for="ulica">Ulica bydliska:</label><br>
    <input type="text" id="ulica" name="ulica" size="30">
    <br><br>
    <label for="psc">PSČ</label>
    <input type="text" id="psc" name="psc" size="6">
    <br><br>
    <input type="submit" value="Pridať">
</form>

</body>

</html>

