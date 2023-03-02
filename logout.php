<?php
session_start();
unset($_SESSION["ryhma17_kayttaja"]);
header("Location:./login.html");
?>
