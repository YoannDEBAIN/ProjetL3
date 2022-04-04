<?php // content="text/plain; charset=utf-8"

$bdd = new PDO('mysql:host=localhost;dbname=bdprojetl3;charset=utf8','root', 'root'); 

if($_GET['Ind1']==$_GET['Ind2']){
	$rep = $bdd->query("SELECT ".$_GET['Ind1'].".Valeur, ".$_GET['Ind2'].".Valeur FROM ".$_GET['Ind1']." WHERE ".$_GET['Ind1'].".IdPays=".$_GET['Ind2'].".IdPays AND ".$_GET['Ind1'].".Valeur IS NOT NULL AND ".$_GET['Ind2'].".Valeur IS NOT NULL AND ".$_GET['Ind1'].".Annee=".$_GET['annee']." AND ".$_GET['Ind2'].".Annee=".$_GET['annee']);
}
else{
	$rep = $bdd->query("SELECT ".$_GET['Ind1'].".Valeur, ".$_GET['Ind2'].".Valeur FROM ".$_GET['Ind1'].", ".$_GET['Ind2']." WHERE ".$_GET['Ind1'].".IdPays=".$_GET['Ind2'].".IdPays AND ".$_GET['Ind1'].".Valeur IS NOT NULL AND ".$_GET['Ind2'].".Valeur IS NOT NULL AND ".$_GET['Ind1'].".Annee=".$_GET['annee']." AND ".$_GET['Ind2'].".Annee=".$_GET['annee']);
}


$col = $rep->fetchAll();

$datax=array();
$datay=array();

for($i=0;$i<count($col);$i++){
	$datax[$i]=$col[$i][0];
	$datay[$i]=$col[$i][1];
}


header("Content-type: image/png");
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_scatter.php');

 
$graph = new Graph(1000,650);
/*$graph->SetScale("linlin");*/
 
$graph->img->SetMargin(40,40,40,40);        
$graph->SetShadow();

$titre="Correlation entre ";
if ($_GET['Ind1']=="indicedemocratie"){ $titre.='indice de democratie et ';}
if ($_GET['Ind1']=="indcorruption"){ $titre.='indice de corruption et ';}
if ($_GET['Ind1']=="indbonheur"){ $titre.='indice de bonheur et ';}
if ($_GET['Ind1']=="indparite"){ $titre.='indice de parite gouvernementale et ';}
if ($_GET['Ind1']=="indlibermorale"){ $titre.='indice de liberte morale et ';}
if ($_GET['Ind1']=="indlibercivile"){ $titre.='indice de liberte civile et ';}
if ($_GET['Ind1']=="indpaixglobale"){ $titre.='indice de paix globale et ';}

if ($_GET['Ind2']=="indicedemocratie"){ $titre.='indice de democratie ';}
if ($_GET['Ind2']=="indcorruption"){ $titre.='indice de corruption ';}
if ($_GET['Ind2']=="indbonheur"){ $titre.='indice de bonheur ';}
if ($_GET['Ind2']=="indparite"){ $titre.='indice de parite gouvernementale ';}
if ($_GET['Ind2']=="indlibermorale"){ $titre.='indice de liberte morale ';}
if ($_GET['Ind2']=="indlibercivile"){ $titre.='indice de liberte civile ';}
if ($_GET['Ind2']=="indpaixglobale"){ $titre.='indice de paix globale ';}

$titre.="\nr=".$_GET['cor'];
$graph->title->Set($titre);
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$Xmin=0;
$Xmax=100;
$Xpas=5;

$titrex="";
if ($_GET['Ind1']=="indicedemocratie"){ $titrex.='indice de democratie ';}
if ($_GET['Ind1']=="indcorruption"){ $titrex.='indice de corruption ';}
if ($_GET['Ind1']=="indbonheur"){ $titrex.='indice de bonheur ';}
if ($_GET['Ind1']=="indparite"){ $titrex.='indice de parite gouvernementale ';}
if ($_GET['Ind1']=="indlibermorale"){ $titrex.='indice de liberte morale ';}
if ($_GET['Ind1']=="indlibercivile"){ $titrex.='indice de liberte civile '; $Xmin=1; $Xmax=7; $Xpas=1;}
if ($_GET['Ind1']=="indpaixglobale"){ $titrex.='indice de paix globale '; $Xmin=1; $Xmax=5; $Xpas=0.5;}


$Ymin=0;
$Ymax=100;
$Ypas=5;

$titrey="";
if ($_GET['Ind2']=="indicedemocratie"){ $titrey.='indice de democratie ';}
if ($_GET['Ind2']=="indcorruption"){ $titrey.='indice de corruption ';}
if ($_GET['Ind2']=="indbonheur"){ $titrey.='indice de bonheur ';}
if ($_GET['Ind2']=="indparite"){ $titrey.='indice de parite gouvernementale ';}
if ($_GET['Ind2']=="indlibermorale"){ $titrey.='indice de liberte morale ';}
if ($_GET['Ind2']=="indlibercivile"){ $titrey.='indice de liberte civile '; $Ymin=1; $Ymax=7; $Ypas=1;}
if ($_GET['Ind2']=="indpaixglobale"){ $titrey.='indice de paix globale ';  $Ymin=1; $Ymax=5; $Ypas=0.5;}


 $graph->SetScale("linlin", $Ymin, $Ymax, $Xmin, $Xmax); 
 $graph->yaxis->scale->ticks->Set($Ypas);
 $graph->xaxis->scale->ticks->Set($Xpas);

$graph->xaxis->title->Set($titrex);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->Set($titrey);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
 
$sp1 = new ScatterPlot($datay,$datax);
 
$graph->Add($sp1);
$graph->Stroke();

imagepng($graph);
 
?>