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
    add_menu_page("Custom Plugin", "Custom Plugin","manage_options", "myplugin", "uploadfile");
}

add_action("admin_menu", "customplugin_menu");
function uploadfile(){
    include "base.php";
}


?>
