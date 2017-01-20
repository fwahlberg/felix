<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pangbourne Rowing Manager</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="css/main.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<img src="logo.png" id="logo" class="logo"/>
			<div id="container">
				<div class="col-md-4 input">
					<form action="" method="POST" role="form" onsubmit="event.preventDefault();">
						<span id="error"></span>
						<legend>Weight Adjustment</legend>
						<div class="row">
							<div class="form-group col-md-12 weight">
								<label for="">Name</label>
								<input type="text" class="form-control" id="name" placeholder="Name">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12 weight">
								<label for="">Weight (Kg)</label>
								<input type="text" class="form-control" id="weight" placeholder="Weight (Kg)" onkeyup="checknum(this)">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4 hrs">
								<label for="">Hours</label>
								<input type="text" class="form-control" id="hours" onkeyup="checknum(this)">
							</div>
							<div class="form-group col-md-4 mins">
								<label for="">Minutes</label>
								<input type="text" class="form-control" id="minutes" onkeyup="checknum(this)">
							</div>
							<div class="form-group col-md-4 mins">
								<label for="">Seconds</label>
								<input type="text" class="form-control" id="seconds" onkeyup="checknum(this)">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12 distance">
								<label for="">Distance</label>
								<input type="text" class="form-control" id="distance" placeholder="Distance" onkeyup="checknum(this)">
							</div>
						</div>
						
						<button onclick="calculator()" class="btn btn-primary" id="pangbutton">Submit</button>
						<div class="row results" id="results">
							
						</div>
					</form>
				</div>
				<div class="col-md-8">
					<legend>Results</legend>
					<div>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Name</th><th>Adjusted Weight Factor</th><th>Adjusted Distance</th><th>Adjusted Time</th>
								</tr>
							</thead>
							<tbody id="resultArea">
								
							</tbody>
						</table>
					</div>
				</div>					
				
			</div>
		</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script type ="text/javascript">
			let errors="";
			function calculator() {
				let name = document.getElementById('name').value;
				let wf = weightf();
				let wadist = wfdist(wf);
				let oTime = timetosecs();
				let watime = wftime(wf);
				let outputer = "<tr><td><b>" + name + "</b></td><td>" + wf + "</td><td>" + wadist + "</td><td>" + watime + "</td></tr>";
				let div = document.getElementById('resultArea');
				div.innerHTML = div.innerHTML + outputer;
			};

			function weightf(){
				let kg = document.getElementById('weight').value;
				kg = kg * 2.20462;
				let wf = (kg/270);
				wf = Math.pow(wf, 0.222);
				wf= wf.toFixed(3);
				return wf;
			};

			function timetosecs() {
				let hrs = document.getElementById('hours').value;
				let mins = document.getElementById('minutes').value;
				let secs = document.getElementById('seconds').value;	
				return hrs * (60 * 60) + mins * 60 + secs *1;
			};
			
			function secstotime(totalSeconds) {
				let hours = Math.floor(totalSeconds / 3600);
				totalSeconds %= 3600;
				let minutes = Math.floor(totalSeconds / 60);
				let seconds = Math.floor((totalSeconds % 60)*10)/10;
				return hours + ":" + minutes + ":" + seconds;
			};

			function wfdist(wf) {
				let dist = document.getElementById('distance').value;
				dist = dist/wf;
				dist = Math.floor(dist);
				return dist
			};

			function wftime(wf) {
				let time = timetosecs();
				return secstotime(wf * time);
			};

			function checknum(number){
				if (isNaN(number.value)){
					errors += "<li>" + toTitleCase(number.id) + " must be a number!</li>";
					document.getElementById('error').innerHTML = errors;
				} else{
					document.getElementById('error').innerHTML = "";
					errors="";
				}
			};
			function formatOutput(){

			}
			function toTitleCase(str)
			{
   				return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
			};
		</script>
	</body>
</html>