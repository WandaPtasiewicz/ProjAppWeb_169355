<!DOCTYPE html>
<html>
     <head>
        <meta charset="UTF-8" />
         <meta name="Author" content="Wanda Ptasiewicz"/>
         <title>Moje hobby to pieczenie.</title>
         <link rel="stylesheet" href="css/style.css">
         <script src="js/kolokujTlo.js" type="text/javascript"></script>
         <script src="js/timedate.js" type="text/javascript"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     </head>
     <body onload="startclock()">  
         <!--pojawianie sie głównej strony i podstrony //-->
        <?php
                error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
                 require_once('php/cfg.php');
                 include('php/showpage.php');

                 $podstrona = '';

                 if(isset($_GET['idp']))
                     $podstrona = $_GET['idp'];
                 else
                     $podstrona = "glowna.html";

                include('html/'.$podstrona);

        ?>
     </body>
</html>