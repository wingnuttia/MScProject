	<?php
	$query ="SELECT ut.UserType, al.num
			FROM UserType ut
			INNER JOIN(
				SELECT userTypeID, COUNT(*) AS num
				FROM ApplicantLogin
				GROUP BY userTypeID) al
				ON al.userTypeID=ut.userTypeID";
	
	$result=mysqli_query($conn, $query);
	
	if(!$result){
         echo $conn->error;    
        }
		
?>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Total','UserType'],
				<?php
				while($row = mysqli_fetch_array($result)){
					echo "['".$row["UserType"]."', ".$row["num"]."],";
					
				}
				?>
			]);
			
			var options = {
				'title':'External Users',
				'legend': { position: 'top', maxLines: 1 },
				'pieHole': 0.4,
				'pieSliceText':'value-and-percentage',
				'backgroundColor': { 'fill':'transparent' },
				'chartArea': {
					'backgroundColor': {
					'stroke': '#581818',
					'strokeWidth': 3
					}
				}
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('external'));
			chart.draw(data, options);
		}
	</script>
	
	<div id="external" style="width:350px; height:300px;"></div>