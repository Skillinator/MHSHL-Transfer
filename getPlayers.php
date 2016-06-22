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
	$query = "SELECT * FROM players WHERE season = " . $season . ";";
}else{
	$query = "SELECT * FROM players;";
}

$result = $conn->query($query);

echo '[';

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '(';
		echo $row['team'] . ',';
		echo $row['name'] . ',';
		echo $row['id'] . ',';
		echo $row['number'] . ',';
		echo $row['season'] . ',';
		echo $row['gp'] . ',';
		echo $row['goalie'];
		echo ')';
	}
}

echo ']';

$conn->close();

?>
