<?php
session_start();
$today= date("d/m/Y");
$time = date("G:i T");
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
            <!--- Contenu site ici --->
          <p>
          <?php
          if (isset($_SESSION['prenom'])):
            echo 'Bonjour '. $_SESSION['prenom'];
          else:
            echo 'Bonjour';
          endif;
            ?>
            , nous sommes le <?php echo $today ?><br/>
            Il est <?php echo $time?>
          </p>
        </main>
<?php include("includes/footer.php"); ?>
    </body>
</html>
