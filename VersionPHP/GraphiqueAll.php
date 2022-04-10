<?php // content="text/plain; charset=utf-8" 

/* Connexion à la base de données du projet*/

$bdd = new PDO('mysql:host=localhost;dbname=projetl3bd;charset=utf8','root', 'root'); 


/* Récupération de la reqûete SQL permettant à l'utilisateur de sélectionner l'indice et l'année voulue pour voir son évolution pour un pays*/

$Bonheur=array();
$demo=array();
$paix=array();
$corrup=array();
$civ=array();
$morale=array();
$parite=array();
$datax=array();

for($i=2000;$i<=2020;$i++){
	$rep=$bdd->query("SELECT indbonheur.Valeur AS indiceBonheur, indicedemocratie.Valeur AS indiceDemocratie, 
					indpaixglobale.Valeur AS indicePaixGlobale, indcorruption.Valeur AS indiceCorruption, indlibercivile.Valeur 
					AS indiceLiberteCivile, indlibermorale.Valeur AS indiceLiberteMorale, indparite.Valeur AS indicePariteGouv 
					FROM indbonheur, indicedemocratie, indpaixglobale, indcorruption, indlibercivile, indlibermorale, indparite  
					WHERE indbonheur.IdPays=".$_GET['IdenPays']." AND indparite.IdPays=".$_GET['IdenPays']." 
					AND indpaixglobale.IdPays=".$_GET['IdenPays']." AND indlibermorale.IdPays=".$_GET['IdenPays']." AND indlibercivile.IdPays=".$_GET['IdenPays']." 
					AND indicedemocratie.IdPays=".$_GET['IdenPays']." AND indcorruption.IdPays=".$_GET['IdenPays']. " AND indbonheur.Annee=".$i." AND indicedemocratie.Annee=".$i." 
					AND indpaixglobale.Annee=".$i." AND indcorruption.Annee=".$i." 
					AND indlibercivile.Annee=".$i." AND indlibermorale.Annee=".$i." 
					AND indparite.Annee=".$i);

$col = $rep->fetchAll();

$Bonheur[$i-2000]=$col[0]["indiceBonheur"];
$demo[$i-2000]=$col[0]["indiceDemocratie"];
$paix[$i-2000]=$col[0]["indicePaixGlobale"];
$corrup[$i-2000]=$col[0]["indiceCorruption"];
$civ[$i-2000]=$col[0]["indiceLiberteCivile"];
$morale[$i-2000]=$col[0]["indiceLiberteMorale"];
$parite[$i-2000]=$col[0]["indicePariteGouv"];
$datax[$i-2000]=$i;

}

header("Content-type: image/png");
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');

/* Variable graph contient le graphique d'évolution */
 
$graph = new Graph(800,450);

/* Titre du graphique linéaire s'adaptant selon l'indice choisi par l'utilisateur */
$titre="Evolution de l'";
if ($_GET['Indice']=="indicedemocratie"&$_GET['Indice']=="indcorruption"&$_GET['Indice']=="indbonheur"&$_GET['Indice']=="indparite"&$_GET['Indice']=="indlibermorale"&$_GET['Indice']=="indlibercivile"&$_GET['Indice']=="indpaixglobale"){ $titre.='TOUT '; }

/* Ajustement de la sortie graphique (titre, taille, echelle, polic)e */

$graph->SetScale("linlin", 0, 100, 2000, 2020);
$graph->yaxis->scale->ticks->Set(5);
$graph->xaxis->scale->ticks->Set(1);
$graph->img->SetMargin(40,40,40,40);        
$graph->SetShadow();
$graph->xgrid->Show();
$graph->title->Set("Evolution des differents indices au cours du temps");
$graph->title->SetFont(FF_FONT1,FS_BOLD);


$sp1 = new LinePlot($Bonheur,$datax);
$sp1->mark->SetType(MARK_FILLEDCIRCLE);
$sp1->mark->SetFillColor("green");
$sp1->SetColor("green");
$sp1->SetCenter();

$sp2 = new LinePlot($demo,$datax);
$sp2->mark->SetType(MARK_FILLEDCIRCLE);
$sp2->mark->SetFillColor("red");
$sp2->SetColor("red");
$sp2->SetCenter();

$sp3 = new LinePlot($paix,$datax);
$sp3->mark->SetType(MARK_FILLEDCIRCLE);
$sp3->mark->SetFillColor("black");
$sp3->SetColor("black");
$sp3->SetCenter();

$sp4 = new LinePlot($corrup,$datax);
$sp4->mark->SetType(MARK_FILLEDCIRCLE);
$sp4->mark->SetFillColor("gray");
$sp4->SetColor("gray");
$sp4->SetCenter();

$sp5 = new LinePlot($civ,$datax);
$sp5->mark->SetType(MARK_FILLEDCIRCLE);
$sp5->mark->SetFillColor("yellow");
$sp5->SetColor("yellow");
$sp5->SetCenter();

$sp6 = new LinePlot($morale,$datax);
$sp6->mark->SetType(MARK_FILLEDCIRCLE);
$sp6->mark->SetFillColor("blue");
$sp6->SetColor("blue");
$sp6->SetCenter();

$sp7 = new LinePlot($parite,$datax);
$sp7->mark->SetType(MARK_FILLEDCIRCLE);
$sp7->mark->SetFillColor("orange");
$sp7->SetColor("orange");
$sp7->SetCenter();

$graph->Add($sp1);
$graph->Add($sp2);
$graph->Add($sp3);
$graph->Add($sp4);
$graph->Add($sp5);
$graph->Add($sp6);
$graph->Add($sp7);
$graph->Stroke();

/* Transforme la variable graph en image png*/

imagepng($graph);

?>
