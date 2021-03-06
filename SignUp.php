<?php
session_start();

try {
  //connexion base
  $bdd = new PDO('mysql:host=localhost;dbname=esigweb','root','');

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
          if(isset($_POST['nickname'])):
            $sanitized_email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL); //Nettoyage email
            if(filter_var($sanitized_email,FILTER_VALIDATE_EMAIL)): //si email valide
              $sanitized_nickname = filter_var($_POST['nickname'],FILTER_SANITIZE_STRING); //Nettoyage nickname
              $sanitized_password = filter_var($_POST['password'],FILTER_SANITIZE_STRING); //Nettoyage password
              $pass_hache = password_hash($sanitized_password, PASSWORD_DEFAULT); //Hash du mdp
              $req = $bdd->prepare('INSERT INTO utilisateur(nickname, password, email) VALUES(:nickname,:password,:email)');
              $req->bindParam(':nickname', $sanitized_nickname, PDO::PARAM_STR);
              $req->bindParam(':password', $pass_hache, PDO::PARAM_STR);
              $req->bindParam(':email', $sanitized_email, PDO::PARAM_STR);
              $req->execute();
              echo 'Vous êtes inscrits ! <br/>';
            else:
              echo 'Erreur dans votre email ! <br/>';
            endif;
          else: ?>
          <p>Veuillez remplir le formulaire</p>
          <form method="post" action="SignUp.php">
            Pseudo (20 caractères max):<br/>
            <input type="text" name="nickname"/><br/>
            Mot de passe (20 caractères max):<br/>
            <input type="password" name="password"/><br/>
            E-Mail (100 caractères max):<br/>
            <input type="email" name="email"/><br/>
            <input type="submit" name="valider"/>
          </form>
        <?php endif;
          }
          catch (Exception $e)
          {
            //Si erreur, kill connection
            die('Erreur : ' . $e->getMessage());
          }
          ?>
          <a href="Userpage.php">Retour à la connexion</a>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
</html>
