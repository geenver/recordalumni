<?php

$conn = new mysqli('localhost', 'root', '', 'facultydb');


if($conn->connect_errno){
	echo $db->connect_error;
	//die( '<br />Sorry we are having some problems');

}

?>