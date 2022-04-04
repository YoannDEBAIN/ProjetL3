<!DOCTYPE html>
<html>

	<head>
		<title>CORRELATION</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../Style/Design.css" type="text/css" media="screen" />
	</head>
	
	<body id="BODY_FondUni">
		<div id="menu">
			<ul id="onglets">
				<li><a href="../PagesHTML/Explications.html"> Explications </a></li>
				<li><a href="Classement.php"> Classement </a></li>
				<li  class="active"><a href="Correlation.php"> Correlation </a></li>
				<li><a href="../PagesHTML/Accueil.html"> Accueil </a></li>
				<li class="titre">TITRE</li>
			</ul>
		</div>
		
		
		
		
		<? $bdd = new PDO('mysql:host=localhost;dbname=bdprojetl3;charset=utf8','root', 'root'); ?>


		
<div id="rectangle">
<div class="centre">
<form action="Correlation.php" method="get" autocomplete="off">
En 
<input name="annee" type="number" value="<? echo $_GET['annee'];?>" min="2000" max ="2020" step="1">
  , un pays plus 
    <span class="custom-dropdown custom-dropdown--white">
        <select class="custom-dropdown__select custom-dropdown__select--white" name = "Ind1">
            <option value="indicedemocratie" <? if ($_GET['Ind1']=="indicedemocratie"){echo 'selected';}?>>democratique</option>
            <option value="indcorruption" <? if ($_GET['Ind1']=="indcorruption"){echo 'selected';}?>>corrompu</option>
			<option value="indbonheur" <? if ($_GET['Ind1']=="indbonheur"){echo 'selected';}?>>heureux</option>
			<option value="indparite" <? if ($_GET['Ind1']=="indparite"){echo 'selected';}?>>paritaire</option>
			<option value="indlibermorale" <? if ($_GET['Ind1']=="indlibermorale"){echo 'selected';}?>>morale</option>
			<option value="indlibercivile" <? if ($_GET['Ind1']=="indlibercivile"){echo 'selected';}?>>libre</option>
			<option value="indpaixglobale" <? if ($_GET['Ind1']=="indpaixglobale"){echo 'selected';}?>>paisible</option>
        </select>
		</span>
	etait-il un pays plus 
	<span class="custom-dropdown custom-dropdown--white">
        <select class="custom-dropdown__select custom-dropdown__select--white" name = "Ind2">
            <option value="indicedemocratie" <? if ($_GET['Ind2']=="indicedemocratie"){echo 'selected';}?>>democratique</option>
            <option value="indcorruption" <? if ($_GET['Ind2']=="indcorruption"){echo 'selected';}?>>corrompu</option>
			<option value="indbonheur" <? if ($_GET['Ind2']=="indbonheur"){echo 'selected';}?>>heureux</option>
			<option value="indparite" <? if ($_GET['Ind2']=="indparite"){echo 'selected';}?>>paritaire</option>
			<option value="indlibermorale" <? if ($_GET['Ind2']=="indlibermorale"){echo 'selected';}?>>morale</option>
			<option value="indlibercivile" <? if ($_GET['Ind2']=="indlibercivile"){echo 'selected';}?>>libre</option>
			<option value="indpaixglobale" <? if ($_GET['Ind2']=="indpaixglobale"){echo 'selected';}?>>paisible</option>
        </select>
</span>
?
<br />
		<br />
		<input type="submit" value="Envoyer">
		</form>
</div>
</div>

<br />

<? 
if ($_GET['annee']!=""){
if($_GET['Ind1']==$_GET['Ind2']){
echo '<img class = "Graph" src="test.php?Ind1='.$_GET['Ind1'].'&Ind2='.$_GET['Ind2'].'&annee='.$_GET['annee'].'&cor=1" />';
echo '<br />';

?>
<a href="<? echo 'test.php?Ind1='.$_GET['Ind1'].'&Ind2='.$_GET['Ind2'].'&annee='.$_GET['annee'].'&cor=1'; ?>" 
   download="cor.png">Télécharger le graphique</a>

<? 
echo '<p>La liste des pays non pris en compte (par manque de données) : </p>';

$rep = $bdd->query('SELECT pays.NomPaysFR FROM pays WHERE pays.IdPays NOT IN (SELECT '.$_GET['Ind1'].'.IdPays FROM '.$_GET['Ind1'].' WHERE '.$_GET['Ind1'].'.Valeur IS NOT NULL AND '.$_GET['Ind1'].'.Annee='.$_GET['annee'].')');
echo '<ul>';
while($ligne=$rep->fetch()){
	echo '<li>'.$ligne['NomPaysFR'].'</li>';
}
echo '</ul>';


}else{

		$rep = $bdd->query("SELECT round((avg(".$_GET['Ind1'].".Valeur*".$_GET['Ind2'].".Valeur)-(AVG(".$_GET['Ind1'].".Valeur)*avg(".$_GET['Ind2'].".Valeur)))/(STDDEV_SAMP(".$_GET['Ind1'].".Valeur)*STDDEV_SAMP(".$_GET['Ind2'].".Valeur)), 2) AS 'r'
FROM ".$_GET['Ind1'].", ".$_GET['Ind2']."
WHERE ".$_GET['Ind1'].".IdPays=".$_GET['Ind2'].".IdPays AND ".$_GET['Ind1'].".Valeur IS NOT NULL AND ".$_GET['Ind2'].".Valeur IS NOT NULL AND ".$_GET['Ind1'].".Annee=".$_GET['annee']." AND ".$_GET['Ind2'].".Annee=".$_GET['annee']);

$res=$rep->fetchAll();

echo '<img class = "Graph" src="test.php?Ind1='.$_GET['Ind1'].'&Ind2='.$_GET['Ind2'].'&annee='.$_GET['annee'].'&cor='.$res[0]['r'].'" />';

echo '<br />';

?>
<a href="<? echo 'test.php?Ind1='.$_GET['Ind1'].'&Ind2='.$_GET['Ind2'].'&annee='.$_GET['annee'].'&cor='.$res[0]['r']; ?>" 
   download="cor.png">Télécharger le graphique</a>
   
  
		
<?
echo '<p>La liste des pays non pris en compte (par manque de données) : </p>';

$rep = $bdd->query('SELECT pays.NomPaysFR FROM pays WHERE pays.IdPays NOT IN (SELECT pays.IdPays FROM '.$_GET['Ind1'].' , '.$_GET['Ind2'].' , pays WHERE '.$_GET['Ind1'].'.IdPays=pays.IdPays AND pays.IdPays='.$_GET['Ind2'].'.IdPays AND '.$_GET['Ind1'].'.Valeur IS NOT NULL AND '.$_GET['Ind2'].'.Valeur IS NOT NULL AND '.$_GET['Ind1'].'.Annee='.$_GET['annee'].' AND '.$_GET['Ind2'].'.Annee='.$_GET['annee'].' )');
echo '<ul>';
while($ligne=$rep->fetch()){
	echo '<li>'.$ligne['NomPaysFR'].'</li>';
}
echo '</ul>';


}
}?>



	</body>
</html>