	<?php
	$query ="SELECT ut.UserType, su.num
			FROM UserType ut
			INNER JOIN(
				SELECT Defusertype, COUNT(*) AS num
				FROM StaffUser
				GROUP BY Defusertype) su
				ON su.Defusertype=ut.userTypeID";
	
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
				'title':'Internal Users',
				'legend': { position: 'top', maxLines: 1 },
				'pieHole': 0.4,
				'pieStartAngle': 70,
				'pieSliceText':'value-and-percentage',
				'backgroundColor': { 'fill':'transparent' },
				'chartArea': {
					'backgroundColor': {
					'stroke': '#581818',
					'strokeWidth': 3
					}
				}
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('internal'));
			chart.draw(data, options);
		}
	</script>
	
	<div id="internal" style="width:350px; height:300px;"></div>