<?php 
    session_start();
    // 获取请求头传递的token
    $old_token = $_SERVER['HTTP_TOKEN'];
    // 未登录 $_SESSION['token']不存在
    if(!isset($_SESSION['token'])) {
    	$data=array(
	      'success'=>0,
	      'msg'=>"token验证失败请重新登录！"
	    ); 
	    $json_data = json_encode($data);
	    echo "$json_data";
	    exit; 
    };
    // 登录 判断传值与session中是否相等
    if (isset($_SESSION['token'])) {
    	if($_SESSION['token'] != $old_token){  
		    $data=array(
		      'success'=>0,
		      'msg'=>"token验证失败请重新登录！"
		    ); 
		    $json_data = json_encode($data);
		    echo "$json_data";
		    exit;  
		}; 
    };
?>