<!DOCTYPE HTML>
<html>
<head>
	<title>Data chart</title>
<script>
window.onload = function() {

var dataPoints = [];

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "<?php echo "File name : ". $_GET['file']; ?>"
	},
	axisY: {
		title: "Units",
		titleFontSize: 24,
		includeZero: true
	},
	data: [{
		type: "column",
		yValueFormatString: "#,### Units",
		dataPoints: dataPoints
	}]
});

function addData(data) {
	for (var i = 0; i < data.length; i++) {
		dataPoints.push({
			x: new Date(data[i].date),
			y: data[i].units
		});
	}
	chart.render();

}

//$.getJSON("https://canvasjs.com/data/gallery/javascript/daily-sales-data.json", addData);
$.getJSON("uploads_json/<?php echo $_GET['file']; ?>", addData);

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>		