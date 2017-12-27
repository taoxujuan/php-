<?php
require('conn.php');
require('check_token.php');

$pageSize = @$_GET['pageSize']; //页面显示条数
$rowCount = 0; //数据总条数,从数据库获得
$sqlCount = "select count(id) from `com_commodity`";
if (isset($_GET['searchText']) && isset($_GET['category_code'])) {
    $name = $_GET['searchText'];
    $category_code = $_GET['category_code'];
    if ($name && $category_code) {
        $sqlCount = $sqlCount . "where name like '%$name%' and category_code = '$category_code'";
    }elseif($name && !$category_code){
        $sqlCount = $sqlCount . "where name like '%$name%'";
    }elseif(!$name && $category_code){
        $sqlCount = $sqlCount . "where category_code = '$category_code'";
    }
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
  exit();
}
//打印分页数据
$sqListlimit = " limit " .($pageNow-1)*$pageSize.",".$pageSize ;
$sqList = "select * from `com_commodity`";

if (isset($_GET['searchText']) && isset($_GET['category_code'])) {
    $name = $_GET['searchText'];
    $category_code = $_GET['category_code'];
    if ($name && $category_code) {
        $sqList = $sqList . "where name like '%$name%' and category_code = '$category_code'";
    }elseif($name && !$category_code){
        $sqList = $sqList . "where name like '%$name%'";
    }elseif(!$name && $category_code){
        $sqList = $sqList . "where category_code = '$category_code'";
    }
    $sqList = $sqList . $sqListlimit;
} elseif (!isset($_GET['searchText']) && !isset($_GET['category_code'])) {
    $sqList = $sqList . $sqListlimit;
}

$res2 = mysql_query($sqList);
if($res2){
    $users=array();
    $i=0;
    while (false!=($row=mysql_fetch_assoc($res2))){
        $users[$i]=$row;
        $i++;
    }
    $data = array(
        "total" => $rowCount,  //总页数
        "rows" => $users       //列表
    );
    echo json_encode($data);
}

?>