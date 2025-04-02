<?php

require ('../include/staffSession.php');

$applicant = $_GET['viewid'];

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

	$sql="SELECT ApplicantID, email from ApplicantLogin WHERE ApplicantID = $applicant";

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){
		while($row = $result->fetch_assoc()){
		
			$mail->AddAddress('starqub@gmail');
			$mail->addBCC($row['email']);
		}
		$mail->isHTML(true);
		$mail->Subject = 'STAR Successful Application';
		$mail->Body = '<p>Thank you for your application.  We appreciate your interest in the opportunity and the time you have taken to apply.</p> 

		<p>You have now moved to the second stage and we require you to bring in your wirte to work docuemnts, Passport, visa etc.  Also please bring your original proof of qualifications.  Please present this documents for approval within 5 working days of this email<p>

		<p>Please present your documents to Human Resources, Queens University Belfast, Administration Building, University Road, Belfast.</p>

		<p>yours sincerely</p>
		<p>STAR Team</p>';
		
		if ($mail-> Send()){
			header('location: ../HR/shortlist.php');
		}else{
			header('location: ../HR/shortlist.php?error');
		}
	}
?>