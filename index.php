<?php
session_start();
$today= date("d/m/Y");
$time = date("G:i T");

$compteur = fopen('files/compteur.txt','r+'); //ouverture en read & write
$comptPages = fgets($compteur); //récup 1 ligne
$comptPages++; //increment ligne
fseek($compteur,0); //retour au début ligne
fputs($compteur,$comptPages); //remplacement contenu par increment
fclose($compteur); //fermeture
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ESIG Accueil</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/e064ae86ba.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
   </head>
    <body>
      <?php include("includes/mainMenu.php"); ?>
        <main>
          <p>
          <?php
          if (isset($_SESSION['prenom'])): //Si user co
            echo 'Bonjour '. $_SESSION['prenom'];
          elseif (isset($_COOKIE['prenom'])): //si cookie existe
            echo 'Bonjour '. $_COOKIE['prenom'];
          else:
            echo 'Bonjour';
          endif;?>, nous sommes le
            <?php echo $today ?>
            <br/>
            Il est
            <?php echo $time ?>
            <br/>
            La page a été vue
            <?php echo $comptPages ?>
             fois
          </p>
        </main>
<?php include("includes/footer.php"); ?>
    </body>
</html>
