<?php

if (mail('lacroixchris57@gmail.com', 'mail test', 'Un message de test pour voir si le mail fonctionne')) {
    echo 'le message à été envoyé';
} else {
    echo "le message n'a pas été envoyé et donc mail n'est pas installé";
}



 
    ini_set( 'display_errors', 1 );
 
    error_reporting( E_ALL );
 
    $from = "lacroixchris57@gmail.com";
 
    $to = "lacroixchris57@gmail.com";
 
    $subject = "Vérification PHP mail";
 
    $message = "PHP mail marche";
 
    $headers = "From:" . $from;
 
    mail($to,$subject,$message, $headers);
 
    echo "L'email a été envoyé.";
?>