<?php
session_start();
require "connect.php";

$meno_hashed = md5($_POST["meno"]);
$heslo_hashed = md5($_POST["heslo"]);

$sql=MySQLi_Query($spojenie,"SELECT id_zamestnanca, krstne_meno, priezvisko, prihlasovacie_meno, prihlasovacie_heslo, id_kniznice 
                                    FROM zamestnanec WHERE prihlasovacie_meno='$meno_hashed' AND prihlasovacie_heslo='$heslo_hashed'");
if ($sql->num_rows==0):
    $_SESSION['zle_udaje'] = "Zadali ste nesprávne údaje";
    header("Location: login.php");
else:
    $zaznam	= mysqli_fetch_assoc($sql);
    $_SESSION['id_zam'] = $zaznam['id_zamestnanca'] ;
    $_SESSION['meno'] = $zaznam['krstne_meno'] ;
    $_SESSION['priezvisko'] = $zaznam['priezvisko'] ;
    $_SESSION['id_kniz'] = $zaznam['id_kniznice'] ;

    header('Location: workplace.php');



    endif;
