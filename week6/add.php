<head>
<meta charset="UTF-8">
</head>
<?php
echo "<form method='POST' action='add.php'>";
echo "學校名稱: <input type='text' name='title' ></br>";
echo "公/私立: <TD><input type='text' name='public_private'  SIZE=4></br>";
echo "城市: <input type='text' name='city' SIZE=8></br>";
echo "地址: <input type='text' name='address' ></br>";
echo "電話: <input type='text' name='tel' SIZE=12></br>";
echo "網址: <input type='text' name='url' SIZE=40></br>";
echo "類別: <input type='text' name='type' SIZE=8></br>";
echo "<input type='submit' name='do' value='新增'>";
echo "</form>";
echo "<form method='GET' action='browse3.php'>";
echo "<input type='submit' name='do' value='回主頁'>";
echo "</form>";
if(isset($_POST['title']) && isset($_POST['public_private']) && isset($_POST['city'])  && isset($_POST['address'])  && isset($_POST['tel'])  && isset($_POST['url']) && isset($_POST['type']) )
{
    mysql_connect('localhost', 'abc', '123');
    mysql_select_db('ncue');
    mysql_query("SET NAMES UTF8");

    $sql="INSERT INTO `university`( `title`, `public_private`, `city`, `address`, `tel`, `url`, `type`) VALUES ('".$_POST['title']."','".$_POST['public_private']."','".$_POST['city']."','".$_POST['address']."','".$_POST['tel']."','".$_POST['url']."','".$_POST['type']."')";

    $result = mysql_query($sql);
    mysql_close();

}


?>
