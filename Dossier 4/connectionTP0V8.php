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
 	$options = array
	(
	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);
	$connection = new PDO("mysql:host=$hostname;dbname=$db",$utilisateur,$motDePasse, $options);
	$select=$connection->query("SELECT * FROM pilote");
	$select->setFetchMode(PDO::FETCH_OBJ);
	$enregistrement = $select->fetch();
	$createurs=$select->fetchAll(PDO::FETCH_OBJ);
	/*** echo a message saying we have connected ***/
	echo 'Connection sur la base exercice connectionV2.php'. "<br/>";
	 
	do{
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
	}while($enregistrement = $select->fetch(PDO::FETCH_OBJ) );
	while($enregistrement = next($createurs) )
	{
		echo '<h1>', $enregistrement->brevet, ' ', $enregistrement->nom, ' ', $enregistrement->nbHVol, ' ', $enregistrement->compa,'</h1>';
	}

}
 catch(PDOException $e)
 {
	echo"connection a la base impossible : ", $e->getMessage();
	die();
}
 ?>