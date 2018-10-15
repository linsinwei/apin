<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>city vote</title>
</head>
<body>
<style>
    #ip{
        width:300px;
    }
    #city{
        width:300px;
    }
</style>
<form action="index.php" method="post">
    <label for="ip">IP:</label>
    <input id="ip" type="text" name="ip" placeholder="please type your ip address" />
    <br/>
    <label for="city">City:</label>
    <input id="city" type="text" name="city" placeholder="please type your favorite city name"/>
    <br/>
    <input type="submit" value="vote" />
</form>




<?php
if (!empty($_POST["ip"]) && !empty($_POST["city"]))
{
	$ip = $_POST["ip"];
	$city = $_POST["city"];
	
	$link = mysql_connect("localhost","abc","123");
	if ($link){
		$selectDB = mysql_select_db("ncue");
		mysql_set_charset('utf8',$link);
		
		$sql_getRecords = "select * from `ncue`.`math` where ip = '$ip'";
		$query_Records = mysql_query($sql_getRecords);
		$num_rows = mysql_num_rows($query_Records);
		if ($num_rows == 0)
		{		
			$sql = "INSERT INTO  `ncue`.`math` (`ip` ,`city`)VALUES('$ip',  '$city')";
			mysql_query($sql);	
			
			mysql_free_result($query_Records);		
			
			echo 'vote done.';
		}
		else{
			echo 'You was voted.';			
		}
	}
	
	mysql_close($link);
}
?>

<br/>
<img src="vote_graph.php"/>
</body>
</html>