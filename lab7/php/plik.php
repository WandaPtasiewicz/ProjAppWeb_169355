<?php
 $nr_indeksu = '169355';
 $nrGrupy = '2';
 echo 'Jan Kowalski '.$nr_indeksu. ' grupa '.$nrGrupy. '<br /><br />';
 echo 'Zastosowanie metody include() <br />';
 $foo = include 'a.php';
 echo $foo;
 echo 'Zastosowanie metody require_once() <br />';
$foo2 = require_once 'a.php';
echo $foo;
 echo 'Zastosowanie metody if,elseif,else i switch <br />';
if($nr_indeksu > 2){
    echo ' jest wiekszy niz 2</br>';
}elseif($nr_indeksu == 2)
{
     echo ' jest to jest 2</br>';
    }else{
    echo ' jest NIE wiekszy niz 2</br>';
}
 switch($nrGrupy){
         case 2:
         echo 'grupa druga';
             break ;
     case 4:
        echo 'czwarta';
             break ; 
      default:
         echo"nie wiem co ty masz za grupe";
         break;
 }
echo '</br>Zastosowanie metody petli for i while <br />';
for($i =1;$i<6;$i++){
    echo $i.' ';
}
echo"</br>";
$j=5;
while($j>0){
    echo $j." ";
 $j--;
}
  echo '</br>Zastosowanie Typów zmiennych $_GET, $_POST, $_SESSION - <br />';  
echo'To są zmienne które pobierają dane z formularzy';




?>