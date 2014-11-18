<html>
<head>
<title>计算机网络领域会议</title>
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

die("Could not connect to database.");//连接数据库

//mysql_query("set names 'gbk'");//输出中文

mysql_select_db('mydb');       //选择数据库


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

echo '<br /><br /> <a href="重点关注的期刊及会议论文信息汇总.xls">点击下载：重点关注的期刊及会议论文信息汇总.xls</a><br /><br />';

?>

</body>
</html>
