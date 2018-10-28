<head>
<meta charset="UTF-8">
</head>
<?php
mysql_connect('localhost', 'abc', '123');
mysql_select_db('ncue');
mysql_query("SET NAMES UTF8");


if (isset($_POST["do"]) && isset($_POST["id"]))
{
	$do = $_POST["do"];
	$id = $_POST["id"];
	if ($do == '修改'){
	    $title = $_POST["title"];
	    $public_private = $_POST["public_private"];
	    $city = $_POST["city"];
	    $address = $_POST["address"];
	    $tel = $_POST["tel"];
	    $url = $_POST["url"];
	    $type = $_POST["type"];
	    $sql = "UPDATE university SET title='" . $title . "', public_private='" . $public_private . "', city='" . $city . "', address='" . $address . "', tel='" . $tel . "', url='" . $url . "', type='" . $type . "' WHERE id='" . $id . "'";
	    mysql_query($sql);
	}
	if ($do == '刪除'){
	    $sql = "DELETE FROM university WHERE id='" . $id . "'";
	    mysql_query($sql);
	    header("Location: browse3.php");
	}
}

if (isset($_GET['id'])){
	$id=$_GET['id'];
}
else
{
	$id=$_POST['id'];
}
$sql = "SELECT * FROM university where id=".$id;
$result = mysql_query($sql);
while ($row=mysql_fetch_row($result))
{
	echo "<form method='POST' action='adm.php'>";
    echo "ID: " . $row[0] . "</br>";
    echo "<input type='hidden' name='id' value='", $row[0], "'></br>";
    echo "學校名稱: <input type='text' name='title' value='", $row[1], "'></br>";
    echo "公/私立: <input type='text' name='public_private' value='", $row[2], "' SIZE=4></br>";
    echo "城市: <input type='text' name='city' value='", $row[3], "' SIZE=8></br>";
    echo "地址: <input type='text' name='address' value='", $row[4], "'></br>";
    echo "電話: <input type='text' name='tel' value='", $row[5], "' SIZE=12></br>";
    echo "網址: <input type='text' name='url' value='", $row[6], "' SIZE=40></br>";
    echo "類別: <input type='text' name='type' value='", $row[7], "' SIZE=8></br>";
    echo "<input type='submit' name='do' value='修改'>";
    echo "<input type='submit' name='do' value='刪除'>";
    echo "</form>";
}
echo "<form method='GET' action='browse3.php'>";
echo "<input type='submit' name='do' value='回主頁'>";
echo "</form>";
?>
