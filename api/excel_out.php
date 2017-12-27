<?php
require('conn.php');
// require('check_token.php');
require_once '../lib/Classes/PHPExcel.php';
// require_once 'Classes/PHPExcel/Writer/Excel2007.php'; 
// require_once 'Classes/PHPExcel/Writer/Excel5.php';

error_reporting(E_ALL);  
ini_set('display_errors', TRUE);  
ini_set('display_startup_errors', TRUE);

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

$filename ='商品信息'.date('Ymd').'.xls';
//创建对象  
$excel = new PHPExcel();
// 设置表格样式
$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(20);
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(13);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$excel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

$letter = array('A','B','C','D','E','F','G','H','I','J','K','L');  
//表头数组  
$tableheader = array('商品条码', '商品名称', '商品品牌', '品类编码', '品类名称', '计量单位', '包装单位', '箱规', '保质期', '规格', '建议零售价', '主图地址');  
//填充表头信息  
for($i = 0;$i < count($tableheader);$i++) {  
    $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");  
};
// 获取数据库数据，转为二维数组
while ($data = mysql_fetch_array($result)){
	$dataList[]=$data;
};
//循环插入表格中 
$i = 2;
foreach ($dataList as $key => $value) {
	if(is_array($value)){
		$excel->getActiveSheet()
 	      ->setCellValue("A".$i, $value['bar_code'])
 	      ->setCellValue("B".$i, $value['name'])
 	      ->setCellValue("C".$i, $value['brand_name'])
 	      ->setCellValue("D".$i, $value['category_code'])
 	      ->setCellValue("E".$i, $value['category_name'])
 	      ->setCellValue("F".$i, $value['unit'])
 	      ->setCellValue("G".$i, $value['packing_unit'])
 	      ->setCellValue("H".$i, $value['packing_specification'])
 	      ->setCellValue("I".$i, $value['valid_period'])
 	      ->setCellValue("J".$i, $value['unit_specification'])
 	      ->setCellValue("K".$i, $value['suggested_retail_price'])
 	      ->setCellValue("L".$i, $value['portrait']);
	};
 	$i++;
 };
// 创建Excel输入对象  
$write = new PHPExcel_Writer_Excel5($excel);
ob_end_clean(); 
header("Pragma: public");  
header("Expires: 0");  
header("Cache-Control:must-revalidate, post-check=0, pre-check=0");  
header("Content-Type:application/force-download");  
header("Content-Type:application/vnd.ms-execl");  
header("Content-Type:application/octet-stream");  
header("Content-Type:application/download");;  
header('Content-Disposition:attachment;filename='.$filename);  
header("Content-Transfer-Encoding:binary");  
$write->save('php://output');  

?>