<?php
session_start();
require 'connect.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Verejný search</title>
    <script src = "jquery-3.7.1.js"></script>

    <script type="javascript">
        function form_switch(destinacia)
        {
            $("div").load(destinacia);
        }

        function kniznica(id_kniz)
        {
            self.location.href="detail_kniznice?id_kniz="+id_kniz;
        }
    </script>





<?php
if(isset($_GET["vyhladavane"])):
 $vyhladavane=$_GET["vyhladavane"];
    $sql=MySQLi_Query($spojenie, "SELECT titul.isbn as isbn,titul.nazov_titulu as nazov, titul.rok_vydania as rok, kopia.isbn,kopia.stav as stav, kopia.id_kniznice,kniznica.id_kniznice,kniznica.nazov_kniznice as nazov_kniz 
                                    FROM titul,kopia,kniznica
                                    WHERE titul.isbn = kopia.isbn and kopia.id_kniznice=kniznica.id_kniznice and titul.nazov_titulu LIKE '%$vyhladavane%'");
    endif;

?>
    <style>
        th{background-color: white}
        tr{background-color:white}
    </style>

</head>
<body style="background-color:wheat">
<UL style="font-size: large">
    <li>Kópie</li>
    <li>Knižnice</li>

</UL>

<div>
    <form method="get" action="verejny_search.php">
  <input type="text" id="vyhladavane" name="vyhladavane" size="30">
    <input  type="submit" value="Vyhľadať">
    </form>
<table width="1230" cellspacing="0" border = "1" cellpadding="0" >
    <tr>

        <th width="100" scope="col">ISBN</th>
        <th width="100" scope="col">Názov titulu</th>
        <th width="70" scope="col">Rok vydania</th>
        <th width="50" scope="col">Stav</th>
        <th width="50" scope="col">Knižnica</th>

    </tr>
    <?php
    if(isset($sql)):
    while ($zaznam	= mysqli_fetch_assoc($sql)):
    ?>
    <tr>

        <td align="center"><?php echo $zaznam['isbn']?></td>
        <td align="center"><?php echo $zaznam['nazov']?></td>
        <td align="center"><?php echo $zaznam['rok']?></td>
        <td align="center"><?php echo $zaznam['stav']?></td>
        <td align="center"><?php echo $zaznam['nazov_kniz']?></td>

    </tr>
    <?php
    endwhile;
    endif;

    ?>
</table>
</div>

</body>
</html>