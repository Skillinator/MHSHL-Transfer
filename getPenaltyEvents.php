<?php

include 'dbinfo.php';

$db;
$majorkey;

if($_GET['db'] == 'v'){
	$db = "varsity";
}else if($_GET['db'] == 'j'){
	$db = "jv";
}else{
	die("ERROR: jv/varsity selection failed");
}

if($_GET['majorkey'] > 0){
	$majorkey = $_GET['majorkey'];
}else{
	$majorkey = 0;
}

$conn = new mysqli('localhost', $user, $pass, $db);

if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
}

if($majorkey){
	$query = "SELECT * FROM penaltyEvents WHERE Major_Key  > " . $majorkey . ";";
}else{
	$query = "SELECT * FROM penaltyEvents;";
}

$result = $conn->query($query);

echo "PE";
echo '[';

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '(';
		echo $row['Major_Key'] . ',';
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
