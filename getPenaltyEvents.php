<?php

include 'dbinfo.php';

$db;
$season;

if($_GET['db'] == 'v'){
	$db = "varsity";
}else if($_GET['db'] == 'j'){
	$db = "jv";
}else{
	die("ERROR: jv/varsity selection failed");
}

if($_GET['season'] > 0){
	$season = $_GET['season'];
}else{
	$season = 0;
}

$conn = new mysqli('localhost', $user, $pass, $db);

if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
}

if($season){
	$query = "SELECT * FROM penaltyEvents WHERE season = " . $season . ";";
}else{
	$query = "SELECT * FROM penaltyEvents;";
}

$result = $conn->query($query);

echo "PE";
echo '[';

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '(';
		echo $row['GameID'] . ',';
		echo $row['TeamID'] . ',';
		echo $row['player'] . ',';
		echo $row['duration'] . ',';
		echo $row['period'] . ',';
		echo $row['time'] . ',';
		echo $row['timeRemaining'] . ',';
		echo $row['goalsWhile'] . ',';
		echo $row['scoredOn'] . ',';
		echo $row['offense'] . ',';
		echo $row['season'];
		echo ')';
	}
}

echo ']';

$conn->close();

?>
