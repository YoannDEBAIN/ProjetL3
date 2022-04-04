<?php // content="text/plain; charset=utf-8"

$bdd = new PDO('mysql:host=localhost;dbname=bdprojetl3;charset=utf8','root', 'root'); 

$rep=$bdd->query("SELECT ".$_GET['Indice'].".Valeur, ".$_GET['Indice'].".Annee FROM ".$_GET['Indice']." WHERE ".$_GET['Indice'].".IdPays=".$_GET['IdenPays']);

$col = $rep->fetchAll();


$datax=array();
$datay=array();

for($i=0;$i<count($col);$i++){
	$datay[$i]=$col[$i][0];
	$datax[$i]=$col[$i][1];
}



header("Content-type: image/png");
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');


 
$graph = new Graph(1000,650);
 

$titre="Evolution de l'";
if ($_GET['Indice']=="indicedemocratie"){ $titre.='indice de democratie '; $graph->SetScale("linlin", 0, 100, 2000, 2020); $graph->yaxis->scale->ticks->Set(5);}
if ($_GET['Indice']=="indcorruption"){ $titre.='indice de corruption '; $graph->SetScale("linlin", 0, 100, 2000, 2020);  $graph->yaxis->scale->ticks->Set(5);}
if ($_GET['Indice']=="indbonheur"){ $titre.='indice de bonheur '; $graph->SetScale("linlin", 0, 100, 2000, 2020);  $graph->yaxis->scale->ticks->Set(5);}
if ($_GET['Indice']=="indparite"){ $titre.='indice de parite gouvernementale '; $graph->SetScale("linlin", 0, 100, 2000, 2020);  $graph->yaxis->scale->ticks->Set(5);}
if ($_GET['Indice']=="indlibermorale"){ $titre.='indice de liberte morale '; $graph->SetScale("linlin", 0, 100, 2000, 2020);  $graph->yaxis->scale->ticks->Set(5);}
if ($_GET['Indice']=="indlibercivile"){ $titre.='indice de liberte civile '; $graph->SetScale("linlin", 1, 7, 2000, 2020);  $graph->yaxis->scale->ticks->Set(1);}
if ($_GET['Indice']=="indpaixglobale"){ $titre.='indice de paix globale '; $graph->SetScale("linlin", 1, 5, 2000, 2020);  $graph->yaxis->scale->ticks->Set(0.5);}
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