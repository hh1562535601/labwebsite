<?php

require_once 'Excel/reader.php';



// ExcelFile($filename, $encoding);

$data = new Spreadsheet_Excel_Reader();



// Set output Encoding.

$data->setOutputEncoding('gbk');



//��*.xls����ָҪ���뵽mysql�е�excel�ļ�

$data->read('�ص��ע���ڿ�������������Ϣ����.xls');



$db = mysql_connect('localhost', 'root', '') or

die("Could not connect to database.");//�������ݿ�

//mysql_query("set names 'gbk'");//�������

mysql_select_db('mydb');       //ѡ�����ݿ�

//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);

//iconv("UTF-8","gbk//IGNORE",$data);
//mysql_query("SET character_set_connection=gbk, character_set_results=gbk, character_set_client=binary", $db);

for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {

//����ע�͵�forѭ����ӡexcel������

/*
 for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {

 echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";

 }

 echo "\n";

 */

//���´����ǽ�excel�����ݲ��뵽mysql�У�����excel���ֶεĶ��٣���д���´��룡

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
$str=$str."<th>"."��".$i."��</th>";
}
//echo '<th>��һ��</th><th>�ڶ���</th><th>������</th>';
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




//�ڶ��ű�
for ($i = 1; $i <= $data->sheets[1]['numRows']; $i++) {

//����ע�͵�forѭ����ӡexcel������

/*
 for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {

 echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";

 }

 echo "\n";

 */

//���´����ǽ�excel�����ݲ��뵽mysql�У�����excel���ֶεĶ��٣���д���´��룡

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
$str=$str."<th>"."��".$i."��</th>";
}
//echo '<th>��һ��</th><th>�ڶ���</th><th>������</th>';
echo $str;*/

while($arr = mysql_fetch_assoc($result)){
echo '<tr>';

foreach($arr as $each){
echo '<td>'.$each.'</td>';
}

echo '</tr>';
}

echo '</table>';

echo '<br /><br /> <a href="�ص��ע���ڿ�������������Ϣ����.xls">������أ��ص��ע���ڿ�������������Ϣ����.xls</a><br /><br />';

?>
