<?php
try {
  //connexion base
  $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
}
catch (Exception $e)
{
  //Si erreur, kill connection
  die('Erreur : ' . $e->getMessage());
}
//si aucune erreur

?>
