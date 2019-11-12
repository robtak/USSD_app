<?php

$connection = mysqli_connect('localhost','root','');
if (!$connection){
	die('Database Connection Failed');
}

$db_select = mysqli_select_db($connection, 'nca_std_db');
if (!$db_select){
	die('Database Selection Failed.');
}

?>