<?php
require('conn.php');
// require('check_token.php');

$sql_out = "select * from `com_commodity`";

if (isset($_GET['searchText']) && isset($_GET['category_code'])) {
    $name = $_GET['searchText'];
    $category_code = $_GET['category_code'];
    if ($name && $category_code) {
        $sql_out = $sql_out . "where name like '%$name%' and category_code = '$category_code'";
    }elseif($name && !$category_code){
        $sql_out = $sql_out . "where name like '%$name%'";
    }elseif(!$name && $category_code){
        $sql_out = $sql_out . "where category_code = '$category_code'";
    }else{
    	$sql_out = $sql_out;
    }
}

$result = mysql_query($sql_out);
$str = "商品条码\t商品名称\t商品品牌\t品类编码\t品类名称\t计量单位\t包装单位\t箱规\t保质期\t规格\t建议零售价\t主图地址\t\n"; 
$str = iconv('utf-8','GB2312//IGNORE',$str);
while($row=mysql_fetch_array($result)){
	$bar_code = iconv('utf-8','GB2312//IGNORE',$row['bar_code']);
	$name = iconv('utf-8','GB2312//IGNORE',$row['name']);
	$brand_name = iconv('utf-8','GB2312//IGNORE',$row['brand_name']);
	$category_code = iconv('utf-8','GB2312//IGNORE',$row['category_code']);
	$category_name = iconv('utf-8','GB2312//IGNORE',$row['category_name']);
	$unit = iconv('utf-8','GB2312//IGNORE',$row['unit']);
	$packing_unit = iconv('utf-8','GB2312//IGNORE',$row['packing_unit']);
	$packing_specification = iconv('utf-8','GB2312//IGNORE',$row['packing_specification']);
	$valid_period = iconv('utf-8','GB2312//IGNORE',$row['valid_period']);
	$unit_specification = iconv('utf-8','GB2312//IGNORE',$row['unit_specification']);
	$suggested_retail_price = iconv('utf-8','GB2312//IGNORE',$row['suggested_retail_price']);
	$portrait = iconv('utf-8','GB2312//IGNORE',$row['portrait']);
	$str .=$bar_code."\t". $name."\t".$brand_name."\t".$category_code."\t".$category_name."\t".$unit."\t".$packing_unit."\t".$packing_specification."\t".$valid_period."\t".$unit_specification."\t".$suggested_retail_price."\t".$portrait."\t\n";
}
//文件名
$filename ='商品信息' .date('Ymd').'.xls';
exportExcel($filename,$str);
function exportExcel($filename,$content)
{
	ob_end_clean();//清除缓冲区,避免乱码 
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Type: application/vnd.ms-execl");
	header("Content-Type: application/force-download");
	header("Content-Type: application/download");
	header("Content-Disposition: attachment; filename=".$filename);
	header("Content-Transfer-Encoding: binary");
	header("Pragma: no-cache");
	header("Expires: 0");
	exit($content);
}

?>