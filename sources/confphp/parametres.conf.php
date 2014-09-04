<?php
	$server = "localhost";
	$db_name = "formulaire";
	$user = "root";
	$password = "root";


	$db = mysqli_connect($server, $user, $password, $db_name) or die ('<h1 style="font-family: sans-serif; font-size: 16pt; text-align: center; border: 4px solid #FF0000; padding: 16px; width: 400; margin: 0 auto; border-radius: 32px; background-color: #FFC0C0; margin-top: 128px; color: #FF0000;">Erreur : Connexion &agrave; la base de donn&eacute;es impossible</h1>');
	
	/* Team development */
	$developpeur           = "Audrey";
	$developpeur_site      = "www.legendwebby.fr";
	$developpeur_site_name = "Audrey ALETTI";

	$compagnie_name         = "Arobiz";
	$compagnie_site         = "http://www.arobiz.com";
	$compagnie_site_name    = "arobiz";
?>
