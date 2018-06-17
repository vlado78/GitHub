
<?php
$broj1 = isset($_GET["broj1"]) ? $_GET["broj1"]:0;
$broj2 = isset($_GET["broj2"]) ? $_GET["broj2"]:0;
?>





<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    
    <title>tablica</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <style>
      body{
        margin-top: 50px;
        margin-left: 10%;
        width:80%;

      }
        
        td {
          text-align: right;
          font-size: 3rem;  
        }
    </style>
  </head>
  <body>
      <form class="callout text-center">
          <h2>Pomnoži dva broja</h2>
          <div class="floated-label-wrapper">
            <label for="full-name">Prvi broj</label>
            <input type="text"  name="broj1" placeholder="Prvi broj">
          </div>

          <div class="floated-label-wrapper">
            <label for="email">Drugi broj</label>
            <input type="text"  name="broj2" placeholder="Drugi broj">
          </div>
          
          <input class="button expanded" type="submit" value="Pomnoži">
        </form>
        
        


 <table>
  <tbody>
    <?php
       for($i=0; $i<$broj1; $i++){
            echo '<tr>';
                for($j=0; $j<$broj2; $j++){
                    echo '<td>'.($i+1)*($j+1).'</td>';
                    }
            echo '</tr>';
        }
              
              
    ?>
   </tbody>
 </table>






















    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
