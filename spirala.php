<?php


$redova=7;
$kolona=7;



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


// prvi krug
$a=1;  // brojač krugova 
while ($brojac<=$redova*$kolona){
   // while ($a<$redova/2 || $a<$kolona/2){

for($i=$kolona-$a; $i>=($a-1);$i--){              //1 potez
    $podaci[$redova-$a][$i]=$brojac++;
}

for($i=$redova-($a+1); $i>=($a-1);$i--){              // 2 potez
    $podaci[$i][$a-1]=$brojac++;
}

for ($i=$a;$i<$kolona-($a-1);$i++){                 //3 potez
    $podaci[$a-1][$i]=$brojac++;

}

for($i=$a;$i<$redova-$a;$i++){                //4 potez
    $podaci[$i][$kolona-$a]=$brojac++;

}
$a++;
}

/*

//drugi krug
for ($i=$kolona-2;$i>=1;$i--){              //5 potez
    $podaci[$redova-2][$i]=$brojac++;
}

for($i=$redova-3; $i>=1;$i--){              // 6 potez
    $podaci[$i][1]=$brojac++;
}


for ($i=2;$i<$kolona-1;$i++){               //7 potez
    $podaci[1][$i]=$brojac++;

}

for($i=2;$i<$redova-2;$i++){                //8 potez
    $podaci[$i][$kolona-2]=$brojac++;

}
// treći krug
for ($i=$kolona-3;$i>=2;$i--){              //9 potez
    $podaci[$redova-3][$i]=$brojac++;
}



*/







echo "<table>";
for($i=0;$i<$redova;$i++){
    echo "<tr>";
    for($j=0;$j<$kolona;$j++){
        echo "<td>" . $podaci[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";



echo "<hr>". " brojač je trenutno došao do ".$brojac;





