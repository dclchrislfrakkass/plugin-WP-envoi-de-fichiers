<?php
print_r($_FILES);

if ($_FILES['file']['error']) {
    switch ($_FILES['file']['error']) {
        case 1: //upload error on size
        echo 'le fichier dépasse la taille maximale autoriséepar le serveur';
        break;
        case 2: //upload error on size form
        echo 'le fichier dépasse la taille maximale autorisée par le formulaire';
        break;
        case 3: //probleme pendant l'upload
        echo 'le transfert à planté';
        break;
        case 4: //le fichier est de taille 0
        echo 'le fichier est de taille nulle';
        break;
    }
} else {
    if (isset($_FILES['file']['temp_name'])) {
        $chemin_destination = '/var/www/fichiers/';
        move_uploaded_file($_FILES['file']['tmp_name'], $chemin_destination.$_FILES['file']['name']);
    }
}
?>

<!--


// if (isset($_FILES['file'])) {
//     $dossier = 'upload/';
//     $fichier = basename($_FILES['file']['name']);
//     if (move_uploaded_file($_FILES['file']['tmp_name'], $dossier.$fichier)) {
//         echo 'Upload effectué avec succès !';
//     } else {
//         echo 'Echec de l\'upload !';
//     }
// }
//?>













// //créer un dossier pour les fichiers
// mkdir('fichier/1/', 0777, true);

// //créer un identifiant avec de l'aléa
// $nom = md5(uniqid(rand(), true));
