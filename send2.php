<link rel="stylesheet" href="style.css">
<?php

$nomOrigine = $_FILES['monfichier']['name'];
$elementsChemin = pathinfo($nomOrigine);
$extensionFichier = $elementsChemin['extension'];
$extensionsAutorisees = array('jpeg', 'jpg', 'gif', 'png', 'doc', 'pdf', 'bmp', 'txt', 'svg');

if (isset($_FILES['monfichier'])) {
    if (!(in_array($extensionFichier, $extensionsAutorisees))) {
        echo "Le fichier n'a pas l'extension attendue.</br>";
        echo "L'extension ".$elementsChemin['extension']." n'est pas autorisé!"; 
        ?><form>
        <input type="button" value="Retour" onclick="history.go(-1)">
        </form><?php
    } else {
        // Copie dans le repertoire du script avec un nom en incluant l'heure

        $repertoireDestination = dirname(__FILE__).'/upload/';
        $nomDestination = 'fichier_du_'.date('YmdHis').'.'.$extensionFichier;

        if (move_uploaded_file($_FILES['monfichier']['tmp_name'],
        $repertoireDestination.$nomDestination)) {
            echo 'Nous avons sauvegardé votre fichier de '.$_FILES['monfichier']['size'].' octets sous le nom '.$nomDestination;
            echo '</br></br> merci '.$_POST['email'].' nous avons envoyé un mail à '.$_POST['mailToSend'];
            ?>
            <form></br>
            <input type="button" value="Retour" onclick="history.go(-1)">
            </form>
            <?php
            // echo 'Le fichier temporaire '.$_FILES['monfichier']['tmp_name'].
            // ' a été déplacé vers '.$repertoireDestination.$nomDestination;
        } else {
            echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
            'Le déplacement du fichier temporaire a échoué'.
            " vérifiez l'existence du répertoire ".$repertoireDestination.'</br>'; 
            ?><form>
            <input type="button" value="Retour" onclick="history.go(-1)">
            </form><?php
        }
    }
}

$mail = $_POST['mailToSend'];
$passage_ligne = "\r\n";
$boundary = '-----='.md5(rand());
$sujet = 'Un fichier vous attends!';
$message = "";
//=====Création du header de l'e-mail
$header = 'From: '.$_POST['mailToSend'].$passage_ligne;
$header .= 'MIME-Version: 1.0'.$passage_ligne;
$header .= 'Content-Type: multipart/alternative;'.$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========

$message_txt = 'Vous recevez cet email de la part de '.$_POST['email'].'qui vient de vous envoyer un un fichier. Pour le récupérer suivez ce lien';

$message .= 'Content-Type: text/html; charset="ISO-8859-1"'.$passage_ligne;
$message .= 'Content-Transfer-Encoding: 8bit'.$passage_ligne;
$message .= 'Content-Disposition: attachment; filename="'.$nomDestination.'"'.$passage_ligne;


//====Envoi du mail
mail($mail, $sujet, $message, $header);
