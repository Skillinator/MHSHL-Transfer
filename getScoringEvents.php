<?php

include 'dbinfo.php';

$conn = new mysqli('localhost', $user, $pass, 'varsity');

if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
}

$query = "SELECT * FROM scoringEvents WHERE TRUE;";

$result = $conn->query($query);

echo '[';

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '(';
		echo $row['GameID'] . ',';
		echo $row['TeamID'] . ',';
		echo $row['scorer'] . ',';
		echo $row['a1'] . ',';
		echo $row['a2'] . ',';
		echo $row['period'] . ',';
		echo $row['time'] . ',';
		echo $row['pp'] . ',';
		echo $row['season'];
		echo ')';
	}
}

echo ']';

$conn->close();

?>
