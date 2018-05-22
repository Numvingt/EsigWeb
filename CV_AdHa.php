<?php
session_start();
?>
﻿<!DOCTYPE html>
<html>
    <head>
        <title>CV Admira Halili</title>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/e064ae86ba.js"></script>
        <link rel="stylesheet" type="text/css" href="CV\AdHa\styleCV.css">
        <link rel="stylesheet" type="text/css" href="style.css">

     </head>
    <body>
<?php include("includes/mainMenu.php"); ?>
		<main class="centrepage">
			<header>
				<br>
				<H1>Employée de commerce </H1>
				<section class="min"><img id="photo" src="CV\AdHa\minion.png"></section>
				<section class="min2">
					<p> Admira Halili <br>
					Rue de la Coupe Gordon-Bennett 4 B<br>
					1219 Le Lignon <br>
					Née, le 15 août 1996 <br>
					079 932 30 25</p>
				</section>
			</header>
			<section class="mep">
				<h2>Expérience professionnelle</h2>


				2015 - à ce jour : Hôtesse de Caisse - Migros Genève
				<ul> <li> Encaisser la clientèle</li></ul><br>

				2015 - 2016 : Communication - Espace Entreprise
				<ul> <li> Répondre aux besoins des clients internes et externes</li></ul><br>

				Septembre 2015 : Réceptionniste - L'Office des poursuites
				<ul><li> Accueillir, orienter et renseigner la clientèle</li>
				<li> Gérer la central téléphonique</li></ul> <br>

				Juillet  2013 : Jardinière - Commune de Vernier
				<ul> <li> Entretiens des epsaces verts</li></ul> <br>

				<h2> Formation </h2>

				2012 - 2016 : CEC André-Chavannes
				<ul> <li> Certificat fédéral de capacité</li></ul>

				2008 - 2012 : CO Cayla<br>
			</section>

			<section class="mep1">
				<h2> Informatique </h2>
				<ul>
					<li> Word</li>
					<li> Excel</li>
					<li>PowerPoint</li>
					<li>Crésus</li>
				</ul>
				<br>

				<h2> Langue</h2>
				Albanais : langue maternelle<br>
				Français : courant <br>
				Allemand : B1<br>
				Anglais  : B1<br>
				<br>

				<h2> Loisir </h2>
				Fitness, lecture et plonger sous marine
			</section>
		</main>
<?php include("includes/footer.php"); ?>
    </body>
</html>
