<!doctype html>
<html>
     <head>
        <meta charset="UTF-8" />
         <meta name="Author" content="Wanda Ptasiewicz"/>
         <title>Moje hobby to pieczenie.</title>
         <link rel="stylesheet" href="css/style.css">
     
         <script src="js/skrypt.js" type="text/javascript"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     </head>
     <body onload="startclock()">
         <nav>
            <a href="index.php?idp=podstrona1.html">ciasto czekoladowe</a>
            <a href="index.php?idp=podstrona2.html">chlebek bananowy</a>
            <a href="index.php?idp=podstrona3.html">ciasteczka z czekoladą</a>
            <a href="index.php?idp=podstrona4.html">babeczki czekoladowe</a>
            <a href="index.php?idp=podstrona5.html">szarlotka</a>
            <a href="index.php?idp=kontakt.html">kontakt</a>
             <a href="index.php?idp=glowna.html">glowna</a>
         </nav>
         <?php
         $podstrona='';
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
         if(isset($_GET['idp'])){
             $podstrona=$_GET['idp'];
             include('html/'.$podstrona);
         }
         

 $nr_indeksu = '169355';
 $nrGrupy = '2';
 echo 'Autor: Wanda Ptasiewicz '.$nr_indeksu.' grupa '.$nrGrupy.' <br /><br />';
?>
    
     </body>
</html>