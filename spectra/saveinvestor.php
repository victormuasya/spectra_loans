<?php
	require_once'class.php';
	if(ISSET($_POST['save'])){
		$db=new db_class();
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


		



		
		$db->save_investor($firstname,$profession,$lastname,$contact_no,$share,$email,$idno,
		 $date, $witness, $mpesa);
		
		header("location: shareholder.php");
	}
?>