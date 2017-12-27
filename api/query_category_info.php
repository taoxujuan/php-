<?php
require('conn.php');

$sqList = "select * from `com_category` ";
$res2 = mysql_query($sqList);
if($res2)
{
$users=array();
$i=0;
while (false!=($row=mysql_fetch_assoc($res2))){
$users[$i]=$row;
$i++;
}

}

echo json_encode($users);


?>