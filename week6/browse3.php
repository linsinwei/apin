<head>
<meta charset="UTF-8">
</head>
<?php
if (isset($_GET["p"])){
    $p = $_GET["p"];
} else {
    $p = 1;
}
mysql_connect('localhost', 'abc', '123');
mysql_select_db('ncue');
mysql_query("SET NAMES UTF8");
$sql = "SELECT * FROM university";
$result = mysql_query($sql);
$rows = mysql_num_rows($result);
mysql_free_result($result);
$start = ($p - 1) * 10;
$sql = "SELECT * FROM university LIMIT " . $start . ",10";
$result = mysql_query($sql);
echo "<TABLE>";
echo "<TR><TD>編號</TD><TD>學校名稱</TD><TD>公/私立</TD><TD>城市</TD><TD>地址</TD><TD>電話</TD><TD>網址</TD><TD>類別</TD><TD></TD></TR>";
while ($row = mysql_fetch_row($result)){
    echo "<form method='POST' action='adm.php'>";
    echo "<TR>";
    echo "<TD><a href='adm.php?id=$row[0]'>" . $row[0] . "</a></TD>";
    echo "<input type='hidden' name='id' value='", $row[0], "''>";
    echo "<TD><input type='text' name='title' value='", $row[1], "'></TD>";
    echo "<TD><input type='text' name='public_private' value='", $row[2], "' SIZE=4></TD>";
    echo "<TD><input type='text' name='city' value='", $row[3], "'SIZE=8></TD>";
    echo "<TD><input type='text' name='address' value='", $row[4], "'></TD>";
    echo "<TD><input type='text' name='tel' value='", $row[5], "' SIZE=12></TD>";
    echo "<TD><input type='text' name='url' value='", $row[6], "' SIZE=40></TD>";
    echo "<TD><input type='text' name='type' value='", $row[7], "' SIZE=8></TD>";
    echo "</TR>";
    echo "</form>";
}
echo "</TABLE>";

echo "<form method='GET' action='browse3.php'>";
echo "<select name='p'>";
for ($i = 1;$i <= ceil($rows / 10);$i++){
    if($i==$p){
        echo "<option value=$i selected>$i";
    }
    else
    echo "<option value=$i>$i";
}
echo "</select>";
echo "<input type='submit'>";
echo "</form>";

echo "<form method='GET' action='add.php'>";
echo "<input type='submit' name='do' value='新增'>";
echo "</form>";
mysql_free_result($result);
mysql_close();
?>
