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
		<form action="Classement2.php" method="get" autocomplete="off">
		<select name = "ClaInd1">
            <option value="indicedemocratie" selected>Demo</option>
            <option value = "indice_corrupt">corruption</option>
        </select>
		<select name = "ClaInd2">
            <option value="indicedemocratie">Demo</option>
            <option value = "indice_corrupt" selected>corruption</option>
        </select>
		<p> <input type="submit" value="Envoyer"> </p>
		</form>

		<?echo $_GET['ClaInd1'];?>
		<?echo $_GET['ClaInd2'];?>
		
		<? $bdd = new PDO('mysql:host=localhost;dbname=projetl3;charset=utf8','root', 'root'); ?>
		<table>
		<tr>
			<th>Nom pays</th>
			<th><? echo 'Indice '.$_GET['ClaInd1'].' 2020'; ?></th>
			<th><? echo 'Indice '.$_GET['ClaInd2'].' 2020';  ?></th>
		</tr>
		<? $rep = $bdd->query("SELECT pays.NomPaysFR, ".$_GET['ClaInd1'].".Valeur AS 'Indice1', ".$_GET['ClaInd2'].".Valeur AS 'Indice2'
		FROM pays, indicedemocratie, indice_corrupt WHERE pays.IdPays=indicedemocratie.IdPays AND 
		pays.IdPays=indice_corrupt.IdPays AND indicedemocratie.Annee=2020 AND indice_corrupt.Annee=2020");
		while ($ligne = $rep->fetch()){ ?>
		<tr>
			<td><? echo $ligne['NomPaysFR']; ?></td>
			<td><? echo $ligne['Indice1']; ?></td>
			<td><? echo $ligne['Indice2']; ?></td>

		</tr>
		
		<?  } $rep->closeCursor();?>
		</table>

		
	</body>
</html>