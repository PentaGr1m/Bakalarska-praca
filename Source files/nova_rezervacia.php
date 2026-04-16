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

    <?php
    $id_kniz = $_SESSION['id_kniz'];

    $sql=MySQLi_Query($spojenie,"SELECT titul.isbn as isbn, titul.nazov_titulu as nazov FROM titul");
    $sql2 = mysqli_query($spojenie,"SELECT citatelsky_preukaz.id_citatela,citatel.id_citatela as id_citatela, citatel.krstne_meno as krstne_meno, citatel.priezvisko as priezvisko, citatel.email as email, citatelsky_preukaz.id_preukazu as id_preukazu 
                                         FROM citatel,citatelsky_preukaz
                                         WHERE citatelsky_preukaz.id_citatela = citatel.id_citatela and citatelsky_preukaz.id_kniznice = $id_kniz ");
    ?>


</head>
<body style="background-color:wheat">
<div align="right" style="margin:auto ">
    Prihlásený používateľ:  <?php echo $_SESSION['meno'].' '.$_SESSION['priezvisko'];  ?>
    <br>
    <a href = "logout.php">Odhlásenie</a>
</div>

<form id="nova_rezervacia" name="nova_rezervacia" method="post" action="ins_rez.php">

    <label for="datum_konca">Do kedy rezervovať:</label>
    <input type="date" id="datum_konca" name="datum_konca"><br><br>
    <label for = "titul">Rezervovaný titul</label>
    <input list = tituly id = "tit" name="tit">
    <datalist id ="tituly">
        <?php
        while ($zaznam	= mysqli_fetch_assoc($sql)):
            ?>
            <option value="<?php echo $zaznam['isbn'] ;?>"><?php echo $zaznam['nazov'];?></option>
        <?php
        endwhile;

        ?>
    </datalist>
    <br><br>
    <label for="citatel">Kto rezervuje:</label>
    <select id="citatel" name = citatel>
        <?php
        while ($zaznam2	= mysqli_fetch_assoc($sql2)):
            ?>
            <option style ="display:list-item" value="<?php echo $zaznam2['id_preukazu'];?>"><?php echo $zaznam2['krstne_meno'].' '.$zaznam2['priezvisko'].' '.$zaznam2['email'];?></option>
        <?php
        endwhile;

        ?>
    </select>
    <br><br>
    <input type="submit" value="Pridať">
</body>

</html>