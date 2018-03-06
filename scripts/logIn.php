<?php
if (isset($_SESSION['prenom'])):
  $login=1; //Le user est co
else:
  if ((isset($_POST['prenom']) AND isset($_POST['mdp']))):
    if ($_POST['mdp']=='esig'):
      $login=1; //le user est co
      $_SESSION['prenom'] = $_POST['prenom'];
      setcookie('prenom',$_SESSION['prenom'],time() + 365*24*3600,null,null,false,true);
    else:
      $login=2; //erreur mdp
    endif;
  else:
    $login=0; //user pas co
  endif;
endif;
?>
