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
<?php include("includes/UserPageMenu.php"); ?>
        <main>
            <!--- Contenu page ici --->
            <form method="post" action="Userpage.php">
              <input type="text" name="prenom"/>
              <input type="submit" name="valider"/>
            </form>
            <p>
              <?php
              if (isset ($_POST['prenom']))
              {
              echo 'Bonjour' . " " . $_POST['prenom'];
              }
              else
              {
                echo 'Entrez votre nom';
              }
              ?>
            </p>
        </main>
<?php include("includes/footer.php"); ?>
    </body>
</html>
