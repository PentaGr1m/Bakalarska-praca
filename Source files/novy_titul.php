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

    <script src = "jquery-3.7.1.js"></script>

    <script>
        function form_switch()
        {
            $("body").load("novy_autor.php#body");
        }
    </script>


</head>

<body>
<div align="right" style="margin:auto ">
    Prihlásený používateľ:  <?php echo $_SESSION['meno'].' '.$_SESSION['priezvisko'];  ?>
    <br>
    <a href = "logout.php">Odhlásenie</a>
</div>
<?php
$sql=MySQLi_Query($spojenie,"SELECT id_autora,krstne_meno,priezvisko FROM autor");
if (!$sql):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:
endif;
?>

<script>
    function enable1(ButtonID,AutorID,PrevButtonID)
    {
        document.getElementById(AutorID).disabled = false;
        document.getElementById(ButtonID).hidden = false;
        document.getElementById(PrevButtonID).hidden = true;



    }
</script>



<form action="ins_titul.php" method ="post" id = "form2">

    <label for="autor1">Autori</label><br>
1.
        <input list = autori id = "a1" name="a1">
        <datalist id ="autori">
            <?php
            while ($zaznam	= mysqli_fetch_assoc($sql)):
                ?>
                <option value="<?php echo $zaznam['id_autora'];?>"><?php echo $zaznam['krstne_meno'].' '.$zaznam['priezvisko'];?></option>
            <?php
            endwhile;

            ?>
        </datalist>
    <button type="button" onclick="enable1('b2','a2','b1')" id ="b1">Pridať ďalšieho autora</button>
    <br><br>
2.
        <input list = autori id = "a2" name="a2" disabled>
    <button type="button" onclick="enable1('b3','a3','b2')" id ="b2" hidden >Pridať ďalšieho autora</button>
    <br><br>

3.  <input list = autori id = "a3" name="a3" disabled>
    <button type="button" onclick="enable1('b4','a4','b3')" id ="b3" hidden>Pridať ďalšieho autora</button>
    <br><br>
4.
        <input list = autori id = "a4" name="a4" disabled>
    <button type="button" onclick="enable1('b5','a5','b4')" id ="b4" hidden>Pridať ďalšieho autora</button>

    <br><br>
5.
        <input list = autori id = "a5" name="a5" disabled>
    <button style="display: none"  type="button" id="b5" hidden></button>
    <br><br>
    Ak autor nie je v systéme, prejdite na <a href="javascript:form_switch()" title="Pridať autora">pridať autora.</a>
    <br><br>
<label for="isbn">ISBN</label><br>
<input type="text" id="isbn" name="isbn" size="20"><br><br>

<label for="nazov_titulu">Názov titulu</label><br>
<input type="text" id="nazov_titulu" name="nazov_titulu" size="30"><br><br>

<label for="rok_vydania">Rok vydania</label><br>
<input type="text" id="rok_vydania" name="rok_vydania" size="4"><br><br>

<label for="Signatura">Signatúra</label><br>
<input type="text" id="Signatura" name="Signatura" size="2"><br><br>

<input type =submit value="Pridať" >

</form>

</body>

</html>
