<?php
	//on inclut le fichier des paramètre de connexion
	include_once("myparam.inc.php");
	//on récupéré les identifiant
	$base="bdavion";
	$dsn="mysql:host=".MYHOST.";dbname=".$base;
	$user=MYUSER;
	$pass=MYPASS;
	$idcom = new PDO($dsn,$user,$pass);
	//test de la connection
	if(!$idcom)
	{
		echo "Erreur";
	}
	else 
	{
		echo "Réussi !";
	}

	$idcom=NULL;
?>