<?php

if (mail('lacroixchris57@gmail.com', 'mail test', 'Un message de test pour voir si le mail fonctionne')) {
    echo 'le message à été envoyé';
} else {
    echo "le message n'a pas été envoyé et donc mail n'est pas installé";
}
