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
require_once ('jpgraph/src/jpgraph_plotline.php');

/* Variable graph contient le graphique d'évolution */
 
$graph = new Graph(800,450);

/* Titre du graphique linéaire s'adaptant selon l'indice choisi par l'utilisateur */


/* Ajustement de la sortie graphique (titre, taille, echelle, polic)e */

$graph->SetScale("linlin", 0, 100, 2000, 2020);
$graph->yaxis->scale->ticks->Set(5);
$graph->xaxis->scale->ticks->Set(1);
$graph->img->SetMargin(40,40,40,60);        
$graph->SetShadow();
$graph->xgrid->Show();
$graph->title->Set("Evolution des differents indices au cours du temps");
$graph->title->SetFont(FF_FONT1,FS_BOLD);


$sp1 = new LinePlot($Bonheur,$datax);

$sp2 = new LinePlot($demo,$datax);


$sp3 = new LinePlot($paix,$datax);

$sp4 = new LinePlot($corrup,$datax);

$sp5 = new LinePlot($civ,$datax);

$sp6 = new LinePlot($morale,$datax);

$sp7 = new LinePlot($parite,$datax);

$graph->Add($sp1);
$sp1->SetColor("#42A5F5");
$sp1->SetWeight(2);
$sp1->SetStyle('solid');
$sp1->mark->SetType(MARK_FILLEDCIRCLE);
$sp1->mark->SetFillColor("#42A5F5");
$sp1->SetLegend ("Bonheur");

$graph->Add($sp2);
$sp2->mark->SetType(MARK_FILLEDCIRCLE);
$sp2->mark->SetFillColor("red");
$sp2->SetColor("red");
$sp2->SetLegend ("Demo");
$sp2->SetWeight(2);
$sp2->SetStyle('solid');

$graph->Add($sp3);
$sp3->mark->SetType(MARK_FILLEDCIRCLE);
$sp3->mark->SetFillColor("black");
$sp3->SetColor("black");
$sp3->SetWeight(2);
$sp3->SetStyle('solid');
$sp3->SetLegend ("paix");



$graph->Add($sp4);
$sp4->mark->SetType(MARK_FILLEDCIRCLE);
$sp4->mark->SetFillColor("gray");
$sp4->SetColor("gray");
$sp4->SetLegend ("corrup");
$sp4->SetWeight(2);
$sp4->SetStyle('solid');

$graph->Add($sp5);
$sp5->mark->SetType(MARK_FILLEDCIRCLE);
$sp5->mark->SetFillColor("purple");
$sp5->SetColor("purple");
$sp5->SetWeight(2);
$sp5->SetStyle('solid');
$sp5->SetLegend ("civ");

$graph->Add($sp6);
$sp6->mark->SetType(MARK_FILLEDCIRCLE);
$sp6->mark->SetFillColor("blue");
$sp6->SetColor("blue");
$sp6->SetWeight(2);
$sp6->SetStyle('solid');
$sp6->SetLegend ("morale");


$graph->Add($sp7);
$sp7->mark->SetType(MARK_FILLEDCIRCLE);
$sp7->mark->SetFillColor("#18FFFF");
$sp7->SetColor("#18FFFF");
$sp7->SetWeight(2);
$sp7->SetStyle('solid');
$sp7->SetLegend ("parite");

$graph ->legend->SetPos(0.5,0.98,'center','bottom');
$graph ->legend->SetColumns(7);
$graph->Stroke();

/* Transforme la variable graph en image png*/

imagepng($graph);

?>
