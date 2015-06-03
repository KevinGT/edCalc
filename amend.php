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
		<h3>AMEND</h3>
		<p>Please enter the data to be updated</p>
		<p>ALL FIELDS ARE MANDATORY</p>

<!--    
		<form name="marketCollection" action="amend_input.php" method="post">
		<input type="hidden" name="method" value="add"> 
-->
	
		<form id="form" name="marketCollection" method="post" action="amend_input.php">
			<br><label for="station" class="title">Station: </label>
				<input type="text" name="station" id="stationName" maxlength="15">
				
			<!--<br><label for="good" class="title">Good: </label>
				<input type="text" name="good" id="goodsName" maxlength="15">-->
				
			<br><label for="select" class="title">Good selection:  </label>
				<select name="selectGood" maxlength="20">
			<?PHP
				//variable to check if no films and no customers:
				$flag = 1;
				//connect to database to obtain list of all DVDs WHERE VALUE OF 'BEINGRENTED' FIELD = 'NO'
				$dbh = mysqli_connect("localhost","root","","edmarket")
					or die("Unable to select database");
				//create sql to list goods in order of Title
				$sql = "SELECT * FROM mkt_data";
				$result=mysqli_query($dbh,$sql);
				//no. of records found
				$num=mysqli_affected_rows($dbh);
				echo $num;
				if($num > 0) {
				$i=0;
				while ($i < $num) {
				//get goods details
				$row = mysqli_fetch_assoc($result);
				$stationID = $row["Station"];
				$goodName1 = $row["Goods"];
				
				//$dvd_id = $row["DVD_ID"];
				//$title = $row["Title"];
				//$cert = $row["Certificate"];
				//$genre = $row["Genre"];
				
				//add details to HTML listbox:				
				echo "<option value='" . $goodName1 . "'>" . $goodName1 . "</option>";
				$i++;
				}
				}
				else {
				//no goods found:
				echo "<option value=''>No goods found!</option>";
				$flag = 0;
				}
			?>
			</select>

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
				
			<br><br><input type="submit" name="Submit" value="Update Data">
		</form>
</section>

<footer>
	<p></p>
</footer>
</body>
</html>

<!--
<h3>Online DVD Rental Booking System</h3>
<h4>Book a Film </h4>
<table>
  <form name="frmBooking" action="booking2.php" method="post">
    <tr>
      <td>Select a Film from the list below </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><select name="selectDVD">
/*  
<?PHP
    //variable to check if no films and no customers:
$flag = 1;
//connect to database to obtain list of all DVDs WHERE VALUE OF 'BEINGRENTED' FIELD = 'NO'
$dbh = mysqli_connect("localhost","general","letmein","myMySQL");
//create sql to list films in order of Title
$sql = "SELECT * FROM DVD WHERE BeingRented ='0' ORDER BY Title";
$result=mysqli_query($dbh,$sql);
//no. of records found
$num=mysqli_affected_rows($dbh);
if($num > 0) {
$i=0;
while ($i < $num) {
//get DVD details
$row = mysqli_fetch_assoc($result);
$dvd_id = $row["DVD_ID"];
$title = $row["Title"];
$cert = $row["Certificate"];
$genre = $row["Genre"];
//add details to HTML listbox:
echo "<option value='" . $dvd_id . "'>" . $title . ", " . $cert . ", " . $genre . "</option>";
$i++;
}
}
else {
//no films found:
echo "<option value=''>No films found!</option>";
$flag = 0;
}
  ?> */
 -->
