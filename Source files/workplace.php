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
    <title>Priestor pre zamestnanca</title>
    <SCRIPT language="javascript">

        function frame_switch(iframeElement,newPage)
        {
            document.getElementById(iframeElement).src = newPage;

        }

        function select (button)
        {
            button.style.background = 'beige';
        }
        function deselect (button)
        {
            button.style.background = 'none';
        }

    </SCRIPT>
</head>
<body style="background-color: wheat">


<div style ="float: right;display:block">
    <div align="right" style="margin:auto ">
        Prihlásený používateľ:  <?php echo $_SESSION['meno'].' '.$_SESSION['priezvisko'];  ?>
        <br>
        <a href = "logout.php">Odhlásenie</a>
    </div>

        </div>
        <div align = "center" style="margin: auto">
            <table style="border-bottom: hidden;border-color: black; border-style: solid" cellspacing="0" border = "1" cellpadding="0" width="1250">
                <tr >
                    <th style="cursor: pointer" onmouseout="deselect(this)" onmouseover="select(this)" onclick="frame_switch('myframe','search_vsetko.php');">Všetky kópie</th>
                    <th style="cursor: pointer" onmouseout="deselect(this)" onmouseover="select(this)" onclick="frame_switch('myframe','search_vypozicky.php');">Výpožičky</th>
                    <th style="cursor: pointer" onmouseout="deselect(this)" onmouseover="select(this)" onclick="frame_switch('myframe','search_rezervacie.php');">Rezervácie</th>
                    <th style="cursor: pointer" onmouseout="deselect(this)" onmouseover="select(this)" onclick="frame_switch('myframe','search_citatelia.php');">Čitatelia</th>
                    <th style="cursor: pointer" onmouseout="deselect(this)" onmouseover="select(this)" onclick="frame_switch('myframe','search_dodavatelia.php');">Dodávatelia</th>
                    <th style="cursor: pointer" onmouseout="deselect(this)" onmouseover="select(this)" onclick="frame_switch('myframe','search_pokuty.php');">Pokuty</th>
                </tr>
            </table>
            <iframe style="border-color: black;border-style: solid;border-top: hidden " id="myframe" src = "search_vsetko.php" align = "right" width="1250" height="470">

            </iframe>
        </div>


</div>

    <button onclick="self.location.href='nova_kopia.php';">Pridať novú kópiu</button>
    <button onclick="self.location.href='novy_citatel.php';">Pridať nového čitateľa</button>
    <button onclick="self.location.href='novy_preukaz.php';">Pridať nový preukaz</button>
    <button onclick="self.location.href='nova_vypozicka.php';">Pridať novú výpožičku</button>
    <button onclick="self.location.href='nova_rezervacia.php';">Pridať novú rezerváciu</button>

</body>

</html>

