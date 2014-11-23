<?php
/*
 *      connection TP0.php
 *
 /*** mysql hostname ***/
 $hostname = 'localhost';
 $utilisateur = 'util';
 $motDePasse = 'beaup';
 $db="bdavion";
 $conn = new PDO("mysql:host=$hostname;dbname=$db",$utilisateur,$motDePasse);
 /*** echo a message saying we have connected ***/
 echo 'Connection OK sur la base';
 ?>