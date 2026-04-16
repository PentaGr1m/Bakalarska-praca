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
<script src = "jquery-3.7.1.js"></script>

<script>
    function form_switch()
    {
        $("body").load("novy_titul.php#body");
    }
</script>

</head>
<body style="background-color:wheat">
<div align="right" style="margin:auto ">
    Prihlásený používateľ:  <?php echo $_SESSION['meno'].' '.$_SESSION['priezvisko'];  ?>
    <br>
    <a href = "logout.php">Odhlásenie</a>
</div>
<?php
$sql=MySQLi_Query($spojenie,"SELECT isbn, nazov_titulu FROM titul");
$sql2=MySQLi_Query($spojenie,"SELECT id_dodavatela, nazov FROM dodavatel");
if (!$sql):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:
?>
<form id="nova_kopia" name="nova_kopia" method="post" action="ins_kop.php">
    <label for="titul">O aký titul sa jedná?</label><br>
    <input type = "hidden" id = "kniznica" name ="kniznica" value = <?php echo $_SESSION['id_kniz']; ?>>
    <input list = titles id = "tit" name="tit">
        <datalist id ="titles">
        <?php
        while ($zaznam	= mysqli_fetch_assoc($sql)):
            ?>
            <option value="<?php echo $zaznam['isbn'];?>"><?php echo $zaznam['nazov_titulu'];?></option>
        <?php
        endwhile;

        ?>
    </datalist>

    <br><br>
Ak titul nie je v systéme, prejdite na <a href="javascript:form_switch()" title="Pridať titul">pridať titul.</a>
    <br><br>
    <label for="cena">Cena kópie?</label><br>
    <input type ="number" step = "0.01" id = "cena" name ="cena">
    <br><br>
    <label for="datum">Dátum zakúpenia kópie?</label><br>
    <input type="date" id="datum" name="datum">
    <br><br>
    <label for="dodavatel">Dodávateľ kópie?</label><br>

    <select id="dodavatel" name = dodavatel>
        <?php
        while ($zaznam2	= mysqli_fetch_assoc($sql2)):
        ?>
        <option style ="display:list-item" value="<?php echo $zaznam2['id_dodavatela'];?>"><?php echo $zaznam2['nazov'];?></option>
        <?php
        endwhile;
        endif;
        ?>
    </select>
    <input type="submit" value = "Pridať">
</body>

</html>

