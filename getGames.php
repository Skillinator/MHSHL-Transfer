<?php

include 'dbinfo.php';

$conn = new mysqli('localhost', $user, $pass, 'varsity');

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
