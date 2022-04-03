<!DOCTYPE html>
<html>

	<head>
		<title>TITRE</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../Style/Design.css" type="text/css" media="screen" />
		<script type="text/javascript" src="accueil.js"> </script>
	
	</head>
	<body id="BODY_FondUni">
		<div id="menu">
			<ul id="onglets">
				<li><a href="../PagesHTML/Explications.html"> Explications </a></li>
				<li><a href="Classement.php"> Classement </a></li>
				<li><a href="Correlation.php"> Correlation </a></li>
				<li class="active"><a href="PagesHTML/Accueil.html"> Accueil </a></li>
				<li class="titre">TITRE</li>
			</ul>
		</div>
		
			<? $bdd = new PDO('mysql:host=localhost;dbname=bdprojetl3;charset=utf8','root', 'root'); ?>
		
<div id="BarreDeRecherche2">
    <form action="../VersionPHP/accueil2.php" method="get" autocomplete="off">
	
			
        <input class="Champs" name="Pays" type="text" placeholder="                            Veuillez saisir un pays..."/>
			

		<input class="bouton" type="submit" value=" "/>


		<!--<button type="submit" class="bouton">Q</button>-->
    </form>
</div>
		<div>
		<? 
		$rep = $bdd->query("SELECT pays.NomPaysFR, pays.UrlDrapeau, pays.IdPays
		FROM pays
		WHERE pays.NomPaysFR='".$_GET['Pays']."' ");
		
		$ligne1=$rep->fetchAll();
		 echo "<h1 id='NomPays'>".$ligne1[0]['NomPaysFR']."<h1>"; 
		 echo "<img id='Drapeau' src='".$ligne1[0]['UrlDrapeau']."' />"; 
		
		/*while ($ligne = $rep->fetch()){ ?>
		
			<? echo "<h1 id='NomPays'>".$ligne['NomPaysFR']."<h1>"; ?>
			<? echo "<img id='Drapeau' src='".$ligne['UrlDrapeau']."' />"; ?>
		
		
		<?  } $rep->closeCursor(); */?>
		</div>
		

		
		<div id="aaa">
		<button class="button" onclick="cache('d1');"> <span> Cliquez-moi !</span></button>
		<div id="d1">
		<div id="formulaireTableau">

<form action="accueil2.php" method="get" autocomplete="off">
		 <select name = "Année">
		
            <option value="2000">2000</option>
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
        </select>
		
		<input type="hidden" name="Pays" value="<? echo $_GET['Pays'] ?>"/>
		<input type="submit" value="ok!">   
		</form>
		
		</div>
		
		</br>
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
		
		<? if($_GET['Année']!=""){ 
		
		$rep=$bdd->query("SELECT indbonheur.Valeur AS indiceBonheur, indicedemocratie.Valeur AS indiceDemocratie, 
		indpaixglobale.Valeur AS indicePaixGlobale, indcorruption.Valeur AS indiceCorruption, indlibercivile.Valeur 
		AS indiceLiberteCivile, indlibermorale.Valeur AS indiceLiberteMorale, indparite.Valeur AS indicePariteGouv 
FROM indbonheur, indicedemocratie, indpaixglobale, indcorruption, indlibercivile, indlibermorale, indparite, pays 
WHERE indbonheur.Annee=".$_GET['Année']." AND indicedemocratie.Annee=".$_GET['Année']." 
AND indpaixglobale.Annee=".$_GET['Année']." AND indcorruption.Annee=".$_GET['Année']." 
AND indlibercivile.Annee=".$_GET['Année']." AND indlibermorale.Annee=".$_GET['Année']." 
AND indparite.Annee=".$_GET['Année']." AND indbonheur.IdPays=pays.IdPays AND indparite.IdPays=pays.IdPays 
AND indpaixglobale.IdPays=pays.IdPays AND indlibermorale.IdPays=pays.IdPays AND indlibercivile.IdPays=pays.IdPays 
AND indicedemocratie.IdPays=pays.IdPays AND indcorruption.IdPays=pays.IdPays AND indparite.IdPays=pays.IdPays AND pays.NomPaysFR='".$_GET['Pays']."'");
		
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
		
		<? $rep->closeCursor();} else {?>
		<tr>
			<td class="tailleTitre"></td>
			<td class="tailleTitre"></td>
			<td class="tailleTitre"></td>
			<td class="tailleTitre"></td>
			<td class="tailleTitre"></td>
			<td class="tailleTitre"></td>
			<td class="tailleTitre"></td>
			
		</tr> <? }?>
		</table>
		</div>
		</div>

		

		
		</br>
		
		<!--<form action="accueil2.php" method="get" autocomplete="off">
		<p> Zoom
		<input name = "zoom" type = "number" value ="<? if ($_GET['zoom']==""){echo '1';} else{echo $_GET['zoom'];}?>" min="0" max ="2" step="0.1">
		</p>
		<input type="submit" value="ok!">   

  
		</form> -->
		
		   <button class="button" onclick="cache('d2');"> <span> Cliquez-moi !</span></button>
		<div id="d2">

		
		<?$lienbonheur="graphiqueEvolution.php?Indice=indbonheur&IdenPays=";
	$lienbonheur.=$ligne1[0]['IdPays'];?>
		
	<p>	<img class="Graph" src="<? echo $lienbonheur; ?>"/> </p>
	<a href="<? $lienbonheur ?>" 
   download="bonheur.png">Télécharger le graphique</a>
		
		

		<?$lienDemocratie="graphiqueEvolution.php?Indice=indicedemocratie&IdenPays=";
	$lienDemocratie.=$ligne1[0]['IdPays'];?>
		
	<p>	<img class="Graph" src="<? echo $lienDemocratie; ?>"/> </p>
	<a href="<? echo $lienDemocratie ?>" 
   download="democratie.png">Télécharger le graphique</a>
   
   
	
		<?$lienPaix="graphiqueEvolution.php?Indice=indpaixglobale&IdenPays=";
	$lienPaix.=$ligne1[0]['IdPays'];?>
		
	<p>	<img class="Graph" src="<? echo $lienPaix; ?>"/> </p>
	
	<a href="<? $lienPaix; ?>" 
   download="PaixGlobale.png">Télécharger le graphique</a>
   

		
		<?$lienCorruption="graphiqueEvolution.php?Indice=indcorruption&IdenPays=";
	$lienCorruption.=$ligne1[0]['IdPays'];?>
		
	<p>	<img class="Graph" src="<? echo $lienCorruption; ?>"/> </p>
	<a href="<? echo $lienCorruption ?>" 
   download="Corruption.png">Télécharger le graphique</a>
   

		
		<?$lienLiberteCivile="graphiqueEvolution.php?Indice=indlibercivile&IdenPays=";
	$lienLiberteCivile.=$ligne1[0]['IdPays'];?>
		
	<p>	<img class="Graph" src="<? echo $lienLiberteCivile; ?>"/> </p>
	<a href="<? $lienLiberteCivile ?>" 
   download="LibertéCivile.png">Télécharger le graphique</a>
   

		
		<?$lienLiberteMorale="graphiqueEvolution.php?Indice=indlibermorale&IdenPays=";
	$lienLiberteMorale.=$ligne1[0]['IdPays'];?>
		
	<p>	<img class="Graph" src="<? echo $lienLiberteMorale; ?>"/> </p>
	<a href="<? $lienLiberteMorale ?>" 
   download="LibertéMorale.png">Télécharger le graphique</a>
   
   

	
	<?$lienParite="graphiqueEvolution.php?Indice=indparite&IdenPays=";
	$lienParite.=$ligne1[0]['IdPays'];?>
		
	<p>	<img class="Graph" src="<? echo $lienParite; ?>"/> </p>
	<a href="<? echo $lienParite ?>" 
   download="ParitéGouv.png">Télécharger le graphique</a>
   
   </div>

		
		
		

	</body>
</html>

