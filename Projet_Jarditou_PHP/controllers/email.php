
<?php
// Plusieurs destinataires
$to  = 'johny@example.com, sally@example.com'; // notez la virgule

// Sujet
$subject = 'Calendrier des anniversaires pour Août';

// message
$message = '
<html>
 <head>
  <title>Calendrier des anniversaires pour Août</title>
 </head>
 <body>
  <p>Voici les anniversaires à venir au mois d\'Août !</p>
  <table>
   <tr>
    <th>Personne</th><th>Jour</th><th>Mois</th><th>Année</th>
   </tr>
   <tr>
    <td>Josiane</td><td>3</td><td>Août</td><td>1970</td>
   </tr>
   <tr>
    <td>Emma</td><td>26</td><td>Août</td><td>1973</td>
   </tr>
  </table>
 </body>
</html>
';

// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// En-têtes additionnels
$headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
$headers[] = 'From: Anniversaire <anniversaire@example.com>';
$headers[] = 'Cc: anniversaire_archive@example.com';
$headers[] = 'Bcc: anniversaire_verif@example.com';

// Envoi
mail($to, $subject, $message, implode("\r\n", $headers));

/*BCC :Blind Carbon Copy, ou copie carbone cachée : adresses mail des personnes recevant une copie du message; ces adresses sont masquéees par le destinataire. Attention, les logiciels antispam n'aiment pas.
CC:Carbon Copy, ou copie carbone : adresses mail des personnes recevant une copie du message; ces adresses sont visibles par le destinataire. Attention, les logiciels antispam n'aiment pas.
Content-Type:	Type de contenu du mail, c'est-à-dire le format.
From:	Expéditeur du mail.
MIME-Version:	Version du type MIME, toujours la valeur 1.0.
Reply-To:	Adresse mail de réponse au mail. Si non indiquée, cette adresse sera celle de l'expéditeur spécifiée dans From.
X-Mailer:	Indique le logiciel, service ou langage (par exmple la version de PHP) utilisé pour envoyer le mail.
*/
?>

<?php
     $to      = 'personne@example.com';
     $subject = 'le sujet';
     $message = 'Bonjour !';
     $headers = 'From: webmaster@example.com' . "\r\n" .
     'Reply-To: webmaster@example.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

     mail($to, $subject, $message, $headers);


 ?>
<?php

$message = '<!DOCTYPE html>
            <html lang="fr">
            <head>
            <meta charset="utf-8">
            <title>Mon premier mail HTML</title>   
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <style>
                html 
                    {
                       font-size: 100%;
                    }
 
                body 
                    {
                    font-size: 1rem; /* Si html fixé à 100%, 1rem = 16px = taille par défaut de police de Firefox ou Chrome */
                    }
            </style>  
            </head>
            <body>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                              <h1>Mon premier mail HTML</h1>
                          </div>    
                    </div>      
                    <div class="row">
                        <div class="col-12">
                              <p>Ouah c\'est trop génial ! On peut même mettre une image.</p>
                          </div>    
                    </div>      
                    <div class="row">
                        <div class="col-12">
                              <img src="jarditou_logo.jpg" title="Logo" alt="Logo" class="img-fluid">
                         </div>    
                    </div>      
                </div> 
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                </body>
                </html>';