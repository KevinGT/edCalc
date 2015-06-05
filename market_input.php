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

echo $station . "<br>";
echo $goods . "<br>";
echo $type . "<br>";
echo $sell . "<br>";
echo $buy . "<br>";
echo $demandNo . "<br>";
echo $demandLvl . "<br>";
echo $supplyNo . "<br>";
echo $supplyLvl . "<br>";
echo $galacticAv . "<br>";

//connect to database and add new customer details
$dbh = mysqli_connect("localhost","root","","edmarket")
	   or die("Unable to select database");

//check if needing to add a new customer, or amend exiting customer
if(empty($_POST['method']) /* || ($_POST['good']) || ($_POST['type']) || ($_POST['sell']) || ($_POST['buy'])  || ($_POST['demandNo']) || $_POST['demandLvl']) || ($_POST['supplyNo'])  || ($_POST['supplyLvl']) || ($_POST['galacticAv'])*/) {
	echo "<p>You have an empty cell and your information cannot be processed. Please return to the previous page and complete all fields</p>";
	echo "<p>click '<a href='index.html'><strong>here</strong></a>' to return to the data entry page</p>";
	} else {
		$sql = "INSERT INTO mkt_data(Station,Goods,Type,Sell,Buy,Demand,Demand_Level,Supply,Supply_Level,Galactic_Average) VALUES (('$station'),('$goods'),('$type'),('$sell'),('$buy'),('$demandNo'),('$demandLvl'),('$supplyNo'),('$supplyLvl'),('$galacticAv'))";
		$result=mysqli_query($dbh,$sql);
		$num=mysqli_affected_rows($dbh);
		}
		
		//echo $num;
		// The echo below was to test whether $sql existed. If nothing is INSERTED due to an empty field
		// then $sql is undefined, as that part of the if statement does not run to set $sql
		// echo $sql;

/*
if(isset($username != "" && $password != "") { 
//connect to database
$dbh = mysqli_connect("localhost","general","letmein","myMySQL");
//create sql
$sql = "SELECT * FROM Staff WHERE Username ='" . $username . "' AND Password ='" . $password . "'"; 
$result=mysqli_query($dbh,$sql);

echo $sql;
//no. of records found
$num=mysqli_affected_rows($dbh);
if($num==0) {
//close database connection
mysqli_close($dbh);
//login failure so redirect to login page
header("Location: index.php");
}
else {
//login OK so continue:
$row = mysqli_fetch_assoc($result);
$_SESSION['StaffID'] = $row["StaffID"];
//go to main menu page
header("Location: menu.php");
}
//close database
mysqli_close($dbh);



// ************************************************************
// ************************************************************
// ************************************************************
	*/
	//	$sql1 = "INSERT INTO station VALUES ((''),('$station'))";
	
	
// insert in mkt_data
// $result=mysqli_query($dbh,$sql);
// $num=mysqli_affected_rows($dbh);
// echo $num;

// insert into station
// $result1=mysqli_query($dbh,$sql1);
// $num=mysqli_affected_rows($dbh); 
// echo $num;

// ************************************************************
// ***Logic section to test whether a station already exists***
// ************************************************************		

/*
public function GetData($sqlquery)
{
    $data = array();
    $result = mysql_query($sqlquery) or trigger_error(mysql_error().$sqlquery);
    if ($result)
    {
        while($row = mysql_fetch_assoc($result))
        {
            $data[] = $row;
        }
    }
    return $data;
}
*/
// ***************************************************

$sql1 = "SELECT * FROM station";
$data = array();
$result1=mysqli_query($dbh,$sql1);
$num1=mysqli_affected_rows($dbh); 
echo $num1;

$i=0;
while($i<$num1){
$row = mysqli_fetch_assoc($result1);
$data[] = $row["stationName"];
	if($station == $data){
		echo "<p>That station name already exists in the specific table</p>";
		die ('Station check executed');
			} else {
				$sql1 = "INSERT INTO station VALUES ((''),('$station'))";
				$result1=mysqli_query($dbh,$sql1);
				$num=mysqli_affected_rows($dbh); 
				echo $num;
				}
				$i++;
			}
				
//close database
mysqli_close($dbh);

echo "<p><a href='index.php'>click here to enter more data</a></p>";

//redirect to main menu page:
// header("Location: index.html");
?>
</body>
</html>