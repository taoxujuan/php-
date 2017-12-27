<?php
require('conn.php');
require('check_token.php');
//$delid = @$_GET['pageSize']; //页面显示条数
$jsonpcallback = htmlspecialchars($_REQUEST ['jsonpcallback']);
$delid = $_GET['id'];
$sqldel = "DELETE FROM `com_commodity` WHERE id = $delid";
//echo "$sqldel";
if(isset($_GET['id'])){
//执行mysql删除;
if(mysql_query($sqldel)){
    $data=array(
    'id'=>$delid,
    'msg'=>1
    ); 
    $json_data = (json_encode($data));
echo $jsonpcallback . "(" . $json_data . ")";
}else{
  $data=array(
    'id'=>$delid,
    'msg'=>0
    );  
}
//返回的json数据
exit ;
}


?>