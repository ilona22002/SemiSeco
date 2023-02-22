<?php
session_start();
if (!isset($_SESSION["kayttaja"])){
    header("Location:./login.html");
    exit;
}
include "./html/header.html";
print "<h2>Welcome, ".$_SESSION["kayttaja"]."!</h2>";
?>
<a href="./logout.php">Log out</a>
<?php
include "./html/footer.html";
?>