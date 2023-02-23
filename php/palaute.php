<?php
$etunimi=isset($_POST["etunimi"]) ? $_POST["etunimi"]  : "";
$sukunimi=isset($_POST["sukunimi"])  ? $_POST["sukunimi"]  : "";
$puh=isset($_POST["puh"]) ? $_POST["puh"]  : "";
$email=isset($_POST["email"])  ? $_POST["email"]  : "";
$palaute=isset($_POST["palaute"])  ? $_POST["palaute"]  : "";

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try{
    //muuttuja joka luo yhteyden tietokantaan "henkilokanta"
    $yhteys=mysqli_connect("db", "root", "password", "ryhma17_palautteet");
}
catch(Exception $e){
    header("Location:.yhteysvirhe.html");
    exit;
}

if (!empty($palaute)) {

    $sql="insert into palaute (etunimi, sukunimi, puhelinnumero, sahkoposti, palaute) values(?, ?, ?, ? ,?)";

    //Valmistellaan sql-lause
    $stmt=mysqli_prepare($yhteys, $sql);
    //Sijoitetaan muuttujat oikeisiin paikkoihin
    mysqli_stmt_bind_param($stmt, 'sssss', $etunimi, $sukunimi, $puh, $email, $palaute);
    //Suoritetaan sql-lause
    mysqli_stmt_execute($stmt);
    header("Location:./kiitos.html");
    exit;
}
//tulostetaan kiitoslomke


//kokeillaan tulostaa tietokannan sisältö niin tiedetään toimiiko koodi
// $tulos=mysqli_query($yhteys, "select * from palaute");
// print "<table border='1'>";

// while ($rivi=mysqli_fetch_object($tulos)){
//     print "<tr>";
//     print "<td>$rivi->id<td>$rivi->etunimi<td>$rivi->sukunimi<td>$rivi->puhelinnumero<td>$rivi->sahkoposti<td>$rivi->palaute";
// }
// print "</table>";

mysqli_close($yhteys);
?>