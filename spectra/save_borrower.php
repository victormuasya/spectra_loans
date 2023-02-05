<?php
	require_once'class.php';
	if(ISSET($_POST['save'])){
		$db=new db_class();
		$firstname=$_POST['firstname'];
		$middlename=$_POST['middlename'];
		$lastname=$_POST['lastname'];
		$contact_no=$_POST['contact_no'];
		$payment=$_POST['payment'];
		$email=$_POST['email'];
		$idno=$_POST['idno'];
		$regno=$_POST['regno'];
		$security=$_POST['security'];
		$hostel=$_POST['hostel'];
		$mpesa=$_POST['mpesa'];
		$place=$_POST['place'];


		



		
		$db->save_borrower($firstname,$middlename,$lastname,$contact_no,$payment,$email,$idno,
		 $regno, $security, $hostel, $mpesa,$place);
		
		header("location: borrower.php");
	}
?>