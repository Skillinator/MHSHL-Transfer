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

$conn = new mysqli('localhost', $user, $pass, $db);

if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
}

$query = "SELECT * FROM games WHERE TRUE;";

$result = $conn->query($query);

echo '[';

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '(';
		echo $row['id'] . ',';
		echo $row['month'] . ',';
		echo $row['day'] . ',';
		echo $row['year'] . ',';
		echo $row['startTime'] . ',';
		echo $row['home'] . ',';
		echo $row['away'] . ',';
		echo $row['homeShots'] . ',';
		echo $row['awayShots'] . ',';
		echo $row['period'] . ',';
		echo $row['time'] . ',';
		echo $row['number'] . ',';
		echo $row['season'];
		echo ')';
	}
}

echo ']';

$conn->close();

?>
