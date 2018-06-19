<?php


$redova=5;
$kolona=5;



$podaci = array();
for($i=0;$i<$redova;$i++){
    $kolone=array();
    for($j=0;$j<$kolona;$j++){
        $kolone[]=0;
    }
    $podaci[]=$kolone;
}

//čarolija - napuniti
$brojac=1;
for($i=$kolona-1; $i>=0;$i--){
    $podaci[$redova-1][$i]=$brojac++;
}

for($i=$redova-2; $i>=0;$i--){
    $podaci[$i][0]=$brojac++;
}



echo "<table>";
for($i=0;$i<$redova;$i++){
    echo "<tr>";
    for($j=0;$j<$kolona;$j++){
        echo "<td>" . $podaci[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";







