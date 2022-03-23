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
				<li><a href="Explications.html"> Explications </a></li>
				<li><a href="Classement.html"> Classement </a></li>
				<li  class="active"><a href="Correlation.html"> Correlation </a></li>
				<li><a href="Accueil.html"> Accueil </a></li>
				<li class="titre">TITRE</li>
			</ul>
		</div>
		
		<? $bdd = new PDO('mysql:host=localhost;dbname=projetl3_new;charset=utf8','root', 'root'); ?>


		
<div id="rectangle">
<div class="centre">
<form action="Correlation.php" method="get" autocomplete="off">
 Un pays plus : 
    <span class="custom-dropdown custom-dropdown--white">
        <select class="custom-dropdown__select custom-dropdown__select--white" name = "Ind1">
            <option value="inddemocratie" <? if ($_GET['ClaInd1']=="inddemocratie"){echo 'selected';}?>>Democratie</option>
            <option value="indcorruption" <? if ($_GET['ClaInd1']=="indcorruption"){echo 'selected';}?>>corruption</option>
			<option value="indbonheur" <? if ($_GET['ClaInd1']=="indbonheur"){echo 'selected';}?>>bonheur</option>
			<option value="indparite" <? if ($_GET['ClaInd1']=="indparite"){echo 'selected';}?>>parite gouvernementale</option>
			<option value="indlibermorale" <? if ($_GET['ClaInd1']=="indlibermorale"){echo 'selected';}?>>liberte morale</option>
			<option value="indlibercivile" <? if ($_GET['ClaInd1']=="indlibercivile"){echo 'selected';}?>>liberte civile</option>
			<option value="indpaixglobale" <? if ($_GET['ClaInd1']=="indpaixglobale"){echo 'selected';}?>>paix globale</option>
        </select>
		</span>
	est-il un pays plus : 
	<span class="custom-dropdown custom-dropdown--white">
        <select class="custom-dropdown__select custom-dropdown__select--white" name = "Ind2">
            <option value="inddemocratie" <? if ($_GET['ClaInd2']=="inddemocratie"){echo 'selected';}?>>Democratie</option>
            <option value="indcorruption" <? if ($_GET['ClaInd2']=="indcorruption"){echo 'selected';}?>>corruption</option>
			<option value="indbonheur" <? if ($_GET['ClaInd2']=="indbonheur"){echo 'selected';}?>>bonheur</option>
			<option value="indparite" <? if ($_GET['ClaInd2']=="indparite"){echo 'selected';}?>>parite gouvernementale</option>
			<option value="indlibermorale" <? if ($_GET['ClaInd2']=="indlibermorale"){echo 'selected';}?>>liberte morale</option>
			<option value="indlibercivile" <? if ($_GET['ClaInd2']=="indlibercivile"){echo 'selected';}?>>liberte civile</option>
			<option value="indpaixglobale" <? if ($_GET['ClaInd2']=="indpaixglobale"){echo 'selected';}?>>paix globale</option>
        </select>
</span>
<input name="annee" type="number" value="<? echo $_GET['annee'];?>" min="2000" max ="2020" step="1">
		<input type="submit" value="Envoyer">
		</form>
	<button class="styled" type="button">
    ?
	</button>
</div>
</div>

<? 
echo "SELECT(avg(".$_GET['Ind1'].".Valeur*".$_GET['Ind2'].".Valeur)-(AVG(".$_GET['Ind1'].".Valeur)*avg(".$_GET['Ind2'].".Valeur)))/(STDDEV_SAMP(".$_GET['Ind1'].".Valeur)*STDDEV_SAMP(".$_GET['Ind2'].".Valeur))
FROM ".$_GET['Ind1'].", ".$_GET['Ind2']."
WHERE ".$_GET['Ind1'].".IdPays=".$_GET['Ind2'].".IdPays AND ".$_GET['Ind1'].".Valeur IS NOT NULL AND ".$_GET['Ind2'].".Valeur IS NOT NULL AND ".$_GET['Ind1'].".Annee=".$_GET['annee']." AND ".$_GET['Ind2'].".Annee=".$_GET['annee'];
		
		
		$rep = $bdd->query("SELECT(avg(".$_GET['Ind1'].".Valeur*".$_GET['Ind2'].".Valeur)-(AVG(".$_GET['Ind1'].".Valeur)*avg(".$_GET['Ind2'].".Valeur)))/(STDDEV_SAMP(".$_GET['Ind1'].".Valeur)*STDDEV_SAMP(".$_GET['Ind2'].".Valeur)) AS 'r'
FROM ".$_GET['Ind1'].", ".$_GET['Ind2']."
WHERE ".$_GET['Ind1'].".IdPays=".$_GET['Ind2'].".IdPays AND ".$_GET['Ind1'].".Valeur IS NOT NULL AND ".$_GET['Ind2'].".Valeur IS NOT NULL AND ".$_GET['Ind1'].".Annee=".$_GET['annee']." AND ".$_GET['Ind2'].".Annee=".$_GET['annee']);

$res=$rep->fetchAll();

echo $res[0]['r']; //affiche corrélation


?>

	
		




	</body>
</html>