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
				<li><a href="../PagesHTML/Explications.html"> Explications </a></li>
				<li  class="active"><a href="Classement.php"> Classement </a></li>
				<li><a href="../PagesHTML/Correlation.html"> Correlation </a></li>
				<li><a href="../PagesHTML/Accueil.html"> Accueil </a></li>
				<li class="titre">TITRE</li>
			</ul>
		</div>
		
		<br/>
		
		
		<form action="Classement.php" method="get" autocomplete="off">
		<select name = "ClaInd1">
            <option value="inddemocratie" <? if ($_GET['ClaInd1']=="inddemocratie"){echo 'selected';}?>>Democratie</option>
            <option value="indcorruption" <? if ($_GET['ClaInd1']=="indcorruption"){echo 'selected';}?>>corruption</option>
			<option value="indbonheur" <? if ($_GET['ClaInd1']=="indbonheur"){echo 'selected';}?>>bonheur</option>
			<option value="indparite" <? if ($_GET['ClaInd1']=="indparite"){echo 'selected';}?>>parite gouvernementale</option>
			<option value="indlibermorale" <? if ($_GET['ClaInd1']=="indlibermorale"){echo 'selected';}?>>liberte morale</option>
			<option value="indlibercivile" <? if ($_GET['ClaInd1']=="indlibercivile"){echo 'selected';}?>>liberte civile</option>
			<option value="indpaixglobale" <? if ($_GET['ClaInd1']=="indpaixglobale"){echo 'selected';}?>>paix globale</option>
        </select>
		<select name = "ClaInd2">
            <option value="inddemocratie" <? if ($_GET['ClaInd2']=="inddemocratie"){echo 'selected';}?>>Democratie</option>
            <option value="indcorruption" <? if ($_GET['ClaInd2']=="indcorruption"){echo 'selected';}?>>corruption</option>
			<option value="indbonheur" <? if ($_GET['ClaInd2']=="indbonheur"){echo 'selected';}?>>bonheur</option>
			<option value="indparite" <? if ($_GET['ClaInd2']=="indparite"){echo 'selected';}?>>parite gouvernementale</option>
			<option value="indlibermorale" <? if ($_GET['ClaInd2']=="indlibermorale"){echo 'selected';}?>>liberte morale</option>
			<option value="indlibercivile" <? if ($_GET['ClaInd2']=="indlibercivile"){echo 'selected';}?>>liberte civile</option>
			<option value="indpaixglobale" <? if ($_GET['ClaInd2']=="indpaixglobale"){echo 'selected';}?>>paix globale</option>
        </select>
		<select name = "ClaInd3">
            <option value="inddemocratie" <? if ($_GET['ClaInd3']=="inddemocratie"){echo 'selected';}?>>Democratie</option>
            <option value="indcorruption" <? if ($_GET['ClaInd3']=="indcorruption"){echo 'selected';}?>>corruption</option>
			<option value="indbonheur" <? if ($_GET['ClaInd3']=="indbonheur"){echo 'selected';}?>>bonheur</option>
			<option value="indparite" <? if ($_GET['ClaInd3']=="indparite"){echo 'selected';}?>>parite gouvernementale</option>
			<option value="indlibermorale" <? if ($_GET['ClaInd3']=="indlibermorale"){echo 'selected';}?>>liberte morale</option>
			<option value="indlibercivile" <? if ($_GET['ClaInd3']=="indlibercivile"){echo 'selected';}?>>liberte civile</option>
			<option value="indpaixglobale" <? if ($_GET['ClaInd3']=="indpaixglobale"){echo 'selected';}?>>paix globale</option>
        </select>
		<select name = "ClaInd4">
            <option value="inddemocratie" <? if ($_GET['ClaInd4']=="inddemocratie"){echo 'selected';}?>>Democratie</option>
            <option value="indcorruption" <? if ($_GET['ClaInd4']=="indcorruption"){echo 'selected';}?>>corruption</option>
			<option value="indbonheur" <? if ($_GET['ClaInd4']=="indbonheur"){echo 'selected';}?>>bonheur</option>
			<option value="indparite" <? if ($_GET['ClaInd4']=="indparite"){echo 'selected';}?>>parite gouvernementale</option>
			<option value="indlibermorale" <? if ($_GET['ClaInd4']=="indlibermorale"){echo 'selected';}?>>liberte morale</option>
			<option value="indlibercivile" <? if ($_GET['ClaInd4']=="indlibercivile"){echo 'selected';}?>>liberte civile</option>
			<option value="indpaixglobale" <? if ($_GET['ClaInd4']=="indpaixglobale"){echo 'selected';}?>>paix globale</option>
        </select>
		<select name = "ClaInd5">
            <option value="inddemocratie" <? if ($_GET['ClaInd5']=="inddemocratie"){echo 'selected';}?>>Democratie</option>
            <option value="indcorruption" <? if ($_GET['ClaInd5']=="indcorruption"){echo 'selected';}?>>corruption</option>
			<option value="indbonheur" <? if ($_GET['ClaInd5']=="indbonheur"){echo 'selected';}?>>bonheur</option>
			<option value="indparite" <? if ($_GET['ClaInd5']=="indparite"){echo 'selected';}?>>parite gouvernementale</option>
			<option value="indlibermorale" <? if ($_GET['ClaInd5']=="indlibermorale"){echo 'selected';}?>>liberte morale</option>
			<option value="indlibercivile" <? if ($_GET['ClaInd5']=="indlibercivile"){echo 'selected';}?>>liberte civile</option>
			<option value="indpaixglobale" <? if ($_GET['ClaInd5']=="indpaixglobale"){echo 'selected';}?>>paix globale</option>
        </select>
		<select name = "ClaInd6">
            <option value="inddemocratie" <? if ($_GET['ClaInd6']=="inddemocratie"){echo 'selected';}?>>Democratie</option>
            <option value="indcorruption" <? if ($_GET['ClaInd6']=="indcorruption"){echo 'selected';}?>>corruption</option>
			<option value="indbonheur" <? if ($_GET['ClaInd6']=="indbonheur"){echo 'selected';}?>>bonheur</option>
			<option value="indparite" <? if ($_GET['ClaInd6']=="indparite"){echo 'selected';}?>>parite gouvernementale</option>
			<option value="indlibermorale" <? if ($_GET['ClaInd6']=="indlibermorale"){echo 'selected';}?>>liberte morale</option>
			<option value="indlibercivile" <? if ($_GET['ClaInd6']=="indlibercivile"){echo 'selected';}?>>liberte civile</option>
			<option value="indpaixglobale" <? if ($_GET['ClaInd6']=="indpaixglobale"){echo 'selected';}?>>paix globale</option>
        </select>
		<select name = "ClaInd7">
            <option value="inddemocratie" <? if ($_GET['ClaInd7']=="inddemocratie"){echo 'selected';}?>>Democratie</option>
            <option value="indcorruption" <? if ($_GET['ClaInd7']=="indcorruption"){echo 'selected';}?>>corruption</option>
			<option value="indbonheur" <? if ($_GET['ClaInd7']=="indbonheur"){echo 'selected';}?>>bonheur</option>
			<option value="indparite" <? if ($_GET['ClaInd7']=="indparite"){echo 'selected';}?>>parite gouvernementale</option>
			<option value="indlibermorale" <? if ($_GET['ClaInd7']=="indlibermorale"){echo 'selected';}?>>liberte morale</option>
			<option value="indlibercivile" <? if ($_GET['ClaInd7']=="indlibercivile"){echo 'selected';}?>>liberte civile</option>
			<option value="indpaixglobale" <? if ($_GET['ClaInd7']=="indpaixglobale"){echo 'selected';}?>>paix globale</option>
        </select>
		<select name = "Ordre">
            <option value="ASC" <? if ($_GET['Ordre']=="ASC"){echo 'selected';}?>>Croissant</option>
            <option value="DESC" <? if ($_GET['Ordre']=="DESC"){echo 'selected';}?>>Decroissant</option>
        </select>
		<input name="annee" type="number" value="<? echo $_GET['annee'];?>" min="2000" max ="2020" step="1">
		<input type="submit" value="Envoyer">
		</form>
	
	
	
	 
		
		<? if ( $_GET['annee']!="") {$bdd = new PDO('mysql:host=localhost;dbname=projetbd;charset=utf8','root', 'root'); ?>
		<table>
		<thead>
		<tr>
			<!--<th> Classement </th>-->
			<th>Nom pays</th>
			<th><? if ($_GET['ClaInd1']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd1']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd1']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd1']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd1']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd1']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd1']=="indpaixglobale"){echo 'Indice de paix';} ?></th>
			<th><? if ($_GET['ClaInd2']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd2']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd2']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd2']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd2']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd2']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd2']=="indpaixglobale"){echo 'Indice de paix';}  ?></th>
			<th><? if ($_GET['ClaInd3']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd3']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd3']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd3']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd3']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd3']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd3']=="indpaixglobale"){echo 'Indice de paix';}   ?></th>
			<th><? if ($_GET['ClaInd4']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd4']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd4']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd4']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd4']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd4']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd4']=="indpaixglobale"){echo 'Indice de paix';}   ?></th>
			<th><? if ($_GET['ClaInd5']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd5']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd5']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd5']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd5']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd5']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd5']=="indpaixglobale"){echo 'Indice de paix';}   ?></th>
			<th><? if ($_GET['ClaInd6']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd6']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd6']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd6']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd6']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd6']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd6']=="indpaixglobale"){echo 'Indice de paix';}   ?></th>
			<th><? if ($_GET['ClaInd7']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd7']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd7']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd7']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd7']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd7']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd7']=="indpaixglobale"){echo 'Indice de paix';}    ?></th>
		</tr> 
		</thead>
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
	
		<br />
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<table>
		<thead>
		<tr>
			<!--<th> Classement </th>-->
			<th>Nom Continent</th>
			<th><? if ($_GET['ClaInd1']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd1']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd1']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd1']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd1']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd1']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd1']=="indpaixglobale"){echo 'Indice de paix';} ?></th>
			<th><? if ($_GET['ClaInd2']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd2']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd2']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd2']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd2']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd2']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd2']=="indpaixglobale"){echo 'Indice de paix';}  ?></th>
			<th><? if ($_GET['ClaInd3']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd3']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd3']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd3']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd3']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd3']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd3']=="indpaixglobale"){echo 'Indice de paix';}   ?></th>
			<th><? if ($_GET['ClaInd4']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd4']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd4']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd4']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd4']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd4']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd4']=="indpaixglobale"){echo 'Indice de paix';}   ?></th>
			<th><? if ($_GET['ClaInd5']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd5']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd5']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd5']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd5']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd5']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd5']=="indpaixglobale"){echo 'Indice de paix';}   ?></th>
			<th><? if ($_GET['ClaInd6']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd6']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd6']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd6']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd6']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd6']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd6']=="indpaixglobale"){echo 'Indice de paix';}   ?></th>
			<th><? if ($_GET['ClaInd7']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd7']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd7']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd7']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd7']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd7']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd7']=="indpaixglobale"){echo 'Indice de paix';}    ?></th>
			<th>Nombre de pays</th>
			
		</tr> 
		</thead>
		<tbody>
		<? 
		$rep = $bdd->query("SELECT continent.NomContinentFR, avg(".$_GET['ClaInd1'].".Valeur) AS 'Indice1', avg(".$_GET['ClaInd2'].".Valeur) AS 'Indice2',  avg(".$_GET['ClaInd3'].".Valeur) AS 'Indice3',
		 avg(".$_GET['ClaInd4'].".Valeur) AS 'Indice4',  avg(".$_GET['ClaInd5'].".Valeur) AS 'Indice5',  avg(".$_GET['ClaInd6'].".Valeur) AS 'Indice6',  avg(".$_GET['ClaInd7'].".Valeur) AS 'Indice7', count(pays.IdPays) AS 'NbrPays'
		FROM pays, inddemocratie, indcorruption, indbonheur, indparite, indlibermorale, indlibercivile, indpaixglobale, continent
		WHERE pays.IdContinent=continent.IdContinent AND pays.IdPays=inddemocratie.IdPays AND pays.IdPays=indcorruption.IdPays AND pays.IdPays=indbonheur.IdPays AND pays.IdPays=indparite.IdPays AND pays.IdPays=indlibermorale.IdPays AND pays.IdPays=indlibercivile.IdPays AND pays.IdPays=indpaixglobale.IdPays 
		AND inddemocratie.Annee=".$_GET['annee']." AND indcorruption.Annee=".$_GET['annee']." AND indbonheur.Annee=".$_GET['annee']." AND indparite.Annee=".$_GET['annee']." AND indlibermorale.Annee=".$_GET['annee']." AND indlibercivile.Annee=".$_GET['annee']." AND indpaixglobale.Annee=".$_GET['annee']." 
		GROUP BY continent.IdContinent 
		ORDER BY Indice1 ".$_GET['Ordre']." , Indice2 ".$_GET['Ordre']." , Indice3 ".$_GET['Ordre']." , Indice4 ".$_GET['Ordre']." , Indice5 ".$_GET['Ordre']." , Indice6 ".$_GET['Ordre']." , Indice7 ".$_GET['Ordre']);
		$tab = $rep->fetchAll();
		
		for ($i=0; $i<count($tab); $i++){ ?>
		<tr>
			<td><? echo $tab[$i]['NomContinentFR']; ?></td>
			<td><? echo $tab[$i]['Indice1']; ?></td>
			<td><? echo $tab[$i]['Indice2']; ?></td>
			<td><? echo $tab[$i]['Indice3']; ?></td>
			<td><? echo $tab[$i]['Indice4']; ?></td>
			<td><? echo $tab[$i]['Indice5']; ?></td>
			<td><? echo $tab[$i]['Indice6']; ?></td>
			<td><? echo $tab[$i]['Indice7']; ?></td>
			<td>
			
			<? $temp='Classement.php?ClaInd1='.$_GET['ClaInd1'].'&ClaInd2='.$_GET['ClaInd2'].'&ClaInd3='.$_GET['ClaInd3'].'&ClaInd4='.$_GET['ClaInd4'].'&ClaInd5='.$_GET['ClaInd5'].'&
			ClaInd6='.$_GET['ClaInd6'].'&ClaInd7='.$_GET['ClaInd7'].'&Ordre='.$_GET['Ordre'].'&annee='.$_GET['annee'];
			for ($j=0; $j<count($tab); $j++){
				if ($i==$j){
					if($_GET['Cont'.$i]!="ok"){
						
					$temp=$temp.'&Cont'.$j.'=ok';
					}else{
						$temp=$temp.'&Cont'.$j.'=';
						
					}
				}
				else{
					
				$temp=$temp.'&Cont'.$j.'='.$_GET['Cont'.$j];
				}
			}?>
			
			<a href="<? echo $temp;?>"><? echo $tab[$i]['NbrPays']; ?></a></td>
		</tr>
		
		
		<? 
		if($_GET['Cont'.$i]=="ok"){
		$rep2 = $bdd->query("SELECT pays.NomPaysFR, ".$_GET['ClaInd1'].".Valeur AS 'Indice1', ".$_GET['ClaInd2'].".Valeur AS 'Indice2',  ".$_GET['ClaInd3'].".Valeur AS 'Indice3',
		 ".$_GET['ClaInd4'].".Valeur AS 'Indice4',  ".$_GET['ClaInd5'].".Valeur AS 'Indice5',  ".$_GET['ClaInd6'].".Valeur AS 'Indice6',  ".$_GET['ClaInd7'].".Valeur AS 'Indice7' 
		FROM pays, inddemocratie, indcorruption, indbonheur, indparite, indlibermorale, indlibercivile, indpaixglobale, continent
		WHERE  continent.NomContinentFR='".$tab[$i]['NomContinentFR']."' AND pays.IdContinent=continent.IdContinent AND pays.IdPays=inddemocratie.IdPays AND pays.IdPays=indcorruption.IdPays AND pays.IdPays=indbonheur.IdPays AND pays.IdPays=indparite.IdPays AND pays.IdPays=indlibermorale.IdPays AND pays.IdPays=indlibercivile.IdPays AND pays.IdPays=indpaixglobale.IdPays 
		AND inddemocratie.Annee=".$_GET['annee']." AND indcorruption.Annee=".$_GET['annee']." AND indbonheur.Annee=".$_GET['annee']." AND indparite.Annee=".$_GET['annee']." AND indlibermorale.Annee=".$_GET['annee']." AND indlibercivile.Annee=".$_GET['annee']." AND indpaixglobale.Annee=".$_GET['annee']." 
		ORDER BY Indice1 ".$_GET['Ordre']." , Indice2 ".$_GET['Ordre']." , Indice3 ".$_GET['Ordre']." , Indice4 ".$_GET['Ordre']." , Indice5 ".$_GET['Ordre']." , Indice6 ".$_GET['Ordre']." , Indice7 ".$_GET['Ordre']);
		
		while ($ligne2 = $rep2->fetch()){ ?>
		<tr>
			<td><? echo $ligne2['NomPaysFR']; ?></td>
			<td><? echo $ligne2['Indice1']; ?></td>
			<td><? echo $ligne2['Indice2']; ?></td>
			<td><? echo $ligne2['Indice3']; ?></td>
			<td><? echo $ligne2['Indice4']; ?></td>
			<td><? echo $ligne2['Indice5']; ?></td>
			<td><? echo $ligne2['Indice6']; ?></td>
			<td><? echo $ligne2['Indice7']; ?></td>
		</tr>
		
		<?  } $rep2->closeCursor();}?>
		
		
		<?  } $rep->closeCursor();?>
		</tbody>
		</table>




	
















		<table>
		<tr>
			<th>Nom Continent</th>
			<th><? if ($_GET['ClaInd1']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd1']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd1']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd1']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd1']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd1']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd1']=="indpaixglobale"){echo 'Indice de paix';} ?></th>
			<th><? if ($_GET['ClaInd2']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd2']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd2']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd2']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd2']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd2']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd2']=="indpaixglobale"){echo 'Indice de paix';}  ?></th>
			<th><? if ($_GET['ClaInd3']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd3']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd3']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd3']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd3']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd3']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd3']=="indpaixglobale"){echo 'Indice de paix';}   ?></th>
			<th><? if ($_GET['ClaInd4']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd4']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd4']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd4']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd4']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd4']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd4']=="indpaixglobale"){echo 'Indice de paix';}   ?></th>
			<th><? if ($_GET['ClaInd5']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd5']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd5']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd5']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd5']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd5']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd5']=="indpaixglobale"){echo 'Indice de paix';}   ?></th>
			<th><? if ($_GET['ClaInd6']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd6']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd6']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd6']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd6']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd6']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd6']=="indpaixglobale"){echo 'Indice de paix';}   ?></th>
			<th><? if ($_GET['ClaInd7']=="inddemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd7']=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd7']=="indbonheur"){echo 'Indice du bonheur';}
			if ($_GET['ClaInd7']=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd7']=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd7']=="indlibercivile"){echo 'Indice de liberte civile';}
			if ($_GET['ClaInd7']=="indpaixglobale"){echo 'Indice de paix';}    ?></th>
			
		</tr> 
		<? 
		$rep = $bdd->query("SELECT continent.NomContinentFR, SUM(CASE WHEN ".$_GET['ClaInd1'].".Valeur IS NULL THEN 1 ELSE 0 END) AS 'Indice1',  SUM(CASE WHEN ".$_GET['ClaInd2'].".Valeur IS NULL THEN 1 ELSE 0 END) AS 'Indice2', 
		SUM(CASE WHEN ".$_GET['ClaInd3'].".Valeur IS NULL THEN 1 ELSE 0 END) AS 'Indice3', SUM(CASE WHEN ".$_GET['ClaInd4'].".Valeur IS NULL THEN 1 ELSE 0 END) AS 'Indice4', SUM(CASE WHEN ".$_GET['ClaInd5'].".Valeur IS NULL THEN 1 ELSE 0 END) AS 'Indice5', 
		SUM(CASE WHEN ".$_GET['ClaInd6'].".Valeur IS NULL THEN 1 ELSE 0 END) AS 'Indice6', SUM(CASE WHEN ".$_GET['ClaInd7'].".Valeur IS NULL THEN 1 ELSE 0 END) AS 'Indice7' FROM pays, inddemocratie, indcorruption, indbonheur, indparite, indlibermorale, indlibercivile, indpaixglobale, continent
		WHERE pays.IdContinent=continent.IdContinent AND pays.IdPays=inddemocratie.IdPays AND pays.IdPays=indcorruption.IdPays AND pays.IdPays=indbonheur.IdPays AND pays.IdPays=indparite.IdPays AND pays.IdPays=indlibermorale.IdPays AND pays.IdPays=indlibercivile.IdPays AND pays.IdPays=indpaixglobale.IdPays 
		AND inddemocratie.Annee=".$_GET['annee']." AND indcorruption.Annee=".$_GET['annee']." AND indbonheur.Annee=".$_GET['annee']." AND indparite.Annee=".$_GET['annee']." AND indlibermorale.Annee=".$_GET['annee']." AND indlibercivile.Annee=".$_GET['annee']." AND indpaixglobale.Annee=".$_GET['annee']." 
		GROUP BY continent.IdContinent");
		
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


		<?}?>
		
		
		
		
		
		
		
		
		
	</body>
</html>