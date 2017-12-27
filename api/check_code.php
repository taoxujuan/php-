<?php
require('conn.php');
session_start();
if (isset($_GET['action'])) {
	// 注销登录
	if ($_GET['action'] === "logout") {
		unset($_SESSION['id']);
	    unset($_SESSION['username']);
	    unset($_SESSION['token']);
	    $data=array(
	      'success'=>1,
	      'msg'=>"注销成功！"
	    ); 
	    $json_data = json_encode($data);
	    echo "$json_data";
	    exit;
	}
};

$code = trim($_POST['code']);
$username = $_POST['username'];
$password = $_POST['password'];

if(strtolower($code)!==$_SESSION["code_rand"]){
   $data=array(
      'success'=>0,
      'msg'=>"验证码错误"
    ); 
    $json_data = json_encode($data);
    echo "$json_data";
    exit;
}

$check_query =mysql_query("SELECT id FROM user WHERE (name='$username') AND (password='$password') limit 1");

if (strtolower($code)==$_SESSION["code_rand"]) {
	$result = mysql_fetch_array($check_query);
	if ($result) {
		$_SESSION['username']=$username;
		$_SESSION['id']=$result['id'];
		$token = md5(mt_rand(100000,999999).'#$@%!^*'.time());
		$_SESSION['token']=$token;
		$data=array(
	      'success'=>1,
	      'msg'=>"登陆成功",
	      'token'=>$token
	    ); 
	    $json_data = json_encode($data);
	    echo "$json_data";
	    exit;
	} else {
		$data=array(
	      'success'=>0,
	      'msg'=>"用户名或者密码不正确！"
	    ); 
	    $json_data = json_encode($data);
	    echo "$json_data";
	    exit;
	}
};

?>
