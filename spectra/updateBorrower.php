<?php
	require_once'class.php';
	if(ISSET($_POST['update'])){
		$db=new db_class();
		$borrower_id=$_POST['borrower_id'];
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

		$db->update_borrower($borrower_id,$firstname,$middlename,$lastname,$contact_no,$payment,$email,$idno,$regno,$security,$hostel,$mpesa,$place);
		echo"<script>alert('Update Borrower successfully')</script>";
		echo"<script>window.location='borrower.php'</script>";
	}
?>