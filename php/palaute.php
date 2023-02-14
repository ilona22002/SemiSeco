<?php
$etunimi=$_POST["etunimi"] ? $_POST["etunimi"]  : "";
$sukunimi=$_POST["sukunimi"]  ? $_POST["sukunimi"]  : "";
$puh=$_POST["puh"] ? $_POST["puh"]  : "";
$email=$_POST["email"]  ? $_POST["email"]  : "";
$palaute=$_POST["palaute"]  ? $_POST["palaute"]  : "";

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try{
    //muuttuja joka luo yhteyden tietokantaan "henkilokanta"
    $yhteys=mysqli_connect("db", "root", "password", "ryhma17_palautteet");
}
catch(Exception $e){
    header("Location:../html/yhteysvirhe.html");
    exit;
}
?>