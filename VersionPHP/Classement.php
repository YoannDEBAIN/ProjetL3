<!DOCTYPE html>
<html>

	<head>
		<title>Index World - Classement</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../Style/Design.css" type="text/css" media="screen" />
		<? require('ColFondTablInd.php');?>

	<style>
		tbody, thead{
		  display: block;
		}
		tbody{
		  height:500px;
		  overflow-y: scroll;
		  overflow-x: auto;
		}
		.dropdown{
			margin-right : 0.1em;
	
		}
	</style>

		
		
	</head>
	
	<body id="BODY_FondUni">
		<div id="menu">
			<ul id="onglets">
				<li><a href="../PagesHTML/Explications.html"> Explications </a></li>
				<li  class="active"><a href="Classement.php"> Classement </a></li>
				<li><a href="Correlation.php"> Correlation </a></li>
				<li><a href="../PagesHTML/Accueil.html"> Accueil </a></li>
				<li class="titre">Index World</li>
			</ul>
		</div>
		
		<br/>
		
		<? $nbInd=7; ?> <!--nombre d'indice -->
		<form id="ChoixCla" action="Classement.php" method="get" autocomplete="off">
			<? for ($i=1; $i<=$nbInd; $i++){ /* boucle permettant de créer autant de liste deroulante qu'il y a d'indice */

				echo '<select name = "ClaInd'.$i.'">
					<option value="indicedemocratie"'; if ($_GET['ClaInd'.$i]=="indicedemocratie"){echo 'selected';} echo '>Democratie</option>
					<option value="indcorruption"'; if ($_GET['ClaInd'.$i]=="indcorruption"){echo 'selected';} echo '>corruption</option>
					<option value="indbonheur"'; if ($_GET['ClaInd'.$i]=="indbonheur"){echo 'selected';} echo '>bonheur</option>
					<option value="indparite"'; if ($_GET['ClaInd'.$i]=="indparite"){echo 'selected';} echo '>parite gouvernementale</option>
					<option value="indlibermorale"'; if ($_GET['ClaInd'.$i]=="indlibermorale"){echo 'selected';} echo '>liberte morale</option>
					<option value="indlibercivile"'; if ($_GET['ClaInd'.$i]=="indlibercivile"){echo 'selected';} echo '>liberte civile</option>
					<option value="indpaixglobale"'; if ($_GET['ClaInd'.$i]=="indpaixglobale"){echo 'selected';} echo '>paix globale</option>
				</select>';
				echo '<select name = "Ordre'.$i.'">
					<option value="ASC"'; if ($_GET['Ordre'.$i]=="ASC"){echo 'selected';} echo '>Croissant</option>
					<option value="DESC"'; if ($_GET['Ordre'.$i]=="DESC"){echo 'selected';} echo '>Decroissant</option>
				</select>';

			}?>
			
			<input name="annee" type="number" value="<? echo $_GET['annee'];?>" min="2000" max ="2020" step="1">
			<input type="submit" value="Envoyer">
		</form>
	
		<br />
		
		<? if ( $_GET['annee']!="") { //verification de l'entrée d'une année
			$bdd = new PDO('mysql:host=localhost;dbname=projetl3bd;charset=utf8','root', 'root'); ?>
			<div class="ConTab">
				<table>
					<thead>
						<tr>
							<th>Nom pays</th>
							<? for ($i=1; $i<=$nbInd; $i++){ /* Affichage du bon nom de l'indice  selon l'ordre choisis par l'utilisateur*/
								echo '<th class="dropdown"> <span>'; 
									if($_GET['ClaInd'.$i]=="indicedemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd'.$i]=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd'.$i]=="indbonheur"){echo 'Indice du bonheur';}
									if ($_GET['ClaInd'.$i]=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd'.$i]=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd'.$i]=="indlibercivile"){echo 'Indice de liberte civile';}
									if ($_GET['ClaInd'.$i]=="indpaixglobale"){echo 'Indice de paix';} 
								echo '</span>'; 
								echo '<div class="dropdown-content">
									<p>Valeur Normalisée (Valeur originale)</p>
								</div>'; 
							echo '</th>';
							}?>
						</tr> 
					</thead>
					<tbody>
						<? 
						$sql="SELECT pays.NomPaysFR, "; //requete dans le but d'obtenir les valeurs normalisées triées selon l'ordre et l'année choisis pour les pays, les valeurs originales
						for($i=1; $i<$nbInd; $i++){
							$sql=$sql.$_GET['ClaInd'.$i].".Valeur AS 'Indice".$i."', ".$_GET['ClaInd'.$i].".ValeurOri AS 'IndiceOri".$i."', ";
						}
						$sql=$sql.$_GET['ClaInd'.$nbInd].".Valeur AS 'Indice".$nbInd."', ".$_GET['ClaInd'.$nbInd].".ValeurOri AS 'IndiceOri".$nbInd."' ";
						$sql=$sql."FROM pays, indicedemocratie, indcorruption, indbonheur, indparite, indlibermorale, indlibercivile, indpaixglobale
						WHERE pays.IdPays=indicedemocratie.IdPays AND pays.IdPays=indcorruption.IdPays AND pays.IdPays=indbonheur.IdPays AND pays.IdPays=indparite.IdPays AND pays.IdPays=indlibermorale.IdPays AND pays.IdPays=indlibercivile.IdPays AND pays.IdPays=indpaixglobale.IdPays 
						AND indicedemocratie.Annee=".$_GET['annee']." AND indcorruption.Annee=".$_GET['annee']." AND indbonheur.Annee=".$_GET['annee']." AND indparite.Annee=".$_GET['annee']." AND indlibermorale.Annee=".$_GET['annee']." AND indlibercivile.Annee=".$_GET['annee']." AND indpaixglobale.Annee=".$_GET['annee']." ORDER BY ";
						for($i=1; $i<$nbInd; $i++){
							$sql=$sql."Indice".$i." ".$_GET['Ordre'.$i].", ";
						}
						$sql=$sql."Indice".$nbInd." ".$_GET['Ordre'.$nbInd];
						$rep = $bdd->query($sql);
						
						while ($ligne = $rep->fetch()){ ?> <!--Affichage des indices normalisés avec entre parenthèse les valeurs originales-->
							<tr>
								<td><? echo $ligne['NomPaysFR']; ?></td>
								<? for($i=1; $i<=$nbInd; $i++){
									echo '<td '.FondCase($_GET['ClaInd'.$i],$ligne['Indice'.$i]).'>'.$ligne['Indice'.$i].' ( '.$ligne['IndiceOri'.$i].' )</td>';  
								}?>
							</tr>
						<?} 
						$rep->closeCursor();?>
					</tbody>
				</table>
			</div>
			<br />
			

			<div class="ConTab">
				<table>
					<thead>
						<tr class="Gras">
							<th>Nom Continent</th>
							<? for ($i=1; $i<=7; $i++){  /* Affichage du bon nom de l'indice  selon l'ordre choisis par l'utilisateur*/
								echo '<th class="dropdown"> <span>'; 
									if($_GET['ClaInd'.$i]=="indicedemocratie"){echo 'Indice de démocratie';} if ($_GET['ClaInd'.$i]=="indcorruption"){echo 'Indice de corruption';} if ($_GET['ClaInd'.$i]=="indbonheur"){echo 'Indice du bonheur';}
									if ($_GET['ClaInd'.$i]=="indparite"){echo 'Indice de parite';} if ($_GET['ClaInd'.$i]=="indlibermorale"){echo 'Indice de liberte morale';} if ($_GET['ClaInd'.$i]=="indlibercivile"){echo 'Indice de liberte civile';}
									if ($_GET['ClaInd'.$i]=="indpaixglobale"){echo 'Indice de paix';} 
								echo '</span>'; 
								echo '<div class="dropdown-content">
									<p>Valeur Normalisée (Valeur originale)</p>
								</div>';
							echo '</th>';
							}?>
							<th>Nombre de pays</th>
						</tr> 
					</thead>
					<tbody>
						<? 
						$sql2="SELECT continent.NomContinentFR, "; //requete dans le but d'obtenir les valeurs normalisées triées selon l'ordre et l'année choisis pour les continents, les valeurs originales et le nombre de pays par continent
						for($i=1; $i<=$nbInd; $i++){
							$sql2=$sql2."round(avg(".$_GET['ClaInd'.$i].".Valeur),2) AS 'Indice".$i."' , round(avg(".$_GET['ClaInd'.$i].".ValeurOri),2) AS 'IndiceOri".$i."', ";
						}
						$sql2=$sql2."count(pays.IdPays) AS 'NbrPays' ";
						$sql2=$sql2."FROM pays, indicedemocratie, indcorruption, indbonheur, indparite, indlibermorale, indlibercivile, indpaixglobale, continent
						WHERE pays.IdContinent=continent.IdContinent AND pays.IdPays=indicedemocratie.IdPays AND pays.IdPays=indcorruption.IdPays AND pays.IdPays=indbonheur.IdPays AND pays.IdPays=indparite.IdPays AND pays.IdPays=indlibermorale.IdPays AND pays.IdPays=indlibercivile.IdPays AND pays.IdPays=indpaixglobale.IdPays 
						AND indicedemocratie.Annee=".$_GET['annee']." AND indcorruption.Annee=".$_GET['annee']." AND indbonheur.Annee=".$_GET['annee']." AND indparite.Annee=".$_GET['annee']." AND indlibermorale.Annee=".$_GET['annee']." AND indlibercivile.Annee=".$_GET['annee']." AND indpaixglobale.Annee=".$_GET['annee']." 
						GROUP BY continent.IdContinent 
						ORDER BY ";
						for($i=1; $i<$nbInd; $i++){
							$sql2=$sql2."Indice".$i." ".$_GET['Ordre'.$i].", ";
						}
						$sql2=$sql2."Indice".$nbInd." ".$_GET['Ordre'.$nbInd];

						$rep = $bdd->query($sql2);
						$tab = $rep->fetchAll();
						
						for ($i=0; $i<count($tab); $i++){ ?>
							<tr class="Gras">
								<td><? echo $tab[$i]['NomContinentFR']; ?></td>
								<? for($k=1; $k<=$nbInd; $k++){
									echo '<td '.FondCase($_GET['ClaInd'.$k],$tab[$i]['Indice'.$k]).'>'.$tab[$i]['Indice'.$k].' ( '.$tab[$i]['IndiceOri'.$k].' )</td>';
								}?>
								
								<? 
								$temp='Classement.php?annee='.$_GET['annee'].'&'; //lien permettant d'afficher ou non les pays classées selon un continent
								 for($k=1; $k<$nbInd; $k++){
									$temp=$temp.'ClaInd'.$k.'='.$_GET['ClaInd'.$k].'&Ordre'.$k.'='.$_GET['Ordre'.$k].'&';
								}
								$temp=$temp.'ClaInd'.$nbInd.'='.$_GET['ClaInd'.$nbInd].'&Ordre'.$nbInd.'='.$_GET['Ordre'.$nbInd];
								
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
								<td><a href="<? echo $temp;?>"><? echo $tab[$i]['NbrPays']; ?></a></td>
							</tr>
							<? 
							if($_GET['Cont'.$i]=="ok"){ //test si on affiche les pays du continent sélectionné

								$sql3="SELECT pays.NomPaysFR, ";
								for($k=1; $k<$nbInd; $k++){
									$sql3=$sql3.$_GET['ClaInd'.$k].".Valeur AS 'Indice".$k."', ".$_GET['ClaInd'.$k].".ValeurOri AS 'IndiceOri".$k."', ";
								}
								$sql3=$sql3.$_GET['ClaInd'.$nbInd].".Valeur AS 'Indice".$nbInd."' , ".$_GET['ClaInd'.$nbInd].".ValeurOri AS 'IndiceOri".$nbInd."' ";
								$sql3=$sql3."FROM pays, indicedemocratie, indcorruption, indbonheur, indparite, indlibermorale, indlibercivile, indpaixglobale, continent
								WHERE continent.NomContinentFR='".$tab[$i]['NomContinentFR']."' AND pays.IdContinent=continent.IdContinent AND pays.IdPays=indicedemocratie.IdPays AND pays.IdPays=indcorruption.IdPays AND pays.IdPays=indbonheur.IdPays AND pays.IdPays=indparite.IdPays AND pays.IdPays=indlibermorale.IdPays AND pays.IdPays=indlibercivile.IdPays AND pays.IdPays=indpaixglobale.IdPays 
								AND indicedemocratie.Annee=".$_GET['annee']." AND indcorruption.Annee=".$_GET['annee']." AND indbonheur.Annee=".$_GET['annee']." AND indparite.Annee=".$_GET['annee']." AND indlibermorale.Annee=".$_GET['annee']." AND indlibercivile.Annee=".$_GET['annee']." AND indpaixglobale.Annee=".$_GET['annee']." ORDER BY ";
								for($k=1; $k<$nbInd; $k++){
									$sql3=$sql3."Indice".$k." ".$_GET['Ordre'.$k].", ";
								}
								$sql3=$sql3."Indice".$nbInd." ".$_GET['Ordre'.$nbInd];

								$rep2 = $bdd->query($sql3);
								
								while ($ligne2 = $rep2->fetch()){ ?>
									<tr>
										<td><? echo $ligne2['NomPaysFR']; ?></td>
										<? for($k=1; $k<=$nbInd; $k++){
											echo '<td '.FondCase($_GET['ClaInd'.$k],$ligne2['Indice'.$k]).'>'.$ligne2['Indice'.$k].' ( '.$ligne2['IndiceOri'.$k].' )</td>';  
										}?>
									</tr>
								<?}
								$rep2->closeCursor();

								$sql4="SELECT "; //requete pour compter le nombre de pays ayant des valeurs null et donc non pris en compte dans le calcul de l'indice pour le continent
								for($k=1; $k<$nbInd; $k++){
									$sql4=$sql4."SUM(CASE WHEN ".$_GET['ClaInd'.$k].".Valeur IS NULL THEN 1 ELSE 0 END) AS 'Indice".$k."', ";
								}
								$sql4=$sql4."SUM(CASE WHEN ".$_GET['ClaInd'.$nbInd].".Valeur IS NULL THEN 1 ELSE 0 END) AS 'Indice".$nbInd."' ";
								$sql4=$sql4."FROM pays, indicedemocratie, indcorruption, indbonheur, indparite, indlibermorale, indlibercivile, indpaixglobale, continent
								WHERE continent.NomContinentFR='".$tab[$i]['NomContinentFR']."' AND pays.IdContinent=continent.IdContinent AND pays.IdPays=indicedemocratie.IdPays AND pays.IdPays=indcorruption.IdPays AND pays.IdPays=indbonheur.IdPays AND pays.IdPays=indparite.IdPays AND pays.IdPays=indlibermorale.IdPays AND pays.IdPays=indlibercivile.IdPays AND pays.IdPays=indpaixglobale.IdPays 
								AND indicedemocratie.Annee=".$_GET['annee']." AND indcorruption.Annee=".$_GET['annee']." AND indbonheur.Annee=".$_GET['annee']." AND indparite.Annee=".$_GET['annee']." AND indlibermorale.Annee=".$_GET['annee']." AND indlibercivile.Annee=".$_GET['annee']." AND indpaixglobale.Annee=".$_GET['annee'];
								
								$rep3 = $bdd->query($sql4);
								
								while ($ligne3 = $rep3->fetch()){ ?>
									<tr>
										<td>Nombre de pays manquants</td>
										<? for($k=1; $k<=$nbInd; $k++){
											echo '<td>'.$ligne3['Indice'.$k].'</td>';  	
										}?>
									</tr>
									
								<?} 
								$rep3->closeCursor();
							}?>
						<?} 
						$rep->closeCursor();?>
					</tbody>
				</table>
			</div>

		<?}?>
		
		

		
		
	</body>
</html>
























































































