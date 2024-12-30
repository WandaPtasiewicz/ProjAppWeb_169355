<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $baza= 'my_page';
    
    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $baza);
    if(!$link) echo '<b> przerwane połączenie </b>';
?>