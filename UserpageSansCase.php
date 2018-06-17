<?php
session_start();
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
		<?php  if (isset($_SESSION['id']) AND isset($_SESSION['nickname'])):
				echo 'Bonjour '. $_SESSION['nickname']; ?>
                </br>
                <a href="scripts/logOut.php">Logout</a>
				<?php
			   else:
				  if ((isset($_POST['nickname']) AND isset($_POST['password']))):
					$sanitized_nickname = filter_var($_POST['nickname'],FILTER_SANITIZE_STRING); //Nettoyage nickname
					$sanitized_password = filter_var($_POST['password'],FILTER_SANITIZE_STRING); //Nettoyage password
					$req = $bdd->prepare('SELECT id, password FROM utilisateur WHERE nickname = :nickname');
					$req->bindParam(':nickname', $sanitized_nickname, PDO::PARAM_STR);
					$req->execute();
					$result = $req->fetch();
					if(password_verify($sanitized_password,$result['password'])):
						echo 'Bonjour '. $_SESSION['nickname']; ?>
						</br>
						<a href="scripts/logOut.php">Logout</a>
					<?php
					  $_SESSION['id'] = $result['id'];
					  $_SESSION['nickname'] = $sanitized_nickname;
					  setcookie('nickname',$_SESSION['nickname'],time() + 365*24*3600,null,null,false,true);
					else:?>
						Erreur dans le mot de passe
						<br/>
						<a href="Userpage.php">Retour au login</a>
					<?php 
					endif;
				 else :?>
						<p>Veuillez vous connecter</p>
						<form method="post" action="Userpage.php">
						  <input type="text" name="nickname"/>
						  <input type="password" name="password"/>
						  <input type="submit" name="valider"/>
						</form>
						<br/>
						<a href="SignUp.php">S'inscrire</a>
				<?php 
				 endif;
			   endif;
				?>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
</html>
