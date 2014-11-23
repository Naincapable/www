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
if($idcom=connexpdo("bdavion","myparam"))
{
	$requete="SELECT brevet as 'Code pilote', nom as 'Nom_pilote', nbHVol as 'Nombre_Heure_Vol' FROM pilote 
	where compa like '%SING%' ORDER BY nbHVol";
	$result=$idcom->query($requete);
	if(!$result)
	{
		$mes_erreur=$idcom->errorInfo();
		echo "LEcture impossible, code",$idcom->errorCode(),$mes_erreur[2];
	}
	else
	{
		$nbart=$result->rowCount();
		$tabresult=$result->fetchAll(PDO::FETCH_ASSOC);
		$titre=array_keys($tabresult[0]);
		echo "<h3> Tous nos pilotes par heure de vol (Singapour)</h3>";
		echo "<h4> il y a $nbart pilote </h4>";
		echo "<table border=\"|\">";
		echo "<tr><th>Brever</th><th>Nom</th><th>nbHvol</th><th>compa</th></tr>";
		foreach($titre as $nomcol)
		{
			echo "<th>",htmlentities($nomcol),"</th>";
		}
		echo "</tr>";
		for($i=0;$i<$nbart;$i++)
		{
			echo"<tr>";
			foreach($tabresult[$i] as $valeur)
			{
				echo "<td>$valeur</td>";
			}
		echo"</tr>";
		}
		echo"</table>";
	}
	$result->closeCursor();
	$idcom=null;
	}
?>
</body>
</html>