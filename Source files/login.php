<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Prihlásenie zamestnanca</title>








</head>
<body style="background-color:wheat">
    <form id="login" name="login" method="post" action="auth.php">
        <label for="meno">Prihlasovacie meno</label><br>

        <input type="text" placeholder = "Zadajte meno" id="meno" name="meno" size="30"><br>

        <label for="heslo">Prihlasovacie heslo</label><br>

        <input type="password" placeholder = "Zadajte heslo" id="heslo" name="heslo" size="30"> <?php if(isset($_SESSION['zle_udaje'])){echo $_SESSION['zle_udaje']; unset($_SESSION['zle_udaje']); } ?> <br>

        <input type="submit" value="Prihlásiť"><br>


</body>
</html>

