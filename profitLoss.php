<!DOCTYPE html>
<html>
<head>
	<title>Elite Dangerous Market Data Entry and Profit Calculating System</title>
	<meta lang="en" charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style-profitLossOutput.css" />
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

<table>
  <form name="profitOrLoss" action="profitLossOutput.php" method="post">
    <tr>
      <td>Select Current Station </td>
      <td><select name="stationA">
  <?PHP
	//variable to check if no films and no customers:
	$flag = 1;
	//connect to database to obtain list of all DVDs WHERE VALUE OF 'BEINGRENTED' FIELD = 'NO'
	$dbh = mysqli_connect("localhost","root","","edmarket");
	//create sql to list films in order of Title
	$sql = "SELECT * FROM station ORDER BY stationName";
	$result=mysqli_query($dbh,$sql);
	//no. of records found
	$num=mysqli_affected_rows($dbh);
	if($num > 0) {
	$i=0;
	while ($i < $num) {
	//get DVD details
	$row = mysqli_fetch_assoc($result);
	$stationID = $row["stationID"];
	$stationName = $row["stationName"];

	//add details to HTML listbox:
	echo "<option value='" . $stationName . "'>" . $stationName . "</option>";
	$i++;
	}
	}
	else {
	//no stations found:
	echo "<option value=''>No stations found!</option>";
	$flag = 0;
	}
  ?>
        </select></td>
    </tr>
    <tr>
      <td>Select Destination Station </td>
      <td><select name="stationB">
          <?PHP
//create sql to list customers in order of lastname and then firstname
$sql = "SELECT * FROM station ORDER BY stationName";
$result=mysqli_query($dbh,$sql);
//no. of records found
$num=mysqli_affected_rows($dbh);
if($num > 0) {
$i=0;
while ($i < $num) {
//get customer details
$row = mysqli_fetch_assoc($result);
$stationID = $row["stationID"];
$stationName = $row["stationName"];

//add details to HTML listbox:
echo "<option value='" . $stationName . "'>" . $stationName . "</option>";
$i++;
}
}
else {
//no stations found:
echo "<option value=''>No stations found!</option>";
$flag = 0;
}
//close database
mysqli_close($dbh);
          ?>
    </select></td>
    <tr>
      <td><input type='submit' name='Submit' value='Calculate' /></td>
    </tr>
  </form>
</table>


<!-- Old code ********************************************************************

<!-- section below is to populate the station dropdown list
<section>
	<form id="form" name="marketCollection" method="post" action="profitLossOutput.php">
	
		<br><label for="select" class="title">Current Station: </label>
			<select name="stationa" type="text" id="stationName" maxlength="20">
			
		<br><label for="select" class="title">Destination Station: </label>
			<select name="stationb" type="text" id="stationName" maxlength="20">
			
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
			echo "<br><p>Now please select the station that you intend to sell your goods</p>";
			echo "<br><option value='" . $stationName . "'>" . $stationName . "</option>";
			$i++;
				}
			} else {
			//no goods found:
			echo "<option value=''>No goods found!</option>";
			$flag = 0;
			}
		// not sure the <p> is working as intended
		echo "<p>The market data below is for " . $stationName . "Station. Please use the drop down above to select information for a different station.</p>";
		// close connection
		mysqli_close($dbh);
		?>
		</select>
		<br><br><input type="submit" name="Submit" value="Submit for processing">
	</form>
</section> 
******************************************************************************************** -->

<footer>
	<p>Property of Kevin Talbot 2014</p>
</footer>
</body>

</html>