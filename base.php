<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<link rel="stylesheet" href="style.css">
<form method="POST" action="send2.php" enctype="multipart/form-data">
<p>Tous les champs sont obligatoires</p>
<input type="file" name = "monfichier"/></br>
<input type="hidden" name="MAX_FILE_SIZE" value="500000"> <!-- limiter la taille max à 500 ko -->
Votre E-mail : <input class="verif-email" type="text" name="email" required/></br>
Email destinataire : <input class="verif-email" type="text" name="mailToSend" required/></br>
<button type="submit" name="send"> Envoyer</button>

<div class="error"></div>
</form>



<script type="text/javascript">
$(document).ready(function() {
    $('.verif-email').focusout(function(){
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var emailblockReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var emailaddressVal = $(this).val();
        
        if(emailaddressVal == '') {
            $('.error').text('Le champs est vide.');
        } else if(!emailReg.test(emailaddressVal)) {
            $('.error').text('Ce n\'est pas une adresse email');
        } else {
            $('.error').text('');
        }
    });
});
</script>
<?php
