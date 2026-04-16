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
    $sql = mysqli_query($spojenie,"SELECT citatel.id_citatela as id_citatela, citatel.krstne_meno as krstne_meno, citatel.priezvisko as priezvisko, citatel.email as email 
                                         FROM citatel");

    if (!$sql):
        echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
    else:
    ?>

</head>
<body style="background-color:wheat">
<div align="right" style="margin:auto ">
    Prihlásený používateľ:  <?php echo $_SESSION['meno'].' '.$_SESSION['priezvisko'];  ?>
    <br>
    <a href = "logout.php">Odhlásenie</a>
</div>

<form method="post" action="ins_preukaz.php">
    <label for="citatel">Čitateľ</label>
    <select id="citatel" name = citatel>
        <?php
        while ($zaznam	= mysqli_fetch_assoc($sql)):
        ?>
        <option style ="display:list-item" value="<?php echo $zaznam['id_citatela'];?>"><?php echo $zaznam['krstne_meno'].' '.$zaznam['priezvisko'].' '.$zaznam['email'];?></option>
        <?php
        endwhile;
        endif;
        ?>
    </select>
    <br><br>
    <label for="platnost">Preukaz platí do</label>
    <input type="date" id="platnost" name="platnost">
<br><br>
    <input type="submit" value="Pridať">
</form>

</body>

</html>
