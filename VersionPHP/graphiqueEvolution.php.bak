<?php // content="text/plain; charset=utf-8"

$bdd = new PDO('mysql:host=localhost;dbname=projetl3bd;charset=utf8','root', 'root'); 

$rep=$bdd->query("SELECT ".$_GET['Indice'].".Valeur, ".$_GET['Indice'].".Annee FROM ".$_GET['Indice']." WHERE ".$_GET['Indice'].".IdPays=".$_GET['IdenPays']);

$col = $rep->fetchAll();


$datax=array();
$datay=array();

for($i=0;$i<count($col);$i++){

	$datax[$i]=$col[$i][1];
	$datay[$i]=$col[$i][0];	
	}


header("Content-type: image/png");
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');


 
$graph = new Graph(800,450);
 

$titre="Evolution de l'";
if ($_GET['Indice']=="indicedemocratie"){ $titre.='indice de democratie '; }
if ($_GET['Indice']=="indcorruption"){ $titre.='indice de corruption ';}
if ($_GET['Indice']=="indbonheur"){ $titre.='indice de bonheur '; }
if ($_GET['Indice']=="indparite"){ $titre.='indice de parite gouvernementale '; }
if ($_GET['Indice']=="indlibermorale"){ $titre.='indice de liberte morale '; }
if ($_GET['Indice']=="indlibercivile"){ $titre.='indice de liberte civile ';}
if ($_GET['Indice']=="indpaixglobale"){ $titre.='indice de paix globale ';}
$graph->SetScale("linlin", 0, 100, 2000, 2020);
$graph->yaxis->scale->ticks->Set(5);
$graph->xaxis->scale->ticks->Set(1);
$graph->img->SetMargin(40,40,40,40);        
$graph->SetShadow();
$graph->xgrid->Show();
$graph->title->Set($titre);
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$sp1 = new LinePlot($datay,$datax);
$sp1->mark->SetType(MARK_FILLEDCIRCLE);


$graph->Add($sp1);
$graph->Stroke();

imagepng($graph);

?>