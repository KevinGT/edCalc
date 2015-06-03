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
	<h2>Clive Rambo's Basic Elite Dangerous Market Calculation Tool</h2>
</header>

<nav id="menu">
	<ul>
		<li class="nav"><a href="index.php">Input</a></li>
		<li class="nav"><a href="amend.php">Amend</a></li>
		<li class="nav"><a href="marketData.php">Market data</a></li>
		<li class="nav"><a href="profitLoss.php">Profit/Loss</a></li>
	</ul>
</nav>

<?PHP
// market_input.php

//get new market details:
$station = trim($_POST['station']);
$goods = trim($_POST['selectGood']);
$type = trim($_POST['type']);
$sell = trim($_POST['sell']);
$buy = trim($_POST['buy']);
$demandNo = trim($_POST['demandNo']);
$demandLvl = trim($_POST['demandLvl']);
$supplyNo = trim($_POST['supplyNo']);
$supplyLvl = trim($_POST['supplyLvl']);
$galacticAv = trim($_POST['galacticAv']);

echo $station;
echo $goods;
echo $type;
echo $sell;
echo $buy;
echo $demandNo;
echo $demandLvl;
echo $supplyNo;
echo $supplyLvl;
echo $galacticAv;

//connect to database and add new customer details
$dbh = mysqli_connect("localhost","root","","edmarket")
	   or die("Unable to select database");

$sql = "UPDATE mkt_data SET Station ='". $station . "', Goods ='" . $goods . "', Type ='" . $type . "', ";
$sql = $sql . "Sell ='" . $sell . "', Buy ='"  . $buy . "', Demand ='" . $demandNo . "', ";
$sql = $sql . "Demand_Level ='" . $demandLvl . "', Supply ='" . $supplyNo . "', Supply_Level ='" . $supplyLvl . "', Galactic_Average ='" . $galacticAv . "' ";
$sql = $sql . "WHERE mkt_data.Goods ='" . $goods . "'";

$result=mysqli_query($dbh,$sql);
$num=mysqli_affected_rows($dbh);
echo $num;
//close database
mysqli_close($dbh);

echo "<p><a href='index.php'>click here to enter more data</a></p>";

?>
</body>
</html>

