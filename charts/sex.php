	<?php
	$query ="SELECT Sex.Sex, ad.num
			FROM Sex
			INNER JOIN(
				SELECT SexID, COUNT(*) AS num
				FROM ApplicantDetails
				GROUP BY SexID) ad
				ON ad.SexID=Sex.SexID";
	
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
			['Sex', 'Total'],
			<?php
			while($row = mysqli_fetch_array($result)){
				echo "['".$row["Sex"]."', ".$row["num"]."],";
			}
			?>
		]);
		
		var options = {
			'title':'% Sex of External Users',
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
		
		var chart = new google.visualization.PieChart(document.getElementById('sex'));
		chart.draw(data, options);
	}
	</script>
	
	<div id="sex" style="width:350px; height:300px;"></div>