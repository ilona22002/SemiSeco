<?php
session_start();
if (!isset($_SESSION["ryhma17_kayttaja"])){
    header("Location:./login.php");
    exit;
}
  $poistettava = isset($_GET["poistettava"]) ? $_GET["poistettava"] : "";

  if (empty($poistettava)){
    header("Location:welcome.php");
    exit;
  }

  mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
  
  try{
    $yhteys=mysqli_connect("localhost", "trtkp22a3", "trtkp22816", "trtkp22a3");
  }
  catch(Exception $e){
    header("Location:yhteysvirhe.html");
    exit;
  }
  
  $sql="delete from ryhma17_palautteet where id=?";
  
  // mihin henkilo muutetaan? palaute?

  //Valmistellaan sql-lause
  $stmt=mysqli_prepare($yhteys, $sql);
  //Sijoitetaan muuttujat oikeisiin paikkoihin
  mysqli_stmt_bind_param($stmt, 'i', $poistettava);
  //Suoritetaan sql-lause
  mysqli_stmt_execute($stmt);
  //Suljetaan tietokantayhteys
  mysqli_close($yhteys);

  header("Location:welcome.php");
  exit;
?>

