<?php

function PokazKontakt(){
    echo '<form method="post" action="contact.php?action=send" id="contact_form"> 
                    
                    <label for="subject"> Temat: </label>
                    <input type="text" id="temat"><br>
                    <label for ="body">Tresc:  </label>
                    <input type="text" id="tresc"><br>
                    <label for ="email">email: </label>
                    <input type="email" id="email" ><br>
                    
                        
                        <button type="submit" >Wyślij</button>
                </form>';
}


function WyslijMailKontakt($odbiorca){
    if(empty($_POST['temat']) || empty ($_POST(['tresc']) || empty($_POST['email'])))
    {
        echo '[nie wypelniles pola]';
        echo PokazKontakt();
    }else{
        $mail['subject'] = $_POST['temat'];
        $mail['body'] = $_POST['tresc'];
        $mail['sender'] = $_POST['email'];
        $mail['reciptient'] = $odbiorca;
        
        $header = "From: Formularz kontaktowy<".$mail['sender'].">\n";
        $header .="MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding";
        $header .= "X-Sender: <".$mail['sender'].">\n";
        $header .= "X-Mailer: PRapWWW mail 1.2\n";
        $header .= "X-Priority: 3\n";
        $header .= "Return-Path: <".$mail['sender'].">\n";
        
        mail($mail['reciptient'],$mail['subject'],$mail['body'],$header);
        echo '[wiadomosc wyslana]';
    }
}

function PrzypomnijHaslo(){
    if($_RERVER['REQUEST_METHOD' == 'POST']){
        $email = $_POST['email'];
        
        $sender = $email;
        $subject = 'Przypomnienie hasla';
        $body - 'twoje haslo to: 123';
        $headers = 'od 123@mail.pl\r\n';
        $headers .="Content-Type: text/plain; charset=utf-8\r\n";
        
        if(mail($sender,$subject, $body,$headers)){
            echo '<p> haslo zostalo wyslane na adres</p>';
        }else{
            echo '<p> wystapil blad </p>';
        }
    }else{
        echo'<form method="post" action="contact.php?action=remind">
        <label for="email> email</label>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" value="przypomnij haslo">
        </form>';
    }
}

$odbiorca= 'wanda.ptasiewicz@gmail.com';

if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'send':
            WyslijMailKontakt($odbiorca);
            break;
        case 'remind':
            PrzypomnijHaslo();
            break;
        default:
            PokazKontakt();
    }   
}else{
        PokazKontakt();
    }
   
?>