<html>
<head>
<title>����������������</title>
</head>

<style type="text/css">
div#div1{
    position:fixed;
    top:0;
    left:0;
    bottom:0;
    right:0;
    z-index:-1;
}
div#div1 > img {
    height:100%;
    width:100%;
    border:0;
}         
</style><LINK rel=stylesheet type="text/css" href="css3.css">

<body>
<div id="div1"><img src="bg2.jpg" /></div>

<?php

$db = mysql_connect('localhost', 'root', '') or

die("Could not connect to database.");//�������ݿ�

//mysql_query("set names 'gbk'");//�������

mysql_select_db('mydb');       //ѡ�����ݿ�


$result=mysql_query("select * from conferences limit 17",$db);

echo '<table frame=border border=1 cellspacing=0 >';

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

</body>
</html>
