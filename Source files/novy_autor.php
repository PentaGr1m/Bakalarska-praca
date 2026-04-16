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



</head>
<body style="background-color:wheat">
<div align="right" style="margin:auto ">
    Prihlásený používateľ:  <?php echo $_SESSION['meno'].' '.$_SESSION['priezvisko'];  ?>
    <br>
    <a href = "logout.php">Odhlásenie</a>
</div>
<script>
    function enable2(ButtonID,AutorID,PrevID,PrevButtonID)
    {
        document.getElementById(ButtonID).hidden = false;
        document.getElementById(AutorID).disabled = false;
        document.getElementById(PrevID).disabled = false;
        document.getElementById(PrevButtonID).hidden = true;



    }
</script>
<form id = form3 method = post action="ins_autor.php">
<label for="autor1">Autori</label><br>
1.
<input type="text" id="a1" name="autor1" size="20" placeholder="Krstné meno autora">
<input type="text" id="p1" name="autor1_priez" size="30" placeholder="Priezvisko autora">
<button type="button" onclick="enable2('b2','a2','p2','b1')" id ="b1">Pridať ďalšieho autora</button>
<br><br>
2.
<input type="text" id="a2" name="autor2" size="20" placeholder="Krstné meno autora" disabled>
<input type="text" id="p2" name="autor2_priez" size="30" placeholder="Priezvisko autora" disabled>
<button type="button" onclick="enable2('b3','a3','p3','b2')" id ="b2" hidden >Pridať ďalšieho autora</button>
<br><br>
3.
<input type="text"  id="a3" name="autor3" size="20" placeholder="Krstné meno autora" disabled>
<input type="text"  id="p3" name="autor3_priez" size="30" placeholder="Priezvisko autora" disabled>
<button type="button" onclick="enable2('b4','a4','p4','b3')" id ="b3" hidden>Pridať ďalšieho autora</button>
<br><br>
4.
<input type="text" id="a4" name="autor4" size="20" placeholder="Krstné meno autora" disabled>
<input type="text" id="p4" name="autor4_priez" size="30" placeholder="Priezvisko autora" disabled>
<button type="button" onclick="enable2('b5','a5','p5','b4')" id ="b4" hidden>Pridať ďalšieho autora</button>

<br><br>
5.
<input type="text" id="a5" name="autor5" size="20" placeholder="Krstné meno autora" disabled>
<input type="text" id="p5" name="autor5_priez" size="30" placeholder="Priezvisko autora" disabled>
<button style="display: none"  type="button" id="b5" hidden></button>
<br><br>

    <input type="submit" value="Pridať autorov">
</form>
</body>

</html>

