<?php
require "connect.php";

session_start();

unset($_SESSION['id_zam']);
unset($_SESSION['meno']);
unset($_SESSION['priezvisko']);
unset($_SESSION['id_kniz']);

session_destroy();

header("location:login.php");