<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $baza= 'my_page';
    $login='admin';
    $pass='admin';
    
    //połączenie z baza danych
    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $baza);
    if(!$link) echo '<b> przerwane połączenie </b>';
?>