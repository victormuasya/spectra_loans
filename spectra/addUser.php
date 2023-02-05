<?php
	require_once'class.php';
	if(ISSET($_POST['confirm'])){
		$db=new db_class();
		$username=$_POST['username'];
		$password=$_POST['password'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$duty=$_POST['duty'];
		
		$db->add_user($username,$password,$firstname,$lastname,$duty);
		echo"<script>alert('staff added successfully')</script>";
		echo"<script>window.location='user.php'</script>";
	}
?>