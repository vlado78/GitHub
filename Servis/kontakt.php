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

<div class="grid-x">
  <div class="cell large-6">
  <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: -25.344, lng: 131.036};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARaOKhwJbT-dca_OvuZZ3kLBIh3lBlMZo&callback=initMap">
    </script>
   
</div>


  <div class="cell large-6">
  Adresa
  Telefon
  Radno vrijeme
  </div>
</div>

<?php include_once "predlozak/podnozje.php" ?>
</div>

  
  

  
  <?php include_once "predlozak/skripte.php" ?>
</body>
</html>
