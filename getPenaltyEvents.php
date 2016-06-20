<?php

include 'dbinfo.php';

$conn = new mysqli('localhost', $user, $pass, 'varsity');

if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
}

$query = "SELECT * FROM penaltyEvents WHERE TRUE;";

$result = $conn->query($query);

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
