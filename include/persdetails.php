<?php
	$readpers="SELECT al.ApplicantID, al.userName, al.email, 
	ad.ApplicantID, ad.TitleID, ad.Forename, ad.Surname, ad.Preferred, ad.dob, ad.Mobile, ad.SexID, ad.SexID, ad.NationID, ad.Street, ad.City, ad.pcode, ad.hrsTypeID, Title.TitleID, Title.Title, Sex.Sex, Sex.SexID, nat.NationalityID, nat.Nationality,  ht.TypeID, ht.HoursType 
	
	FROM ApplicantDetails ad
	
	INNER JOIN ApplicantLogin al ON ad.ApplicantID = al.ApplicantID
	INNER JOIN Title ON ad.TitleID = Title.TitleID
	INNER JOIN Nationality nat ON ad.NationID = nat.NationalityID
	INNER JOIN Sex on ad.SexID = Sex.SexID
	INNER JOIN HoursType ht ON ad.hrsTypeID = ht.TypeID
	
	WHERE al.ApplicantID = '$applicant';";
	

		$resultpers = $conn->query($readpers);
 
        if(!$resultpers){
		echo $conn->error;
	}

	while($row = $resultpers->fetch_assoc()){
			   
				$applicant =  $row['ApplicantID']; 
				$uname = $row['userName'];
				$email= $row['email'];
				$title = $row['Title'];
				$fname = $row['Forename'];
				$sname = $row['Surname'];
				$pname = $row['Preferred'];
				$contact = $row['Mobile'];
				$hrtype = $row['HoursType'];
			}
			
			
?>

<div class="container persdetails">
<div class="card card-body">
<div class="panel-body">
	<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th width="5%">Title:</th>
						<th width="20%">Forname:</th>
						<th width="20%">Surname:</th>
						<th width="25%">Mobile No:</th>
						<th width="25%">email:</th>	
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="5%"><?php echo $title; ?></td>
						<td width="20%"><?php echo $fname;?></td>
						<td width="20%"><?php echo $sname; ?></td>
						<td width="25%"><?php echo $contact; ?></td>
						<td width="25%"><?php echo $email; ?></td>			
					</tr>
				</tbody>
	</table>
</div>
</div>
</div>
