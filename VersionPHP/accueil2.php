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
		
		
		<? 
		$rep = $bdd->query("SELECT pays.NomPaysFR, pays.UrlDrapeau
		FROM pays
		WHERE pays.NomPaysFR='".$_GET['Pays']."' ");
		while ($ligne = $rep->fetch()){ ?>
		
			<? echo $ligne['NomPaysFR']; ?>
			<? echo $ligne['UrlDrapeau']; ?>
			<? echo "<img src='".$ligne['UrlDrapeau']."' />"; ?>
		
		
		<?  } $rep->closeCursor();?>
		
		

	</body>
</html>

