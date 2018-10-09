<?php


function stavkaIzbornika($putanjaAPP, $stranica, $labela){
  ?>
  <li
  <?php 
  if ($putanjaAPP . $stranica == $_SERVER["PHP_SELF"]){
    echo " class=\"trenutno\"";
  }
  ?>><a href="<?php echo $putanjaAPP . $stranica; ?>"><?php echo $labela;  ?></i></a></li>
  <?php
}


function dohvatiOIB(){
    error_reporting(E_ERROR | E_PARSE);
   // Create a new cURL resource
   $curl = curl_init(); 
  
   if (!$curl) {
       die("Couldn't initialize a cURL handle"); 
   }
  
   // Set the file URL to fetch through cURL
   curl_setopt($curl, CURLOPT_URL, "http://oib.itcentrala.com/oib-generator/");
  
   // Set a different user agent string (Googlebot)
   curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36'); 
  
   // Follow redirects, if any
   curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
  
   // Fail the cURL request if response code = 400 (like 404 errors) 
   curl_setopt($curl, CURLOPT_FAILONERROR, true); 
  
   // Return the actual result of the curl result instead of success code
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  
   // Wait for 10 seconds to connect, set 0 to wait indefinitely
   curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
  
   // Execute the cURL request for a maximum of 50 seconds
   curl_setopt($curl, CURLOPT_TIMEOUT, 50);
  
   // Do not check the SSL certificates
   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 
   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
  
   // Fetch the URL and save the content in $html variable
   $html = curl_exec($curl); 
  
  
  
   // close cURL resource to free up system resources
   curl_close($curl);
  
  
   
   $doc = new DOMDocument();
  $doc->loadHTML($html, LIBXML_NOWARNING | LIBXML_NOERROR);
  $x_path = new DOMXPath($doc);
  $nodes= $x_path->query("/html/body/div[1]/div[1]");
  $oib;
  foreach ($nodes as $node)
  {
    $oib = $node->nodeValue;
  }
  
  $oib=str_replace("HR","",$oib);
  
  return $oib;
  }
