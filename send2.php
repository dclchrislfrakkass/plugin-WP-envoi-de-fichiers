<?php

$nomOrigine = $_FILES['monfichier']['name'];
$elementsChemin = pathinfo($nomOrigine);
$extensionFichier = $elementsChemin['extension'];
$extensionsAutorisees = array('jpeg', 'jpg', 'gif', 'png', 'doc', 'pdf', 'bmp', 'txt', 'svg');
if (!(in_array($extensionFichier, $extensionsAutorisees))) {
    echo "Le fichier n'a pas l'extension attendue.</br>";
    echo "L'extension ".$elementsChemin['extension']." n'est pas autorisé!";
} else {
    // Copie dans le repertoire du script avec un nom en incluant l'heure

    $repertoireDestination = dirname(__FILE__).'/';
    $nomDestination = 'fichier_du_'.date('YmdHis').'.'.$extensionFichier;

    if (move_uploaded_file($_FILES['monfichier']['tmp_name'],
    $repertoireDestination.$nomDestination)) {
        echo' Nous avons sauvegardé votre fichier sous le nom '.$_FILES['monfichier']['tmp_name'].' et nous avons envoyer le lien vers (email)';
    // echo 'Le fichier temporaire '.$_FILES['monfichier']['tmp_name'].
        // ' a été déplacé vers '.$repertoireDestination.$nomDestination;
    } else {
        echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
        'Le déplacement du fichier temporaire a échoué'.
        " vérifiez l'existence du répertoire ".$repertoireDestination;
    }
}
