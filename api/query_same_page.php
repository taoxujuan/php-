<?php
require('conn.php');
require('check_token.php');

$sqlCount = "select COUNT(id) from `com_commodity` where bar_code in (select bar_code from `com_commodity` group by bar_code having count(bar_code) > 1)";
//echo "$sqlCount";
$pageSize = @$_GET['pageSize']; //页面显示条数
$rowCount = 0; 
$res1 = mysql_query($sqlCount);
//取出数据条数
if(false!=($row=mysql_fetch_row($res1))){
$rowCount = $row[0];
}
//总页数,通过计算得到
$pageCount = 0;
$pageCount = ceil($rowCount/$pageSize);
//获取当前页
if(!isset($_GET['pageNumber'])){ // 当 get/post都为空的时候赋默认值1
$pageNow = 1; //当前页数
}elseif(false!=is_numeric($_GET['pageNumber']) && $_GET['pageNumber']<=$pageCount){
$pageNow = $_GET['pageNumber'];
}else{
header("Location: ../Error/error.php");
exit();
}
//打印分页数据
$sqListlimit = " limit " .($pageNow-1)*$pageSize.",".$pageSize ;
$sqsameList = "select * from `com_commodity` where bar_code in (select bar_code from `com_commodity` group by bar_code having count(bar_code) > 1) order by bar_code";
$sqsameList = $sqsameList . $sqListlimit;
//echo "$sqsameList";
$res2 = mysql_query($sqsameList);
if($res2)
{
$users=array();
$i=0;
while (false!=($row=mysql_fetch_assoc($res2))){
$users[$i]=$row;
$i++;
}
$data = array(
       // "code" => "0",        //
        //"msg" => "",        //每页条数
        "total" => $rowCount,  //总页数
        "rows" => $users       //列表
);
echo json_encode($data);
}

?>