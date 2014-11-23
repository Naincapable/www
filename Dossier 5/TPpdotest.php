<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/1999/xhtml"xml:lang-"fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Lecture de la table PILOTE</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>"method="post"
entype="application/x-www-form-urlencoded">
<fieldset>
<legend><b>Vos coordonnées</b></legend>
<table>
<tr><td>Brevet du pilote: </td>			<td><input type ="text" name="1" size="40" maxlenght="30"/>
</td></tr>
<tr><td>Nom du pilote: </td>			<td><input type="text" name="2" size="40" maxlenght="30"/>
</td></tr>
<tr><td>nombre d'heure de vol : </td>	<td><input type="text" name="3" size="40" maxlenght="30"/>
</td></tr>
<tr><td>compagnie : </td>				<td><input type="text" name="4" size="40" maxlenght="30"/>
</td></tr>
<tr>
</tr>
</table>
</fieldset>

<fieldset>
<legend><b>les précédentes coordonnée</b></legend>
<table>
<tr><td>Brevet du pilote:</td>			<td><input type ="text" name="5" size="40" maxlenght="30"/>
</td></tr>
<tr><td>Nom du pilote: </td>			<td><input type="text" name="6" size="40" maxlenght="30"/>
</td></tr>
<tr><td>nombre d'heure de vol : </td>	<td><input type="text" name="7" size="40" maxlenght="30"/>
</td></tr>
<tr><td>compagnie : </td>				<td><input type="text" name="8" size="40" maxlenght="30"/>
</td></tr>
<tr>
<td><input type="reset" value="Effacer" name="Effacer"></td>
<td><input type="submit" value="Modifier" name="Envoyer"></td>

</fieldset>
</table>
</form>
<?php
include("connexpdo.inc.php");
$idcom=connexpdo("bdavion","myparam");
if(isset($_POST['Envoyer']))
{
	$brevet=$idcom->quote($_POST['1']);
	$nom=$idcom->quote($_POST['2']);
	$nbHVol=$idcom->quote($_POST['3']);
	$compa=$idcom->quote($_POST['4']);
	echo "</br>Envoi en cours!</br>";
	$requete="UPDATE pilote 
	set nom=$nom,nbHVol=$nbHVol,brevet=$brevet,compa=$compa where nom like %nomtest or brevet like $brevettest or compa like $compatest or nbHVol like $nbHVoltest;";
	echo "</br>Envoi effectué !</br>";
	$nbligne=$idcom->exec($requete);
	if($nbligne!=1)
	{
		$mess_erreur=$idcom->errorInfo();
		echo "</br>Insertion impossible, code", $idcom->errorCode(),$mess_erreur[2];
		echo "<script type=\"text/javascript\">
		alert('Erreur :",$idcom->errorCode(),")</script></br>";
	}
	else
	{
		echo "</br><script type=\"text/javascript\">
		alert('Vous êtes enregistré Votre numéro de brevet est : ".
		$idcom->lastInsertID(),"')</script>";
		$idcom=null;
	}
}
else
{
	echo "</br><h3>Formulaire à completer!</h3></br>";
}
?>
</body>
</html>