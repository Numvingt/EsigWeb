<!DOCTYPE html>
<html>
    <head>
        <title>User page</title>
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
            <!--- Contenu page ici --->
            <p>
              <?php
              if ((isset($_POST['prenom']) AND isset($_POST['mdp']))):
                if ($_POST['mdp']=='esig'):
                    echo 'Bonjour' . " " . $_POST['prenom'];
                else:
                  ?>
                  <p>Erreur dans le mot de passe</p><br/>
                  <button type="button" onclick="history.back();">Back</button>
                  <?php
                endif;
              else: ?>
                <p>Veuillez vous connecter</p>
                <form method="post" action="Userpage.php">
                  <input type="text" name="prenom"/>
                  <input type="password" name="mdp"/>
                  <input type="submit" name="valider"/>
                </form>
              <?php endif; ?>
            </p>
        </main>
<?php include("includes/footer.php"); ?>
    </body>
</html>
