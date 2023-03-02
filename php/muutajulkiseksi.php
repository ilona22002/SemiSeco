<?php
$julkaistava=isset($_GET["julkaistava"]) ? $_GET["julkaistava"] : "";

//Jos tietoa ei ole annettu, palataan listaukseen
if (empty($julkaistava)){
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
$sql="update ryhma17_palautteet set julkinen = 1 where id=?";
$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttuja sql-lauseeseen
mysqli_stmt_bind_param($stmt, 'i', $julkaistava);
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
mysqli_close($yhteys);
    header("Location:welcome.php");
    exit;
?>

