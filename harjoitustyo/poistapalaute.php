<?php
  $poistettava = isset($_GET["poistettava"]) ? $_GET["poistettava"] : "";

  if (empty($poistettava)){
    header("Location:palaute.php");
    exit;
  }

  mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
  
  try{
    $yhteys=mysqli_connect("db", "root", "password", "ryhma17_palautteet");
  }
  catch(Exception $e){
    header("Location:yhteysvirhe.html");
    exit;
  }
  
  $sql="delete from palaute where id=?";
  
  // mihin henkilo muutetaan? palaute?

  //Valmistellaan sql-lause
  $stmt=mysqli_prepare($yhteys, $sql);
  //Sijoitetaan muuttujat oikeisiin paikkoihin
  mysqli_stmt_bind_param($stmt, 'i', $poistettava);
  //Suoritetaan sql-lause
  mysqli_stmt_execute($stmt);
  //Suljetaan tietokantayhteys
  mysqli_close($yhteys);

  header("Location:palaute.php");
  exit;
?>

