<!DOCTYPE html>
<html>

	<head>
		<title>Index World - Correlation</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../Style/Design.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../CodeJS/cache.js"> </script>
	</head>
	
	<body id="BODY_FondUni">
		<div id="menu">
			<ul id="onglets">
				<li  class="active"><a href="khi-2.php"> Khi-2</a></li>
				<li><a href="../PagesHTML/Explications.html"> Explications </a></li>
				<li><a href="Classement.php"> Classement </a></li>
				<li><a href="Correlation.php"> Correlation </a></li>
				<li><a href="../PagesHTML/Accueil.html"> Accueil </a></li>
				<li class="titre">Index World</li>
			</ul>
		</div>


		<?php 
			//connection à la base de données
			$bdd = new PDO('mysql:host=localhost;dbname=projetl3bd;charset=utf8','root', 'root'); 



			if(isset($_GET['Ind1']) and !empty($_GET['Ind1']) and isset($_GET['Ind2']) and !empty($_GET['Ind2']) ){

			//recuperation des valeurs de l'indice1, indice2 ainsi que le pays correspondant

			$rep = $bdd->query("SELECT DISTINCT ind1.Valeur, ind2.Valeur, p.idPays from pays as p JOIN ".$_GET['Ind1']." as ind1 JOIN ".$_GET['Ind2']." as ind2 ON p.idPays = ind1.idPays and p.idPays = ind2.idPays WHERE ind1.Valeur IS NOT NULL and ind2.Valeur IS NOT NULL ORDER BY ind1.Valeur ASC, ind2.Valeur");

			// recuperation avec année
			if(isset($_GET['annee']) and !empty($_GET['annee'])){
				$rep = $bdd->query("SELECT DISTINCT ind1.Valeur, ind2.Valeur, p.idPays from pays as p JOIN ".$_GET['Ind1']." as ind1 JOIN ".$_GET['Ind2']." as ind2 ON p.idPays = ind1.idPays and p.idPays = ind2.idPays WHERE ind1.Valeur IS NOT NULL and ind2.Valeur IS NOT NULL and ind1.Annee = ".$_GET['annee']." and ind2.Annee = ".$_GET['annee']." ORDER BY ind1.Valeur ASC, ind2.Valeur");
			}


			$res=$rep->fetchAll();

			//mettre les valeurs d'indice1 dans un tableau
			$listInd1 = array();
			for ($i=0; $i <sizeof($res) ; $i++) { 
				$listInd1[] = $res[$i][0];

			}

			
			//enlever les doublons du tableau de valeurs d'indice1
			$listInd1p = array_unique($listInd1);

			//reecrire le tableau de valeurs d'indice1
			$listInd1 = array();

			foreach ($listInd1p as $key => $value) {
				$listInd1[] = $value;
			}

			
			//lier les valeurs d'indice1 à des index pour les mettre dans une matrice
			$maplistInd1 = array();

			for ($i=0; $i <sizeof($listInd1) ; $i++) { 
				$maplistInd1[$listInd1[$i]] = $i;
			}

			//mettre les valeurs d'indice2 dans un tableau
			$listInd2 = array();
			for ($i=0; $i <sizeof($res) ; $i++) { 
				$listInd2[] = $res[$i][1];

			}
			//enlever les doublons du tableau de valeurs d'indice2
			$listInd2p = array_unique($listInd2);


			$listInd2 = array();
			foreach ($listInd2p as $key => $value) {
				$listInd2[] = $value;
			}

			//lier les valeurs d'indice2 à des index pour les mettre dans une matrice
			$maplistInd2 = array();

			for ($i=0; $i <sizeof($listInd2) ; $i++) { 
				$maplistInd2[$listInd2[$i]] = $i;

			}
			
			
			//créer la matrice de valeurs qui va permettre de calculer le chi-2, 
			// les lignes correspondent aux valeurs des indice1
			// les colonnes correspondent aux valeurs des indice2
			// chaque case correspond au nombre de pays ayant la meme valeur d'indice1 et d'indice2
			$field  = array();

			$temp = array('colonne'=>sizeof($maplistInd1), 'ligne'=>sizeof($maplistInd2), 'dec'=> 1);

			//limitation de la taille de la matrice pour avoir un degré de liberté égal à 100
			$x = intval(sqrt(140));
			$y = intval(sqrt(140));

			$temp = array('colonne'=>sizeof($maplistInd1), 'ligne'=>sizeof($maplistInd2), 'dec'=> 1);

			if ($x > $temp['ligne']) {
				$x = $temp['ligne'];
			}

			if ($y > $temp['colonne']) {
				$y = $temp['colonne'];
			}

			//préremplissage de la matrice par des valeurs 0
			for ($i=0; $i <$x ; $i++) { 
				for ($j=0; $j <$y; $j++) { 
					$field[$i][$j] = 0;
				}

			}


			//remplissage de la mattrice: pour chaque valeur d'indice1 et d'indice2, on incrémente la valeur de la case correpondante dans la matrice de 1
			for ($i=0; $i <$x ; $i++) { 
				$ind1v =   $res[$i][0];
				$ind2v =   $res[$i][1];
				$ind1i =   $maplistInd1[$ind1v];
				$ind2i =   $maplistInd2[$ind2v];

				$field[$ind2i][$ind1i] = $field[$ind2i][$ind1i]+1;
			}


			//données de tests utilisés lors de l'écriture des fonctions de calcul khi-2
			//$temp = array('colonne'=>3, 'ligne'=>4, 'dec'=> 1);

			//$field = [[33, 12, 147], [28, 15, 79], [63, 35, 203], [46, 37, 108]];


			//calcul du khi-2 en PHP adapté du site web : https://codes-sources.commentcamarche.net/source/50763-teste-du-khi-deux-chi-deux-d-independance

			//en 13 étapes

			/* Etape 1: initialisation des variables*/
			$carre = 0;
	
			$chi2 = $totaux_contingent = $totaux_theorique  = 0;
			
			$total_colums_obs = $total_lines_obs = 0;
			$total_colums_theor = $total_lines_theor = 0;
			$total_colums_chi = $total_lines_chi = 0;
			
			$Save_total_colums_obs = $Save_total_lines_obs = array();
			$Save_total_colums_theor = $Save_total_lines_theor = array();
			$Save_total_colums_chi = $Save_total_lines_chi = array();
			
			$valeur_theorique = array();
			$valeur_chi = array();

			

			/* Etape 2 : Fournit le degré de liberté */	
			//$ddl = ($temp['ligne'] - 1)*($temp['colonne'] - 1); 
			$ddl = ($x - 1)*($y - 1); 
			
			/* Etape 3 : Fournit le Total des valeurs observés de chaque lignes de la matrice*/	
			
			
			for($i=0; $i<$x; $i++){
					for($j=0; $j<$y; $j++){
						$total_lines_obs = $total_lines_obs +$field[$i][$j];
				}
				$Save_total_lines_obs[] = $total_lines_obs;
				$total_lines_obs = 0;
			}
			
			

			/* Etape 4 : Fournit le Total des valeurs observés de chaque colonnes de la matrice*/	
			for($j=0; $j<$x; $j++){
				for($i=0; $i<$y; $i++){
					
						$total_colums_obs = $total_colums_obs +$field[$i][$j];
				}
				$Save_total_colums_obs[] = $total_colums_obs;
				$total_colums_obs = 0;
			}
			

			/*Etape 5 :  Fournit le Total des Totaux des valeurs observés calculés ci-dessus */	
			if( array_sum($Save_total_lines_obs) == array_sum($Save_total_colums_obs) )
			{	
				$totaux_contingent = round(array_sum($Save_total_lines_obs), $temp['dec']);
			}	
			else
			{
				print 'Le Total des totaux par colonnes et par lignes des valeurs observés, semblent ne pas correspondre ! ';
				
			}	

		

			$valeur_theorique_matrice = array();
			
			/* Etape 6 : Fournit une nouvelle matrice des valeurs théoriques */	
			if($totaux_contingent != 0)	
			{	
				

				for($i=0; $i<$x; $i++)
					{
					$valeur_theorique_ligne = array();
					for($j=0; $j<$y; $j++)
						{
						$valeur_theorique[] = round((($Save_total_lines_obs[$i]*$Save_total_colums_obs[$j])/$totaux_contingent), $temp['dec']); 
						$valeur_theorique_ligne[] = round((($Save_total_lines_obs[$i]*$Save_total_colums_obs[$j])/$totaux_contingent), $temp['dec']); 
					}
					$valeur_theorique_matrice[] = $valeur_theorique_ligne;
				}
			}
			else
			{ 
				print 'Le Total général des valeurs observés est null, la suite des calculs ne peut être effectuer ! '; 
			}


			/* Etape 7 : Fournit le Total des valeurs théoriques de chaque lignes de la matrice des valeurs théoriques */	
			$i=0;
			foreach($valeur_theorique as $value)
			{
				if($i<$x)
				{
					$total_lines_theor = $value + $total_lines_theor;
					$i++;
				}
					if($i==$x)
					{
						$Save_total_lines_theor[] = $total_lines_theor;
						$i = $total_lines_theor = 0;
					}
			}

			/* Etape 8 : Fournit le Total des valeurs théoriques de chaque colonnes de la matrice des valeurs théoriques */	
			for($j=0; $j<$y; $j++)
			{
				$key = $j;
					for($i=0; $i<$y; $i++)
					{
						$total_colums_theor = $valeur_theorique[$key] + $total_colums_theor;
						$key += $y;
					}	
				$Save_total_colums_theor[] = $total_colums_theor;
				$total_colums_theor = 0;
			}	
		
			/* Etape 9 : Fournit le Total des Totaux des valeurs théoriques calculés ci-dessus*/	

			$totaux_theorique = round(array_sum($Save_total_lines_theor), $temp['dec']);


		/* Etape 10 : Fournit les valeurs chis partiels: 
			valeur de chi par case de la matrice
		 */	

			$valeur_chi_matrice = array();
			for($i=0; $i<$x; $i++){

				$valeur_chi_ligne  = array();

				for($j=0; $j<$y; $j++){
					
					if($valeur_theorique_matrice[$i][$j]!=0)
				{
					$carre = pow(($field[$i][$j] - $valeur_theorique_matrice[$i][$j]),2)/$valeur_theorique_matrice[$i][$j];
					$valeur_chi[] = round($carre, $temp['dec']);
					$valeur_chi_ligne[] = round($carre, $temp['dec']);
				}
				else
				{
					$valeur_chi[] = 0;
					$valeur_chi_ligne[] = 0;
				}
				}
				$valeur_chi_matrice[] = $valeur_chi_ligne;
				
			}
			
			
			
		/* Etape 11 : Fournit le Total des valeurs chis de chaque lignes */	

			
			for($i=0; $i<$x; $i++){
				for($j=0; $j<$y; $j++){
					
						$total_lines_chi = $valeur_chi_matrice[$i][$j] + $total_lines_chi;
				}
				$Save_total_lines_chi[] = $total_lines_chi;
				$total_lines_chi=0;
			}

			echo "<br>";
			
			
		/* Etape 12 : Fournit le Total des valeurs chis de chaque colonnes*/

			for($j=0; $j<$y; $j++){
				for($i=0; $i<$x; $i++){
				
					
						$total_colums_chi  = $valeur_chi_matrice[$i][$j] + $total_colums_chi ;
				}
				$Save_total_colums_chi[] = $total_colums_chi;
				$total_colums_chi = 0;	
			}
			

		/* Etape 13 :  Fournit le Total des Totaux des valeurs chis soit le CHI2 */	
			
			$chi2 = round(array_sum($Save_total_lines_chi), $temp['dec']);


			}


?>

			

	
	<!--Création du rectangle avec les menus déroulants pour que l'utilisateur puisse faire le choix des indices pour mesurer le rapport de correlation-->

		<div id="rectangle">
			<div class="centre">
				<form action="khi-2.php" method="get" autocomplete="off">
					En <input name="annee" type="number" value="<?php echo $_GET['annee'];?>" min="2000" max ="2020" step="1"> , un pays plus 
					<span class="custom-dropdown custom-dropdown--white">
						<select class="custom-dropdown__select custom-dropdown__select--white" name = "Ind1">
							<option value="indicedemocratie" <?php if (isset($_GET['Ind1']) and $_GET['Ind1']=="indicedemocratie"){echo 'selected';}?>>democratique</option>
							<option value="indcorruption" <?php if (isset($_GET['Ind1']) and $_GET['Ind1']=="indcorruption"){echo 'selected';}?>>corrompu</option>
							<option value="indbonheur" <?php if (isset($_GET['Ind1']) and $_GET['Ind1']=="indbonheur"){echo 'selected';}?>>heureux</option>
							<option value="indparite" <?php if (isset($_GET['Ind1']) and $_GET['Ind1']=="indparite"){echo 'selected';}?>>paritaire</option>
							<option value="indlibermorale" <?php if (isset($_GET['Ind1']) and $_GET['Ind1']=="indlibermorale"){echo 'selected';}?>>morale</option>
							<!--option value="indlibercivile" <?php if (isset($_GET['Ind1']) and $_GET['Ind1']=="indlibercivile"){echo 'selected';}?>>libre</option-->
							<option value="indpaixglobale" <?php if (isset($_GET['Ind1']) and $_GET['Ind1']=="indpaixglobale"){echo 'selected';}?>>paisible</option>
						</select>
					</span> etait-il un pays plus 
					<span class="custom-dropdown custom-dropdown--white">
						<select class="custom-dropdown__select custom-dropdown__select--white" name = "Ind2">
							<option value="indicedemocratie" <?php if (isset($_GET['Ind2']) and $_GET['Ind2']=="indicedemocratie"){echo 'selected';}?>>democratique</option>
							<option value="indcorruption" <?php if (isset($_GET['Ind2']) and $_GET['Ind2']=="indcorruption"){echo 'selected';}?>>corrompu</option>
							<option value="indbonheur" <?php if (isset($_GET['Ind2']) and $_GET['Ind2']=="indbonheur"){echo 'selected';}?>>heureux</option>
							<option value="indparite" <?php if (isset($_GET['Ind2']) and $_GET['Ind2']=="indparite"){echo 'selected';}?>>paritaire</option>
							<option value="indlibermorale" <?php if (isset($_GET['Ind2']) and $_GET['Ind2']=="indlibermorale"){echo 'selected';}?>>morale</option>
							<!--option value="indlibercivile" <?php if (isset($_GET['Ind2']) and $_GET['Ind2']=="indlibercivile"){echo 'selected';}?>>libre</option-->
							<option value="indpaixglobale" <?php if (isset($_GET['Ind2']) and $_GET['Ind2']=="indpaixglobale"){echo 'selected';}?>>paisible</option>
						</select>
					</span> 
					<div class="dropdown">
		<!--Création du bouton d'aide avec l'affichage de l'explication d'une correlation en le survolant-->

						
					</div>
					<input type="submit" value="Envoyer">
				</form>
			</div>
		</div>
		<br />
		<!--Affichage des informations degré de liberté et khi-2 -->

		<?php 

		if(isset($_GET['Ind1']) and !empty($_GET['Ind1']) and isset($_GET['Ind2']) and !empty($_GET['Ind2']) ){
		?>


		<h1  class="centre"><?php echo 'Le degré de liberté est de '.$ddl.' et la valeur du Khi-2 est : '.$chi2; ?></h1>

		<?php
			


		?>

		<h2 class="centre">Interprétation : </h2>

		<h3 class="centre">Cette affirmation est vraie avec une chance de </h3>



		<?php

			// definitions du tableau khi-2 pour la ligne de degré de liberté 100 pris dans : https://archimede.mat.ulaval.ca/stt1920/STT-1920-Loi-du-khi-deux.pdf

			$ligne100TableChi = array(67.33,70.06, 74.22, 77.93,
			 82.36, 99.33, 118.50, 124.34, 129.56, 135.81, 140.17);

			$colonnesTableChi2 = array(0.995,0.990,0.975,0.950,0.900,
				0.500,0.100,0.050,0.025,0.010,0.005);

			$ligne100TableChi2 = array();
			$ligne100TableChi2[67.33] = 0;
			$ligne100TableChi2[70.06] = 1;
			$ligne100TableChi2[74.22] = 2;
			$ligne100TableChi2[77.93] = 3;
			$ligne100TableChi2[82.36] = 4;
			$ligne100TableChi2[99.33] = 5;
			$ligne100TableChi2[118.50] = 6;
			$ligne100TableChi2[124.34] = 7;
			$ligne100TableChi2[129.56] = 8;
			$ligne100TableChi2[135.81] = 9;
			$ligne100TableChi2[140.17] = 10;
			$position = -1;

			//recherche de la position du chi-2 dans le tableau

			for ($i=0; $i < sizeof($ligne100TableChi)-1; $i++) { 
				if ($chi2 > $ligne100TableChi[$i] and $chi2 < $ligne100TableChi[$i+1]) {
					$position = $i;
				}
			}

			if ($position == -1) {
				if ($chi2 < 67.33) {
					$position = 0;
				}
				if ($chi2 > 140.17) {
					$position = 10;
				}
			}



			

		//Affichage de l'interprétation: 
		// La position du chi-2 dans le tableau est liée à la probabilité que les indice1 et indice2 soient correlés. 
		?>

		<h4 class="centre"> <?php echo (($colonnesTableChi2[$position])*100)." %"; ?></h4>

	<?php } ?>
	</body>
</html>