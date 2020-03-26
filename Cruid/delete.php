<?php
include 'Connect.php';
$db = new Connect();

if(isset($_GET['id'])){
	$db->delete($_GET['id']);
	header("location: index.php");
}

?>