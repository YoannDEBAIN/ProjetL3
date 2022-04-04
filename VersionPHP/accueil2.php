<?php
session_start();
?>

<!DOCTYPE html>
<html>

	<head>
		<title>TITRE</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../Style/Design.css" type="text/css" media="screen" />
		<script type="text/javascript" src="accueil.js"> </script>
			<? require('ColFondTablInd.php');?>

	</head>
	<body id="BODY_FondUni">
		<div id="menu">
			<ul id="onglets">
				<li><a href="../PagesHTML/Explications.html"> Explications </a></li>
				<li><a href="Classement.php"> Classement </a></li>
				<li><a href="Correlation.php"> Correlation </a></li>
				<li class="active"><a href="../PagesHTML/Accueil.html"> Accueil </a></li>
				<li class="titre">Index World</li>
			</ul>
		</div>
		
			<? $bdd = new PDO('mysql:host=localhost;dbname=bdprojetl3;charset=utf8','root', 'root'); ?>
		
<div id="BarreDeRecherche2">
    <form action="../VersionPHP/accueil2.php" method="get" autocomplete="off">
	
			
        <input class="Champs" name="Pays" type="text" placeholder="                            Veuillez saisir un pays..."/>
			

		<input class="bouton" type="submit" value=" "/>


    </form>
</div>
		<? 
		$rep = $bdd->query("SELECT pays.NomPaysFR, pays.UrlDrapeau, pays.IdPays
		FROM pays
		WHERE pays.NomPaysFR='".$_GET['Pays']."' ");
		
		$ligne1=$rep->fetchAll();
		 echo "<h1 id='NomPays'>".$ligne1[0]['NomPaysFR']."</h1>"; 
		 echo "<div><img id='Drapeau' src='".$ligne1[0]['UrlDrapeau']."' /></div>"; ?>
		

		
		<!--<div id="aaa">-->
		<button class="button" onclick="cache('d1');"> <span> Cliquez-moi !</span></button>
		<div id="d1">

<form action="accueil2.php" method="get" autocomplete="off">
		 <select id="année" name = "Année">
		
    <option value="2000"  <? if($_GET['Année']==2000){echo 'selected';} ?>>2000</option>
            <option value="2001"  <? if($_GET['Année']==2001){echo 'selected';} ?>>2001</option>
			<option value="2002"  <? if($_GET['Année']==2002){echo 'selected';} ?>>2002</option>
			<option value="2003"  <? if($_GET['Année']==2003){echo 'selected';} ?>>2003</option>
			<option value="2004"  <? if($_GET['Année']==2004){echo 'selected';} ?>>2004</option>
			<option value="2005"  <? if($_GET['Année']==2005){echo 'selected';} ?>>2005</option>
			<option value="2006"  <? if($_GET['Année']==2006){echo 'selected';} ?>>2006</option>
			<option value="2007"  <? if($_GET['Année']==2007){echo 'selected';} ?>>2007</option>
			<option value="2008"  <? if($_GET['Année']==2008){echo 'selected';} ?>>2008</option>
			<option value="2009"  <? if($_GET['Année']==2009){echo 'selected';} ?>>2009</option>
			<option value="2010"  <? if($_GET['Année']==2010){echo 'selected';} ?>>2010</option> 
			<option value="2011"  <? if($_GET['Année']==2011){echo 'selected';} ?>>2011</option>
			<option value="2012"  <? if($_GET['Année']==2012){echo 'selected';} ?>>2012</option>
			<option value="2013"  <? if($_GET['Année']==2013){echo 'selected';} ?>>2013</option>
			<option value="2014"  <? if($_GET['Année']==2014){echo 'selected';} ?>>2014</option>
			<option value="2015"  <? if($_GET['Année']==2015){echo 'selected';} ?>>2015</option>
			<option value="2016"  <? if($_GET['Année']==2016){echo 'selected';} ?>>2016</option>
			<option value="2017"  <? if($_GET['Année']==2017){echo 'selected';} ?>>2017</option>
			<option value="2018"  <? if($_GET['Année']==2018){echo 'selected';} ?>>2018</option>
			<option value="2019"  <? if($_GET['Année']==2019){echo 'selected';} ?>>2019</option>
			<option value="2020"  <? if($_GET['Année']==2020){echo 'selected';} ?>>2020</option>
        </select>
		
		<input type="hidden" name="Pays" value="<? echo $_GET['Pays'] ?>"/>
		<input type="submit" value="ok!">   
		</form>

		
		</br>
		<table id="Tableau">
		<tr>
		<th>Indice du bonheur</th>
		<th>Indice de démocratie</th>
		<th>Indice de paix globale</th>
		<th>Indice de corruption</th>
		<th>Indice de liberté civile</th>
		<th>Indice de liberté morale</th>
		<th>Indice de parité gouvernementale</th>
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
			<td <? echo FondCase("indbonheur",$ligne['indiceBonheur']); ?>><? echo $ligne['indiceBonheur']; ?></td>
			<td <? echo FondCase("indicedemocratie",$ligne['indiceDemocratie']); ?>><? echo $ligne['indiceDemocratie']; ?></td>
			<td <? echo FondCase("indpaixglobale",$ligne['indicePaixGlobale']); ?>><? echo $ligne['indicePaixGlobale']; ?></td>
			<td <? echo FondCase("indcorruption",$ligne['indiceCorruption']); ?>><? echo $ligne['indiceCorruption']; ?></td>
			<td <? echo FondCase("indlibercivile",$ligne['indiceLiberteCivile']); ?>><? echo $ligne['indiceLiberteCivile']; ?></td>
			<td <? echo FondCase("indlibermorale",$ligne['indiceLiberteMorale']); ?>><? echo $ligne['indiceLiberteMorale']; ?></td>
			<td <? echo FondCase("indparite",$ligne['indicePariteGouv']); ?>><? echo $ligne['indicePariteGouv']; ?></td>
			
		</tr>
		
		<? $rep->closeCursor();} else {?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
		</tr> <? }?>
		</table>
		</div>
		<!--</div>-->

		

		
		</br>

		
		   <button class="button" onclick="cache('d2');"> <span> Cliquez-moi !</span></button>
		<div id="d2">

		
		<?$lienbonheur="graphiqueEvolution.php?Indice=indbonheur&IdenPays=";
	$lienbonheur.=$ligne1[0]['IdPays'];?>
		
	<img class="Graph" src="<? echo $lienbonheur; ?>"/> 
	<br />
	<a href="<? $lienbonheur ?>" 
   download="bonheur.png">Télécharger le graphique</a>
	<br />
	<br />
	<br />
		

		<?$lienDemocratie="graphiqueEvolution.php?Indice=indicedemocratie&IdenPays=";
	$lienDemocratie.=$ligne1[0]['IdPays'];?>
		
	<img class="Graph" src="<? echo $lienDemocratie; ?>"/> 
	<br />
	<a href="<? echo $lienDemocratie ?>" 
   download="democratie.png">Télécharger le graphique</a>
   <br />
	<br />
	<br />
   
	
		<?$lienPaix="graphiqueEvolution.php?Indice=indpaixglobale&IdenPays=";
	$lienPaix.=$ligne1[0]['IdPays'];?>
		
	<img class="Graph" src="<? echo $lienPaix; ?>"/>
	<br />
	<a href="<? $lienPaix; ?>" 
   download="PaixGlobale.png">Télécharger le graphique</a>
   <br />
	<br />
	<br />

		
		<?$lienCorruption="graphiqueEvolution.php?Indice=indcorruption&IdenPays=";
	$lienCorruption.=$ligne1[0]['IdPays'];?>
		
	<img class="Graph" src="<? echo $lienCorruption; ?>"/>
	<br />
	<a href="<? echo $lienCorruption ?>" 
   download="Corruption.png">Télécharger le graphique</a>
   <br />
	<br />
	<br />

		
		<?$lienLiberteCivile="graphiqueEvolution.php?Indice=indlibercivile&IdenPays=";
	$lienLiberteCivile.=$ligne1[0]['IdPays'];?>
		
	<img class="Graph" src="<? echo $lienLiberteCivile; ?>"/>
	<br />
	<a href="<? $lienLiberteCivile ?>" 
   download="LibertéCivile.png">Télécharger le graphique</a>
   <br />
	<br />
	<br />

		
		<?$lienLiberteMorale="graphiqueEvolution.php?Indice=indlibermorale&IdenPays=";
	$lienLiberteMorale.=$ligne1[0]['IdPays'];?>
		
	<img class="Graph" src="<? echo $lienLiberteMorale; ?>"/> 
	<br />
	<a href="<? $lienLiberteMorale ?>" 
   download="LibertéMorale.png">Télécharger le graphique</a>
   <br />
	<br />
	<br />
   

	
	<?$lienParite="graphiqueEvolution.php?Indice=indparite&IdenPays=";
	$lienParite.=$ligne1[0]['IdPays'];?>
		
	<img class="Graph" src="<? echo $lienParite; ?>"/>
	<br />
	<a href="<? echo $lienParite ?>" 
   download="ParitéGouv.png">Télécharger le graphique</a>
   <br />
	<br />
	<br />
   </div>

	<?
if(isset($_SESSION['accueil2'])){
	$_SESSION['accueil2']['NomPaysFR']=$_GET['Pays'];
	$_SESSION['accueil2']['Annee']=$_GET['Année'];
}
else {
	$_SESSION['accueil2']=array();
	$_SESSION['accueil2']['NomPaysFR']=$_GET['Pays'];
	$_SESSION['accueil2']['Annee']=$_GET['Année'];
}
?>
		
		

	</body>
</html>

