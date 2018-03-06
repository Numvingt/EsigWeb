<?php
session_start();
include("scripts/logIn.php");
?>
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
            <?php
            switch ($login) {
            case 0: ?>
                <p>Veuillez vous connecter</p>
                <form method="post" action="Userpage.php">
                  <input type="text" name="prenom"/>
                  <input type="password" name="mdp"/>
                  <input type="submit" name="valider"/>
                </form>
              <?php break;
              case 1:
                echo 'Bonjour '. $_SESSION['prenom']; ?>
                </br>
                <a href="scripts/logOut.php">Logout</a>
                <?php break;
            case 2: ?>
                Erreur dans le mot de passe
                <br/>
                <a href="Userpage.php">Retour au login</a>
              <?php break;
           }
           ?>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
</html>
