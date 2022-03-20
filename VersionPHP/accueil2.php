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
        <input class="Champs" name="Pays" type="text" placeholder="                            Veuillez saisir un pays..."/>
		
		<input class="bouton" type="submit" value=" "/>
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
		
		

	</body>
</html>

