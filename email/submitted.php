<?php

require ('../include/appSession.php');
$appID = $_SESSION['ApplicantID']; 
include("../conn.php");	

require('../PHPMailer/PHPMailerAutoload.php');

	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure ='ssl';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = '465';

	$mail->Username = 'starqub@gmail.com';
	$mail->Password = 'qubstar20';

	$mail->Setfrom('no-reply@qubstar.com');

	$sql="SELECT ApplicantID, email from ApplicantLogin WHERE ApplicantID = $appID";

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){
		while($row = $result->fetch_assoc()){
		
			$mail->AddAddress('starqub@gmail');
			$mail->addBCC($row['email']);
		}
		$mail->isHTML(true);
		$mail->Subject = 'STAR Submitted Application';
		$mail->Body = 'Your application has been submitted and will be reviewed by our Human Resources Team
		
		Should you meet the required criteria you will be required to produce your right to work documentation and your Qualification certificates';
		
		if ($mail-> Send()){
			header('location: ../applicant/success.php?details=success');
		}else{
			header('location: ../applicant/welcome.php?error');
		}
	}
?>