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
				<li  class="active"><a href="Correlation.php"> Khi-2</a></li>
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


			$temp = array(array('colonne'=>3, 'ligne'=>4, 'dec'=> 1));


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

			$field = [[33, 12, 147], [28, 15, 79], [63, 35, 203], [46, 37, 108]];
			//var_dump($field);

			/* Fournit le degré de liberté */	
			$ddl = ($temp[0]['ligne'] - 1)*($temp[0]['colonne'] - 1); 
			
			
			/* Fournit le Total des valeurs observés de chaque lignes */	
			
			
			for($i=0; $i<$temp[0]['ligne']; $i++){
					for($j=0; $j<$temp[0]["colonne"]; $j++){
						$total_lines_obs = $total_lines_obs +$field[$i][$j];
				}
				$Save_total_lines_obs[] = $total_lines_obs;
				$total_lines_obs = 0;
			}
			
			

			//var_dump($Save_total_lines_obs);

			/* Fournit le Total des valeurs observés de chaque colonnes*/	
			for($j=0; $j<$temp[0]["colonne"]; $j++){
				for($i=0; $i<$temp[0]['ligne']; $i++){
					
						$total_colums_obs = $total_colums_obs +$field[$i][$j];
				}
				$Save_total_colums_obs[] = $total_colums_obs;
				$total_colums_obs = 0;
			}
			
			//var_dump($Save_total_colums_obs);

			/*
			for($j=0; $j<$temp[0]["colonne"]; $j++)
			{
				$key = $j;
					for($i=0; $i<$temp[0]['ligne']; $i++)
					{
						$total_colums_obs = $field[$key] + $total_colums_obs;
						$key += $temp[0]['colonne'];
					}	
				$Save_total_colums_obs[] = $total_colums_obs;
				$total_colums_obs = 0;
			}	*/

			/* Fournit le Total des Totaux des valeurs observés */	
			if( array_sum($Save_total_lines_obs) == array_sum($Save_total_colums_obs) )
			{	
				$totaux_contingent = round(array_sum($Save_total_lines_obs), $temp[0]['dec']);
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
				

				for($i=0; $i<$temp[0]['ligne']; $i++)
					{
					$valeur_theorique_ligne = array();
					for($j=0; $j<$temp[0]['colonne']; $j++)
						{
						$valeur_theorique[] = round((($Save_total_lines_obs[$i]*$Save_total_colums_obs[$j])/$totaux_contingent), $temp[0]['dec']); 
						$valeur_theorique_ligne[] = round((($Save_total_lines_obs[$i]*$Save_total_colums_obs[$j])/$totaux_contingent), $temp[0]['dec']); 
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
				if($i<$temp[0]['ligne'])
				{
					$total_lines_theor = $value + $total_lines_theor;
					$i++;
				}
					if($i==$temp[0]['ligne'])
					{
						$Save_total_lines_theor[] = $total_lines_theor;
						$i = $total_lines_theor = 0;
					}
			}

			//var_dump($Save_total_lines_theor);

			/* Fournit le Total des valeurs théoriques de chaque colonnes*/	
			for($j=0; $j<$temp[0]['colonne']; $j++)
			{
				$key = $j;
					for($i=0; $i<$temp[0]['ligne']; $i++)
					{
						$total_colums_theor = $valeur_theorique[$key] + $total_colums_theor;
						$key += $temp[0]['colonne'];
					}	
				$Save_total_colums_theor[] = $total_colums_theor;
				$total_colums_theor = 0;
			}	

			//var_dump($Save_total_colums_theor);
		
			/* Fournit le Total des Totaux des valeurs théoriques */	
			if( array_sum($Save_total_lines_theor) == array_sum($Save_total_colums_theor) )
			{	
				$totaux_theorique = round(array_sum($Save_total_lines_theor), $temp[0]['dec']);
			}	
			else
			{
				print 'Le Total des totaux par colonnes et par lignes des valeurs théoriques, semblent ne pas correspondre ! ';
				//exit();
			}	

			//var_dump($totaux_theorique);


		/* Fournit les valeurs chis partiels */	

			$valeur_chi_matrice = array();
			for($i=0; $i<$temp[0]['ligne']; $i++){

				$valeur_chi_ligne  = array();

				for($j=0; $j<$temp[0]["colonne"]; $j++){
					
					if($valeur_theorique_matrice[$i][$j]!=0)
				{
					$carre = pow(($field[$i][$j] - $valeur_theorique_matrice[$i][$j]),2)/$valeur_theorique_matrice[$i][$j];
					$valeur_chi[] = round($carre, $temp[0]['dec']);
					$valeur_chi_ligne[] = round($carre, $temp[0]['dec']);
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

			
			for($i=0; $i<$temp[0]['ligne']; $i++){
				for($j=0; $j<$temp[0]["colonne"]; $j++){
					
						$total_lines_chi = $valeur_chi_matrice[$i][$j] + $total_lines_chi;
				}
				$Save_total_lines_chi[] = $total_lines_chi;
				$total_lines_chi=0;
			}
			//var_dump($Save_total_lines_chi);
			echo "<br>";
			
			
		/* Fournit le Total des valeurs chis de chaque colonnes*/

			for($j=0; $j<$temp[0]["colonne"]; $j++){
				for($i=0; $i<$temp[0]['ligne']; $i++){
				
					
						$total_colums_chi  = $valeur_chi_matrice[$i][$j] + $total_colums_chi ;
				}
				$Save_total_colums_chi[] = $total_colums_chi;
				$total_colums_chi = 0;	
			}
			
			//var_dump($Save_total_colums_chi);

		/* Fournit le Total des Totaux des valeurs chis soit le CHI2 */	
			
			if( array_sum($Save_total_lines_chi) == array_sum($Save_total_colums_chi) )
				{	
					$chi2 = round(array_sum($Save_total_lines_chi), $temp[0]['dec']);
				}	
				else
				{
					print '<br>Le Total des totaux par colonnes et par lignes des valeurs chis, semblent ne pas correspondre ! ';
					//exit();
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
							<option value="indicedemocratie" <?php if ($_GET['Ind1']=="indicedemocratie"){echo 'selected';}?>>democratique</option>
							<option value="indcorruption" <?php if ($_GET['Ind1']=="indcorruption"){echo 'selected';}?>>corrompu</option>
							<option value="indbonheur" <?php if ($_GET['Ind1']=="indbonheur"){echo 'selected';}?>>heureux</option>
							<option value="indparite" <?php if ($_GET['Ind1']=="indparite"){echo 'selected';}?>>paritaire</option>
							<option value="indlibermorale" <?php if ($_GET['Ind1']=="indlibermorale"){echo 'selected';}?>>morale</option>
							<option value="indlibercivile" <?php if ($_GET['Ind1']=="indlibercivile"){echo 'selected';}?>>libre</option>
							<option value="indpaixglobale" <?php if ($_GET['Ind1']=="indpaixglobale"){echo 'selected';}?>>paisible</option>
						</select>
					</span> etait-il un pays plus 
					<span class="custom-dropdown custom-dropdown--white">
						<select class="custom-dropdown__select custom-dropdown__select--white" name = "Ind2">
							<option value="indicedemocratie" <?php if ($_GET['Ind2']=="indicedemocratie"){echo 'selected';}?>>democratique</option>
							<option value="indcorruption" <?php if ($_GET['Ind2']=="indcorruption"){echo 'selected';}?>>corrompu</option>
							<option value="indbonheur" <?php if ($_GET['Ind2']=="indbonheur"){echo 'selected';}?>>heureux</option>
							<option value="indparite" <?php if ($_GET['Ind2']=="indparite"){echo 'selected';}?>>paritaire</option>
							<option value="indlibermorale" <?php if ($_GET['Ind2']=="indlibermorale"){echo 'selected';}?>>morale</option>
							<option value="indlibercivile" <?php if ($_GET['Ind2']=="indlibercivile"){echo 'selected';}?>>libre</option>
							<option value="indpaixglobale" <?php if ($_GET['Ind2']=="indpaixglobale"){echo 'selected';}?>>paisible</option>
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
		if ($_GET['annee']!=""){
			if($_GET['Ind1']==$_GET['Ind2']){
				echo '<img class = "Graph" src="imgCorr.php?Ind1='.$_GET['Ind1'].'&Ind2='.$_GET['Ind2'].'&annee='.$_GET['annee'].'&cor=1" />';
				echo '<br />';
				?>
				<a href="<?php echo 'imgCorr.php?Ind1='.$_GET['Ind1'].'&Ind2='.$_GET['Ind2'].'&annee='.$_GET['annee'].'&cor=1'; ?>" download="cor.png">Télécharger le graphique</a>
				<br />
				<br />
				<button class="button" onclick="cache('manqu','disp','Masquez', 'Affichez');"> <span id="disp"> Masquez </span></button>
				<div id="manque1">
		<!--Gestion des donnéees manquantes en spécifiant la liste des pays avec donnéees manquantes-->
					<?php 
					echo '<p>La liste des pays non pris en compte (par manque de données) : </p>';
					$rep = $bdd->query('SELECT pays.NomPaysFR FROM pays WHERE pays.IdPays NOT IN (SELECT '.$_GET['Ind1'].'.IdPays FROM '.$_GET['Ind1'].' WHERE '.$_GET['Ind1'].'.Valeur IS NOT NULL AND '.$_GET['Ind1'].'.Annee='.$_GET['annee'].')');
					echo '<ul>';
						while($ligne=$rep->fetch()){
							echo '<li>'.$ligne['NomPaysFR'].'</li>';
						}
					echo '</ul>';
				echo '</div>';
			}else{
		/* Calcul du rapport de correlation par requete SQL*/
		
				$rep = $bdd->query("SELECT round((avg(".$_GET['Ind1'].".Valeur*".$_GET['Ind2'].".Valeur)-(AVG(".$_GET['Ind1'].".Valeur)*avg(".$_GET['Ind2'].".Valeur)))/(STDDEV_SAMP(".$_GET['Ind1'].".Valeur)*STDDEV_SAMP(".$_GET['Ind2'].".Valeur)), 2) AS 'r'
				FROM ".$_GET['Ind1'].", ".$_GET['Ind2']."
				WHERE ".$_GET['Ind1'].".IdPays=".$_GET['Ind2'].".IdPays AND ".$_GET['Ind1'].".Valeur IS NOT NULL AND ".$_GET['Ind2'].".Valeur IS NOT NULL AND ".$_GET['Ind1'].".Annee=".$_GET['annee']." AND ".$_GET['Ind2'].".Annee=".$_GET['annee']);

				$res=$rep->fetchAll();

		/* Récuperation du graphique crée dans le fichier imgCorr.php*/
				echo '<img class = "Graph" src="imgCorr.php?Ind1='.$_GET['Ind1'].'&Ind2='.$_GET['Ind2'].'&annee='.$_GET['annee'].'&cor='.$res[0]['r'].'" />';

				echo '<br />';

				?>
		
		<!-- Permettre de télécharger le graphique-->
				<a href="<?php echo 'imgCorr.php?Ind1='.$_GET['Ind1'].'&Ind2='.$_GET['Ind2'].'&annee='.$_GET['annee'].'&cor='.$res[0]['r']; ?>" download="cor.png">Télécharger le graphique</a>
				<br />
				<br />
				<button class="button" onclick="cache('manque2','rien','Masquez', 'Affichez');"> <span id="rien"> Masquez </span></button>
				<div id="manque2">
		<!--Gestion des donnéees manquantes en spécifiant la liste des pays avec donnéees manquantes-->
					<?php
					echo '<p>La liste des pays non pris en compte (par manque de données) : </p>';

					$rep = $bdd->query('SELECT pays.NomPaysFR FROM pays WHERE pays.IdPays NOT IN (SELECT pays.IdPays FROM '.$_GET['Ind1'].' , '.$_GET['Ind2'].' , pays WHERE '.$_GET['Ind1'].'.IdPays=pays.IdPays AND pays.IdPays='.$_GET['Ind2'].'.IdPays AND '.$_GET['Ind1'].'.Valeur IS NOT NULL AND '.$_GET['Ind2'].'.Valeur IS NOT NULL AND '.$_GET['Ind1'].'.Annee='.$_GET['annee'].' AND '.$_GET['Ind2'].'.Annee='.$_GET['annee'].' )');
					echo '<ul>';
						while($ligne=$rep->fetch()){
							echo '<li>'.$ligne['NomPaysFR'].'</li>';
						}
					echo '</ul>';
				echo '</div>';
			}
		}?>



	</body>
</html>
