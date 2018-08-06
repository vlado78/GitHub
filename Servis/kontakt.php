<?php include_once "konfiguracija.php" ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "predlozak/head.php" ?>
</head>
<body>
<div class="grid-container">

<?php include_once "predlozak/zaglavlje.php" ?>
<?php include_once "predlozak/navbar.php" ?>

<h3>Moja radionica</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of moje kuće
  var radionica = {lat: 45.294433, lng: 18.798657};
  
  // The map, centered at moja kuća
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 14, center: radionica});
  // The marker, positioned at moja kuća
  var marker = new google.maps.Marker({position: radionica, map: map});
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARaOKhwJbT-dca_OvuZZ3kLBIh3lBlMZo&callback=initMap">
    </script>
<address>
Adresa: Lorenza Jagera 5, Osijek<br> 
e-mail: info@edunova.hr<br>
Telefon: 031 205-555<br>
Radno vrijeme: 0-24h<br>
31000 Osijek<br>
</address>



















 

<?php include_once "predlozak/podnozje.php" ?>
</div>

  
  

  
  <?php include_once "predlozak/skripte.php" ?>
</body>
</html>
