<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/1999/xhtml"xml:lang-"fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Insertion et lecture de la table client</title>
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
	$hostname = 'localhost';
	$utilisateur = 'util';
	$motDePasse = 'beaup';
	$db="bdavion"; 
try
{
	$options=array
	(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION );
	$conn = new PDO("mysql:host=$hostname;dbname=$db", $utilisateur, $motDePasse,$options);
	echo 'Connection réussi',"<br/>";
	echo 'Test écriture dans BDAVION',"<br/>";
	$requete1="UPDATE pilote SET nbHVol=nbHvol*10/100";
	$nb=$conn->exec($requete1);
	echo "<p>$nb ligne(s) modifie(s)<hr/></p>";
	$requete2="SELECT * FROM pilote ORDER BY nbHVol";
	$result=$conn->query($requete2);
	if(!$result)
	{
		$mes_erreur=$conn->errorInfo();
		echo "Lecture impossible, code", $conn->errorCode(),$mes_erreur[2];
	}
	else
	{
		while($row=$result->fetch(PDO::FETCH_NUM))
		{
			foreach($row as $donn)
			{
				echo $donn, "&nbsp;";
			}
			echo "<hr/>";
		}
		//$result->closeCursor();
	}
	$conn=null;
}
catch (PDOException $e)
{
	echo $e->getMessage();
}
?>
</body>
</html>