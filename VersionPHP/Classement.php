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
				<li  class="active"><a href="Classement.html"> Classement </a></li>
				<li><a href="Correlation.html"> Correlation </a></li>
				<li><a href="Accueil.html"> Accueil </a></li>
				<li class="titre">TITRE</li>
			</ul>
		</div>
		
		<br/>
		
		
		





<form action="Classement.php" method="get" autocomplete="off">
		<select name = "ClaInd1">
            <option value="inddemocratie" selected>Demo</option>
            <option value="indcorruption">corruption</option>
			<option value="indbonheur">bonheur</option>
			<option value="indparite">parite gouvernementale</option>
			<option value="indlibermorale">liberte morale</option>
			<option value="indlibercivile">liberte civile</option>
			<option value="indpaixglobale">paix globale</option>
        </select>
		<select name = "ClaInd2">
            <option value="inddemocratie">Demo</option>
            <option value="indcorruption" selected>corruption</option>
			<option value="indbonheur">bonheur</option>
			<option value="indparite">parite gouvernementale</option>
			<option value="indlibermorale">liberte morale</option>
			<option value="indlibercivile">liberte civile</option>
			<option value="indpaixglobale">paix globale</option>
        </select>
		<select name = "ClaInd3">
            <option value="inddemocratie">Demo</option>
            <option value="indcorruption">corruption</option>
			<option value="indbonheur" selected>bonheur</option>
			<option value="indparite">parite gouvernementale</option>
			<option value="indlibermorale">liberte morale</option>
			<option value="indlibercivile">liberte civile</option>
			<option value="indpaixglobale">paix globale</option>
        </select>
		<select name = "ClaInd4">
            <option value="inddemocratie">Demo</option>
            <option value="indcorruption">corruption</option>
			<option value="indbonheur">bonheur</option>
			<option value="indparite" selected>parite gouvernementale</option>
			<option value="indlibermorale">liberte morale</option>
			<option value="indlibercivile">liberte civile</option>
			<option value="indpaixglobale">paix globale</option>
        </select>
		<select name = "ClaInd5">
            <option value="inddemocratie">Demo</option>
            <option value="indcorruption">corruption</option>
			<option value="indbonheur">bonheur</option>
			<option value="indparite">parite gouvernementale</option>
			<option value="indlibermorale" selected>liberte morale</option>
			<option value="indlibercivile">liberte civile</option>
			<option value="indpaixglobale">paix globale</option>
        </select>
		<select name = "ClaInd6">
            <option value="inddemocratie">Demo</option>
            <option value="indcorruption">corruption</option>
			<option value="indbonheur">bonheur</option>
			<option value="indparite">parite gouvernementale</option>
			<option value="indlibermorale">liberte morale</option>
			<option value="indlibercivile" selected>liberte civile</option>
			<option value="indpaixglobale">paix globale</option>
        </select>
		<select name = "ClaInd7">
            <option value="inddemocratie">Demo</option>
            <option value="indcorruption">corruption</option>
			<option value="indbonheur">bonheur</option>
			<option value="indparite">parite gouvernementale</option>
			<option value="indlibermorale">liberte morale</option>
			<option value="indlibercivile">liberte civile</option>
			<option value="indpaixglobale" selected>paix globale</option>
        </select>
		<select name = "Ordre">
            <option value="ASC" selected>Croissant</option>
            <option value="DESC">Decroissant</option>
        </select>
		<input name="annee" type="number" value="2020" min="2000" max ="2020" step="1">
		<input type="submit" value="Envoyer">
		</form>
	
		
		<? echo "SELECT continent.NomContinentFR, avg(".$_GET['ClaInd1'].".Valeur) AS 'Indice1', avg(".$_GET['ClaInd2'].".Valeur) AS 'Indice2',  avg(".$_GET['ClaInd3'].".Valeur) AS 'Indice3',
		 avg(".$_GET['ClaInd4'].".Valeur) AS 'Indice4',  avg(".$_GET['ClaInd5'].".Valeur) AS 'Indice5',  avg(".$_GET['ClaInd6'].".Valeur) AS 'Indice6',  avg(".$_GET['ClaInd7'].".Valeur) AS 'Indice7' 
		FROM pays, inddemocratie, indcorruption, indbonheur, indparite, indlibermorale, indlibercivile, indpaixglobale, continent
		WHERE pays.IdContinent=continent.IdContinent AND pays.IdPays=inddemocratie.IdPays AND pays.IdPays=indcorruption.IdPays AND pays.IdPays=indbonheur.IdPays AND pays.IdPays=indparite.IdPays AND pays.IdPays=indlibermorale.IdPays AND pays.IdPays=indlibercivile.IdPays AND pays.IdPays=indpaixglobale.IdPays 
		AND inddemocratie.Annee=".$_GET['annee']." AND indcorruption.Annee=".$_GET['annee']." AND indbonheur.Annee=".$_GET['annee']." AND indparite.Annee=".$_GET['annee']." AND indlibermorale.Annee=".$_GET['annee']." AND indlibercivile.Annee=".$_GET['annee']." AND indpaixglobale.Annee=".$_GET['annee']." 
		GROUP BY pays.IdContinent 
		ORDER BY Indice1 ".$_GET['Ordre']." , Indice2 ".$_GET['Ordre']." , Indice3 ".$_GET['Ordre']." , Indice4 ".$_GET['Ordre']." , Indice5 ".$_GET['Ordre']." , Indice6 ".$_GET['Ordre']." , Indice7 ".$_GET['Ordre'];?>
		
		<? $bdd = new PDO('mysql:host=localhost;dbname=projetbd;charset=utf8','root', 'root'); ?>
		<table>
		<tr>
			<!--<th> Classement </th>-->
			<th>Nom pays</th>
			<th><? echo 'Indice '.$_GET['ClaInd1']; ?></th>
			<th><? echo 'Indice '.$_GET['ClaInd2'];  ?></th>
			<th><? echo 'Indice '.$_GET['ClaInd3']; ?></th>
			<th><? echo 'Indice '.$_GET['ClaInd4'];  ?></th>
			<th><? echo 'Indice '.$_GET['ClaInd5']; ?></th>
			<th><? echo 'Indice '.$_GET['ClaInd6'];  ?></th>
			<th><? echo 'Indice '.$_GET['ClaInd7'];  ?></th>
		</tr> 
		<? 
		$rep = $bdd->query("SELECT continent.NomContinentFR, avg(".$_GET['ClaInd1'].".Valeur) AS 'Indice1', avg(".$_GET['ClaInd2'].".Valeur) AS 'Indice2',  avg(".$_GET['ClaInd3'].".Valeur) AS 'Indice3',
		 avg(".$_GET['ClaInd4'].".Valeur) AS 'Indice4',  avg(".$_GET['ClaInd5'].".Valeur) AS 'Indice5',  avg(".$_GET['ClaInd6'].".Valeur) AS 'Indice6',  avg(".$_GET['ClaInd7'].".Valeur) AS 'Indice7' 
		FROM pays, inddemocratie, indcorruption, indbonheur, indparite, indlibermorale, indlibercivile, indpaixglobale, continent
		WHERE pays.IdContinent=continent.IdContinent AND pays.IdPays=inddemocratie.IdPays AND pays.IdPays=indcorruption.IdPays AND pays.IdPays=indbonheur.IdPays AND pays.IdPays=indparite.IdPays AND pays.IdPays=indlibermorale.IdPays AND pays.IdPays=indlibercivile.IdPays AND pays.IdPays=indpaixglobale.IdPays 
		AND inddemocratie.Annee=".$_GET['annee']." AND indcorruption.Annee=".$_GET['annee']." AND indbonheur.Annee=".$_GET['annee']." AND indparite.Annee=".$_GET['annee']." AND indlibermorale.Annee=".$_GET['annee']." AND indlibercivile.Annee=".$_GET['annee']." AND indpaixglobale.Annee=".$_GET['annee']." 
		GROUP BY pays.IdContinent 
		ORDER BY Indice1 ".$_GET['Ordre']." , Indice2 ".$_GET['Ordre']." , Indice3 ".$_GET['Ordre']." , Indice4 ".$_GET['Ordre']." , Indice5 ".$_GET['Ordre']." , Indice6 ".$_GET['Ordre']." , Indice7 ".$_GET['Ordre']);
		
		while ($ligne = $rep->fetch()){ ?>
		<tr>
			<td><? echo $ligne['NomContinentFR']; ?></td>
			<td><? echo $ligne['Indice1']; ?></td>
			<td><? echo $ligne['Indice2']; ?></td>
			<td><? echo $ligne['Indice3']; ?></td>
			<td><? echo $ligne['Indice4']; ?></td>
			<td><? echo $ligne['Indice5']; ?></td>
			<td><? echo $ligne['Indice6']; ?></td>
			<td><? echo $ligne['Indice7']; ?></td>
		</tr>
		
		<?  } $rep->closeCursor();?>
		</table>

















		<!-- FORMULAIRE PAR PAYS -->




			
		
		<form action="Classement.php" method="get" autocomplete="off">
		<select name = "ClaInd1">
            <option value="inddemocratie" selected>Demo</option>
            <option value="indcorruption">corruption</option>
			<option value="indbonheur">bonheur</option>
			<option value="indparite">parite gouvernementale</option>
			<option value="indlibermorale">liberte morale</option>
			<option value="indlibercivile">liberte civile</option>
			<option value="indpaixglobale">paix globale</option>
        </select>
		<select name = "ClaInd2">
            <option value="inddemocratie">Demo</option>
            <option value="indcorruption" selected>corruption</option>
			<option value="indbonheur">bonheur</option>
			<option value="indparite">parite gouvernementale</option>
			<option value="indlibermorale">liberte morale</option>
			<option value="indlibercivile">liberte civile</option>
			<option value="indpaixglobale">paix globale</option>
        </select>
		<select name = "ClaInd3">
            <option value="inddemocratie">Demo</option>
            <option value="indcorruption">corruption</option>
			<option value="indbonheur" selected>bonheur</option>
			<option value="indparite">parite gouvernementale</option>
			<option value="indlibermorale">liberte morale</option>
			<option value="indlibercivile">liberte civile</option>
			<option value="indpaixglobale">paix globale</option>
        </select>
		<select name = "ClaInd4">
            <option value="inddemocratie">Demo</option>
            <option value="indcorruption">corruption</option>
			<option value="indbonheur">bonheur</option>
			<option value="indparite" selected>parite gouvernementale</option>
			<option value="indlibermorale">liberte morale</option>
			<option value="indlibercivile">liberte civile</option>
			<option value="indpaixglobale">paix globale</option>
        </select>
		<select name = "ClaInd5">
            <option value="inddemocratie">Demo</option>
            <option value="indcorruption">corruption</option>
			<option value="indbonheur">bonheur</option>
			<option value="indparite">parite gouvernementale</option>
			<option value="indlibermorale" selected>liberte morale</option>
			<option value="indlibercivile">liberte civile</option>
			<option value="indpaixglobale">paix globale</option>
        </select>
		<select name = "ClaInd6">
            <option value="inddemocratie">Demo</option>
            <option value="indcorruption">corruption</option>
			<option value="indbonheur">bonheur</option>
			<option value="indparite">parite gouvernementale</option>
			<option value="indlibermorale">liberte morale</option>
			<option value="indlibercivile" selected>liberte civile</option>
			<option value="indpaixglobale">paix globale</option>
        </select>
		<select name = "ClaInd7">
            <option value="inddemocratie">Demo</option>
            <option value="indcorruption">corruption</option>
			<option value="indbonheur">bonheur</option>
			<option value="indparite">parite gouvernementale</option>
			<option value="indlibermorale">liberte morale</option>
			<option value="indlibercivile">liberte civile</option>
			<option value="indpaixglobale" selected>paix globale</option>
        </select>
		<select name = "Ordre">
            <option value="ASC" selected>Croissant</option>
            <option value="DESC">Decroissant</option>
        </select>
		<input name="annee" type="number" value="2020" min="2000" max ="2020" step="1">
		<input type="submit" value="Envoyer">
		</form>
	
		
		
		
		<? $bdd = new PDO('mysql:host=localhost;dbname=projetbd;charset=utf8','root', 'root'); ?>
		<table>
		<thead>
		<tr>
			<!--<th> Classement </th>-->
			<th>Nom pays</th>
			<th><? echo 'Indice '.$_GET['ClaInd1']; ?></th>
			<th><? echo 'Indice '.$_GET['ClaInd2'];  ?></th>
			<th><? echo 'Indice '.$_GET['ClaInd3']; ?></th>
			<th><? echo 'Indice '.$_GET['ClaInd4'];  ?></th>
			<th><? echo 'Indice '.$_GET['ClaInd5']; ?></th>
			<th><? echo 'Indice '.$_GET['ClaInd6'];  ?></th>
			<th><? echo 'Indice '.$_GET['ClaInd7'];  ?></th>
		</thead>
		</tr> 
		<tbody>
		<? 
		$rep = $bdd->query("SELECT pays.NomPaysFR, ".$_GET['ClaInd1'].".Valeur AS 'Indice1', ".$_GET['ClaInd2'].".Valeur AS 'Indice2',  ".$_GET['ClaInd3'].".Valeur AS 'Indice3',
		 ".$_GET['ClaInd4'].".Valeur AS 'Indice4',  ".$_GET['ClaInd5'].".Valeur AS 'Indice5',  ".$_GET['ClaInd6'].".Valeur AS 'Indice6',  ".$_GET['ClaInd7'].".Valeur AS 'Indice7' 
		FROM pays, inddemocratie, indcorruption, indbonheur, indparite, indlibermorale, indlibercivile, indpaixglobale
		WHERE pays.IdPays=inddemocratie.IdPays AND pays.IdPays=indcorruption.IdPays AND pays.IdPays=indbonheur.IdPays AND pays.IdPays=indparite.IdPays AND pays.IdPays=indlibermorale.IdPays AND pays.IdPays=indlibercivile.IdPays AND pays.IdPays=indpaixglobale.IdPays 
		AND inddemocratie.Annee=".$_GET['annee']." AND indcorruption.Annee=".$_GET['annee']." AND indbonheur.Annee=".$_GET['annee']." AND indparite.Annee=".$_GET['annee']." AND indlibermorale.Annee=".$_GET['annee']." AND indlibercivile.Annee=".$_GET['annee']." AND indpaixglobale.Annee=".$_GET['annee']." 
		ORDER BY Indice1 ".$_GET['Ordre']." , Indice2 ".$_GET['Ordre']." , Indice3 ".$_GET['Ordre']." , Indice4 ".$_GET['Ordre']." , Indice5 ".$_GET['Ordre']." , Indice6 ".$_GET['Ordre']." , Indice7 ".$_GET['Ordre']);
		
		while ($ligne = $rep->fetch()){ ?>
		<tr>
			<td><? echo $ligne['NomPaysFR']; ?></td>
			<td><? echo $ligne['Indice1']; ?></td>
			<td><? echo $ligne['Indice2']; ?></td>
			<td><? echo $ligne['Indice3']; ?></td>
			<td><? echo $ligne['Indice4']; ?></td>
			<td><? echo $ligne['Indice5']; ?></td>
			<td><? echo $ligne['Indice6']; ?></td>
			<td><? echo $ligne['Indice7']; ?></td>
		</tr>
		
		<?  } $rep->closeCursor();?>
		 </tbody>
		</table>
		
		
		
		
		
		
		





		
		
		
		
		
		
		
		
		
		
		
	</body>
</html>