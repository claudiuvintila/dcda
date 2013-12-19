<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');

$ip = $_GET["ip"];
$dateObject = new DateTime();//
$timeStamp = $dateObject->getTimestamp();


$link = mysqli_connect($ip, 'root', 'awppassword','dcda');
if (mysqli_connect_errno()) 
	die('Could not connect: ' . mysql_error());

//echo 'Connected successfully';
//mysql_select_db('dcda') or die('Could not select database');

$dateObject = new DateTime();
$timeStamp = $dateObject->getTimestamp();

$query = 'SELECT * FROM (SELECT timestamp, dau, wau, mau FROM mau_stats where timestamp >='.($timeStamp-100000).' ORDER BY timestamp DESC LIMIT 0,25) a ORDER BY timestamp';
$result = mysqli_query($link,$query);
$datay1 = array();
$datay2 = array();
$datay3 = array();
$labels = array();

while($row = mysqli_fetch_array($result)) {
	$datay1[]=$row['dau'];
	$datay2[]=$row['wau'];
	$datay3[]=$row['mau'];
	$labels[]=date('d/m/y H:',$row['timestamp']).'00(h)';
}


$labels[0] = '';
// Închiderea conexiunii
mysqli_close($link);

// Setup the graph
$graph = new Graph(1000,900);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set($ip);
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($labels);
$graph->xaxis->SetLabelAngle(45);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('DAU');

// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('WAU');

// Create the third line
$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#FF1493");
$p3->SetLegend('MAU');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();
?>
