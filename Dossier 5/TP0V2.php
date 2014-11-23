<?php
/*
 *      connection TP0.php
 *
 /*** mysql hostname ***//**
 $hostname = 'localhost';
 $utilisateur = 'util';
 $motDePasse = 'beaup';
 $db="bdavion";
*/
 
try
{
	$hostname = 'localhost';
	$utilisateur = 'util';
	$motDePasse = 'beaup';
	$db="bdavion";
	$conn = new PDO("mysql:host=$hostname;dbname=$db", $utilisateur, $motDePasse);
}
catch (exception $e)
{
	echo 'Connection impossible sur la base ';
	die();
}
?>