<?php // content="text/plain; charset=utf-8"

$bdd = new PDO('mysql:host=localhost;dbname=projetl3bd;charset=utf8','root', 'root'); 

/* Gestion du cas où l'utilisateur choisir 2 mêmes indices à correler pour une année*/
if($_GET['Ind1']==$_GET['Ind2']){
	$rep = $bdd->query("SELECT ".$_GET['Ind1'].".Valeur, ".$_GET['Ind2'].".Valeur FROM ".$_GET['Ind1']." WHERE ".$_GET['Ind1'].".IdPays=".$_GET['Ind2'].".IdPays AND ".$_GET['Ind1'].".Valeur IS NOT NULL AND ".$_GET['Ind2'].".Valeur IS NOT NULL AND ".$_GET['Ind1'].".Annee=".$_GET['annee']." AND ".$_GET['Ind2'].".Annee=".$_GET['annee']);
}
else{
	$rep = $bdd->query("SELECT ".$_GET['Ind1'].".Valeur, ".$_GET['Ind2'].".Valeur FROM ".$_GET['Ind1'].", ".$_GET['Ind2']." WHERE ".$_GET['Ind1'].".IdPays=".$_GET['Ind2'].".IdPays AND ".$_GET['Ind1'].".Valeur IS NOT NULL AND ".$_GET['Ind2'].".Valeur IS NOT NULL AND ".$_GET['Ind1'].".Annee=".$_GET['annee']." AND ".$_GET['Ind2'].".Annee=".$_GET['annee']);
}
/* Récupération des données de l'indice 1 et 2 dans un tableau */

$col = $rep->fetchAll();

$datax=array();
$datay=array();

for($i=0;$i<count($col);$i++){
	$datay[$i]=$col[$i][1];
	$datax[$i]=$col[$i][0];
}


/* Import de la librairie jpgraph pour créer un nuage de points */

header("Content-type: image/png");
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_scatter.php');

/* Variable graph contient le graphique de corrélation */

$graph = new Graph(800,450);
 
$graph->img->SetMargin(40,40,40,40);        
$graph->SetShadow();

/* Titre du nuage de point s'adaptant selon les indices choisis par l'utilisateur */

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

/* Ajout de la valeur du coefficient de corrélation r obtenue dans le titre du graphique */

$titre.="\nr=".$_GET['cor'];
$graph->title->Set($titre);
$graph->title->SetFont(FF_FONT1,FS_BOLD);

/* Axe correspondant à l'indice 1 choisi */

$titrex="";
if ($_GET['Ind1']=="indicedemocratie"){ $titrex.='indice de democratie ';}
if ($_GET['Ind1']=="indcorruption"){ $titrex.='indice de corruption ';}
if ($_GET['Ind1']=="indbonheur"){ $titrex.='indice de bonheur ';}
if ($_GET['Ind1']=="indparite"){ $titrex.='indice de parite gouvernementale ';}
if ($_GET['Ind1']=="indlibermorale"){ $titrex.='indice de liberte morale ';}
if ($_GET['Ind1']=="indlibercivile"){ $titrex.='indice de liberte civile ';}
if ($_GET['Ind1']=="indpaixglobale"){ $titrex.='indice de paix globale '; }

/* Axe correspondant à l'indice 2 choisi */

$titrey="";
if ($_GET['Ind2']=="indicedemocratie"){ $titrey.='indice de democratie ';}
if ($_GET['Ind2']=="indcorruption"){ $titrey.='indice de corruption ';}
if ($_GET['Ind2']=="indbonheur"){ $titrey.='indice de bonheur ';}
if ($_GET['Ind2']=="indparite"){ $titrey.='indice de parite gouvernementale ';}
if ($_GET['Ind2']=="indlibermorale"){ $titrey.='indice de liberte morale ';}
if ($_GET['Ind2']=="indlibercivile"){ $titrey.='indice de liberte civile '; }
if ($_GET['Ind2']=="indpaixglobale"){ $titrey.='indice de paix globale '; } 

/* Ajustement de la sortie graphique (titre, taille, echelle, police */

$graph->SetScale("linlin", 0, 100, 0, 100);
$graph->yaxis->scale->ticks->Set(5);
$graph->xaxis->scale->ticks->Set(5);

$graph->xaxis->title->Set($titrex);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->Set($titrey);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);


/* Création du nuage de points avec les données des indices et année choisies*/

$sp1 = new ScatterPlot($datay,$datax);
 
$graph->Add($sp1);
$graph->Stroke();

/* Transforme la variable graph en image png*/

imagepng($graph);
 
?>