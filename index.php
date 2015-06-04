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
	<h3>INPUT</h3>
	<!--<p>In order to populate the database you will need to enter all the market prices in the form fields below with the latest information to allow the calculator to provide the most profitable routes available</p>
	<p>As data within the game changes you might feel the need to periodically update recorded information</p>-->
	<p>Michael Brooks of Frontier Developments has said that no API will be made available for Elite: Dangerous markets. Therefore my application made the process of inputting market data a manual process. If I decide to develop this tool further then I shall add in refinement so that less inputting is required. For now its a work in progress and does calculate the most profitable items between 2 routes.</p>
	<br><p>ALL FIELDS ARE MANDATORY</p>
	
<!--    <form name="marketCollection" action="market_input.php" method="post">
		<input type="hidden" name="method" value="add"> -->
		
		<form id="form" name="marketCollection" method="post" action="market_input.php">
			<br><label for="station" class="title">Station: </label>
				<input type="text" name="station" id="stationName" maxlength="20">
				
			<br><label for="good" class="title">Good: </label>
				<input type="text" name="good" id="goodsName" maxlength="15">
				
			<!-- <br><label for="select" class="title">Good selection: </label>
				<select name="good" type="text" id="goodsName" maxlength="20">
			/* <?PHP
				//variable to check if no films and no customers:
				$flag = 1;
				//connect to database to obtain list of all DVDs WHERE VALUE OF 'BEINGRENTED' FIELD = 'NO'
				$dbh = mysqli_connect("localhost","root","","edmarket")
					or die("Unable to select database");
				//create sql to list goods in order of Title
				$sql = "SELECT * FROM merchandise ORDER BY 'good-Name' ASC";
				$result=mysqli_query($dbh,$sql);
				//no. of records found
				$num=mysqli_affected_rows($dbh);
				echo $num;
				if($num > 0) {
				$i=0;
				while ($i < $num) {
				//get goods details
				$row = mysqli_fetch_assoc($result);
				$goodID = $row['good_ID'];
				$goodNm = $row['good-Name'];
				
				//add details to HTML listbox:				
				echo "<option value='" . $goodID . "'>" . $goodNm . "</option>";
				$i++;
					}
				} else {
				//no goods found:
				echo "<option value=''>No goods found!</option>";
				$flag = 0;
				}
			?>*/
			</select>	-->

			<br><label for="type" class="title">Type: </label>
				<input type="text" name="type" id="typeName" maxlength="15">
				
			<br><label for="sell" class="title">Sell at: </label>
				<input type="text" name="sell" id="sellPrice" maxlength="7">
				
			<br><label for="buy" class="title">Buy at: </label>
				<input type="text" name="buy" id="buyPrice" maxlength="7">
				
			<br><label for="demandNo" class="title">Demand Number: </label>
				<input type="text" name="demandNo" id="demandNumber" maxlength="7">
				
			<br><label for="demandLvl" class="title">Demand Level: </label>
				<input type="text" name="demandLvl" id="demandLevel" maxlength="6">
				
			<br><label for="supplyNo" class="title">Supply Number: </label>
				<input type="text" name="supplyNo" id="supplyNumber" maxlength="7">
				
			<br><label for="supplyLvl" class="title">Supply Level: </label>
				<input type="text" name="supplyLvl" id="supplyLevel" maxlength="6">
				
			<br><label for="galacticAv" class="title">Galactic Average: </label>
				<input type="text" name="galacticAv" id="galacticAverage" maxlength="8">
				
			<br><br><input type="submit" name="Submit" value="Submit Data">
		</form>
</section>

<footer>
	<p>Elite: Dangerous is developed by Frontier Developments plc</p>
	<p>Market tool developed by Kevin Talbot</p>
</footer>
</body>

</html>

