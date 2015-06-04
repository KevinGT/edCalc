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
$goods = trim($_POST['good']);
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

//check if needing to add a new customer, or amend exiting customer
if(empty($_POST['method'])
/* || ($_POST['good']) || ($_POST['type']) || ($_POST['sell']) || ($_POST['buy'])  || ($_POST['demandNo']) || $_POST['demandLvl']) || ($_POST['supplyNo'])  || ($_POST['supplyLvl']) || ($_POST['galacticAv'])*/
) {
	echo "<p>you have an empty cell and your information cannot be processed. Please complete all fields at this time</p>";
	echo "<p><a href='index.html'>click here to return to the data entry page</a></p>";
	} else {
		$sql = "INSERT INTO mkt_data(Station,Goods,Type,Sell,Buy,Demand,Demand_Level,Supply,Supply_Level,Galactic_Average) VALUES (('$station'),('$goods'),('$type'),('$sell'),('$buy'),('$demandNo'),('$demandLvl'),('$supplyNo'),('$supplyLvl'),('$galacticAv'))";
		}
// ************************************************************
// ***Logic section to test whether a station already exists***
// ************************************************************		

		$stationNameCheck = "SELECT * FROM station";

// ************************************************************
// ************************************************************
// ************************************************************
	
		$sql1 = "INSERT INTO station VALUES ((''),('$station'))";
		
// insert in mkt_data
$result=mysqli_query($dbh,$sql);
$num=mysqli_affected_rows($dbh);
echo $num;

// insert into station
$result=mysqli_query($dbh,$sql1);
$num=mysqli_affected_rows($dbh); 
echo $num;

$i=0;
while($i<$num){
$row = mysqli_fetch_assoc($stationNameCheck);
$stationID = $row["stationName"];
	if($station == $row){
		echo "<p>That station name already exists in the specific table</p>";
			} else {
					$sql1 = "INSERT INTO station VALUES ((''),('$station'))";
					}
					$i++;
				};
//close database
mysqli_close($dbh);

echo "<p><a href='index.php'>click here to enter more data</a></p>";

// redirect to main menu page:
// header("Location: index.html");
?>
</body>
</html>