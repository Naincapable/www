<?php
/*
 *      connection TP0.php
 *
 /*** mysql hostname ***/
 $hostname = 'localhost';
 $utilisateur = 'util';
 $motDePasse = 'beaup';
 $db="bdavion";

 
	 /*** echo a message saying we have connected ***/

 try 
 {
	$connection = new PDO("mysql:host=$hostname;dbname=$db",$utilisateur,$motDePasse);
	$select=$connection->query("SELECT * FROM pilote");
	$select->setFetchMode(PDO::FETCH_OBJ);
	$enregistrement = $select->fetch();
	 /*** echo a message saying we have connected ***/
	 echo 'Connection sur la base exercice connectionV2.php'. "<br/>";
 }
 catch(PDOException $e)
 {
	echo"connection a la base impossible : ", $e->getMessage();
	die();
}
while($enregistrement = $select->fetch(PDO::FETCH_OBJ) )
{
	if($enregistrement)
	{
		//on affiche les résultat par rapport a leur colonne dans la database.table selectionner, en l'occurence ici la table pilote.
		echo '<h1>', $enregistrement->brevet, ' ', $enregistrement->nom, ' ', $enregistrement->nbHVol, ' ', $enregistrement->compa,'</h1>';
	}
	
	else
	{
		echo "aucun résultat";
	}
	//affichage des champs
	echo '<h1>', $enregistrement->brevet, ' ', $enregistrement->nom, ' ', $enregistrement->nbHVol, ' ', $enregistrement->compa,'</h1>';
}
 ?>