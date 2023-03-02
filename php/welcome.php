<?php
session_start();
if (!isset($_SESSION["ryhma17_kayttaja"])){
    header("Location:./login.php");
    exit;
}
//include "./html/header.html";
print "<h2>Welcome, ".$_SESSION["ryhma17_kayttaja"]."!</h2>";

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try{
    //muuttuja joka luo yhteyden tietokantaan "henkilokanta"
    $yhteys=mysqli_connect("localhost", "trtkp22a3", "trtkp22816", "trtkp22a3");
}
catch(Exception $e){
    header("Location:.yhteysvirhe.html");
    exit;
}

print "<table border='1'>";
$sql="select * from ryhma17_palautteet where julkinen=1";
// Jos kirjautunut niin näkee kaikki palautteet:
if (isset($_SESSION["ryhma17_kayttaja"])){
    $sql="select * from palaute";

  }

$tulos=mysqli_query($yhteys, $sql);
while ($rivi=mysqli_fetch_object($tulos)){
    print "<tr><td>$rivi->etunimi <td>$rivi->sukunimi <td>$rivi->puhelinnumero <td>$rivi->sahkoposti <td>$rivi->palaute ";


    // Koodin testaukseen ilman kirjautumista:
    // print "<td><a href='./poistapalaute.php?poistettava=$rivi->id'>Poista</a>";
    // print "<td><a href='./muokkaapalaute.php?muokattava=$rivi->id'>Muokkaa</a>";
    // print "<td><a href='./muutajulkiseksi.php?julkaistava=$rivi->id'>Julkiseksi</a>";

// Jos kirjautunut, niin voi poistaa, muokata tai muuttaa palautteen julkiseksi:
if (isset($_SESSION["ryhma17_kayttaja"])){
    print "<td><a href='./poistapalaute.php?poistettava=$rivi->id'>Poista</a>";
    print "<td><a href='./muokkaapalaute.php?muokattava=$rivi->id'>Muokkaa</a>";
    print "<td><a href='./muutajulkiseksi.php?julkaistava=$rivi->id'>Julkiseksi</a>";
  }
}

//lajittelu id:n mukaan ?? miten tehdä

print"</table>";

//Suljetaan tietokantayhteys
mysqli_close($yhteys);
?>

<a href="../logout.php">Log out</a>
<?php
//include "./html/footer.html";
?>