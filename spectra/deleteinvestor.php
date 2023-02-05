<?php
	require_once'class.php';
	session_start();
	
	if(ISSET($_REQUEST['investor_id'])){
		$investor_id = $_REQUEST['investor_id'];
		$db = new db_class();
		$db->delete_investor($investor_id);
		header('location:shareholder.php');
	}
?>	