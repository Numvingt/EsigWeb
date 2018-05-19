<?php
try {
    //connexion base
    $bdd = new PDO('mysql:host=localhost;dbname=esigweb','root','');

    if (isset($_SESSION['id']) AND isset($_SESSION['nickname'])):
      $login=1; //Le user est co
    else:
      if ((isset($_POST['nickname']) AND isset($_POST['password']))):
        $sanitized_nickname = filter_var($_POST['nickname'],FILTER_SANITIZE_STRING); //Nettoyage nickname
        $sanitized_password = filter_var($_POST['password'],FILTER_SANITIZE_STRING); //Nettoyage password
        $req = $bdd->prepare('SELECT id, password FROM utilisateur WHERE nickname = :nickname');
        $req->bindParam(':nickname', $sanitized_nickname, PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();
        if(password_verify($sanitized_password,$result['password'])):
          $login=1; //user connected
          $_SESSION['id'] = $result['id'];
          $_SESSION['nickname'] = $sanitized_nickname;
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
}
?>
