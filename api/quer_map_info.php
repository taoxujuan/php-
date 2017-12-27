<?php
	require('conn.php');
	$jsonpcallback = htmlspecialchars($_REQUEST ['jsonpcallback']);
	$sqList = "select name,jdu,wdu from `data_map_shop` ";
	$res2 = mysqli_query($conn,$sqList);
	if($res2){
		$users=array();
		$i=0;
		while (false!=($row=mysqli_fetch_assoc($res2))){
			$users[$i]=$row;
			$i++;
		}
	}
	$data=array(
	   'code'=>"success",
	   'data'=>$users
	    );
	$json_data = json_encode($data);
	echo $jsonpcallback . "(" . $json_data . ")";


?>
