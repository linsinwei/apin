<?php // content="text/plain; charset=utf-8"
//header('Content-Type: text/html; charset=utf-8');
require_once ('../jpgraph/jpgraph.php');
require_once ('../jpgraph/jpgraph_bar.php');

	$link = mysql_connect("localhost","abc","123");
	if ($link){
		
		$selectDB = mysql_select_db("ncue");
		mysql_set_charset('utf8',$link);
		
		$sql = "SELECT city,count(*) as VoteCount FROM `math` group by city";
		$query = mysql_query($sql);
		while($row = mysql_fetch_row($query)){
			$voteCount[] = $row[1];
			//$locale[] = iconv("big5", "UTF-8", $row[0]);			
			$locale[] = $row[0]; 
			//echo $row[0];
		}
		
		
		
		
		//$datay=array(12,8,19,3);

		// Create the graph. These two calls are always required
		$graph = new Graph(300,200);
		$graph->clearTheme();	
		$graph->SetScale("textlin");

		// Add a drop shadow
		$graph->SetShadow();

		// Adjust the margin a bit to make more room for titles
		$graph->img->SetMargin(40,30,20,40);

		// Create a bar pot
		$bplot = new BarPlot($voteCount);

		// Adjust fill color
		$bplot->SetFillColor('orange');
		$bplot->SetWidth(1);
		$graph->Add($bplot);

		// Setup the titles
		$graph->title->Set("City Distribution");
		$graph->xaxis->title->Set("City");
		$graph->yaxis->title->Set("People");

		$graph->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->xaxis->SetFont(FF_CHINESE, FS_NORMAL);
		
		//$graph->xaxis->TickLabels->SetFont(FF_CHINESE, FS_NORMAL);

		$graph->xaxis->SetTickLabels($locale);

		// Display the graph
		$graph->Stroke();
		
		
		
	}

?>
