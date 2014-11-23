<?php
/*
 *      connection TP0.php
 *
 /*** mysql hostname ***/
 $hostname = 'localhost';
 $utilisateur = 'util';
 $motDePasse = 'beaup';
 $db="bdavion";
 try 
 {
	 $conn = new PDO("mysql:host=$hostname;dbname=$db",$utilisateur,$motDePasse);
	 /*** echo a message saying we have connected ***/
	 echo 'Connection sur la base exercice connectionV2.php'. "<br/>";
 }
 catch(PDOException $e)
 {
	echo"connection a la base impossible : ", $e->getMessage();
	die();
}
	
 ?>