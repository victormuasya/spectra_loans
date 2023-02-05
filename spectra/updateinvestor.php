<?php
	require_once'class.php';
	if(ISSET($_POST['update'])){
		$db=new db_class();
		$investor_id=$_POST['investor_id'];
		$firstname=$_POST['firstname'];
		$profession=$_POST['profession'];
		$lastname=$_POST['lastname'];
		$contact_no=$_POST['contact_no'];
		$share=$_POST['share'];
		$email=$_POST['email'];
		$idno=$_POST['idno'];
		$date=$_POST['date'];
		$witness=$_POST['witness'];
		$mpesa=$_POST['mpesa'];

		$db->update_investor($investor_id,$firstname,$profession,$lastname,$contact_no,$share,$email,$idno,$date,$witness,$mpesa);
		echo"<script>alert(' okay')</script>";
		echo"<script>window.location='shareholder.php'</script>";
	}
?>