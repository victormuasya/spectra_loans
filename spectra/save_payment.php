<?php
	date_default_timezone_set("Etc/GMT+8");
	require_once'class.php';
	if(ISSET($_POST['save'])){
		$db=new db_class();
		$name=$_POST['name'];
		$amountpaid=$_POST['amoutpaid'];
		$refno=$_POST['refno'];
		$mpesacode=$_POST['mpesacode'];
		$place=$_POST['place'];
		$default=$_POST['default'];
		$item=$_POST['item'];
		$servant=$_POST['servant'];


		
		$db->save_payment($name,$amountpaid,$refno,$mpesacode,$place,$default,$item,
		 $servant);


			header("location: viewpayment.php");
		}
		
	
?>