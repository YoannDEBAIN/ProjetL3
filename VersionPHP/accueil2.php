<!DOCTYPE html>
<html>

	<head>
		<title>TITRE</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../Style/Design.css" type="text/css" media="screen" />
		
	
	</head>
	<body id="BODY_FondUni">
		<div id="menu">
			<ul id="onglets">
				<li><a href="Explications.html"> Explications </a></li>
				<li><a href="Classement.html"> Classement </a></li>
				<li><a href="Correlation.html"> Correlation </a></li>
				<li class="active"><a href="Accueil.html"> Accueil </a></li>
				<li class="titre">TITRE</li>
			</ul>
		</div>
		
			<? $bdd = new PDO('mysql:host=localhost;dbname=projetl3;charset=utf8','root', 'root'); ?>
		
<div id="BarreDeRecherche2">
    <form action="../VersionPHP/accueil2.php" method="get" autocomplete="off">
	
			<p>
        <input class="Champs" name="Pays" type="text" placeholder="                            Veuillez saisir un pays..."/>
			</p>
			<p>

		<input class="bouton" type="submit" value=" "/>
			</p>

		<!--<button type="submit" class="bouton">Q</button>-->
    </form>
</div>
		
		<? 
		$rep = $bdd->query("SELECT pays.NomPaysFR, pays.UrlDrapeau
		FROM pays
		WHERE pays.NomPaysFR='".$_GET['Pays']."' ");
		while ($ligne = $rep->fetch()){ ?>
		
			<? echo "<h1 id='NomPays'>".$ligne['NomPaysFR']."<h1>"; ?>
			<? echo "<img id='Drapeau' src='".$ligne['UrlDrapeau']."' />"; ?>
		
		
		<?  } $rep->closeCursor();?>
		
<form action="accueil2.php" method="get" autocomplete="off">

		 <select name = "Année">
		 <p id="formulaire">
		
            <option value="2000" selected>2000</option>
            <option value="2001">2001</option>
			<option value="2002">2002</option>
			<option value="2003">2003</option>
			<option value="2004">2004</option>
			<option value="2005">2005</option>
			<option value="2006">2006</option>
			<option value="2007">2007</option>
			<option value="2008">2008</option>
			<option value="2009">2009</option>
			<option value="2010">2010</option> 
			<option value="2011">2011</option>
			<option value="2012">2012</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
		</p>
        </select>
		
		
		<input type="hidden" name="Pays" value="<? echo $_GET['Pays'] ?>"/>
		<p id="ok"> <input type="submit" value="ok!"> </p>    
		</form>
		
		<table id="Tableau" border="2">
		<tr>
		<th class="tailleTitre">Indice Bonheur</th>
		<th class="tailleTitre">Indice Démocratie</th>
		<th class="tailleTitre">Indice Paix</th>
		<th class="tailleTitre">Indice Corruption</th>
		<th class="tailleTitre">Indice Liberté Civile</th>
		<th class="tailleTitre">Indice Liberté Morale</th>
		<th class="tailleTitre">Indice Parité Gouvernementale</th>
		</tr>
		
		<? $rep=$bdd->query("SELECT indbonheur.Valeur AS indiceBonheur, inddemocratie.Valeur AS indiceDemocratie, 
		indpaixglobale.Valeur AS indicePaixGlobale, indcorruption.Valeur AS indiceCorruption, indlibercivile.Valeur 
		AS indiceLiberteCivile, indlibermorale.Valeur AS indiceLiberteMorale, indparite.Valeur AS indicePariteGouv 
FROM indbonheur, inddemocratie, indpaixglobale, indcorruption, indlibercivile, indlibermorale, indparite, pays 
WHERE indbonheur.Annee=".$_GET['Année']." AND inddemocratie.Annee=".$_GET['Année']." 
AND indpaixglobale.Annee=".$_GET['Année']." AND indcorruption.Annee=".$_GET['Année']." 
AND indlibercivile.Annee=".$_GET['Année']." AND indlibermorale.Annee=".$_GET['Année']." 
AND indparite.Annee=".$_GET['Année']." AND indbonheur.IdPays=pays.IdPays AND indparite.IdPays=pays.IdPays 
AND indpaixglobale.IdPays=pays.IdPays AND indlibermorale.IdPays=pays.IdPays AND indlibercivile.IdPays=pays.IdPays 
AND inddemocratie.IdPays=pays.IdPays AND indcorruption.IdPays=pays.IdPays AND indparite.IdPays=pays.IdPays AND pays.IdPays=1");
		
		$ligne = $rep->fetch();?>

		<tr>
			<td class="tailleTitre"><? echo $ligne['indiceBonheur']; ?></td>
			<td class="tailleTitre"><? echo $ligne['indiceDemocratie']; ?></td>
			<td class="tailleTitre"><? echo $ligne['indicePaixGlobale']; ?></td>
			<td class="tailleTitre"><? echo $ligne['indiceCorruption']; ?></td>
			<td class="tailleTitre"><? echo $ligne['indiceLiberteCivile']; ?></td>
			<td class="tailleTitre"><? echo $ligne['indiceLiberteMorale']; ?></td>
			<td class="tailleTitre"><? echo $ligne['indicePariteGouv']; ?></td>
			
		</tr>
		
		<? $rep->closeCursor();?>
		
		</table>

		
		

	</body>
</html>

