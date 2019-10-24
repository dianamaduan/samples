<?php
$db=new mysqli("localhost","root","","madmovie");

if ($db->connect_error){
	echo $db->connect_error ;
}

?>