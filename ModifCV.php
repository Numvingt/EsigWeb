<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modification du CV</title>
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
          <p>
            Bienvenue sur la page de modification de votre CV
          </p>
          <?php
              include_once("scripts/gdoc.php");
              $gdoc  = "1PeElgKpEDJbYhyHs3jqe-LkqVw_7EnoEfuPOVm8HYCY";
              buildHtmlFromDoc($gdoc);
              include("cache/_".$gdoc.".html");
          ?>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
</html>
