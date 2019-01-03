<?php
/*
Plugin Name: Envoi de fichiers
Plugin URI: https://DCL.com
Description: Voici notre premier plugin WordPress pour l'envoi de fichiers.
Author : Chris, JP
Author URI: https://DCL.com
*/

//add menu
function customplugin_menu() {
    add_menu_page("Envoi de fichiers", "Envoi de fichiers","manage_options", "plugin-WP-envoi-de-fichiers/index.php");
}

add_action("admin_menu", "customplugin_menu");
function uploadfile(){
    include "base.php";
}


?>
