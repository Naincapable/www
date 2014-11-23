<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/1999/xhtml"xml:lang-"fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Lecture de la table PILOTE</title>
</head>
<body>
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
include("connexpdo.inc.php");
$idcom=connexpdo("bdavion","myparam");
$requete="SELECT brevet as piloteSingapour,nom,nbHVol,compa FROM pilote 
where compa like '%SING%' ORDER BY nbHVol";
$requete2="SELECT brevet as PiloteFrance,nom,nbHVol,compa FROM pilote 
where compa like '%AF%' ORDER BY nbHVol";
$result=$idcom->query($requete);
if(!$result)
	{
		$mes_erreur=$idcom->errorInfo();
		echo "LEcture impossible, code",$idcom->errorCode(),$mes_erreur[2];
	}
	else
	{
		$nbart=$result->rowCount();
		$ligne=$result->fetchObject();
		echo "<h3> Tous nos pilotes par heure de vol (Compagnie SINGAPOUR)</h3>";
		echo "<h4> il y a $nbart pilote </h4>";
		echo "<table border=\"|\">";
		foreach($ligne as $nomcol)
		{
			echo "<th>",$nomcol,"</th>";
		}
		echo "</tr>";
		echo "<tr>";
		do
		{
		echo "<td>",$ligne->piloteSingapour,"</td>","<td>",$ligne->nom,"</td>","<td>",$ligne->nbHVol,"</td>","<td>",$ligne->compa,"</td>";
		echo "</tr>";
		}while($ligne=$result->fetchObject());
		echo "</table>";
		$result->closeCursor();
		$idcom=null;
	}

$idcom=connexpdo("bdavion","myparam");
$result=$idcom->query($requete2);
if(!$result)
	{
		$mes_erreur=$idcom->errorInfo();
		echo "LEcture impossible, code",$idcom->errorCode(),$mes_erreur[2];
	}
	else
	{
		$nbart=$result->rowCount();
		$ligne=$result->fetchObject();
		echo "<h3> Tous nos pilotes par heure de vol (Compagnie AIR FRANCE)</h3>";
		echo "<h4> il y a $nbart pilote </h4>";
		echo "<table border=\"|\">";
		foreach($ligne as $nomcol=>$val)
		{
			echo "<th>",$nomcol,"</th>";
		}
		echo "</tr>";
		echo "<tr>";
		do
		{
		echo "<td>",$ligne->PiloteFrance,"</td>","<td>",$ligne->nom,"</td>","<td>",$ligne->nbHVol,"</td>","<td>",$ligne->compa,"</td>";
		echo "</tr>";
		}while($ligne=$result->fetchObject());
		echo "</table>";
		$result->closeCursor();
		$idcom=null;
	}
	
?>
</body>
</html>