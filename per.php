<?php

require_once 'Excel/reader.php';



// ExcelFile($filename, $encoding);

$data = new Spreadsheet_Excel_Reader();



// Set output Encoding.

$data->setOutputEncoding('gbk');



//”*.xls”是指要导入到mysql中的excel文件

$data->read('重点关注的期刊及会议论文信息汇总.xls');



$db = mysql_connect('localhost', 'root', '') or

die("Could not connect to database.");//连接数据库

//mysql_query("set names 'gbk'");//输出中文

mysql_select_db('mydb');       //选择数据库

//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);

//iconv("UTF-8","gbk//IGNORE",$data);
//mysql_query("SET character_set_connection=gbk, character_set_results=gbk, character_set_client=binary", $db);

for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {

//以下注释的for循环打印excel表数据

/*
 for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {

 echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";

 }

 echo "\n";

 */

//以下代码是将excel表数据插入到mysql中，根据excel表字段的多少，改写以下代码！

$sql="INSERT INTO Journals VALUES('".$data->sheets[0]['cells'][$i][1]."'";

for($j = 2;$j <= $data->sheets[0]['numCols']; $j++){
//iconv("UTF-8","gb2312//IGNORE",$data->sheets[0]['cells'][$i][$j]);
$sql = $sql.",'".$data->sheets[0]['cells'][$i][$j]."'";
}
$sql=$sql.")" ;

//echo $sql.'<br />';

if(mysql_query($sql,$db))
{
//echo "Query successfully!"."<br />";
}
else
{
echo "Error creating database: " . mysql_error()."<br />";
}
}

echo '<br />';

$result=mysql_query("select * from Journals",$db);

echo '<table frame=border border=1 cellspacing=0 >';


/*$str="";

for($i=1;$i<=18;$i++)
{
$str=$str."<th>"."第".$i."列</th>";
}
//echo '<th>第一列</th><th>第二列</th><th>第三列</th>';
echo $str;*/

while($arr = mysql_fetch_assoc($result)){
echo '<tr>';

foreach($arr as $each){
echo '<td>'.$each.'</td>';
}

echo '</tr>';
}

echo '</table>';

echo '<br /><br />';




//第二张表
for ($i = 1; $i <= $data->sheets[1]['numRows']; $i++) {

//以下注释的for循环打印excel表数据

/*
 for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {

 echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";

 }

 echo "\n";

 */

//以下代码是将excel表数据插入到mysql中，根据excel表字段的多少，改写以下代码！

$sql="INSERT INTO Conferences VALUES('".$data->sheets[1]['cells'][$i][1]."'";

for($j = 2;$j <= $data->sheets[1]['numCols']; $j++){
//iconv("UTF-8","gb2312//IGNORE",$data->sheets[0]['cells'][$i][$j]);
$sql = $sql.",'".$data->sheets[1]['cells'][$i][$j]."'";
}
$sql=$sql.")" ;

//echo $sql.'<br />';

if(mysql_query($sql,$db))
{
//echo "Query successfully!"."<br />";
}
else
{
echo "Error creating database: " . mysql_error()."<br />";
}
}

echo '<br />';

$result=mysql_query("select * from Conferences",$db);

echo '<table frame=border border=1 cellspacing=0 >';


/*$str="";

for($i=1;$i<=18;$i++)
{
$str=$str."<th>"."第".$i."列</th>";
}
//echo '<th>第一列</th><th>第二列</th><th>第三列</th>';
echo $str;*/

while($arr = mysql_fetch_assoc($result)){
echo '<tr>';

foreach($arr as $each){
echo '<td>'.$each.'</td>';
}

echo '</tr>';
}

echo '</table>';

echo '<br /><br /> <a href="重点关注的期刊及会议论文信息汇总.xls">点击下载：重点关注的期刊及会议论文信息汇总.xls</a><br /><br />';

?>
