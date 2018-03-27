<?php
try {
  //connexion base
  $bdd = new PDO('mysql:host=localhost;dbname=esigweb','root','');

if (isset($_SESSION['id']) AND isset($_SESSION['nickname'])):
  $login=1; //Le user est co
else:
  if ((isset($_POST['nickname']) AND isset($_POST['password']))):
    $req = $bdd->prepare("SELECT id, password FROM utilisateur WHERE nickname = ':nickname'");
    $req->bindParam(':nickname', $_POST['nickname'], PDO::PARAM_STR);
    $req->execute();
    $result = $req->fetch();
    //$isPasswordCorrect = password_verify($_POST['mdp'], $result['pass']);
    //echo password_hash($_POST['password'], PASSWORD_DEFAULT) . "<br>";
    //echo  $_POST['nickname'] . "+" . $result["password"] . "<br>";
    if(password_hash($_POST['password'], PASSWORD_DEFAULT) == $result["password"]):
      $login=1; //le user est co
      $_SESSION['id'] = $result["id"];
      $_SESSION['nickname'] = $_POST['nickname'];
      setcookie('nickname',$_SESSION['nickname'],time() + 365*24*3600,null,null,false,true);
    else:
      $login=2; //erreur mdp
    endif;
  else:
    $login=0; //user pas co
  endif;
endif;
}
catch (PDOException $e)
{
  echo '<pre>';
  echo $req;
  echo '</pre>';
  echo $e->getMessage();
  die;
  //Si erreur, kill connection
  //die('Erreur : ' . $e->getMessage());
}
?>
