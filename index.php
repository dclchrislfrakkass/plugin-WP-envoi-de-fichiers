<?php
/*
Plugin Name: Envoi de fichiers
Plugin URI: https://DCL.com
Description: Voici notre premier plugin WordPress pour l'envoi de fichiers.
Author : Chris, JP
Author URI: https://DCL.com
*/

?>
<link rel="stylesheet" href="style.css">
<form method="POST" action="send2.php" enctype="multipart/form-data">
<p><span class="error">Tous les champs sont obligatoires</span></p>
<input type="file" name = "monfichier" /></br>
<input type="hidden" name="MAX_FILE_SIZE" value="500000"> <!-- limiter la taille max à 500 ko -->
Votre E-mail : <input type="text" name="email"/></br>
Email destinataire : <input type="text" name="mailToSend"/></br>
<button type="submit" name="send"> Envoyer</button>
</form>

<?php
