<?php  
$user = 'root';
$pass = '';
$db = 'coffeebuddy';

$db = mysqli_connect('localhost', $user, $pass, $db) ;
#if($db){
#	echo "connected";
#}else{
#	echo "not connected";
#}
?>