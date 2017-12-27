<?php
 header("content-Type: text/html; charset=utf-8");//字符编码设置  
$servername = "127.0.0.1";  
$username = "root";  
$password = "";  
$dbname = "test";  
$conn= mysql_connect($servername, $username, $password) or die("Opps some thing went wrong");
mysql_query('set names utf8',$conn);
mysql_select_db("weixin") or die("Opps some thing went wrong");
//$result=mysql_query($sql);
?>