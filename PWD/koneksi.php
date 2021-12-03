<?php 
$host="localhost";
$username="root";
$password="";
$database_name="akademik";
$con=@mysqli_connect($host,$username,$password,$database_name);

if (!$con) {
	echo "Error:" . mysqli_connect_error();
	exit();
}

 ?>