<?php

$json = file_get_contents('php://input');
$obj = json_decode($json);

if(!empty($obj)) {
	
	$con = mysqli_connect('localhost','id5455345_dab_admin','abuisthepassword') 
	       or die('Cannot connect to the DB');
	// $con = mysqli_connect('localhost','root','qwe123') 
	//       or die('Cannot connect to the DB');

	mysqli_select_db($con, 'id5455345_dab');
	// mysqli_select_db($con, 'dab');

	mysqli_query($con,"INSERT INTO feedback (name,email,category,message,showonweb)
	  VALUES ('".$obj->name."','".$obj->email."','".$obj->category."','".$obj->message."','".$obj->showonweb."')");

	mysqli_close($con);

	// set email body
	$msg1 = "New feedback for your Dab app has been submitted: <br>"
	."Name: ".$obj->name."<br>"
	."Email: ".$obj->email."<br>"
	."Category: ".$obj->category."<br>"
	."Message: ".$obj->message."<br>"
	."Show on web: ".$obj->showonweb;

    $msg2 = "Your feedback has been received by our developers.<br><br>"
    ."Category: ".$obj->category."<br>"
    ."Message: ".$obj->message."<br><br>"
    ."Thank you for helping us to improve the app.<br><br>"
    ."Best regards,<br>"
    ."Dab developers<br>"
    ."For more info go to <a href='https://debttracker.000webhostapp.com/' target='_blank'>Dab Website</a>";

	// use wordwrap() for lines no longer than 70 characters
	$msg1 = wordwrap($msg1,70);
	$msg2 = wordwrap($msg2,70);

	// header cc
	$header = "MIME-Version: 1.0\r\n";
	$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($obj->email,"Dab App Feedback",$msg2,$header);

	$header .= "Cc: hanip133@yahoo.com";
	// send email
	mail("aretif95@gmail.com","Dab App Feedback",$msg1,$header);
	echo "Success";
}
?>