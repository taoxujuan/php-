<?php
require('conn.php');
require('check_token.php');
$jsonpcallback = htmlspecialchars($_REQUEST ['jsonpcallback']);
/*
  `category_code`  '商品品类',`category_name`  '品类名称',`brand_name`  '品牌名称', `name`  '商品名称',
  `description`  '商品简介', `unit`  '计量单位',`packing_unit`  '包装单位',`packing_specification`  '包装规格',`suggested_retail_price`  '建议零售价',`valid_period`'保质期',`portrait` '主图地址',`unit_specification`  '规格',
*/
$bar_code = !empty($_REQUEST['bar_code']) ? $_REQUEST['bar_code'] : null;
$category_code = !empty($_REQUEST['category_code']) ? $_REQUEST['category_code'] : null;
$category_name = !empty($_REQUEST['category_name']) ? $_REQUEST['category_name'] : null;
$name = !empty($_REQUEST['name']) ? $_REQUEST['name'] : null;
$brand_name = !empty($_REQUEST['brand_name']) ? $_REQUEST['brand_name'] : null;
$unit = !empty($_REQUEST['unit']) ? $_REQUEST['unit'] : null;
$portrait = !empty($_REQUEST['portrait']) ? $_REQUEST['portrait'] : null;
$packing_unit = !empty($_REQUEST['packing_unit']) ? $_REQUEST['packing_unit'] : null;
$packing_specification = !empty($_REQUEST['packing_specification']) ? $_REQUEST['packing_specification'] : null;
$unit_specification = !empty($_REQUEST['unit_specification']) ? $_REQUEST['unit_specification'] : null;
$valid_period = !empty($_REQUEST['valid_period']) ? $_REQUEST['valid_period'] : null;
$suggested_retail_price = !empty($_REQUEST['suggested_retail_price']) ? $_REQUEST['suggested_retail_price'] : null;

if (!isset($bar_code)) {
    $data=array(
       'bar_code'=>"0",
       'msg'=>"error"
        ); 
      $json_data = json_encode($data);
      echo "$json_data";
    exit;
  }

$insert_query = "INSERT INTO `com_commodity` (bar_code, category_code, category_name, brand_name, name, unit, packing_unit, portrait, packing_specification, valid_period, suggested_retail_price, unit_specification) VALUES ('$bar_code','$category_code','$category_name','$brand_name','$name','$unit','$packing_unit','$portrait','$packing_specification','$valid_period','$suggested_retail_price','$unit_specification')";

if (isset($bar_code)) {
  mysql_query($insert_query);
  if (mysql_affected_rows() != 1) {
    $data=array(
       'bar_code'=>$bar_code,
       'msg'=>0
        ); 
      $json_data = json_encode($data);
      echo "$json_data";
  } else {
    $data=array(
    'bar_code'=>$bar_code,
    'msg'=>1
    ); 
    $json_data = (json_encode($data));
    echo $jsonpcallback . "(" . $json_data . ")";
  }
}

exit ;

?>