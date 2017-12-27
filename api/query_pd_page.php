<?php
require('conn.php');
require('check_token.php');

$pageSize = @$_GET['pageSize']; //页面显示条数
$rowCount = 0; //数据总条数,从数据库获得
$sqlCount = "select count(id) from `com_commodity`";
if(isset($_GET['searchText'])){
    //echo "有";
    $name = $_GET['searchText'];
    //echo "$name";
    //echo "where name like '%$name%'";
	$sqlCount = $sqlCount . " where name like '%$name%' ";

	//echo "$sqlCount";
}
elseif (!isset($_GET['searchText'])){
//echo "没有";
}

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
//$sqList = "select * from `com_pool` limit ".($pageNow-1)*$pageSize.",".$pageSize;
$sqListlimit = " limit " .($pageNow-1)*$pageSize.",".$pageSize ;
//echo "$sqListlimit";
$sqList = "select * from `com_commodity`";
if(isset($_GET['searchText'])){
   // echo "有";
    $name = $_GET['searchText'];
	$sqList = $sqList . " where name like '%$name%'";
	$sqList = $sqList . $sqListlimit;
	//echo "$sqList";
}
elseif (!isset($_GET['searchText'])){
//echo "没有";	
	$sqList = $sqList . $sqListlimit;
	//echo "$sqList";
}
$res2 = mysql_query($sqList);
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