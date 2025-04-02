<?php
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

	$sql="SELECT * from ApplicantLogin WHERE userTypeID = 5";

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){
		while($row = $result->fetch_assoc()){
		
			$mail->AddAddress('starqub@gmail');
			$mail->addBCC($row['email']);
		}
		$mail->isHTML(true);
		$mail->Subject = 'STAR Expression of Interest';
		$mail->Body = 'A new post has been created please log in to register your interest';
		
		if ($mail-> Send()){
			header('location: ../Manager/welcome.php?details=success');
		}else{
			header('location: ../Manager/welcome.php?error');
		}
	}
?>