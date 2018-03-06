<?php
session_start();
if (isset($_SESSION['prenom'])):
  $login=1; //Le user est co
else:
  if ((isset($_POST['prenom']) AND isset($_POST['mdp']))):
    if ($_POST['mdp']=='esig'):
      $login=1; //le user est co
      $_SESSION['prenom'] = $_POST['prenom'];
    else:
      $login=2; //erreur mdp
    endif;
  else:
    $login=0; //user pas co
  endif;
endif;
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
            <!--- Contenu page ici --->
            <?php if($login==1): //si user co ?>
              <?php echo 'Bonjour '. $_SESSION['prenom']; ?>
              </br>
              <a href="logOut.php">Logout</a>
            <?php else: ?>
              <?php if($login==2): //si erreur mdp ?>
                Erreur dans le mot de passe
                <br/>
                <a href="Userpage.php">Retour au login</a>
              <?php else: //si user pas co ?>
                <p>Veuillez vous connecter</p>
                <form method="post" action="Userpage.php">
                  <input type="text" name="prenom"/>
                  <input type="password" name="mdp"/>
                  <input type="submit" name="valider"/>
                </form>
              <?php endif;?>
            <?php endif;?>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
</html>
