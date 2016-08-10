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
	$query = "SELECT * FROM goaliePerformances WHERE seasons = " . $season . ";";
}else{
	$query = "SELECT * FROM goaliePerformances;";
}

$result = $conn->query($query);

echo "GP";
echo '[';

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '(';
		echo $row['Major_Key'] . ',';
		echo $row['GameID'] . ',';
		echo $row['TeamID'] . ',';
		echo $row['player'] . ',';
		echo $row['minutes'] . ',';
		echo $row['ga'] . ',';
		echo $row['sa'] . ',';
		echo $row['seasons'];
		echo ')';
	}
}

echo ']';

$conn->close();

?>
