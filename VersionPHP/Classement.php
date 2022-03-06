<!DOCTYPE html>
<html>

	<head>
		<title>TITRE</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../Style/Design.css" type="text/css" media="screen" />
		
		<!--<style>
		.container
 {
    
	columns : 2;
	display:flex;
}
.col1
{
 width:70%;
}
.col2
{
  width:30%;
}

</style>-->
		
		
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
		
		
			
		
		<!--<section class="container">
		<section class = "col1">-->
		<form action="Classement.php" method="get" autocomplete="off">
		<select name = "ClaInd1">
            <option value="democratie" selected>Demo</option>
            <option value="corruption">corruption</option>
			<option value="bonheur">bonheur</option>
			<option value="parite">parite gouvernementale</option>
			<option value="morale">liberte morale</option>
			<option value="presse">liberte de presse</option>
        </select>
		<select name = "ClaInd2">
            <option value="democratie">Demo</option>
            <option value="corruption" selected>corruption</option>
			<option value="bonheur">bonheur</option>
			<option value="parite">parite gouvernementale</option>
			<option value="morale">liberte morale</option>
			<option value="presse">liberte de presse</option>
        </select>
		<select name = "ClaInd3">
            <option value="democratie">Demo</option>
            <option value="corruption">corruption</option>
			<option value="bonheur" selected>bonheur</option>
			<option value="parite">parite gouvernementale</option>
			<option value="morale">liberte morale</option>
			<option value="presse">liberte de presse</option>
        </select>
		<select name = "ClaInd4">
            <option value="democratie">Demo</option>
            <option value="corruption">corruption</option>
			<option value="bonheur">bonheur</option>
			<option value="parite" selected>parite gouvernementale</option>
			<option value="morale">liberte morale</option>
			<option value="presse">liberte de presse</option>
        </select>
		<select name = "ClaInd5">
            <option value="democratie">Demo</option>
            <option value="corruption">corruption</option>
			<option value="bonheur">bonheur</option>
			<option value="parite">parite gouvernementale</option>
			<option value="morale" selected>liberte morale</option>
			<option value="presse">liberte de presse</option>
        </select>
		<select name = "ClaInd6">
            <option value="democratie">Demo</option>
            <option value="corruption">corruption</option>
			<option value="bonheur">bonheur</option>
			<option value="parite">parite gouvernementale</option>
			<option value="morale">liberte morale</option>
			<option value="presse" selected>liberte de presse</option>
        </select>
		<select name = "Ordre">
            <option value="ASC" selected>Croissant</option>
            <option value="DESC">Decroissant</option>
        </select>
		
		<p> <input type="submit" value="Envoyer"> </p>
		</form>
		
		
		
		
		
		
		<? $bdd = new PDO('mysql:host=localhost;dbname=projetl3;charset=utf8','root', 'root'); ?>
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
		</thead>
		</tr> 
		<tbody>
		<? 
		$rep = $bdd->query("SELECT pays.NomPaysFR, ".$_GET['ClaInd1'].".Valeur AS 'Indice1', ".$_GET['ClaInd2'].".Valeur AS 'Indice2',  ".$_GET['ClaInd3'].".Valeur AS 'Indice3',
		 ".$_GET['ClaInd4'].".Valeur AS 'Indice4',  ".$_GET['ClaInd5'].".Valeur AS 'Indice5',  ".$_GET['ClaInd6'].".Valeur AS 'Indice6'
		FROM pays, democratie, corruption, bonheur, parite, morale, presse 
		WHERE pays.IdPays=democratie.IdPays AND pays.IdPays=corruption.IdPays AND pays.IdPays=bonheur.IdPays AND pays.IdPays=parite.IdPays AND pays.IdPays=morale.IdPays AND pays.IdPays=presse.IdPays
		AND democratie.Annee=2018 AND corruption.Annee=2018 AND bonheur.Annee=2018 AND parite.Annee=2018 AND morale.Annee=2018 AND presse.Annee=2018
		ORDER BY ".$_GET['ClaInd1'].".Valeur , ". $_GET['ClaInd2'].".Valeur , ".$_GET['ClaInd3'].".Valeur , ".$_GET['ClaInd4'].".Valeur , ".$_GET['ClaInd5'].".Valeur , ".$_GET['ClaInd6'].".Valeur ".$_GET['Ordre']);
		while ($ligne = $rep->fetch()){ ?>
		<tr>
			<td><? echo $ligne['NomPaysFR']; ?></td>
			<td><? echo $ligne['Indice1']; ?></td>
			<td><? echo $ligne['Indice2']; ?></td>
			<td><? echo $ligne['Indice3']; ?></td>
			<td><? echo $ligne['Indice4']; ?></td>
			<td><? echo $ligne['Indice5']; ?></td>
			<td><? echo $ligne['Indice6']; ?></td>
		</tr>
		
		<?  } $rep->closeCursor();?>
		 </tbody>
		</table>
		
		
		

		
		<!--</section>
		<section class = "col2">
		
		kfthjogpdmf;ùd xtjhi
		
		
		</section>
		
</section>-->
		
	</body>
</html>