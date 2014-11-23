<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/1999/xhtml"xml:lang-"fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Lecture de la table PILOTE</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="application/x-www-form-urlencoded">
<fieldset>
<legend><b>Vos coordonnées</b></legend>
<table>
<tr><td>Brevet: </td>					<td><input type="text" name="code" size="40" maxlenght="30" value=<?php echo $_POST['code'] ?> />
</td></tr>
<?php
echo "j'execute le php 1";
include("connexpdo.inc.php");
$idcom=connexpdo("bdavion","myparam");
$brevet=$idcom->quote($_POST['code']);
$recup="SELECT nom,nbHVol, compa FROM pilote where brevet like $brevet;";
$result=$idcom->query($recup);
$D=0;
while($ligne=$result->fetch(PDO::FETCH_NUM))
{
	foreach($ligne as $valeur)
	{
		if($D==0)
		{
			$nom2=$valeur;
		}
		if($D==1)
		{
			$nbHVol2=$valeur;
		}
		if($D==2)
		{
			$compa2=$valeur;
		}
		$D=$D+1;
	}
}
echo "j'ai fini le php 1";
?>
<tr><td>Nom du pilote: </td>			<td><input type="text" name="2" size="40" maxlenght="30" value=<?php echo $nom2 ?> />
</td></tr>
<tr><td>nombre d'heure de vol : </td>	<td><input type="text" name="3" size="40" maxlenght="30" value=<?php echo $nbHVol2 ?> />
</td></tr>
<tr><td>compagnie : </td>				<td><input type="text" name="4" size="40" maxlenght="30" value=<?php echo $compa2 ?> />
</td></tr>
<tr>
<?php
echo "J'execute le php2";
//Allez vous l'exemple utilisations des reuqête préparer fin dossier
if(isset($_POST['2'])&&isset($_POST['3'])&&isset($_POST['4']))
{
	$nom=$idcom->quote($_POST['2']);
	$nbHVol=$idcom->quote($_POST['3']);
	$compa=$idcom->quote($_POST['4']);
	echo "</br>Envoi en cours!</br>";
	$requete="update pilote 
	set nom=$nom,nbHVol=$nbHVol,compa=$compa
	where brevet like $brevet;";
	echo "</br>Envoi effectué !</br>";
	$nbligne=$idcom->exec($requete);
	if($nbligne!=1)
	{
		$mess_erreur=$idcom->errorInfo();
		echo "</br>Insertion impossible, code", $idcom->errorCode(),$mess_erreur[2];
		echo "<script type=\"text/javascript\">
		alert('Erreur :",$idcom->errorCode(),"')</script></br>";
	}

}
else
{
	echo "</br><h3>Formulaire à completer!</h3></br>";
}
echo "j'ai fini le php2";
?>

<td><input type="reset" value="Effacer" name="Effacer"></td>
<td><input type="submit" value="modifier" name="Envoyer"></td>
</tr>
</table>
</fieldset>
</form>
</body>
</html>