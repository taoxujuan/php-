<?php
require('conn.php');
require('check_token.php');
$jsonpcallback = htmlspecialchars($_REQUEST ['jsonpcallback']);
//$jsonpcallback = "huwei";
/*
  `category_code`  '商品品类',`category_name`  '品类名称',`brand_name`  '品牌名称', `name`  '商品名称',
  `description`  '商品简介', `unit`  '计量单位',`packing_unit`  '包装单位',`packing_specification`  '包装规格',`suggested_retail_price`  '建议零售价',`valid_period`'保质期',`portrait` '主图地址',`unit_specification`  '规格',
*/
$updata_id = !empty($_REQUEST['id']) ? $_REQUEST['id'] : null;
$category_code = !empty($_REQUEST['category_code']) ? $_REQUEST['category_code'] : null;
$category_name = !empty($_REQUEST['category_name']) ? $_REQUEST['category_name'] : null;
$name = !empty($_REQUEST['name']) ? $_REQUEST['name'] : null;
$brand_name = !empty($_REQUEST['brand_name']) ? $_REQUEST['brand_name'] : null;
$unit = !empty($_REQUEST['unit']) ? $_REQUEST['unit'] : null;
$portrait = !empty($_REQUEST['portrait']) ? $_REQUEST['portrait'] : null;
$packing_unit = !empty($_REQUEST['packing_unit']) ? $_REQUEST['packing_unit'] : null;
$unit_specification = !empty($_REQUEST['unit_specification']) ? $_REQUEST['unit_specification'] : null;
$valid_period = !empty($_REQUEST['valid_period']) ? $_REQUEST['valid_period'] : null;
	if (!isset($updata_id)) {
		$data=array(
       'id'=>"没有id号",
       'msg'=>"error0000"
        ); 
      $json_data = json_encode($data);
      echo "$json_data";
		exit;
	}
//更新sql条件
$updata_query = "UPDATE `com_commodity` SET category_code='$category_code', category_name='$category_name', brand_name='$brand_name', name='$name', unit='$unit', packing_unit='$packing_unit', portrait='$portrait', valid_period='$valid_period', unit_specification='$unit_specification' WHERE ID='$updata_id'";
//$updata_query = "UPDATE `com_commodity` SET ()";
//echo "$updata_query";
//执行mysql更新;
if (isset($updata_id)) {
	mysql_query($updata_query);
    if(mysql_affected_rows() != 1){
    	$data=array(
        'id'=>$updata_id,
        'msg'=>"没有修改数据"
        ); 
          $json_data = json_encode($data);
          echo "$json_data";
    }else{
        $data=array(
        'id'=>$updata_id,
        'msg'=>"session"
        ); 
        $json_data = (json_encode($data));
        echo $jsonpcallback . "(" . $json_data . ")";
    }
}
//返回的json数据
exit ;

?>