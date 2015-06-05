<!DOCTYPE html>
<html>
<head>
	<title>Elite Dangerous Market Data Entry and Profit Calculating System</title>
	<meta lang="en" charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css" />
	<script></script>
</head>

<body>
<header>
	<h2>Elite Dangerous Market Calculation Tool</h2>
</header>

<nav id="menu">
	<ul>
		<li class="nav"><a href="index.php">Input</a></li>
		<li class="nav"><a href="amend.php">Amend</a></li>
		<li class="nav"><a href="marketData.php">Market data</a></li>
		<li class="nav"><a href="profitLoss.php">Profit/Loss</a></li>
	</ul>
</nav>

<section>
		<form id="form" name="marketCollection" method="post" action="mktDataOutput.php">
			<br><label for="select" class="title">Station selection: </label>
				<select name="station" type="text" id="stationName" maxlength="20">
			<?PHP
				//variable to check if no films and no customers:
				$flag = 1;
				//connect to database to obtain list of all DVDs WHERE VALUE OF 'BEINGRENTED' FIELD = 'NO'
				$dbh = mysqli_connect("localhost","root","","edmarket")
					or die("Unable to select database");
				//create sql to list goods in order of Title
				$sql = "SELECT * FROM station";
				$result=mysqli_query($dbh,$sql);
				//no. of records found
				$num=mysqli_affected_rows($dbh);
				echo $num;
				if($num > 0) {
				$i=0;
				while ($i < $num) {
				//get goods details
				$row = mysqli_fetch_assoc($result);
				$stationID = $row['stationID'];
				$stationName = $row['stationName'];
				
				//add details to HTML listbox:				
				echo "<option value='" . $stationName . "'>" . $stationName . "</option>";
				$i++;
					}
				} else {
				//no goods found:
				echo "<option value=''>No goods found!</option>";
				$flag = 0;
				}
			?>
			</select>
				
			<br><br><input type="submit" name="Submit" value="Submit Data">
		</form>
</section>

<footer>
	<p>Property of Kevin Talbot 2014</p>
</footer>
</body>

</html>