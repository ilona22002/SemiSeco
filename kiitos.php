<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SemiSeco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="assets/style.css" rel="stylesheet" type="text/css">
    <link href="php/palaute.css" rel="stylesheet" type="text/css">
  </head>
<body>
<div class="container">
    <a href="index.html"><h1 id="homepage">SemiSeco</h1></a>

    <header><nav class="navbar navbar-expand-lg navbar-color" data-bs-theme="dark">
        <div class="container-fluid">
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="menu.html">MENU</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="events.html">EVENTS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#contact">CONTACT</a>
              </li>
              <li class="nav-item">
                <li><a class="nav-link" href="reservation.html">RESERVATIONS</a></li>
            </li>
            
            </ul>
           
          </div>
        </div>
      </nav></header>

      <main>
        <div class="bgcolor">
        <div class="imgBc"><img src="php/rodion-kutsaiev-LQWc_bQBuI0-unsplash.jpg" alt="palaute"></div>
       
        <h2>Previous customers report that..</h2>
        <div id="palautteet">
          <?php
          $tulos=mysqli_query($yhteys, "select * from palaute where julkinen=1");
          print "<table border='1'>";
          
          while ($rivi=mysqli_fetch_object($tulos)){
               print "<tr>";
               print "<td>$rivi->id<td>$rivi->etunimi<td>$rivi->sukunimi<td>$rivi->puhelinnumero<td>$rivi->sahkoposti<td>$rivi->palaute";
           }
           print "</table>";
          
          //        print "<table border='1'>";
          //        //$sql="select * from palaute where julkinen=1";
          
          //      $tulos=mysqli_query($yhteys, "select * from palaute where julkinen=1");
          //      while ($rivi=mysqli_fetch_object($tulos)){
          //      print "<tr><td>$rivi->palaute ";
          //      }
          
          mysqli_close($yhteys);
          ?>
        </div>

        <h3>
            Thank your feedback!
        </h3>
        <a class="linkki" link href="index.html">Front Page</a>
       
       </div>
      </main>
      
          <footer>
          <div id="contact">
          <p class="osoite">    
          020 333 565<br>
          <a class="email" href="#">info@semiseco.fi</a>
          <Address>Tehdaskartanonkatu 24, 33400 Tampere</Address>
          <a class="nav-link" href="palautelomake.php"><u>Give us feedback here!</u></a>
          </p>
          <hr>
          <p>Author: <br> 
            Ilona Przheleskovskaia <br>
            Nelli Niemelä <br>
            Petra Puronummi <br>
            Heidi Peltola
            </p>
          
          </div>
          <section class="map">
            <div style="width: 100%"><iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=Tehdaskartanonkatu%2024+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="400" frameborder="0">
              <a href="https://www.maps.ie/distance-area-calculator.html">measure distance on map</a></iframe></div>
          </section>
        </footer>

  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>
</html>