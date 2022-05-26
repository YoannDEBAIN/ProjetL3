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

		<?php $bdd = new PDO('mysql:host=localhost;dbname=projetl3bd;charset=utf8','root', 'root'); 
			//$rep = $bdd->query('SELECT pays.NomPaysFR FROM pays');
			//var_dump($rep->fetchAll());

			if(isset($_GET['Ind1']) and !empty($_GET['Ind1']) and isset($_GET['Ind2']) and !empty($_GET['Ind2']) ){

			$rep = $bdd->query("SELECT DISTINCT ind1.Valeur, ind2.Valeur, p.idPays from pays as p JOIN ".$_GET['Ind1']." as ind1 JOIN ".$_GET['Ind2']." as ind2 ON p.idPays = ind1.idPays and p.idPays = ind2.idPays WHERE ind1.Valeur IS NOT NULL and ind2.Valeur IS NOT NULL ORDER BY ind1.Valeur ASC, ind2.Valeur");

			if(isset($_GET['annee']) and !empty($_GET['annee'])){
				$rep = $bdd->query("SELECT DISTINCT ind1.Valeur, ind2.Valeur, p.idPays from pays as p JOIN ".$_GET['Ind1']." as ind1 JOIN ".$_GET['Ind2']." as ind2 ON p.idPays = ind1.idPays and p.idPays = ind2.idPays WHERE ind1.Valeur IS NOT NULL and ind2.Valeur IS NOT NULL and ind1.Annee = ".$_GET['annee']." and ind2.Annee = ".$_GET['annee']." ORDER BY ind1.Valeur ASC, ind2.Valeur");
			}

			/*
			$rep = $bdd->query("SELECT round((avg(".$_GET['Ind1'].".Valeur*".$_GET['Ind2'].".Valeur)-(AVG(".$_GET['Ind1'].".Valeur)*avg(".$_GET['Ind2'].".Valeur)))/(STDDEV_SAMP(".$_GET['Ind1'].".Valeur)*STDDEV_SAMP(".$_GET['Ind2'].".Valeur)), 2) AS 'r'
				FROM ".$_GET['Ind1'].", ".$_GET['Ind2']."
				WHERE ".$_GET['Ind1'].".IdPays=".$_GET['Ind2'].".IdPays AND ".$_GET['Ind1'].".Valeur IS NOT NULL AND ".$_GET['Ind2'].".Valeur IS NOT NULL AND ".$_GET['Ind1'].".Annee=".$_GET['annee']." AND ".$_GET['Ind2'].".Annee=".$_GET['annee']);
			*/

			$res=$rep->fetchAll();
			//var_dump($res);

			/*
			var_dump($res[500]);
			var_dump($res[500][0]);
			var_dump($res[500][1]);
			var_dump($res[500][2]);
			*/

			$listInd1 = array();
			for ($i=0; $i <sizeof($res) ; $i++) { 
				$listInd1[] = $res[$i][0];

			}

			

			$listInd1p = array_unique($listInd1);

			$listInd1 = array();

			foreach ($listInd1p as $key => $value) {
				$listInd1[] = $value;
			}

			//var_dump($listInd1);
			//var_dump($listInd1[1]);

			$maplistInd1 = array();

			for ($i=0; $i <sizeof($listInd1) ; $i++) { 
				//print_r($listInd1[$i]);
				$maplistInd1[$listInd1[$i]] = $i;
				//print_r($maplistInd1[$listInd1[$i]]."<br>");
			}

			/*
			print_r(sizeof($listInd1) );

			echo "<br><br>";

			var_dump($listInd1);

			echo "<br><br>";
			*/

			//var_dump($maplistInd1);


			$listInd2 = array();
			for ($i=0; $i <sizeof($res) ; $i++) { 
				$listInd2[] = $res[$i][1];

			}

			$listInd2p = array_unique($listInd2);

			$listInd2 = array();
			foreach ($listInd2p as $key => $value) {
				$listInd2[] = $value;
			}

			$maplistInd2 = array();

			for ($i=0; $i <sizeof($listInd2) ; $i++) { 
				$maplistInd2[$listInd2[$i]] = $i;

			}
			
			//var_dump($maplistInd2);

			$field  = array();

			$temp = array('colonne'=>sizeof($maplistInd1), 'ligne'=>sizeof($maplistInd2), 'dec'=> 1);

			$x = intval(sqrt(140));
			$y = intval(sqrt(140));

			$temp = array('colonne'=>sizeof($maplistInd1), 'ligne'=>sizeof($maplistInd2), 'dec'=> 1);

			for ($i=0; $i <$temp['ligne'] ; $i++) { 
				for ($j=0; $j <$temp['colonne'] ; $j++) { 
					$field[$i][$j] = 0;
				}

			}


			
			for ($i=0; $i <sizeof($res) ; $i++) { 
				$ind1v =   $res[$i][0];
				$ind2v =   $res[$i][1];
				$ind1i =   $maplistInd1[$ind1v];
				$ind2i =   $maplistInd2[$ind2v];
				//print_r($ind2i."     ".$ind1i."<br>");
				$field[$ind2i][$ind1i] = $field[$ind2i][$ind1i]+1;
			}

			//var_dump($field);


			//$temp = array('colonne'=>3, 'ligne'=>4, 'dec'=> 1);

			//$field = [[33, 12, 147], [28, 15, 79], [63, 35, 203], [46, 37, 108]];



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

			
			//var_dump($field);

			/* Fournit le degré de liberté */	
			//$ddl = ($temp['ligne'] - 1)*($temp['colonne'] - 1); 
			$ddl = ($x - 1)*($y - 1); 
			
			/* Fournit le Total des valeurs observés de chaque lignes */	
			
			
			for($i=0; $i<$temp['ligne']; $i++){
					for($j=0; $j<$temp["colonne"]; $j++){
						$total_lines_obs = $total_lines_obs +$field[$i][$j];
				}
				$Save_total_lines_obs[] = $total_lines_obs;
				$total_lines_obs = 0;
			}
			
			

			//var_dump($Save_total_lines_obs);

			/* Fournit le Total des valeurs observés de chaque colonnes*/	
			for($j=0; $j<$temp["colonne"]; $j++){
				for($i=0; $i<$temp['ligne']; $i++){
					
						$total_colums_obs = $total_colums_obs +$field[$i][$j];
				}
				$Save_total_colums_obs[] = $total_colums_obs;
				$total_colums_obs = 0;
			}
			
			//var_dump($Save_total_colums_obs);

			/*
			for($j=0; $j<$temp["colonne"]; $j++)
			{
				$key = $j;
					for($i=0; $i<$temp['ligne']; $i++)
					{
						$total_colums_obs = $field[$key] + $total_colums_obs;
						$key += $temp['colonne'];
					}	
				$Save_total_colums_obs[] = $total_colums_obs;
				$total_colums_obs = 0;
			}	*/

			/* Fournit le Total des Totaux des valeurs observés */	
			if( array_sum($Save_total_lines_obs) == array_sum($Save_total_colums_obs) )
			{	
				$totaux_contingent = round(array_sum($Save_total_lines_obs), $temp['dec']);
			}	
			else
			{
				print 'Le Total des totaux par colonnes et par lignes des valeurs observés, semblent ne pas correspondre ! ';
				//exit();
			}	

			//var_dump($totaux_contingent);

			$valeur_theorique_matrice = array();
			
			/* Fournit les valeurs théoriques */	
			if($totaux_contingent != 0)	
			{	
				

				for($i=0; $i<$temp['ligne']; $i++)
					{
					$valeur_theorique_ligne = array();
					for($j=0; $j<$temp['colonne']; $j++)
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
				//exit; 
			}

			//var_dump($valeur_theorique);
			//var_dump($valeur_theorique_matrice);


			/* Fournit le Total des valeurs théoriques de chaque lignes */	
			$i=0;
			foreach($valeur_theorique as $value)
			{
				if($i<$temp['ligne'])
				{
					$total_lines_theor = $value + $total_lines_theor;
					$i++;
				}
					if($i==$temp['ligne'])
					{
						$Save_total_lines_theor[] = $total_lines_theor;
						$i = $total_lines_theor = 0;
					}
			}

			//var_dump($Save_total_lines_theor);

			/* Fournit le Total des valeurs théoriques de chaque colonnes*/	
			for($j=0; $j<$temp['colonne']; $j++)
			{
				$key = $j;
					for($i=0; $i<$temp['ligne']; $i++)
					{
						$total_colums_theor = $valeur_theorique[$key] + $total_colums_theor;
						$key += $temp['colonne'];
					}	
				$Save_total_colums_theor[] = $total_colums_theor;
				$total_colums_theor = 0;
			}	

			//var_dump($Save_total_colums_theor);
		
			/* Fournit le Total des Totaux des valeurs théoriques */	
			/*
			if( array_sum($Save_total_lines_theor) == array_sum($Save_total_colums_theor) )
			{	
				$totaux_theorique = round(array_sum($Save_total_lines_theor), $temp['dec']);
			}	
			else
			{
				print 'Le Total des totaux par colonnes et par lignes des valeurs théoriques, semblent ne pas correspondre ! ';
				//exit();
			}	
			*/
			$totaux_theorique = round(array_sum($Save_total_lines_theor), $temp['dec']);

			//var_dump($totaux_theorique);


		/* Fournit les valeurs chis partiels */	

			$valeur_chi_matrice = array();
			for($i=0; $i<$temp['ligne']; $i++){

				$valeur_chi_ligne  = array();

				for($j=0; $j<$temp["colonne"]; $j++){
					
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
			//var_dump($valeur_chi_matrice);
			
			
		/* Fournit le Total des valeurs chis de chaque lignes */	

			
			for($i=0; $i<$temp['ligne']; $i++){
				for($j=0; $j<$temp["colonne"]; $j++){
					
						$total_lines_chi = $valeur_chi_matrice[$i][$j] + $total_lines_chi;
				}
				$Save_total_lines_chi[] = $total_lines_chi;
				$total_lines_chi=0;
			}
			//var_dump($Save_total_lines_chi);
			echo "<br>";
			
			
		/* Fournit le Total des valeurs chis de chaque colonnes*/

			for($j=0; $j<$temp["colonne"]; $j++){
				for($i=0; $i<$temp['ligne']; $i++){
				
					
						$total_colums_chi  = $valeur_chi_matrice[$i][$j] + $total_colums_chi ;
				}
				$Save_total_colums_chi[] = $total_colums_chi;
				$total_colums_chi = 0;	
			}
			
			//var_dump($Save_total_colums_chi);

		/* Fournit le Total des Totaux des valeurs chis soit le CHI2 */	
			/*
			if( array_sum($Save_total_lines_chi) == array_sum($Save_total_colums_chi) )
				{	
					$chi2 = round(array_sum($Save_total_lines_chi), $temp['dec']);
				}	
				else
				{
					print 'Le Total des totaux par colonnes et par lignes des valeurs chis, semblent ne pas correspondre ! ';
					//exit();
				}
			*/
			$chi2 = round(array_sum($Save_total_lines_chi), $temp['dec']);


			}

			//var_dump($ddl, $chi2);
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
							<option value="indlibercivile" <?php if (isset($_GET['Ind1']) and $_GET['Ind1']=="indlibercivile"){echo 'selected';}?>>libre</option>
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
							<option value="indlibercivile" <?php if (isset($_GET['Ind2']) and $_GET['Ind2']=="indlibercivile"){echo 'selected';}?>>libre</option>
							<option value="indpaixglobale" <?php if (isset($_GET['Ind2']) and $_GET['Ind2']=="indpaixglobale"){echo 'selected';}?>>paisible</option>
						</select>
					</span> 
					<div class="dropdown">
		<!--Création du bouton d'aide avec l'affichage de l'explication d'une correlation en le survolant-->
						<button class="styled" type="button"><span>?</span></button>
						<div class="dropdown-content">
							<p>La corrélation, notée "r", représente en statistique, la force de liaison entre deux variables (ici, les deux indices choisis).</p> 
							<p>Graphiquement, une forte liaison se traduira par un nuage de point dont l'aspect se rapproche d'une droite (on parle alors de liaison linéaire).</p>
							<p>Plus la valeur de "r" est proche de -1 et 1, et plus la liaison (linéaire) entre les variables est forte. Si sa valeur est proche de 0, alors cela signifie que la liaison (linéaire) est inexistante.</p>
							<p>Enfin, il est important de noter que l'existence d'une corrélation, n'implique pas toujours l'existence d'une causalité entre les deux variables</p>
						</div>
					</div>
					<input type="submit" value="Envoyer">
				</form>
			</div>
		</div>
		<br />
		<!--Création du bouton d'aide avec l'affichage de l'explication d'une correlation en le survolant-->

		<?php 

		if(isset($_GET['Ind1']) and !empty($_GET['Ind1']) and isset($_GET['Ind2']) and !empty($_GET['Ind2']) ){
		?>


		<h1  class="centre"><?php echo 'Le degré de liberté est de '.$ddl.' et la valeur du Khi-2 est : '.$chi2; ?></h1>

		<?php
			//var_dump($field);
			//var_dump($valeur_theorique_matrice);


		?>

	<?php } ?>
	</body>
</html>