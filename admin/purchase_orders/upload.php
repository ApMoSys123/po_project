<?php
include('db_connection.php');
$msg="";
if(isset($_POST['upload'])){
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
	$comment=mysqli_real_escape_string($con,$_POST['comment']);
	
	// mysqli_query($con,"insert into po_list(po_no,startdate,enddate,pname) values('$po_no','$startdate','$enddate','$pname')");
	$msg="Thanks message";
	
	$html="<table><tr><td>PO#</td><td>$po_no</td></tr><tr><td>Start Date</td><td>$startdate</td></tr><tr><td>End Date</td><td>$enddate</td></tr><tr><td>Project Name</td><td>$pname</td></tr></table>";
	
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="GAMIL_EMAIL_ID";
	$mail->Password="GAMIL_PASSWORD";
	$mail->SetFrom("GAMIL_EMAIL_ID");
	$mail->addAddress("TO_EMAIL_ID");
	$mail->IsHTML(true);
	$mail->Subject="New Contact Us";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		//echo "Mail send";
	}else{
		//echo "Error occur";
	}
	echo $msg;
}
?>