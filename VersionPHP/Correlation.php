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
				<li><a href="../PagesHTML/Explications.html"> Explications </a></li>
				<li><a href="Classement.php"> Classement </a></li>
				<li  class="active"><a href="Correlation.php"> Correlation </a></li>
				<li><a href="../PagesHTML/Accueil.html"> Accueil </a></li>
				<li class="titre">Index World</li>
			</ul>
		</div>

		<? $bdd = new PDO('mysql:host=localhost;dbname=projetl3bd;charset=utf8','root', 'root'); ?>
	
	<!--Création du rectangle avec les menus déroulants pour que l'utilisateur puisse faire le choix des indices pour mesurer le rapport de correlation-->
	
		<div id="rectangle">
			<div class="centre">
				<form action="Correlation.php" method="get" autocomplete="off">
					En <input name="annee" type="number" value="<? echo $_GET['annee'];?>" min="2000" max ="2020" step="1"> , un pays plus 
					<span class="custom-dropdown custom-dropdown--white">
						<select class="custom-dropdown__select custom-dropdown__select--white" name = "Ind1">
							<option value="indicedemocratie" <? if ($_GET['Ind1']=="indicedemocratie"){echo 'selected';}?>>democratique</option>
							<option value="indcorruption" <? if ($_GET['Ind1']=="indcorruption"){echo 'selected';}?>>corrompu</option>
							<option value="indbonheur" <? if ($_GET['Ind1']=="indbonheur"){echo 'selected';}?>>heureux</option>
							<option value="indparite" <? if ($_GET['Ind1']=="indparite"){echo 'selected';}?>>paritaire</option>
							<option value="indlibermorale" <? if ($_GET['Ind1']=="indlibermorale"){echo 'selected';}?>>morale</option>
							<option value="indlibercivile" <? if ($_GET['Ind1']=="indlibercivile"){echo 'selected';}?>>libre</option>
							<option value="indpaixglobale" <? if ($_GET['Ind1']=="indpaixglobale"){echo 'selected';}?>>paisible</option>
						</select>
					</span> etait-il un pays plus 
					<span class="custom-dropdown custom-dropdown--white">
						<select class="custom-dropdown__select custom-dropdown__select--white" name = "Ind2">
							<option value="indicedemocratie" <? if ($_GET['Ind2']=="indicedemocratie"){echo 'selected';}?>>democratique</option>
							<option value="indcorruption" <? if ($_GET['Ind2']=="indcorruption"){echo 'selected';}?>>corrompu</option>
							<option value="indbonheur" <? if ($_GET['Ind2']=="indbonheur"){echo 'selected';}?>>heureux</option>
							<option value="indparite" <? if ($_GET['Ind2']=="indparite"){echo 'selected';}?>>paritaire</option>
							<option value="indlibermorale" <? if ($_GET['Ind2']=="indlibermorale"){echo 'selected';}?>>morale</option>
							<option value="indlibercivile" <? if ($_GET['Ind2']=="indlibercivile"){echo 'selected';}?>>libre</option>
							<option value="indpaixglobale" <? if ($_GET['Ind2']=="indpaixglobale"){echo 'selected';}?>>paisible</option>
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

		<? 
		if ($_GET['annee']!=""){
			if($_GET['Ind1']==$_GET['Ind2']){
				echo '<img class = "Graph" src="imgCorr.php?Ind1='.$_GET['Ind1'].'&Ind2='.$_GET['Ind2'].'&annee='.$_GET['annee'].'&cor=1" />';
				echo '<br />';
				?>
				<a href="<? echo 'imgCorr.php?Ind1='.$_GET['Ind1'].'&Ind2='.$_GET['Ind2'].'&annee='.$_GET['annee'].'&cor=1'; ?>" download="cor.png">Télécharger le graphique</a>
				<br />
				<br />
				<button class="button" onclick="cache('manqu','disp','Masquez', 'Affichez');"> <span id="disp"> Masquez </span></button>
				<div id="manque1">
		<!--Gestion des donnéees manquantes en spécifiant la liste des pays avec donnéees manquantes-->
					<? 
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
				<a href="<? echo 'imgCorr.php?Ind1='.$_GET['Ind1'].'&Ind2='.$_GET['Ind2'].'&annee='.$_GET['annee'].'&cor='.$res[0]['r']; ?>" download="cor.png">Télécharger le graphique</a>
				<br />
				<br />
				<button class="button" onclick="cache('manque2','rien','Masquez', 'Affichez');"> <span id="rien"> Masquez </span></button>
				<div id="manque2">
		<!--Gestion des donnéees manquantes en spécifiant la liste des pays avec donnéees manquantes-->
					<?
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