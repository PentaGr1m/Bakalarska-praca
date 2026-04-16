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

    $sql=MySQLi_Query($spojenie,"SELECT kopia.prirastkove_cislo as prir_cislo, kopia.id_kniznice, titul.isbn,kopia.isbn as isbn, titul.nazov_titulu as nazov, kopia.stav
                                       FROM kopia, titul
                                       WHERE kopia.isbn = titul.isbn and kopia.id_kniznice=$id_kniz and (kopia.stav != 'Požičaná' or kopia.stav != 'Vyradená')");
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

<form id="nova_vypozicka" name="nova_vypozicka" method="post" action="ins_vyp.php">

    <label for="datum_vratenia">Do kedy vrátiť:</label>
    <input type="date" id="datum_vratenia" name="datum_vratenia"><br><br>
    <label for = "kopia">Požičaná kópia</label>
    <input list = kopia id = "kop" name="kop">
    <datalist id ="kopia">
        <?php
        while ($zaznam	= mysqli_fetch_assoc($sql)):
            ?>
            <option value="<?php echo $zaznam['prir_cislo'];?>"><?php echo $zaznam['nazov']." ".$zaznam['isbn'];?></option>
        <?php
        endwhile;

        ?>
    </datalist>
    <br><br>
    <label for="citatel">Kto požičiava:</label>
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